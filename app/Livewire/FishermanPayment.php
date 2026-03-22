<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FishermanSalary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FishermanPayment extends Component
{
    public $payment;
    public $fisherman;
    public $recentPayments;
    public $paymentBreakdown;

    public function mount($slipCode = null)
    {
        $user = Auth::user();

        $this->payment = $slipCode
            ? FishermanSalary::where('slip_code', $slipCode)
                ->where('user_email', $user->email)
                ->first()
            : FishermanSalary::where('user_email', $user->email)
                ->latest('payment_date')
                ->first();

        if (! $this->payment) {
            session()->flash('error', 'No payment records available.');
            return;
        }

        $this->fisherman = User::with('tripMemberDetiles')
            ->where('email', $user->email)
            ->first();


        $this->paymentBreakdown = $this->calculatePaymentBreakdown();


        $this->recentPayments = FishermanSalary::where('user_email', $user->email)
            ->where('id', '!=', $this->payment->id ?? null)
            ->orderBy('payment_date', 'desc')
            ->limit(3)
            ->get();
    }

    protected function calculatePaymentBreakdown()
    {
        if (! $this->payment) {
            return [
                'subtotal'   => 0,
                'deductions' => 0,
                'bonuses'    => 0,
                'tax'        => 0,
                'total'      => 0,
            ];
        }

        $baseAmount = $this->payment->amount;

        return [
            'subtotal'   => $baseAmount * 0.85,
            'deductions' => $baseAmount * 0.10,
            'bonuses'    => $baseAmount * 0.03,
            'tax'        => $baseAmount * 0.02,
            'total'      => $baseAmount,
        ];
    }

    public function printSlip()
    {
        $this->dispatch('print-slip');
    }

    public function downloadSlip()
    {
        if (! $this->payment) {
            session()->flash('error', 'No payment to download.');
            return;
        }

        return response()->streamDownload(function () {
            echo view('pdf.fisherman-payment', [
                'payment'   => $this->payment,
                'fisherman' => $this->fisherman,
                'breakdown' => $this->paymentBreakdown,
            ]);
        }, 'payment-slip-' . $this->payment->slip_code . '.pdf');
    }

    public function render()
    {
        return view('livewire.fisherman-payment', [
            'payment'         => $this->payment,
            'fisherman'       => $this->fisherman,
            'paymentBreakdown'=> $this->paymentBreakdown,
            'recentPayments'  => $this->recentPayments,
        ]);
    }
}
