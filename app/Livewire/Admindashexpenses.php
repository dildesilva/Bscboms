<?php

namespace App\Livewire;

use Livewire\Component;

class Admindashexpenses extends Component
{
    public function render()
    {
        // return view('livewire.admindashexpenses');
        return view('dadmin.admindashexpenses')->layout('layouts.dashbord');
        // return view('dadmin.dashboard')->layout('layouts.dashbord');

    }
}
