<div id="cursor" class="animate-fadeIn container mx-auto p-6 text-sm bg-gray-900 text-gray-100 min-h-screen">
    {{-- <div id="underwater-cursor" class="absolute pointer-events-none w-16 h-16 bg-[#2525ff] opacity-70 rounded-full blur-3xl z-50"></div> --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <h1 class="text-xl font-bold mb-2 text-purple-400">Boat Report</h1>
        </div>
        <div>
            <div class="flex gap-2 w-full md:w-auto">
                <select wire:model="search" class="mt-1 block w-full bg-gray-800 border-gray-700 text-gray-100 rounded-md shadow-sm text-sm">
                    <option value="" hidden>Select Boat</option>
                    @forelse ($boatselection as $boat)
                        <option value="{{ $boat->name }}">{{ $boat->name }}</option>
                    @empty
                        <option disabled>No Boat</option>
                    @endforelse
                    <option value="">Select Boat</option>
                </select>

                <button wire:click="applySearch" wire:loading.attr="disabled"
                    class="bg-blue-600 w-[100px] text-white text-xs px-3 py-2 rounded-md hover:bg-blue-700 flex items-center justify-center space-x-2">
                    <div wire:loading.remove>Search</div>
                    <div wire:loading class="flex items-center space-x-2">
                        <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24" fill="none">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <div class="bg-gray-800 p-6 rounded-2xl shadow-lg">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 space-y-4 md:space-y-0">
            <div class="flex flex-col md:flex-row md:items-center gap-4">
                <div class="flex items-center gap-2">
                    <label class="text-gray-300 font-medium">From:</label>
                    <input type="date" wire:model="fromDate"
                        class="bg-gray-900 border border-gray-700 rounded-lg px-3 py-1 text-gray-100 text-xs focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-gray-300 font-medium">To:</label>
                    <input type="date" wire:model="toDate"
                        class="bg-gray-900 border border-gray-700 rounded-lg px-3 py-1 text-gray-100 text-xs focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <button wire:click="applySearch" wire:loading.attr="disabled"
                    class="bg-blue-600 w-[100px] text-white text-xs px-3 py-2 rounded-md hover:bg-blue-700 flex items-center justify-center space-x-2">
                    <div wire:loading.remove>Search</div>
                    <div wire:loading class="flex items-center space-x-2">
                        <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24" fill="none">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                        </svg>
                    </div>
                </button>
            </div>

            <button wire:click="downloadReport"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-xs">Download Report
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-900 border border-gray-700 rounded-lg text-xs">
                <thead>
                    <tr class="bg-gray-700 text-gray-200 text-left text-xs">
                        <th class="py-2 px-3">Trip ID</th>
                        <th class="py-2 px-3">Start Date</th>
                        <th class="py-2 px-3">Completed Date</th>
                        <th class="py-2 px-3">Trip Duration</th>
                        <th class="py-2 px-3">Return Type</th>
                        <th class="py-2 px-3">Total Fish (KG)</th>
                        <th class="py-2 px-3">Total Cost</th>
                        <th class="py-2 px-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($boatsFilter as $boat)
                        @foreach ($boat->tripcreatemodels as $trip)
                            <tr class="border-t border-gray-700 hover:bg-gray-800">
                                <td class="py-2 px-3">{{ $trip->id }}</td>
                                <td class="py-2 px-3">{{ $trip->departureTime }}</td>
                                <td class="py-2 px-3">{{ $trip->updated_at }}</td>
                                <td class="py-2 px-3"
                                    title="{{ \Carbon\Carbon::parse($trip->departureTime)->diff(\Carbon\Carbon::parse($trip->updated_at))->format('%y years %m months %d days') }}">
                                    {{ \Carbon\Carbon::parse($trip->departureTime)->diff(\Carbon\Carbon::parse($trip->updated_at))->format('%d days - %h hours %i minutes') }}
                                </td>
                                <td class="py-2 px-3">{{ $trip->emergency ?? 'N/A' }}</td>
                                <td class="py-2 px-3 bg-red-700 text-white">
                                    @php
                                        $totalcatchfish = $trip->catchfish->sum('weight');
                                    @endphp
                                    {{ $totalcatchfish }} KG
                                </td>

                                <td class="py-2 px-3 bg-green-700 text-white">
                                    @php
                                        $totalExpense = $trip->expense->sum('amount');
                                    @endphp
                                    SCR {{ $totalExpense }}
                                </td>

                                <td class="py-2 px-3">
                                    <button onclick="openModal({{ $trip->id }})" class=" hover:text-red-400  bg-indigo-500 text-white text-xs px-3 py-1 rounded hover:bg-indigo-600">
                                        <i class="bi bi-box-arrow-up-right"></i> View More</button>
                                </td>
                            </tr>


<div id="modal-{{ $trip->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-70 flex items-center justify-center p-4">
  <div
    class="bg-gray-800 w-full max-w-6xl p-6 rounded-2xl shadow-xl relative text-xs
           flex flex-col max-h-[80vh] overflow-hidden"
  >
    <!-- Close Button -->
    <button onclick="closeModal({{ $trip->id }})"
      class="absolute top-3 right-4 text-gray-500 hover:text-white text-xl font-bold">&times;</button>

    <!-- Modal Title -->
    <h3 class="text-lg font-bold text-gray-100 mb-4 border-b pb-2 text-center flex-shrink-0">
      T Ledger View – Trip {{ $trip->id }}
    </h3>

 <div
  class="grid grid-cols-1 md:grid-cols-3 gap-4 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-800"
  style="height: 80vh;"
>

      <!-- Expenses, Catch Data, Crew Members sections here as before -->

      <!-- Left Side: Expenses -->
      <div>
        <h4 class="text-md font-bold text-blue-300 mb-2">Expenses</h4>
        <div class="grid grid-cols-5 gap-4 bg-gray-700 text-gray-200 py-2 px-2 font-semibold uppercase border">
          <div>Date</div>
          <div>Description</div>
          <div class="text-right">Qty</div>
          <div class="text-right">Unit</div>
          <div class="text-right">Amount</div>
        </div>
        <div class="space-y-2 max-h-[35vh] overflow-y-auto pr-1">
          @forelse ($trip->expense as $item)
            <div class="grid grid-cols-5 gap-4 border px-2 py-1 bg-gray-700 rounded">
              <div>{{ \Carbon\Carbon::parse($item->date_time)->format('M d, Y') }}</div>
              <div>{{ $item->description }}</div>
              <div class="text-right">{{ $item->quantity }}</div>
              <div class="text-right">{{ $item->unit }}</div>
              <div class="text-right">{{ number_format($item->amount, 2) }}</div>
            </div>
          @empty
            <div class="text-center px-4 py-2 text-gray-400">No expenses recorded.</div>
          @endforelse
        </div>
        <div class="mt-4 bg-gray-700 border-t py-2 px-2 font-bold text-right">
          Total Expenses: SCR {{ number_format($trip->expense->sum('amount'), 2) }}
        </div>
      </div>

      <!-- Middle: Catch Data -->
      <div>
        <h4 class="text-md font-bold text-green-300 mb-2">Catch Records</h4>
        <div class="grid grid-cols-4 gap-4 bg-gray-700 text-gray-200 py-2 px-2 font-semibold uppercase border">
          <div>Date</div>
          <div>Fish Type</div>
          <div class="text-right">Weight (KG)</div>
          <div class="text-right">Price</div>
        </div>
        <div class="space-y-2 max-h-[35vh] overflow-y-auto pr-1">
          @forelse ($trip->catchfish as $fish)
            <div class="grid grid-cols-4 gap-4 border px-2 py-1 bg-gray-700 rounded">
              <div>{{ \Carbon\Carbon::parse($fish->date_time)->format('M d, Y') }}</div>
              <div>{{ $fish->fish_type }}</div>
              <div class="text-right">{{ $fish->weight }}</div>
              <div class="text-right">SCR {{ number_format($fish->price, 2) }}</div>
            </div>
          @empty
            <div class="text-center px-4 py-2 text-gray-400">No fish records.</div>
          @endforelse
        </div>
        <div class="mt-4 bg-gray-700 border-t py-2 px-2 font-bold text-right">
          Total Revenue: SCR {{ number_format($trip->catchfish->sum('price'), 2) }}
        </div>
      </div>

      <!-- Right Side: Crew Members -->
      <div>
        <h4 class="text-md font-bold text-purple-300 mb-2">Crew Members</h4>

        <div class="grid grid-cols-5 gap-4 bg-gray-700 text-gray-200 py-2 px-2 font-semibold uppercase border">
          <div>Name</div>
          <div>Rank</div>
          <div>Phone</div>
        </div>

        @php
          $members = $trip->addmembertrip;
        @endphp

        <div class="space-y-2 max-h-[35vh] overflow-y-auto pr-1">
          @if($members->isEmpty())
            <div class="text-center px-4 py-2 text-gray-400">No crew members recorded.</div>
          @else
            @foreach($members as $member)
              @php
                $details = $member->tripmemberdetiles;
              @endphp
              <div class="grid grid-cols-5 gap-4 border px-2 py-1 bg-gray-700 rounded">
                <div>{{ $details ? $details->name : 'No details' }}</div>
                <div>{{ $details->rank ?? '-' }}</div>
                <div>{{ $details->phone_number ?? '-' }}</div>
              </div>

              @if (!$details)
                <div class="text-xs text-yellow-400 px-2">
                  ⚠️ No tripmemberdetiles found for email: <strong>{{ $member->memberEmail }}</strong>
                </div>
              @endif
            @endforeach
          @endif
        </div>

        <div class="mt-4 bg-gray-700 border-t py-2 px-2 font-bold text-right">
          Total Crew: {{ $members->count() }}
        </div>
      </div>
    </div>
  </div>
</div>

                        @endforeach
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-2 text-red-300">No Boat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-8 bg-gray-700 p-6 rounded-2xl shadow-inner text-sm">
            <h3 class="text-base font-semibold text-purple-300 mb-4">Summary</h3>
            <div class="flex flex-col space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-gray-300">Total Trips Completed:</span>
                    <span class="text-blue-300 font-bold">
                        @php
                            $totalTrips = $boatsFilter->flatMap(function ($boat) {
                                return $boat->tripcreatemodels;
                            })->count();
                        @endphp
                        {{ $totalTrips }}
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-300">Overall Total Fish Weight:</span>
                    <span class="font-bold bg-gray-800 px-2 py-1 rounded text-green-300">
                        @php
                            $totalcatchfishs = $boatsFilter->sum(function ($boat) {
                                return $boat->tripcreatemodels->sum(function ($trip) {
                                    return $trip->catchfish->sum('weight');
                                });
                            });
                        @endphp
                        {{ number_format($totalcatchfishs, 2) }} KG
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-300">Overall Total Cost:</span>
                    <span class="font-bold bg-gray-800 px-2 py-1 rounded text-yellow-300">
                        @php
                            $totalCost = $boatsFilter->sum(function ($boat) {
                                return $boat->tripcreatemodels->sum(function ($trip) {
                                    return $trip->expense->sum('amount');
                                });
                            });
                        @endphp
                        {{ number_format($totalCost, 2) }} SCR
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>
<!-- Underwater Cursor Script -->
{{-- <script>
    const glow = document.getElementById('underwater-cursor');

    document.addEventListener('mousemove', (e) => {
        // Ensure the cursor stays within the bounds of the viewport
        const cursorSize = glow.offsetWidth;
        const maxX = window.innerWidth - cursorSize;
        const maxY = window.innerHeight - cursorSize;

        let xPos = e.clientX - (cursorSize / 2);
        let yPos = e.clientY - (cursorSize / 2);

        // Keep the cursor within the bounds
        if (xPos < 0) xPos = 0;
        if (yPos < 0) yPos = 0;
        if (xPos > maxX) xPos = maxX;
        if (yPos > maxY) yPos = maxY;

        glow.style.left = `${xPos}px`;
        glow.style.top = `${yPos}px`;
    });
</script> --}}
