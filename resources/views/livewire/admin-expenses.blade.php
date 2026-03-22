<div class="bg-gray-900 text-gray-300 pt-2 min-h-screen animate-fadeIn">
    <!-- Compact Glass Tab Buttons -->
<div class="flex justify-center mb-6">
    <div class="inline-flex p-1 bg-white/5 backdrop-blur-sm rounded-lg border border-white/10 shadow-md shadow-blue-500/10 space-x-2">
        <!-- Active Trips Button -->
        <button
            wire:click="changeTab('active')"
            class="px-4 py-1.5 text-sm rounded-md transition-all duration-200
                   {{ $activeTab === 'active' ?
                      'bg-gradient-to-r from-red-500/80 to-red-600/80 text-white shadow-inner shadow-red-900/20' :
                      'bg-transparent text-white/70 hover:text-white hover:bg-white/5' }}
                   border border-white/10 hover:border-white/20"
        >
            Active
        </button>

        <!-- Scheduled Trips Button -->
        <button
            wire:click="changeTab('scheduled')"
            class="px-4 py-1.5 text-sm rounded-md transition-all duration-200
                   {{ $activeTab === 'scheduled' ?
                      'bg-gradient-to-r from-orange-500/80 to-orange-600/80 text-white shadow-inner shadow-orange-900/20' :
                      'bg-transparent text-white/70 hover:text-white hover:bg-white/5' }}
                   border border-white/10 hover:border-white/20"
        >
            Scheduled
        </button>

        <!-- Completed Trips Button -->
        <button
            wire:click="changeTab('completed')"
            class="px-4 py-1.5 text-sm rounded-md transition-all duration-200
                   {{ $activeTab === 'completed' ?
                      'bg-gradient-to-r from-blue-500/80 to-indigo-600/80 text-white shadow-inner shadow-blue-900/20' :
                      'bg-transparent text-white/70 hover:text-white hover:bg-white/5' }}
                   border border-white/10 hover:border-white/20"
        >
            Completed
        </button>
    </div>
</div>

    @if ($activeTab == 'active')
    <!-- Table for Active Trips -->
    <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-lg p-4 w-[95%] m-auto">
        <h2 class="text-xl font-semibold text-gray-100 mb-4">Active trips</h2>
        <table class="min-w-full text-sm text-gray-300">
            <thead class="bg-gray-700 text-left text-gray-100 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Boat</th>
                    <th class="px-6 py-3">Trip ID</th>
                    <th class="px-6 py-3">Departure Time</th>
                    <th class="px-6 py-3">Total Cost</th>
                    <th class="px-6 py-3">View</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-600">
                @forelse ($activetrip as $trip)
                <tr>
                    <td class="px-6 py-4">{{ $trip->boat }}</td>
                    <td class="px-6 py-4">{{ $trip->id }}</td>
                    <td class="px-6 py-4">{{ $trip->departureTime }}</td>
                    <td class="px-6 py-4">{{ $trip->totalAmount }}</td>
                    <td class="px-6 py-4">
                        <button onclick="openModal({{ $trip->id }})" class="text-blue-400 font-bold text-[18px] hover:text-red-400">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal for Active Trip -->
              <div id="modal-{{ $trip->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white/10 w-[90%] max-w-2xl p-6 rounded-2xl shadow-2xl relative flex flex-col gap-4 max-h-[90vh] overflow-hidden text-xs border border-white/20 backdrop-blur-lg">
        <!-- Close Button -->
        <button onclick="closeModal({{ $trip->id }})" class="absolute top-3 right-4 text-white/70 hover:text-white text-xl font-bold transition-colors">&times;</button>

        <!-- Modal Title -->
        <h3 class="text-lg font-bold text-white mb-2 border-b border-white/20 pb-2">Expenses Details: Trip {{ $trip->id }}</h3>

        <!-- Scrollable Content -->
        <div class="overflow-y-auto pr-2" style="max-height: 75vh;">
            <!-- Header Row -->
            <div class="grid grid-cols-5 gap-4 bg-white/10 uppercase text-left py-2 border border-white/10 font-semibold text-white/80">
                <div class="px-4">Date & Time</div>
                <div class="px-4">Description</div>
                <div class="px-4 text-right">Quantity</div>
                <div class="px-4 text-right">Unit</div>
                <div class="px-4 text-right">Amount</div>
            </div>

            <!-- Data Rows -->
            <div class="space-y-2">
                @forelse ($trip->expense as $item)
                <div class="grid grid-cols-5 gap-4 border border-white/10 rounded px-4 py-2 bg-white/5 hover:bg-white/10 transition-colors text-white">
                    <div>{{ \Carbon\Carbon::parse($item->date_time)->format('M d, Y') }}</div>
                    <div>{{ $item->description }}</div>
                    <div class="text-right">{{ $item->quantity }}</div>
                    <div class="text-right">{{ $item->unit }}</div>
                    <div class="text-right">{{ number_format($item->amount, 2) }}</div>
                </div>
                @empty
                <div class="text-center px-4 py-2 text-white/50">No expenses found for this trip.</div>
                @endforelse
            </div>

            <!-- Footer Row -->
            <div class="grid grid-cols-5 gap-4 bg-white/10 font-bold border-t border-white/20 px-4 py-2 mt-4 text-white">
                <div class="col-span-4 text-right">Total Amount</div>
                <div class="text-right">{{ number_format($trip->expense->sum('amount'), 2) }}</div>
            </div>
        </div>
    </div>
</div>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">No active trips found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @elseif ($activeTab == 'scheduled')
    <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-lg p-4 w-[95%] m-auto">
        <h2 class="text-xl font-semibold text-gray-100 mb-4">Scheduled trips</h2>

        <table class="min-w-full text-sm text-gray-300">
            <thead class="bg-gray-700 text-left text-gray-100 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Boat</th>
                    <th class="px-6 py-3">Trip ID</th>
                    <th class="px-6 py-3">Departure Time</th>
                    <th class="px-6 py-3">Total Cost</th>
                    <th class="px-6 py-3">View</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-600">
                @forelse ($schedule as $trip)
                <tr>
                    <td class="px-6 py-4">{{ $trip->boat }}</td>
                    <td class="px-6 py-4">{{ $trip->id }}</td>
                    <td class="px-6 py-4">{{ $trip->departureTime }}</td>
                    <td class="px-6 py-4">{{ $trip->totalAmount }}</td>
                    <td class="px-6 py-4">
                        <button onclick="openModal({{ $trip->id }})" class="text-blue-400 font-bold text-[18px] hover:text-red-400">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal for Scheduled Trip -->
               <div id="modal-{{ $trip->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white/10 w-[90%] max-w-2xl p-6 rounded-2xl shadow-2xl relative flex flex-col gap-4 max-h-[90vh] overflow-hidden text-xs border border-white/20 backdrop-blur-lg">
        <!-- Close Button -->
        <button onclick="closeModal({{ $trip->id }})" class="absolute top-3 right-4 text-white/70 hover:text-white text-xl font-bold transition-colors">&times;</button>

        <!-- Modal Title -->
        <h3 class="text-lg font-bold text-white mb-2 border-b border-white/20 pb-2">Expenses Details: Trip {{ $trip->id }}</h3>

        <!-- Scrollable Content -->
        <div class="overflow-y-auto pr-2" style="max-height: 75vh;">
            <!-- Header Row -->
            <div class="grid grid-cols-5 gap-4 bg-white/10 uppercase text-left py-2 border border-white/10 font-semibold text-white/80">
                <div class="px-4">Date & Time</div>
                <div class="px-4">Description</div>
                <div class="px-4 text-right">Quantity</div>
                <div class="px-4 text-right">Unit</div>
                <div class="px-4 text-right">Amount</div>
            </div>

            <!-- Data Rows -->
            <div class="space-y-2">
                @forelse ($trip->expense as $item)
                <div class="grid grid-cols-5 gap-4 border border-white/10 rounded px-4 py-2 bg-white/5 hover:bg-white/10 transition-colors text-white">
                    <div>{{ \Carbon\Carbon::parse($item->date_time)->format('M d, Y') }}</div>
                    <div>{{ $item->description }}</div>
                    <div class="text-right">{{ $item->quantity }}</div>
                    <div class="text-right">{{ $item->unit }}</div>
                    <div class="text-right">{{ number_format($item->amount, 2) }}</div>
                </div>
                @empty
                <div class="text-center px-4 py-2 text-white/50">No expenses found for this trip.</div>
                @endforelse
            </div>

            <!-- Footer Row -->
            <div class="grid grid-cols-5 gap-4 bg-white/10 font-bold border-t border-white/20 px-4 py-2 mt-4 text-white">
                <div class="col-span-4 text-right">Total Amount</div>
                <div class="text-right">{{ number_format($trip->expense->sum('amount'), 2) }}</div>
            </div>
        </div>
    </div>
</div>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">No scheduled trips found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @elseif ($activeTab == 'completed')
    <!-- Completed Trips Section (Same Modal Concept) -->
    <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-lg p-4 w-[95%] m-auto">
        <h2 class="text-xl font-semibold text-gray-100 mb-4">Completed trips</h2>
        <table class="min-w-full text-sm text-gray-300">
            <thead class="bg-gray-700 text-left text-gray-100 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Boat</th>
                    <th class="px-6 py-3">Trip ID</th>
                    <th class="px-6 py-3">Completion Time</th>
                    <th class="px-6 py-3">Total Cost</th>
                    <th class="px-6 py-3">View</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-600">
                @forelse ($donetrip as $trip)
                <tr>
                    <td class="px-6 py-4">{{ $trip->boat }}</td>
                    <td class="px-6 py-4">{{ $trip->id }}</td>
                    <td class="px-6 py-4">{{ $trip->completedTime }}</td>
                    <td class="px-6 py-4">{{ $trip->totalAmount }}</td>
                    <td class="px-6 py-4">
                        <button onclick="openModal({{ $trip->id }})" class="text-blue-400 font-bold text-[18px] hover:text-red-400">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal for Completed Trip -->
                <div id="modal-{{ $trip->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white/10 w-[90%] max-w-2xl p-6 rounded-2xl shadow-2xl relative flex flex-col gap-4 max-h-[90vh] overflow-hidden text-xs border border-white/20 backdrop-blur-lg">
        <!-- Close Button -->
        <button onclick="closeModal({{ $trip->id }})" class="absolute top-3 right-4 text-white/70 hover:text-white text-xl font-bold transition-colors">&times;</button>

        <!-- Modal Title -->
        <h3 class="text-lg font-bold text-white mb-2 border-b border-white/20 pb-2">Expenses Details: Trip {{ $trip->id }}</h3>

        <!-- Scrollable Content -->
        <div class="overflow-y-auto pr-2" style="max-height: 75vh;">
            <!-- Header Row -->
            <div class="grid grid-cols-5 gap-4 bg-white/10 uppercase text-left py-2 border border-white/10 font-semibold text-white/80">
                <div class="px-4">Date & Time</div>
                <div class="px-4">Description</div>
                <div class="px-4 text-right">Quantity</div>
                <div class="px-4 text-right">Unit</div>
                <div class="px-4 text-right">Amount</div>
            </div>

            <!-- Data Rows -->
            <div class="space-y-2">
                @forelse ($trip->expense as $item)
                <div class="grid grid-cols-5 gap-4 border border-white/10 rounded px-4 py-2 bg-white/5 hover:bg-white/10 transition-colors text-white">
                    <div>{{ \Carbon\Carbon::parse($item->date_time)->format('M d, Y') }}</div>
                    <div>{{ $item->description }}</div>
                    <div class="text-right">{{ $item->quantity }}</div>
                    <div class="text-right">{{ $item->unit }}</div>
                    <div class="text-right">{{ number_format($item->amount, 2) }}</div>
                </div>
                @empty
                <div class="text-center px-4 py-2 text-white/50">No expenses found for this trip.</div>
                @endforelse
            </div>

            <!-- Footer Row -->
            <div class="grid grid-cols-5 gap-4 bg-white/10 font-bold border-t border-white/20 px-4 py-2 mt-4 text-white">
                <div class="col-span-4 text-right">Total Amount</div>
                <div class="text-right">{{ number_format($trip->expense->sum('amount'), 2) }}</div>
            </div>
        </div>
    </div>
</div>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">No completed trips found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>
<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>
