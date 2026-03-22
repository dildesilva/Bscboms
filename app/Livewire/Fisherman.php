<?php

namespace App\Livewire;
use App\Models\TripMemberDetiles;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Fisherman extends Component
{
public $verifiedDone;
        public $activeTab = 'dashboard';
         public $verfed, $userChack;

    public function mount()
    {
        $this->userChack = Auth::user()->email;

        // Retrieve the first boatId matching the email (or null if not found)
        $this->verfed = TripMemberDetiles::where('userEmailId', $this->userChack)->pluck('userEmailId')->first();

        // Check if the boatId matches the email to set the verifiedDone state
        $this->verifiedDone = ($this->verfed === $this->userChack);
    }
    public function changeTab($tab)
{
    $this->activeTab = $tab;
    // $this->refresh(); // this is your existing method
}

    public function render()
    {
        return view('livewire.fisherman',['verifiedDone' => $this->verifiedDone]);
    }
}
