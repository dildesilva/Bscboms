<div class="container mx-auto p-6 font-sans text-sm text-gray-800 dark:text-gray-100">
    <h1 class="text-2xl font-bold text-center mb-10 text-gray-900 dark:text-white">Fisherman Salary Management</h1>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 shadow">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8 border border-gray-200 dark:border-gray-700">
        <h2 class="text-lg font-semibold mb-4 text-center">Fisherman List</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left border rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Employee No</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Rank</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    @foreach($fishermen as $fisherman)
                    <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="py-2 px-4">{{ $fisherman['name'] }}</td>
                        <td class="py-2 px-4">{{ $fisherman['emp_no'] }}</td>
                        <td class="py-2 px-4">{{ $fisherman['email'] }}</td>
                        <td class="py-2 px-4">{{ $fisherman['rank'] }}</td>
                        <td class="py-2 px-4 text-center space-x-2">
                            <button wire:click="openPaymentModal('{{ $fisherman['email'] }}')"
                                class="bg-blue-600 hover:bg-blue-700 text-white py-1.5 px-4 rounded shadow-sm"> Pay</button>
                            <button wire:click="openHistoryModal('{{ $fisherman['email'] }}')"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white py-1.5 px-4 rounded shadow-sm"> History</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($showPaymentModal)
<div class="fixed inset-0 bg-gray-100/60 backdrop-blur-sm flex items-center justify-center z-50 text-gray-700">
    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-2xl border border-gray-300">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">
            <i class="bi bi-wallet2 mr-2"></i>Create Payment for
            <span class="text-blue-600">{{ $fishermen[array_search($selectedFisherman, array_column($fishermen, 'email'))]['name'] }}</span>
        </h2>
        <form wire:submit.prevent="generatePaymentSlip">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-600 mb-1">Salary Amount</label>
                    <input type="number" wire:model="salaryAmount"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-red-600 focus:ring-2 focus:ring-blue-400">
                    @error('salaryAmount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-600 mb-1">Payment Date</label>
                    <input type="date" wire:model="paymentDate"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-red-600 focus:ring-2 focus:ring-blue-400">
                    @error('paymentDate') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-600 mb-1">Bonus (Optional)</label>
                    <input type="text" wire:model="bonus"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-red-600 focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-gray-600 mb-1">Reference Code</label>
                    <input type="text" wire:model="referenceCode"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-red-600 focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
<div>
    <label class="block text-gray-600 mb-1">Month</label>
    <select wire:model="month"
        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-400">
        <option value="">-- Select Month --</option>
        @for ($i = 1; $i <= 12; $i++)
            @php
                $monthValue = now()->year . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                $monthName = \Carbon\Carbon::createFromDate(null, $i, 1)->format('F');
            @endphp
            <option value="{{ $monthValue }}">{{ $monthName }} {{ now()->year }}</option>
        @endfor
    </select>
</div>

                <div>
                    {{-- <label class="block text-gray-600 mb-1">Reference Code</label>
                    <input type="text" wire:model="referenceCode"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-red-600 focus:ring-2 focus:ring-blue-400"> --}}
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Notes</label>
                <textarea wire:model="notes"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-red-600 focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" wire:click="closeModals"
                    class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-5 rounded-md shadow">
                    <i class="bi bi-x-circle mr-1"></i>Cancel
                </button>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-5 rounded-md shadow">
                    <i class="bi bi-send-check mr-1"></i>Generate
                </button>
            </div>
        </form>
    </div>
</div>

    @endif

    @if($showSlipModal)
   <div class="fixed inset-0 bg-gray-100/60 backdrop-blur-sm flex items-center justify-center z-50 text-gray-700">
    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-2xl border border-gray-300">
        <h2 class="text-lg font-semibold text-center mb-4 text-gray-800">
            <i class="bi bi-receipt"></i> PAYMENT SLIP
        </h2>
        <div class="text-sm space-y-2 text-gray-700">
            <div class="flex justify-between"><span class="font-medium">Slip Code:</span><span>{{ $slipDetails['slip_code'] }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Date:</span><span>{{ date('d/m/Y', strtotime($slipDetails['payment_date'])) }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Name:</span><span>{{ $slipDetails['name'] }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Emp No:</span><span>{{ $slipDetails['emp_no'] }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Rank:</span><span>{{ $slipDetails['rank'] }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Month:</span><span>{{ $slipDetails['month'] }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Bonus:</span>    <span>{{ $slipDetails['bonus'] ?? 'No bonus' }}</span></div>
            <div class="flex justify-between"><span class="font-medium">Amount:</span><span class="text-green-600 font-semibold">Rs. {{ number_format($slipDetails['amount'], 2) }}</span></div>
            @if($slipDetails['notes'])
            <div class="mt-2">
                <span class="font-medium">Notes:</span>
                <p class="mt-1 text-gray-600">{{ $slipDetails['notes'] }}</p>
            </div>
            @endif
        </div>
        <div class="flex justify-end mt-6 space-x-3">
            <button wire:click="confirmPayment" class="bg-green-600 hover:bg-green-700 text-white py-2 px-5 rounded-md shadow">
                <i class="bi bi-check-circle mr-1"></i> Confirm
            </button>
            <button wire:click="closeModals" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-5 rounded-md shadow">
                <i class="bi bi-x-circle mr-1"></i> Cancel
            </button>
        </div>
    </div>
</div>

    @endif

    @if($showHistoryModal)
  <div class="fixed inset-0 bg-gray-100/60 backdrop-blur-sm flex items-center justify-center z-50 text-gray-700">
    <div class="bg-white w-full max-w-5xl p-6 rounded-2xl shadow-2xl border border-gray-300">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-800">
                <i class="bi bi-wallet2 mr-2"></i>Salary History for
                <span class="text-blue-700 font-semibold">
                    {{ $fishermen[array_search($selectedFisherman, array_column($fishermen, 'email'))]['name'] }}
                </span>
            </h2>
            <button wire:click="closeModals" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="py-2 px-4 font-medium"><i class="bi bi-calendar-event mr-1"></i>Date</th>
                        <th class="py-2 px-4 font-medium"><i class="bi bi-receipt mr-1"></i>Slip Code</th>
                        <th class="py-2 px-4 font-medium"><i class="bi bi-currency-rupee mr-1"></i>Amount</th>
                        <th class="py-2 px-4 font-medium"><i class="bi bi-person-badge mr-1"></i>Rank</th>
                        <th class="py-2 px-4 font-medium"><i class="bi bi-journal-text mr-1"></i>Notes</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($salaryHistory as $salary)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4">{{ date('d/m/Y', strtotime($salary['payment_date'])) }}</td>
                        <td class="py-2 px-4">{{ $salary['slip_code'] }}</td>
                        <td class="py-2 px-4 text-green-600 font-semibold">Rs. {{ number_format($salary['amount'], 2) }}</td>
                        <td class="py-2 px-4 text-indigo-600">{{ $salary['rank'] }}</td>
                        <td class="py-2 px-4 text-gray-600">{{ $salary['notes'] ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6 flex justify-end">
            <button wire:click="closeModals" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-md shadow">
                Close
            </button>
        </div>
    </div>
</div>

    @endif
</div>
