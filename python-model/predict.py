import json
import sys
import joblib
import numpy as np
import pandas as pd
from pathlib import Path
from datetime import datetime, date, timedelta
from tensorflow.keras.models import load_model

# ── Paths ──────────────────────────────────────────────────────────────────────
BASE_DIR       = Path(__file__).resolve().parent
MODEL_PATH     = BASE_DIR / "maintenance_model.h5"
SCALER_PATH    = BASE_DIR / "maintenance_scaler.pkl"
FEATURES_PATH  = BASE_DIR / "feature_list.pkl"
ENCODERS_PATH  = BASE_DIR / "label_encoders.pkl"
THRESHOLD_PATH = BASE_DIR / "best_threshold.pkl"

# ── Load artefacts ─────────────────────────────────────────────────────────────
model      = load_model(str(MODEL_PATH), compile=False)
scaler     = joblib.load(SCALER_PATH)
FEATURES   = joblib.load(FEATURES_PATH)
ENCODERS   = joblib.load(ENCODERS_PATH)
BEST_T     = joblib.load(THRESHOLD_PATH)


def build_features(p: dict) -> pd.DataFrame:
    """
    p = raw payload dict from Laravel JSON file
    Returns a single-row DataFrame ready for scaler.transform()
    """
    row = {}

    # ── Numeric fields ─────────────────────────────────────────────────────────
    row["engine_age_years"]            = float(p.get("engine_age_years",            0) or 0)
    row["total_engine_hours"]          = float(p.get("total_engine_hours",          0) or 0)
    row["avg_daily_operating_hours"]   = float(p.get("avg_daily_operating_hours",   0) or 0)
    row["days_since_last_maintenance"] = float(p.get("days_since_last_maintenance", 0) or 0)
    row["hours_since_last_service"]    = float(p.get("hours_since_last_service",    0) or 0)
    row["engine_temp_c"]               = float(p.get("engine_temp_c",               0) or 0)
    row["oil_pressure_bar"]            = float(p.get("oil_pressure_bar",            0) or 0)
    row["coolant_level_percent"]       = float(p.get("coolant_level_percent",       0) or 0)
    row["engine_rpm"]                  = float(p.get("engine_rpm",                  0) or 0)
    row["fuel_consumption_lph"]        = float(p.get("fuel_consumption_lph",        0) or 0)
    row["vibration_level"]             = float(p.get("vibration_level",             0) or 0)
    row["oil_change_days_ago"]         = float(p.get("oil_change_days_ago",         0) or 0)
    row["filter_change_days_ago"]      = float(p.get("filter_change_days_ago",      0) or 0)
    row["sea_condition"]               = float(p.get("sea_condition",               0) or 0)
    row["last_inspection_days"]        = float(p.get("last_inspection_days",        0) or 0)

    # ── Binary ─────────────────────────────────────────────────────────────────
    row["unusual_sounds"] = 1 if str(p.get("unusual_sounds","No")) == "Yes" else 0

    # ── Risk flags ─────────────────────────────────────────────────────────────
    row["temp_risk"]       = 1 if row["engine_temp_c"]          > 95  else 0
    row["pressure_risk"]   = 1 if row["oil_pressure_bar"]       < 2.5 else 0
    row["coolant_risk"]    = 1 if row["coolant_level_percent"]  < 75  else 0
    row["vibration_risk"]  = 1 if row["vibration_level"]        >= 4  else 0
    row["oil_overdue"]     = 1 if row["oil_change_days_ago"]    > 45  else 0
    row["filter_overdue"]  = 1 if row["filter_change_days_ago"] > 45  else 0
    row["inspection_late"] = 1 if row["last_inspection_days"]   > 50  else 0
    row["high_sea"]        = 1 if row["sea_condition"]          >= 4  else 0

    row["risk_score"] = (
        row["temp_risk"]       + row["pressure_risk"]  +
        row["coolant_risk"]    + row["vibration_risk"] +
        row["oil_overdue"]     + row["filter_overdue"] +
        row["inspection_late"] + row["high_sea"]
    )

    # ── Interaction features ───────────────────────────────────────────────────
    row["hours_x_age"]   = row["hours_since_last_service"] * row["engine_age_years"]
    row["temp_x_vib"]    = row["engine_temp_c"]            * row["vibration_level"]
    row["rpm_per_age"]   = row["engine_rpm"] / (row["engine_age_years"] + 1)
    row["fuel_per_hour"] = row["fuel_consumption_lph"] / (row["avg_daily_operating_hours"] + 0.1)
    row["days_x_risk"]   = row["days_since_last_maintenance"] * row["risk_score"]
    row["hours_x_risk"]  = row["hours_since_last_service"]    * row["risk_score"]
    row["risk_x_age"]    = row["risk_score"]    * row["engine_age_years"]
    row["temp_pressure"] = row["engine_temp_c"] / (row["oil_pressure_bar"] + 0.1)
    row["multi_flag"]    = 1 if row["risk_score"] >= 3 else 0

    # ── Date features ──────────────────────────────────────────────────────────
    dt = datetime.fromisoformat(
        p.get("record_date", date.today().isoformat())
    )
    row["record_month"]     = dt.month
    row["record_dayofweek"] = dt.weekday()

    # ── Label encode categoricals ──────────────────────────────────────────────
    for src, enc_name in [
        ("boat_type",             "boat_type_enc"),
        ("engine_model",          "engine_model_enc"),
        ("hull_condition",        "hull_condition_enc"),
        ("condition_severity",    "condition_severity_enc"),
        ("last_maintenance_type", "last_maint_type_enc"),
        ("maintenance_reason",    "maintenance_reason_enc"),
    ]:
        val = p.get(src, None)
        try:
            row[enc_name] = int(ENCODERS[enc_name].transform([val])[0])
        except Exception:
            row[enc_name] = 0   # unknown category → default 0

    return pd.DataFrame([row], columns=FEATURES).fillna(0)


def estimate_days(prob: float, risk_score: int) -> int:
    """Estimate days until maintenance based on probability + risk score."""
    if   prob >= 0.90: days = 2
    elif prob >= 0.75: days = 5
    elif prob >= BEST_T: days = 14
    else:              days = 40
    return max(1, days - risk_score)


def main():
    try:
        input_file = Path(sys.argv[1])
        payload    = json.loads(input_file.read_text(encoding="utf-8"))

        # ── Build features & predict ───────────────────────────────────────────
        df     = build_features(payload)
        scaled = scaler.transform(df.values)
        prob   = float(model.predict(scaled, verbose=0)[0][0])

        # ── Days & date ────────────────────────────────────────────────────────
        risk_score_val = int(df["risk_score"].values[0])
        days_until     = estimate_days(prob, risk_score_val)
        due_date       = (date.today() + timedelta(days=days_until)).isoformat()

        # ── Risk label ─────────────────────────────────────────────────────────
        if   prob >= 0.75:  risk_label = "HIGH"
        elif prob >= BEST_T: risk_label = "MEDIUM"
        else:               risk_label = "LOW"

        result = {
            "needs_maintenance"    : bool(prob >= BEST_T),
            "probability"          : round(prob, 4),
            "probability_percent"  : round(prob * 100, 1),
            "risk_level"           : risk_label,
            "days_until_maintenance": days_until,
            "predicted_due_date"   : due_date,
            "today"                : date.today().isoformat(),
            "threshold_used"       : round(float(BEST_T), 3),
        }
        print(json.dumps(result))

    except Exception as e:
        print(json.dumps({"error": str(e)}))


if __name__ == "__main__":
    main()
