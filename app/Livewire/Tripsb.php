<?php

namespace App\Livewire;

use App\Models\Tripcreatemodel;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Tripsb extends Component
{
    public $create,$trip,$email;
public function mount(){

    $this->email = Auth::user()->email;

    $this->trip = Tripcreatemodel::where('boaTemail', $this->email)->get();

    // Determine if all trips are completed
    $this->create = $this->trip->every(function ($t) {
        return $t->status === 'completed';
    });
}

    public function render()
    {


        return view('dboat.tripsb')->layout('layouts.dashbord');

    }
}
