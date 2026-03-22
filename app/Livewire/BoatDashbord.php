<?php

namespace App\Livewire;

use App\Models\Boat;
use App\Models\Expense;
use App\Models\Tripcreatemodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Livewire\Component;

class BoatDashbord extends Component
{
    public $boatEmail;
    public $boatName;
    public $completedTrips;
    public $emergencyTrips;
    public $ongoingTripExpenses;
    public $currentTrip;
    public $boat;
    public $recentTrips;

    public $filteredBoats;
    public $boatSelection;
    public $searchApplied = false;
    public $search = '';
    public $fromDate;
    public $toDate;

    public function mount()
    {
        $user = Auth::user();
        $this->boatEmail = $user->email;
        $this->boatName = $user->name;

        $this->resetFilters();
        $this->loadInitialData();
    }

    public function resetFilters()
    {
        $this->filteredBoats = collect();
        $this->fromDate = null;
        $this->toDate = null;
        $this->search = '';
    }

    public function loadInitialData()
    {
        if (!$this->searchApplied) {
            $this->filteredBoats = $this->getBaseQuery()->get();
        }
        $this->boatSelection = $this->getBaseQuery()->get();
    }

    protected function getBaseQuery()
    {
        return User::with([
            'tripcreatemodels' => function ($query) {
                $query->when($this->fromDate, fn($q) => $q->whereDate('departureTime', '>=', $this->fromDate))
                      ->when($this->toDate, fn($q) => $q->whereDate('departureTime', '<=', $this->toDate))
                      ->with([
                          'expense',
                          'catchfish',
                          'addmembertrip.tripmemberdetiles',
                      ]);
            }
        ])->where('accountsType', 'Boat');
    }

    public function applySearch()
    {
        $this->filteredBoats = $this->getBaseQuery()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->get();

        $this->searchApplied = true;
    }

    public function downloadReport()
    {
        $csv = "Boat Name,Trip ID,Start Date,End Date,Total Cost,Total Fish (KG),Crew Count,Crew Members\n";

        foreach ($this->filteredBoats as $boat) {
            foreach ($boat->tripcreatemodels as $trip) {
                $totalCost = $trip->expense->sum('amount');
                $totalFish = $trip->catchfish->sum('weight');
                $crewCount = $trip->addmembertrip->count();

                $crewNames = $trip->addmembertrip->map(function($member) {
                    $details = $member->tripmemberdetiles ?? null;
                    return $details ? $details->name : $member->memberEmail;
                })->implode(', ');

                $csv .= sprintf(
                    "%s,%s,%s,%s,%.2f,%.2f,%d,\"%s\"\n",
                    $boat->name,
                    $trip->id,
                    $trip->departureTime,
                    $trip->updated_at,
                    $totalCost,
                    $totalFish,
                    $crewCount,
                    $crewNames
                );
            }
        }

        $filename = 'trip_report_' . now()->format('Ymd_His') . '.csv';

        return Response::streamDownload(function () use ($csv) {
            echo $csv;
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function render()
    {
        $this->currentTrip = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->where('status', '!=', 'completed')
            ->first();

        $this->completedTrips = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->where('status', 'completed')
            ->count();

        $this->emergencyTrips = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->where('emergency', 'Emergency')
            ->count();

        $this->ongoingTripExpenses = $this->currentTrip
            ? Expense::where('tripID', $this->currentTrip->id)
                ->whereHas('tripcreatemodel', function ($query) {
                    $query->where('boaTemail', $this->boatEmail);
                })
                ->sum('amount')
            : 0;

        $this->boat = Boat::where('boatId', $this->boatEmail)->first();

        $this->recentTrips = Tripcreatemodel::where('boaTemail', $this->boatEmail)
            ->latest('departureTime')
            ->take(5)
            ->get();

        return view('livewire.boat-dashbord', [
            'tripCrunnt' => $this->currentTrip,
            'completedAll' => $this->completedTrips,
            'emergencytrip' => $this->emergencyTrips,
            'ongoingtripEx' => $this->ongoingTripExpenses,
            'boat' => $this->boat,
            'trips' => $this->recentTrips,
            'boatsFilter' => $this->filteredBoats,
        ]);
    }
}
