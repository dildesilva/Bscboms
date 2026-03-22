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

class AiUiAplication extends Component
{

// Boat info

// Boat info 
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

// Condition
public $hullcondition;
public $unusualsounds;
public $conditionseverity;

// Output
public $prediction   = null;
public $errorMessage = null;

      public $boatLink ; 
      public $boatInfo ; 
      public $enginInfo ; 
      public $enginePower ; 

 
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

public function updateData()
{
    boatRecodeUpdate::where('boatId', $this->boatid)->update([
        'engineageyears'           => $this->engineageyears,
        'totalenginehours'         => $this->totalenginehours,
        'avgdailyoperatinghours'   => $this->avgdailyoperatinghours,
        'dayssincelastmaintenance' => $this->dayssincelastmaintenance,
        'hourssincelastservice'    => $this->hourssincelastservice,
        'enginetempc'              => $this->enginetempc,
        'oilpressurebar'           => $this->oilpressurebar,
        'coolantlevelpercent'      => $this->coolantlevelpercent,
        'enginerpm'                => $this->enginerpm,
        'fuelconsumptionlph'       => $this->fuelconsumptionlph,
        'vibrationlevel'           => $this->vibrationlevel,
        'oilchangedaysago'         => $this->oilchangedaysago,
        'filterchangedaysago'      => $this->filterchangedaysago,
        'lastinspectiondays'       => $this->lastinspectiondays,
        'seacondition'             => $this->seacondition,
        'hullcondition'            => $this->hullcondition,
        'unusualsounds'            => $this->unusualsounds,
        'conditionseverity'        => $this->conditionseverity,
    ]);

     session()->flash('success', 'Updated successfully!');
}
    public function render()
    {
        return view('livewire.ai-ui-aplication');
    }
}
