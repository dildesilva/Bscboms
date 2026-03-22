<?php

namespace App\Livewire;

use App\Models\TripMemberDetiles;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FishermanData extends Component
{


public $user;
public $userBio,$team;
public function mount(){

    $this->user=Auth::user()->email;
// $this->userBio=TripMemberDetiles::where('userEmailId','=',$this->user)->get();
$this->userBio = TripMemberDetiles::with('user')->where('userEmailId', $this->user)->first();
$this->team = TripMemberDetiles::all();

}
    public function render()
    {
        return view('livewire.fisherman-data');
    }
}
