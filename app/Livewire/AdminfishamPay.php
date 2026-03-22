<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\TripMemberDetiles;
use App\Models\FishermanSalary;
use Illuminate\Support\Str;

class AdminfishamPay extends Component
{
    public $fishermen = [];
    public $selectedFisherman = null;
    public $salaryAmount;
    public $paymentDate;
    public $month;
    public $bonus;
    public $referenceCode;
    public $notes;

    // Modal control properties
    public $showHistoryModal = false;
    public $showPaymentModal = false;
    public $showSlipModal = false;

    public $salaryHistory = [];
    public $slipDetails = [];

    protected $rules = [
    'salaryAmount' => 'required|numeric|min:0',
    'bonus' => 'nullable|numeric|min:0',
    'paymentDate' => 'required|date|before_or_equal:today',
'referenceCode' => 'required|string|max:50|unique:fisherman_salaries,slip_code',

    'month' => 'required|string',
];


    public function mount()
    {
        $this->loadFishermen();
    }

    public function loadFishermen()
    {
        $users = User::where('accountsType', 'fisherman')
            ->with('tripMemberDetiles')
            ->get();

        $this->fishermen = $users->map(function($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'emp_no' => $user->tripMemberDetiles->employer_number ?? 'N/A',
                'rank' => $user->tripMemberDetiles->rank ?? 'N/A',
            ];
        })->toArray();
    }

    public function openPaymentModal($email)
    {
        $this->selectedFisherman = $email;
        $this->reset(['salaryAmount', 'paymentDate', 'notes','month','referenceCode','bonus']);
        $this->showPaymentModal = true;
    }

    public function openHistoryModal($email)
    {
        $this->selectedFisherman = $email;
        $this->salaryHistory = FishermanSalary::where('user_email', $email)
            ->orderBy('payment_date', 'desc')
            ->get()
            ->toArray();
        $this->showHistoryModal = true;
    }

    public function generatePaymentSlip()
    {
        $this->validate();

        $this->slipDetails = [
            'name' => $this->fishermen[array_search($this->selectedFisherman, array_column($this->fishermen, 'email'))]['name'],
            'emp_no' => $this->fishermen[array_search($this->selectedFisherman, array_column($this->fishermen, 'email'))]['emp_no'],
            'email' => $this->selectedFisherman,
            'rank' => $this->fishermen[array_search($this->selectedFisherman, array_column($this->fishermen, 'email'))]['rank'],
            'amount' => $this->salaryAmount,
            'payment_date' => $this->paymentDate,
            'month' =>$this->month,
            'slip_code' =>$this->referenceCode,
            'bonus' =>$this->bonus,
            'notes' => $this->notes,
        ];

        $this->showPaymentModal = false;
        $this->showSlipModal = true;
    }

    public function confirmPayment()
    {
        FishermanSalary::create([
            'user_email' => $this->selectedFisherman,
            'emp_no' => $this->slipDetails['emp_no'],
            'amount' => $this->slipDetails['amount'],
            'payment_date' => $this->slipDetails['payment_date'],
            'slip_code' => $this->slipDetails['slip_code'],
            'rank' => $this->slipDetails['rank'],
            'notes' => $this->slipDetails['notes'],
            'bonus' => $this->slipDetails['bonus'],
            'month' => $this->slipDetails['month'],
            // 'notes' => $this->slipDetails['notes'],
        ]);

        $this->showSlipModal = false;
        session()->flash('message', 'Payment recorded successfully!');
    }

    public function closeModals()
    {
        $this->reset(['showPaymentModal', 'showHistoryModal', 'showSlipModal']);
    }

    public function render()
    {

        return view('livewire.adminfisham-pay');
    }
}
