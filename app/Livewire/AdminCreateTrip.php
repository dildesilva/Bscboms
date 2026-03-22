<?php

namespace App\Livewire;

use Livewire\Component;

class AdminCreateTrip extends Component
{
    public function render()
    {
        // return view('livewire.admin-create-trip');
          return view('dadmin.admin-create-trip')->layout('layouts.dashbord');
    }
}

