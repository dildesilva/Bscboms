<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminBoats extends Component
{
    public $avlBoat;
    public $activeTab = 'active';


    public function render()
    {
        $this->avlBoat=User::with('Boat')->where('accountsType','Boat')->get();


        return view('dadmin.boats')->layout(
            'layouts.dashbord'
        );
    }
}
