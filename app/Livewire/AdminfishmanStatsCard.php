<?php

namespace App\Livewire;

use App\Models\Addmembertrip;
use App\Models\TripMemberDetiles;
use App\Models\User;
use Livewire\Component;

class AdminfishmanStatsCard extends Component
{

    public $activeuser;
    public $inactiveuser;

    public $varified;

    public function mount()
    {
        // $this->activeuser = Addmembertrip::whereHas('tripcreatemodel', function ($query) {
        // $query->where('status', '!=', 'completed');})->count();
    }
    public function render()
    {



        // 1. fishermaṇ la ganna
        $fishermen = User::where('accountsType', 'fisherman')->get();

        $inactiveuser = collect();

        foreach ($fishermen as $fisherman) {
            // 2. eyaṭa latest Addmembertrip record eka ganna
            $latestAddmembertrip = Addmembertrip::where('memberEmail', $fisherman->email)
                ->orderByDesc('id')
                ->with('tripcreatemodel')
                ->first();

            if ($latestAddmembertrip && $latestAddmembertrip->tripcreatemodel) {
                // 3. Trip status eka check karanna
                if ($latestAddmembertrip->tripcreatemodel->status === 'completed') {
                    $inactiveuser->push($fisherman);
                }
            }
        }
        $this->inactiveuser = $inactiveuser->count();





        $this->activeuser = Addmembertrip::whereHas('tripcreatemodel', function ($query) {
            $query->where('status', '!=', 'completed');
        })->count();

        // $this->inactiveuser = Addmembertrip::whereHas('tripcreatemodel', function ($query) {
        // $query->where('status', '=', 'completed');})->count();

        $this->varified = TripMemberDetiles::all()->count();

        return view('livewire.adminfishman-stats-card', [
            'allFishman' => User::where('accountsType', '=', 'Fisherman')->count(),
            'activeuser',
            'inactiveuser',
            'varified'
        ]);
    }
}
