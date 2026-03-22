<?php

namespace App\Livewire;

use Livewire\Component;

class Trip extends Component
{
    public function render()
    {
        return view('dadmin.trip')->layout('layouts.dashbord');

    }
}
