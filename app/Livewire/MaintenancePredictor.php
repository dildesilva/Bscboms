<?php

namespace App\Livewire;

use App\Models\Boat;
use App\Models\boatRecodeUpdate;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Exception;
use Illuminate\Support\Facades\Auth;

class MaintenancePredictor extends Component
{
   public $boatid;
public $boattype;
public $enginemodel;
public $lastmaintenancetype;
public $maintenancereason;

//  Engine numeric data — default = HIGH RISK test values 
public $engineageyears;
public $totalenginehours ;
public $avgdailyoperatinghours ;
public $dayssincelastmaintenance;
public $hourssincelastservice;
public $enginetempc;
public $oilpressurebar;
public $coolantlevelpercent;
public $enginerpm;
public $fuelconsumptionlph;
public $vibrationlevel ;
public $oilchangedaysago;
public $filterchangedaysago ;
public $lastinspectiondays ;
public $seacondition;
public $enginePower;
// Condition
public $hullcondition;
public $unusualsounds;
public $conditionseverity;

    // Output
    public $prediction   = null;
    public $errorMessage = null;
    public $boatInfo;
    public $enginInfo;



public function mount(){



              $this->boatid = Auth::user()->email;
              $this->boatInfo = Boat::where('boatId', $this->boatid )->first();
              $this->enginInfo = boatRecodeUpdate::where('boatId', $this->boatid )->first();


              $this->boattype=$this->boatInfo->boattype;
              $this->enginemodel=$this->boatInfo->enginemodel;
              $this->enginePower=$this->boatInfo->enginePower;
              $this->lastmaintenancetype=$this->boatInfo->lastmaintenancetype;


              //////////////////////////////////////////////////////////////////////////
              $this->engineageyears=$this->enginInfo->engineageyears;
              $this->totalenginehours=$this->enginInfo->totalenginehours;
              $this->dayssincelastmaintenance=$this->enginInfo->dayssincelastmaintenance;
              $this->enginetempc=$this->enginInfo->enginetempc;
              $this->oilpressurebar=$this->enginInfo->oilpressurebar;
              $this->coolantlevelpercent=$this->enginInfo->coolantlevelpercent;
              $this->enginerpm=$this->enginInfo->enginerpm;
              $this->fuelconsumptionlph=$this->enginInfo->fuelconsumptionlph;
              $this->vibrationlevel=$this->enginInfo->vibrationlevel;
              $this->avgdailyoperatinghours=$this->enginInfo->avgdailyoperatinghours;
              $this->hourssincelastservice=$this->enginInfo->hourssincelastservice;

              $this->oilchangedaysago=$this->enginInfo->oilchangedaysago;
              $this->filterchangedaysago=$this->enginInfo->filterchangedaysago;
              $this->lastinspectiondays=$this->enginInfo->lastinspectiondays;
              $this->seacondition=$this->enginInfo->seacondition;
              $this->hullcondition=$this->enginInfo->hullcondition;
              $this->unusualsounds=$this->enginInfo->unusualsounds;
              $this->conditionseverity=$this->enginInfo->conditionseverity;


        
}


    protected function rules()
    {
        return [
            'boatid'                   => 'required|string',
            'boattype'                 => 'required|string',
            'enginemodel'              => 'required|string',
            'lastmaintenancetype'      => 'nullable|string',
            'maintenancereason'        => 'nullable|string',
            'engineageyears'           => 'required|numeric',
            'totalenginehours'         => 'required|numeric',
            'avgdailyoperatinghours'   => 'required|numeric',
            'dayssincelastmaintenance' => 'required|numeric',
            'hourssincelastservice'    => 'required|numeric',
            'enginetempc'              => 'required|numeric',
            'oilpressurebar'           => 'required|numeric',
            'coolantlevelpercent'      => 'required|numeric',
            'enginerpm'                => 'required|numeric',
            'fuelconsumptionlph'       => 'required|numeric',
            'vibrationlevel'           => 'required|numeric|min:1|max:5',
            'oilchangedaysago'         => 'required|numeric',
            'filterchangedaysago'      => 'required|numeric',
            'lastinspectiondays'       => 'required|numeric',
            'seacondition'             => 'required|numeric|min:1|max:5',
            'hullcondition'            => 'required|string',
            'unusualsounds'            => 'required|string',
            'conditionseverity'        => 'required|string',
        ];
    }

    public function predict()
    {
        $this->validate();

        $this->prediction   = null;
        $this->errorMessage = null;

        // ── Build payload with snake_case keys to match predict.py ────────────
        $payload = [
            'boat_id'                     => $this->boatid,
            'boat_type'                   => $this->boattype,
            'engine_model'                => $this->enginemodel,
            'last_maintenance_type'       => $this->lastmaintenancetype,
            'maintenance_reason'          => $this->maintenancereason,
            'engine_age_years'            => (float) $this->engineageyears,
            'total_engine_hours'          => (float) $this->totalenginehours,
            'avg_daily_operating_hours'   => (float) $this->avgdailyoperatinghours,
            'days_since_last_maintenance' => (float) $this->dayssincelastmaintenance,
            'hours_since_last_service'    => (float) $this->hourssincelastservice,
            'engine_temp_c'               => (float) $this->enginetempc,
            'oil_pressure_bar'            => (float) $this->oilpressurebar,
            'coolant_level_percent'       => (float) $this->coolantlevelpercent,
            'engine_rpm'                  => (float) $this->enginerpm,
            'fuel_consumption_lph'        => (float) $this->fuelconsumptionlph,
            'vibration_level'             => (float) $this->vibrationlevel,
            'oil_change_days_ago'         => (float) $this->oilchangedaysago,
            'filter_change_days_ago'      => (float) $this->filterchangedaysago,
            'last_inspection_days'        => (float) $this->lastinspectiondays,
            'sea_condition'               => (float) $this->seacondition,
            'hull_condition'              => $this->hullcondition,
            'unusual_sounds'              => $this->unusualsounds,
            'condition_severity'          => $this->conditionseverity,
            'record_date'                 => Carbon::now()->toDateString(),
        ];

        // ── Save to temp JSON file ─────────────────────────────────────────────
        Storage::disk('local')->makeDirectory('ai');
        $inputFile = Storage::put('ai/input.json', json_encode($payload));
        $inputFile = storage_path('app\private\ai\input.json');

        // ── Python paths ───────────────────────────────────────────────────────
        $python = 'C:\xampp\htdocs\bom-system\python-model\.venv\Scripts\python.exe';
        $script = 'C:\xampp\htdocs\bom-system\python-model\predict.py';

        Log::info('AI Predict Called', [
            'python' => $python,
            'script' => $script,
            'input'  => $inputFile,
        ]);

        $process = new Process([$python, $script, $inputFile]);
        $process->setTimeout(120);

        try {
            $process->run();

            if (!$process->isSuccessful()) {
                $this->errorMessage = $process->getErrorOutput() ?: $process->getOutput();
                Log::error('AI Process Failed', [
                    'error'     => $this->errorMessage,
                    'exit_code' => $process->getExitCode(),
                ]);
                return;
            }

            $output = trim($process->getOutput());
            Log::info('AI Raw Output', ['output' => $output]);

            $result = json_decode($output, true);

            if (!$result || isset($result['error'])) {
                $this->errorMessage = $result['error'] ?? 'Invalid AI response: ' . $output;
                Log::error('AI Response Error', ['response' => $output]);
                return;
            }

            $this->prediction = $result;
            Log::info('AI Prediction Success', $this->prediction);

        } catch (Exception $e) {
            $this->errorMessage = 'Process error: ' . $e->getMessage();
            Log::error('AI Exception', ['error' => $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.maintenance-predictor',[
            'dasun'=>$this->boatInfo,
        ]);
    }
}
