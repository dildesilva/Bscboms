<?php

namespace App\Livewire;

use Livewire\Component;

class AdminfishmanLive extends Component
{
    public $activeTab = 'dashboard';  // default tab

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.adminfishman-live', [
            'activeTab' => $this->activeTab,  // pass to view
        ]);
    }
}
