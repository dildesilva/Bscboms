<?php

namespace App\Livewire;

use Livewire\Component;

class Admindashbord extends Component
{
    public function render()
    {
        return view('dadmin.dashboard')->layout('layouts.dashbord');
    }
}
