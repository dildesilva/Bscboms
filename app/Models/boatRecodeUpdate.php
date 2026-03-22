<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class boatRecodeUpdate extends Model
{
    protected $fillable = [
            'boatId',
            
    // ── Engine Data
    'engineageyears',
    'totalenginehours',
    'avgdailyoperatinghours',
    'dayssincelastmaintenance',
    'hourssincelastservice',
    'enginetempc',
    'oilpressurebar',
    'coolantlevelpercent',
    'enginerpm',
    'fuelconsumptionlph',
    'vibrationlevel',
    'oilchangedaysago',
    'filterchangedaysago',
    'lastinspectiondays',
    'seacondition',

    // ── Condition
    'hullcondition',
    'unusualsounds',
    'conditionseverity',
    ];



     public function user()
    {
        return $this->belongsTo(User::class, 'boatId', 'email');
    }
}
