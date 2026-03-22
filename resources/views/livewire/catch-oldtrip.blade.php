<div wire:poll.2s class=" p-6">
    <div class="max-w-6xl h-auto mx-auto bg-green-300 p-6 rounded-lg shadow-md">
        <h2 class="section-title">Catch - Trip ID:{{ $tripId }} </h2>

     <!-- Flash message -->
     @if (session()->has('message'))
     <div class="bg-green-500 text-white p-2 rounded mb-4">
         {{ session('message') }}
     </div>
 @endif


    <div >
    <div class="mt-6 p-4 bg-white shadow-lg rounded-lg flex items-center justify-between">
        <!-- Total Weight Section -->
        <div class="flex items-center space-x-2">
            <h2 class="text-xl font-semibold text-gray-800">Total Weight:</h2>
            <p class="text-xl font-bold text-green-700">{{ $totalAmount }}</p>
            <p class="text-xl font-bold text-green-700">kg</p>
        </div>

    </div>
 <table class="min-w-full bg-white border-collapse text-xs mt-2" id="expense-table" wire:poll='refresh'>
            <thead>
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="p-2 text-left">Date</th>
                    <th class="p-2 text-left">Fish Type</th>
                    <th class="p-2 text-left">Quantity</th>
                    <th class="p-2 text-left">Weight (kg)</th>
                    {{-- <th class="p-2 text-left">Actions</th> --}}
                </tr>
            </thead>
            <tbody id="expense-list">
                @foreach ($cathfish as $fishdata)
                    <tr class="text-[10px]">
                        <td class="p-1 text-left">{{ $fishdata->date }}</td>
                        <td class="p-1 text-left">{{ $fishdata->fish }}</td>
                        <td class="p-1 text-left">{{ $fishdata->quantity }}</td>
                        <td class="p-1 text-left">{{ $fishdata->weight }}</td>
                        {{-- <td class="p-1 text-left">
                            <button wire:click="deleteCatch({{ $fishdata->id }})" class="text-red-500 rounded-md hover:bg-red-600 text-xs px-2 py-1">Delete</button>

                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    </div>
</div>

<script>
    function openExpenseModal() {
        document.getElementById('expense-modal').classList.remove('hidden');
    }
</script>
