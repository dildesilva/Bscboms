<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Usermgt extends Component
{

    public function render()
    {
        return view('dadmin.usermgt')->layout('layouts.dashbord');
    }
}
