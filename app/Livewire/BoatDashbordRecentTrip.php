<?php

namespace App\Livewire;

use App\Models\Boat;
use App\Models\Expense;
use App\Models\Tripcreatemodel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BoatDashbordRecentTrip extends Component
{
    public $boatEmail;
    public $boatName;

    public function mount()
    {
        $user = Auth::user();
        $this->boatEmail = $user->email;
        $this->boatName = $user->name;
    }

    public function render()
    {
        $currentTrip = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->where('status', '!=', 'completed')
            ->first();

        $completedTrips = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->where('status', 'completed')
            ->count();

        $emergencyTrips = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->where('emergency', 'Emergency')
            ->count();

        $ongoingTripExpenses = $currentTrip
            ? Expense::where('tripID', $currentTrip->id)
                ->whereHas('tripcreatemodel', function ($query) {
                    $query->where('boaTemail', $this->boatEmail);
                })
                ->sum('amount')
            : 0;

        $boat = Boat::where('boatId', $this->boatEmail)->first();

        $recentTrips = Tripcreatemodel::with([
                'expense',
                'catchfish',
                'addmembertrip.tripmemberdetiles'
            ])
            ->where('boaTemail', $this->boatEmail)
            ->latest('departureTime')
            ->take(5)
            ->get();

        return view('livewire.boat-dashbord-recent-trip', [
            'tripCrunnt' => $currentTrip,
            'completedAll' => $completedTrips,
            'emergencytrip' => $emergencyTrips,
            'ongoingtripEx' => $ongoingTripExpenses,
            'boat' => $boat,
            'trips' => $recentTrips,
        ]);
    }
}
