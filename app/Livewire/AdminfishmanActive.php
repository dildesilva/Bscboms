<?php

namespace App\Livewire;

use App\Models\Addmembertrip;
use Livewire\Component;

class AdminfishmanActive extends Component
{public $activeuser;
    public function render()
    {
        $this->activeuser = Addmembertrip::whereHas('tripcreatemodel', function ($query) {
    $query->where('status', '!=', 'completed');
})
->with('tripmemberdetiles')
->with('user')
->get();

return view('livewire.adminfishman-active', ['activeuser' => $this->activeuser]);

    }
}
