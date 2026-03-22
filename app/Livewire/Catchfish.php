<?php

namespace App\Livewire;

use App\Models\Tripcreatemodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Catchfish extends Component
{
    public $email;
    public $eachtrip = [];
    public $oldtrip = [];
    public $latest;

    /**
     * Lifecycle: mount
     */
    public function mount()
    {
        try {
            $this->email = Auth::user()->email ?? null;

            if (! $this->email) {
                session()->flash('error', 'Boat user not authenticated.');
                return;
            }

            $this->loadTripData();
        } catch (\Throwable $e) {
            Log::error('Catchfish::mount error', ['error' => $e]);
            session()->flash('error', 'Error initializing catch data.');
        }
    }

    /**
     * Load trip data
     */
    protected function loadTripData()
    {
        try {
            $this->eachtrip = Tripcreatemodel::where('boatEmail', $this->email)
                ->where('status', '!=', 'completed')
                ->latest()
                ->get();

            $this->oldtrip = Tripcreatemodel::where('boatEmail', $this->email)
                ->where('status', 'completed')
                ->latest()
                ->get();

            $this->latest = Tripcreatemodel::where('boatEmail', $this->email)
                ->where('status', 'completed')
                ->latest()
                ->first();
        } catch (\Throwable $e) {
            Log::error('Catchfish::loadTripData failed', ['error' => $e]);
            session()->flash('error', 'Failed to load trip data.');
            $this->eachtrip = collect();
            $this->oldtrip = collect();
            $this->latest = null;
        }
    }

    /**
     * Render view
     */
    public function render()
    {
        return view('dboat.catchfish', [
            'eachtrip' => $this->eachtrip,
            'oldtrip'  => $this->oldtrip,
            'latest'   => $this->latest,
        ])->layout('layouts.dashbord');
    }
}
