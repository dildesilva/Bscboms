<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Tripcreatemodel;
use Livewire\Component;

class AdminExpenses extends Component
{public $tripId;
    // public $totalAmount;
    public $activeTab = 'active';
    public $activetrip,$donetrip,$sheduletrip,$totalAmount,$schedule;

    public function changeTab($tab)
{
    $this->activeTab = $tab;
    $this->refresh(); // this is your existing method
}
    public function mount()
    {
        $this->activetrip = Tripcreatemodel::with('expense')
        ->whereNotIn('status', ['completed', 'scheduled'])
        ->get()
            ->map(
                function ($trip) {
                $trip->totalAmount = $trip->expense->sum('amount');
                return $trip;
            });

        $this->donetrip = Tripcreatemodel::with('expense')->where('status', '=', 'completed')->get()
            ->map(
                function ($trip) {
                $trip->totalAmount = $trip->expense->sum('amount');
                return $trip;
            });
        $this->schedule = Tripcreatemodel::with('expense')->where('status', '=', 'scheduled')->get()
            ->map(
                function ($trip) {
                $trip->totalAmount = $trip->expense->sum('amount');
                return $trip;
            });
    }


    public function refresh()
    {
        $this->activetrip = Tripcreatemodel::with('expense')
        ->whereNotIn('status', ['completed', 'scheduled'])
        ->get()
            ->map(
                function ($trip) {
                $trip->totalAmount = $trip->expense->sum('amount');
                return $trip;
            });

        $this->donetrip = Tripcreatemodel::with('expense')->where('status', '=', 'completed')->get()
            ->map(
                function ($trip) {
                $trip->totalAmount = $trip->expense->sum('amount');
                return $trip;
            });
        $this->schedule = Tripcreatemodel::with('expense')->where('status', '=', 'scheduled')->get()
            ->map(
                function ($trip) {
                $trip->totalAmount = $trip->expense->sum('amount');
                return $trip;
            });
    }

    public function render()
    {
        return view('livewire.admin-expenses');
    }
}
