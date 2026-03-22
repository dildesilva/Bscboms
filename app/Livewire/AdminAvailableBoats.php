<?php

namespace App\Livewire;

use App\Models\Tripcreatemodel;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
class AdminAvailableBoats extends Component
{

    public $today,$unavailableBoats,$Tripcreatemodel;


    // public function render()
    // {
    //     return view('livewire.admin-available-boats');
    // }
    public function render()
    {
        $this->today=now()->format('Y-m-d\TH:i');
        // $this->trips=Tripcreatemodel::all();->duringDays=Tripcreatemodel::where('departureTime','-', Carbon::today())->get();

        // $this->unavailableBoats= Tripcreatemodel::whereIn('status', ['Started','Ongoing','Return','scheduled','emergency'])->get()->map(function ($trip) {
        //     $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
        //     return $trip;
        // });

        $this->unavailableBoats=User::with('Boat')->where('accountsType','Boat')->get();
        // $this->Tripcreatemodel = Tripcreatemodel::all();


        return view('livewire.admin-available-boats',[

            'unavailableBoats'=>$this->unavailableBoats
    ]);
    }
}
