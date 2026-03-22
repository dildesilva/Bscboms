<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Tripcreatemodel;
use Livewire\Component;
use Carbon\Carbon;
class ExpensefetchOldtrip extends Component
{


    public $eachtrip, $expense;
    public $tripId;

    public $totalAmount;

    public function mount($tripId)
    {
        $this->tripId = $tripId;
        $this->expense = Expense::all();


    }


public function deleteExpense($expenseId)
{
    $expense = Expense::find($expenseId);

    if ($expense) {
        $expense->delete();

        // Flash message after deletion
        session()->flash('message', 'Expense deleted successfully.');
    }

    // Re-fetch expenses after deletion
    $this->expense = Expense::all();
}

// Refresh the expenses list every 3 seconds to ensure it's up-to-date
public function refreshExpenses()
{
    $this->expense = Expense::all();
}


    public function render()
    {
        // $this->eachtrip = Tripcreatemodel::all();
        // $this->eachtrip = Tripcreatemodel::where('status', '!=','completed')->get();

        $this->expense = Expense::where('tripID', '=',$this->tripId)->get();
        $this->totalAmount = Expense::where('tripID', '=',$this->tripId)->sum('amount');

        return view('livewire.expensefetch-oldtrip',
         [
            // 'eachtrip' => $this->eachtrip,
            'expense' => $this->expense,
            'totalAmount' => $this->totalAmount,
        ]
    );
    }
}



