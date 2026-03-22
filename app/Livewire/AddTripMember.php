<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tripcreatemodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddTripMember extends Component
{
    /* ----------------------------------------------------------------
     | Public properties
     * -------------------------------------------------------------- */
    public $eachtrip;   // active or upcoming trips
    public $oldtrip;    // completed trips
    public $email;      // boat account e-mail

    /* ----------------------------------------------------------------
     | Lifecycle: mount
     * -------------------------------------------------------------- */
    public function mount()
    {
        try {
            $this->email = Auth::user()->email ?? null;

            if (! $this->email) {
                session()->flash('error', 'The boat account could not be located.');
                return;
            }

            $this->loadTrips();
        } catch (\Throwable $e) {
            session()->flash('error', 'Component initialisation failed.');
            Log::error('AddTripMember mount failure', ['exception' => $e]);
        }
    }

    /* ----------------------------------------------------------------
     | Helper: load both active and completed trips
     * -------------------------------------------------------------- */
    protected function loadTrips(): void
    {
        try {
            /* active or upcoming trips */
            $this->eachtrip = Tripcreatemodel::where('boatEmail', $this->email)
                ->whereIn('status', ['Scheduled', 'Started'])
                ->latest()
                ->get();

            /* completed trips */
            $this->oldtrip = Tripcreatemodel::where('boatEmail', $this->email)
                ->where('status', 'completed')
                ->latest()
                ->get();
        } catch (\Throwable $e) {
            Log::error('AddTripMember loadTrips failure', ['exception' => $e]);
            session()->flash('error', 'Trips could not be loaded at this time.');
            $this->eachtrip = collect();
            $this->oldtrip  = collect();
        }
    }

    /* ----------------------------------------------------------------
     | Render
     * -------------------------------------------------------------- */
    public function render()
    {
        return view('dboat.add-trip-member', [
            'eachtrip' => $this->eachtrip,
            'oldtrip'  => $this->oldtrip,
        ])->layout('layouts.dashbord');
    }
}
