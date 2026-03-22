<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tripcreatemodel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AdminDashbordcardlive extends Component

{
    public $today;
    public $trips;
    public $startDate;
    public $tripsongoing;
    public $awiting;
    public $scheduled;
    public $emergency;
    public $completed;
    public $safe;
    public $latast;

    public function render()
    {
        try {
            $this->today = now()->format('Y-m-d\TH:i');

            // Counts
            $this->trips = Tripcreatemodel::count();
            $this->tripsongoing = Tripcreatemodel::whereIn('status', ['Started', 'Ongoing'])->count();
            $this->awiting = Tripcreatemodel::where('status', 'Return')->count();
            $this->scheduled = Tripcreatemodel::where('status', 'scheduled')->count();
            $this->completed = Tripcreatemodel::where('status', 'completed')->count();
            $this->emergency = Tripcreatemodel::where('emergency', 'emergency')->count();
            $this->safe = Tripcreatemodel::where('emergency', 'Safe')->count();

            // Latest completed trips
            $this->latast = Tripcreatemodel::where('status', 'completed')
                ->latest('updated_at')
                ->take(5)
                ->get();

        } catch (\Exception $e) {
            Log::error('Dashboard data loading failed: ' . $e->getMessage());

            // Optional: Reset values to prevent UI breaking
            $this->trips = 0;
            $this->tripsongoing = 0;
            $this->awiting = 0;
            $this->scheduled = 0;
            $this->completed = 0;
            $this->emergency = 0;
            $this->safe = 0;
            $this->latast = collect(); // empty collection
        }

        return view('livewire.admin-dashbordcardlive', [
            'trips' => $this->trips,
            'tripsongoing' => $this->tripsongoing,
            'awiting' => $this->awiting,
            'scheduled' => $this->scheduled,
            'emergency' => $this->emergency,
            'safe' => $this->safe,
            'completed' => $this->completed,
            'latast' => $this->latast,
        ]);
    }
}
