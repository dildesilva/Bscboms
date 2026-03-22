<?php

namespace App\Livewire;

use Livewire\Component;

class Adminfishman extends Component
{
    public function render()
    {
        return view('dadmin.adminfishman')->layout('layouts.dashbord');
    }
}
