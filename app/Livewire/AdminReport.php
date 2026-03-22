<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Response;
use Livewire\Component;

class AdminReport extends Component
{
    public $boatsFilter, $boats, $searchApplied = false, $boatselection;
    public $search = '';
    public $fromDate, $toDate;

    public function mount()
    {
        $this->resetFilters();
        $this->loadInitialData();
    }

    public function resetFilters()
    {
        $this->boatsFilter = collect();
        $this->fromDate = null;
        $this->toDate = null;
        $this->search = '';
    }

    public function loadInitialData()
    {
        if (!$this->searchApplied) {
            $this->boatsFilter = $this->getBaseQuery()->get();
        }

        $this->boatselection = $this->getBaseQuery()->get();
    }

    // protected function getBaseQuery()
    // {
    //     return User::with([
    //         'tripcreatemodels' => function ($query) {
    //             $query->when($this->fromDate, function ($q) {
    //                 $q->whereDate('departureTime', '>=', $this->fromDate);
    //             })
    //             ->when($this->toDate, function ($q) {
    //                 $q->whereDate('departureTime', '<=', $this->toDate);
    //             })
    //             ->with([
    //                 'expense',
    //                 'catchfish',
    //                 'addmembertrip' => function ($query) {
    //                     $query->with(['tripmemberdetiles', 'user.tripMemberDetails']);
    //                 }
    //             ]);
    //         }
    //     ])->where('accountsType', 'Boat');
    // }




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
        $this->boatsFilter = $this->getBaseQuery()
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

        foreach ($this->boatsFilter as $boat) {
            foreach ($boat->tripcreatemodels as $trip) {
                $totalCost = $trip->expense->sum('amount');
                $totalFish = $trip->catchfish->sum('weight');
                $crewCount = $trip->addmembertrip->count();

                $crewNames = $trip->addmembertrip->map(function($member) {
                    $details = $member->tripmemberdetiles ?? $member->user->tripMemberDetails ?? null;
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
        return view('livewire.admin-report');
    }
}
