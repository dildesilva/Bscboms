<?php

namespace App\Livewire;

use Livewire\Component;

class Report extends Component
{
    public function render()
    {
        return view('dadmin.report')->layout('layouts.dashbord');

    }
}
