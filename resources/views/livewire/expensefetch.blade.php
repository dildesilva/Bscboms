<div wire:poll.2s class=" p-6">
    <div class="max-w-6xl h-auto mx-auto bg-red-300 p-6 rounded-lg shadow-md">
        {{-- <h1 class="text-2xl font-semibold text-gray-800 mb-4">Boat Trip Expense Management</h1> --}}

        <!-- Expense List Table -->
        <h2 class="section-title">Expenses - Trip ID: {{ $tripId }}</h2>

     <!-- Flash message -->
     @if (session()->has('message'))
     <div class="bg-green-500 text-white p-2 rounded mb-4">
         {{ session('message') }}
     </div>
 @endif


     <!-- Total Expense Calculation -->
     <div class="mt-6 p-4 bg-gray-200 rounded-md flex items-center">
        <h2 class="text-lg p-4 font-semibold text-gray-700">Total Expenses for Selected Trip:</h2>
        <p class="text-lg font-bold text-red-400">SCR :{{ $totalAmount }}</p>


        <!-- Button aligned to the right -->
<button onclick="openExpenseModal()"
    class="ml-auto bg-red-600 text-white p-4 rounded-md hover:bg-red-700">
    + Add Expense
</button>





    </div>
    <div>


        <table class="min-w-full bg-white border-collapse text-xs mt-2" id="expense-table" wire:poll="refreshExpenses">
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="p-2 text-left">Date</th>
                    <th class="p-2 text-left">Description</th>
                    <th class="p-2 text-left">Quantity</th>
                    <th class="p-2 text-left">Unit</th>
                    <th class="p-2 text-left">Amount</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody id="expense-list">
                @foreach ($expense as $expdata)
                    <tr class="text-[10px]" wire:key="expense-{{ $expdata->id }}">
                        <td class="p-1 text-left">{{ $expdata->date_time }}</td>
                        <td class="p-1 text-left">
                            <input type="text" wire:model="expense.{{ $expdata->id }}.description" class="w-24 border-none bg-transparent text-xs" placeholder="{{ $expdata->description }}">
                        </td>
                        <td class="p-1 text-left">
                            <input type="number" wire:model="expense.{{ $expdata->id }}.quantity" class="w-24 border-none bg-transparent text-xs" placeholder="{{ $expdata->quantity }}">
                        </td>
                        <td class="p-1 text-left">
                            <input type="text" wire:model="expense.{{ $expdata->id }}.unit" class="w-24 border-none bg-transparent text-xs" placeholder="{{ $expdata->unit }}">
                        </td>
                        <td class="p-1 text-left">
                            <input type="number" wire:model="expense.{{ $expdata->id }}.amount" class="w-24 border-none bg-transparent text-xs" placeholder="{{ $expdata->amount }}">
                        </td>
                        <td class="p-1 text-left">
                            <button wire:click="deleteExpense({{ $expdata->id }})" class="text-red-500 rounded-md hover:bg-red-600 text-xs px-2 py-1">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    </div>
</div>

<script>
    // Open Expense Modal Function
    function openExpenseModal() {
        document.getElementById('expense-modal').classList.remove('hidden');
    }
</script>
