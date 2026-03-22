<?php

namespace App\Livewire;

use App\Models\Boat;
use App\Models\boatRecodeUpdate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Registerboat extends Component
{
    public $boatName;
    public $boatId;
    public $registrationNumber;
    public $hullId;
    public $year;
    public $length;
    public $maxCrew;
    public $boattype;       
    public $enginemodel; 
    public $engineType;
    public $enginePower;
    public $fishingMethod;
    public $engineageyears;
    public $totalenginehours;
    public $avgdailyoperatinghours;
    public $dayssincelastmaintenance;
    public $hourssincelastservice;
    public $enginetempc;
    public $oilpressurebar;
    public $coolantlevelpercent;
    public $enginerpm;
    public $fuelconsumptionlph;
    public $vibrationlevel;
    public $oilchangedaysago;
    public $filterchangedaysago;
    public $lastinspectiondays;
    public $seacondition;
    
    public $hullcondition    = 'Good';
    public $unusualsounds    = 'No';
    public $conditionseverity = 'Normal';

    public function mount()
    {
        $this->boatName = Auth::user()->name;
        $this->boatId   = Auth::user()->email;
    }

    protected function rules()
    {
        return [
            // Boat Info
            'boatName'               => 'required|string|max:255',
            'boatId'                 => 'required|string|max:255',
            'registrationNumber'     => 'required|string|max:255|unique:boats,registrationNumber',
            'hullId'                 => 'required|string|max:255|unique:boats,hullId',
            'year'                   => 'required|integer|min:1900|max:' . now()->year,
            'length'                 => 'required|numeric|min:1',
            'maxCrew'                => 'required|integer|min:1',
            'boattype'               => 'required|string|max:255',
            'enginemodel'            => 'required|string|max:255',
            'engineType'             => 'required|string|max:255',
            'enginePower'            => 'required|numeric|min:1',

            // Engine Data
            'engineageyears'         => 'nullable|numeric|min:0',
            'totalenginehours'       => 'nullable|numeric|min:0',
            'avgdailyoperatinghours' => 'nullable|numeric|min:0',
            'dayssincelastmaintenance' => 'nullable|integer|min:0',
            'hourssincelastservice'  => 'nullable|numeric|min:0',
            'enginetempc'            => 'nullable|numeric',
            'oilpressurebar'         => 'nullable|numeric|min:0',
            'coolantlevelpercent'    => 'nullable|numeric|min:0|max:100',
            'enginerpm'              => 'nullable|integer|min:0',
            'fuelconsumptionlph'     => 'nullable|numeric|min:0',
            'vibrationlevel'         => 'nullable|integer|min:1|max:5',
            'oilchangedaysago'       => 'nullable|integer|min:0',
            'filterchangedaysago'    => 'nullable|integer|min:0',
            'lastinspectiondays'     => 'nullable|integer|min:0',
            'seacondition'           => 'nullable|integer|min:1|max:5',

            // Condition
            'hullcondition'          => 'nullable|string',
            'unusualsounds'          => 'nullable|string',
            'conditionseverity'      => 'nullable|string',
        ];
    }

    public function save()
    {
        $this->validate();

        Boat::create([
            // Boat Info
            'boatName'               => $this->boatName,
            'boatId'                 => $this->boatId,
            'registrationNumber'     => $this->registrationNumber,
            'hullId'                 => $this->hullId,
            'year'                   => $this->year,
            'length'                 => $this->length,
            'maxCrew'                => $this->maxCrew,
            'boattype'               => $this->boattype,
            'enginemodel'            => $this->enginemodel,
            'engineType'             => $this->engineType,
            'enginePower'            => $this->enginePower,
            'fishingMethod'          => $this->fishingMethod,

        ]);


boatRecodeUpdate::create([
     // Engine Data
            'boatId'                => $this->boatId,
            'engineageyears'         => $this->engineageyears,
            'totalenginehours'       => $this->totalenginehours,
            'avgdailyoperatinghours' => $this->avgdailyoperatinghours,
            'dayssincelastmaintenance' => $this->dayssincelastmaintenance,
            'hourssincelastservice'  => $this->hourssincelastservice,
            'enginetempc'            => $this->enginetempc,
            'oilpressurebar'         => $this->oilpressurebar,
            'coolantlevelpercent'    => $this->coolantlevelpercent,
            'enginerpm'              => $this->enginerpm,
            'fuelconsumptionlph'     => $this->fuelconsumptionlph,
            'vibrationlevel'         => $this->vibrationlevel,
            'oilchangedaysago'       => $this->oilchangedaysago,
            'filterchangedaysago'    => $this->filterchangedaysago,
            'lastinspectiondays'     => $this->lastinspectiondays,
            'seacondition'           => $this->seacondition,

            // Condition
            'hullcondition'          => $this->hullcondition,
            'unusualsounds'          => $this->unusualsounds,
            'conditionseverity'      => $this->conditionseverity,
]);



        session()->flash('success', 'Boat registered successfully!');
        $this->reset(); // clears all fields after save
        $this->boatName = Auth::user()->name;
        $this->boatId   = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.registerboat');
    }
}