<?php

namespace App\Livewire;

use App\Models\Tripcreatemodel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class FishermanTrip extends Component
{

public $currentTrip,$donetrips;public $email;

    /**
     * Mount lifecycle
     */
    public function mount()
    {
        try {
            $this->email = Auth::user()->email ?? null;

            if (! $this->email) {
                session()->flash('error', 'Boat user not authenticated.');
                return;
            }

            $this->loadTripsAndExpenses();
        } catch (\Throwable $e) {
            Log::error('Expenses::mount error', ['error' => $e]);
            session()->flash('error', 'Error loading boat expenses.');
        }
    }



    public function render()

    {
        $this->currentTrip = Tripcreatemodel:: whereHas('addmembertrip', function ($query) {
            $query->where('memberEmail', $this->email);
        })->where('status','!=','completed')->get();


$this->donetrips = Tripcreatemodel:: whereHas('addmembertrip', function ($query) {
            $query->where('memberEmail', $this->email);
        })->where('status','=','completed')->get();

    return view('livewire.fisherman-trip'
    ,
    ['currentTrip'=>$this->currentTrip,'donetrips'=>$this->donetrips]
);
    }
}
