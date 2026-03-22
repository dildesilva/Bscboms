<?php

namespace App\Livewire;

use Livewire\Component;

class Revenue extends Component
{
    public function render()
    {
        return view('dboat.revenue')->layout('layouts.dashbord');
    }
}
