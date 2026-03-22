<?php

namespace App\Livewire;

use App\Models\Boat;
use App\Models\Tripcreatemodel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminBoatFetch extends Component
{
    public $allBoat, $boats,$awiting,$profilePath;
    public $activeTab = 'active';
    public $search = ''; // Search input
    public $searchApplied = false; // To track if filter is applied

    public function mount()
    {
        $this->boats = Boat::all();
        $this->profilePath = Auth::user()->accountDP;
    }

    public function updateBoat($boatId, $field, $value)
    {
        $boat = Boat::find($boatId);
        if ($boat) {
            $boat->$field = $value;
            $boat->save();
            session()->flash('success', 'Boat updated successfully!');
        }
    }

    public function applySearch()
    {//% % - wildcard  and like use chak the patten
        $this->boats = Boat::where('boatName', 'like', '%' . $this->search . '%')
            ->orWhere('registrationNumber', 'like', '%' . $this->search . '%')
            ->orWhere('hullId', 'like', '%' . $this->search . '%')
            ->orWhere('year', 'like', '%' . $this->search . '%')
            ->orWhere('length', 'like', '%' . $this->search . '%')
            ->orWhere('engineType', 'like', '%' . $this->search . '%')
            ->orWhere('enginePower', 'like', '%' . $this->search . '%')
            ->orWhere('fishingMethod', 'like', '%' . $this->search . '%')
            ->orWhere('maxCrew', 'like', '%' . $this->search . '%')
            ->get();
        $this->searchApplied = true;
    }

    public function render()
    {
        if (!$this->searchApplied) {
            $this->boats = Boat::all(); // Show all boats if search not applied
        }
        $this->allBoat = User::with('Boat')->where('accountsType', 'Boat')->get();
        $this->awiting= Tripcreatemodel::whereIn('status', ['Return'])->get()->map(function ($trip) {
            $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
            return $trip;
        });
        return view('livewire.admin-boat-fetch', [
            'allBoat' => $this->allBoat,
            'boats' => $this->boats,
            'awiting' => $this->awiting,
            'profilePath' => $this->profilePath
        ]);
    }
}
