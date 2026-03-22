<?php

namespace App\Livewire;

use App\Models\Tripcreatemodel;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class AdminTripManagment extends Component
{
    public $today, $trips, $startDate, $tripsongoing, $awiting, $scheduled, $emergency, $completed, $Tripcreatemodel;
    public $activeTab = 'active';

    public function render()
    {
        try {
            $this->today = now()->format('Y-m-d\TH:i');

            // Load and map all trips
            $this->trips = Tripcreatemodel::all()->map(function ($trip) {
                $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
                return $trip;
            });

            // Categorized lists
            $this->tripsongoing = Tripcreatemodel::whereIn('status', ['Started', 'Ongoing'])->get()->map(function ($trip) {
                $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
                return $trip;
            });

            $this->awiting = Tripcreatemodel::whereIn('status', ['Return'])->get()->map(function ($trip) {
                $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
                return $trip;
            });

            $this->scheduled = Tripcreatemodel::whereIn('status', ['scheduled'])->get()->map(function ($trip) {
                $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
                return $trip;
            });

            $this->completed = Tripcreatemodel::whereIn('status', ['completed'])->get()->map(function ($trip) {
                $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
                return $trip;
            });

            $this->emergency = Tripcreatemodel::whereIn('emergency', ['emergency'])->get()->map(function ($trip) {
                $trip->duringDays = (int) Carbon::parse($trip->departureTime)->diffInDays(now());
                return $trip;
            });

            $this->Tripcreatemodel = Tripcreatemodel::all();

        } catch (\Exception $e) {
            Log::error('AdminTripManagment Error: ' . $e->getMessage());
            session()->flash('error', 'Trip data loading failed.');
        }

        return view('livewire.admin-trip-managment', [
            'trips' => $this->trips,
            'tripsongoing' => $this->tripsongoing,
            'awiting' => $this->awiting,
            'scheduled' => $this->scheduled,
            'emergency' => $this->emergency,
            'completed' => $this->completed,
        ]);
    }
}
