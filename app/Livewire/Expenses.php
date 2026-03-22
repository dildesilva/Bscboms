<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Tripcreatemodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Expenses extends Component
{
    public $eachtrip = [];
    public $oldtrip = [];
    public $expense = [];
    public $email;

    /**
     * Mount lifecycle
     */
    public function mount()
    {
        try {
            $this->email = Auth::user()->email ?? null;

            if (! $this->email) {
                session()->flash('error', 'Boat user not authenticated.');
                return;
            }

            $this->loadTripsAndExpenses();
        } catch (\Throwable $e) {
            Log::error('Expenses::mount error', ['error' => $e]);
            session()->flash('error', 'Error loading boat expenses.');
        }
    }

    /**
     * Load trips and expenses
     */
    protected function loadTripsAndExpenses()
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

            $this->expense = Expense::all();
        } catch (\Throwable $e) {
            Log::error('Expenses::loadTripsAndExpenses failed', ['error' => $e]);
            $this->eachtrip = collect();
            $this->oldtrip  = collect();
            $this->expense  = collect();
        }
    }

    /**
     * Render view
     */
    public function render()
    {
        return view('dboat.expenses', [
            'eachtrip' => $this->eachtrip,
            'oldtrip'  => $this->oldtrip,
            'expense'  => $this->expense,
        ])->layout('layouts.dashbord');
    }
}
