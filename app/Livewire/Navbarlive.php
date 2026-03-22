<?php

namespace App\Livewire;

use App\Models\Boat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbarlive extends Component
{
    public $verifiedBoat, $boatchack;
    public $verifiedDone;

    public function mount()
    {
        $this->boatchack = Auth::user()->email;

        // Retrieve the first boatId matching the email (or null if not found)
        $this->verifiedBoat = Boat::where('boatId', $this->boatchack)->pluck('boatId')->first();

        // Check if the boatId matches the email to set the verifiedDone state
        $this->verifiedDone = ($this->verifiedBoat === $this->boatchack);
    }

    public function render()
    {
        return view('livewire.navbarlive', ['verifiedDone' => $this->verifiedDone]);
    }
}
