<?php

namespace App\Livewire;

use App\Models\Addmembertrip;
use App\Models\TripMemberDetiles;
use App\Models\User;
use Livewire\Component;

class AdminfishmanFishermanTabale extends Component
{

    public $activeuser;
    public function render()
    {

        //  $this->activeuser = Addmembertrip::whereHas('tripcreatemodel', function ($query) {
        // $query->where('status', '!=', 'completed');})->get();
         $this->activeuser=TripMemberDetiles::with('user')->get();
        return view('livewire.adminfishman-fisherman-tabale',['activeuser'=>$this->activeuser]);
    }
}
