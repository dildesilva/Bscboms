<?php
namespace App\Livewire;

use App\Models\Expense;
use Livewire\Component;
use Carbon\Carbon;

class AddExpense extends Component
{
    public $date_time, $description, $quantity, $unit, $amount;
    public $tripId;

    public function mount($tripId)
    {
        $this->date_time = now()->format('Y-m-d\TH:i');  // Reset the date field to current time

        $this->tripId = $tripId;  // Ensure the tripId is correctly set here
    }

    protected $rules = [
        // 'date_time' => 'required|date',
        'description' => 'required|string',
        'quantity' => 'required|numeric|min:1',
        'unit' => 'required|string',
        'amount' => 'required|numeric|min:0',
        //   'manualDescription' => $this->description === 'Other' ? 'required|string|max:255' : 'nullable',
    ];

    public function saveExpense()
    {
        $this->validate();
        $this->date_time = now()->format('Y-m-d\TH:i');
        // Ensure tripId is not null before proceeding
        if (!$this->tripId) {
            session()->flash('error', 'Trip ID is required.');
            return;
        }

        // Save the expense to the database
        Expense::create([
            'tripID' => $this->tripId,
            'date_time' => Carbon::parse($this->date_time),
            'description' => $this->description,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'amount' => $this->amount,
        ]);

        session()->flash('message', 'Expense added successfully.');
        $this->resetForm();  // Reset only the form fields, not the tripId
    }

    public function resetForm()
    {
        // Reset only the form fields
        $this->reset([ 'description', 'quantity', 'unit', 'amount']);
        $this->date_time = now()->format('Y-m-d\TH:i');  // Reset the date field to current time
    }

    public function render()
    {
        return view('livewire.add-expense');
    }
}
