<div class="bg-gray-50 dark:bg-gray-900 min-h-screen p-4 md:p-6 transition-colors duration-200">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Boat Trip Analytics</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Comprehensive fishing trip reports and financial analysis</p>
            </div>

            <!-- Filter Controls -->
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <div class="relative flex-grow">
                    <select wire:model="search"
                        class="w-full pl-3 pr-8 py-2 text-sm border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white appearance-none">
                        <option value="" hidden>Select Vessel</option>
                        @forelse ($boatselection as $boat)
                            <option value="{{ $boat->name }}">{{ $boat->name }}</option>
                        @empty
                            <option disabled>No Vessels Available</option>
                        @endforelse
                    </select>
                    <i class="bi bi-chevron-down absolute right-3 top-2.5 text-gray-400 pointer-events-none"></i>
                </div>

                <button wire:click="applySearch" wire:loading.attr="disabled"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center whitespace-nowrap">
                    <span wire:loading.remove>Apply Filters</span>
                    <span wire:loading class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing
                    </span>
                </button>
            </div>
        </div>

        <!-- Date Range & Export -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="flex items-center">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-2 whitespace-nowrap">Date Range:</label>
                        <div class="relative">
                            <input type="date" wire:model="fromDate"
                                class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md px-3 py-1.5 text-sm text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <span class="mx-2 text-gray-500 dark:text-gray-400">to</span>
                        <div class="relative">
                            <input type="date" wire:model="toDate"
                                class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md px-3 py-1.5 text-sm text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <button wire:click="applySearch" wire:loading.attr="disabled"
                        class="px-3 py-1.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md text-sm font-medium transition-colors duration-200 flex items-center justify-center">
                        <i class="bi bi-funnel-fill mr-2 text-xs"></i> Filter Trips
                    </button>
                </div>

                <button wire:click="downloadReport"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center whitespace-nowrap">
                    <i class="bi bi-file-earmark-arrow-down-fill mr-2"></i> Export Report
                </button>
            </div>
        </div>

        <!-- Main Data Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Trip ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Departure</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Return</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Duration</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Catch (KG)</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Expenses (SCR)</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($boatsFilter as $boat)
                            @foreach ($boat->tripcreatemodels as $trip)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    #{{ $trip->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($trip->departureTime)->format('M j, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($trip->updated_at)->format('M j, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                    title="{{ \Carbon\Carbon::parse($trip->departureTime)->diff(\Carbon\Carbon::parse($trip->updated_at))->format('%y years %m months %d days') }}">
                                    {{ \Carbon\Carbon::parse($trip->departureTime)->diff(\Carbon\Carbon::parse($trip->updated_at))->format('%d days %h hr') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($trip->emergency)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                        Emergency
                                    </span>
                                    @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Completed
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                                    @php $totalcatchfish = $trip->catchfish->sum('weight'); @endphp
                                    <span class="text-blue-600 dark:text-blue-400">{{ number_format($totalcatchfish, 2) }} kg</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium">
                                    @php $totalExpense = $trip->expense->sum('amount'); @endphp
                                    <span class="text-red-600 dark:text-red-400">{{ number_format($totalExpense, 2) }} SCR</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openModal({{ $trip->id }})"
                                        class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-3 inline-flex items-center">
                                        <i class="bi bi-box-arrow-up-right mr-1"></i> Details
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <i class="bi bi-clipboard2-x-fill text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                    <p>No trip records found for selected criteria</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Summary Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
                <i class="bi bi-graph-up-arrow mr-2 text-blue-500"></i> Performance Summary
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Trips</p>
                            <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">
                                @php
                                    $totalTrips = $boatsFilter->flatMap(function ($boat) {
                                        return $boat->tripcreatemodels;
                                    })->count();
                                @endphp
                                {{ $totalTrips }}
                            </p>
                        </div>
                        <div class="bg-blue-100 dark:bg-blue-900/30 p-3 rounded-full">
                            <i class="bi bi-journal-text text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Catch</p>
                            <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">
                                @php
                                    $totalcatchfishs = $boatsFilter->sum(function ($boat) {
                                        return $boat->tripcreatemodels->sum(function ($trip) {
                                            return $trip->catchfish->sum('weight');
                                        });
                                    });
                                @endphp
                                {{ number_format($totalcatchfishs, 2) }} kg
                            </p>
                        </div>
                        <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded-full">
                            <i class="bi bi-basket2-fill text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Expenses</p>
                            <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">
                                @php
                                    $totalCost = $boatsFilter->sum(function ($boat) {
                                        return $boat->tripcreatemodels->sum(function ($trip) {
                                            return $trip->expense->sum('amount');
                                        });
                                    });
                                @endphp
                                {{ number_format($totalCost, 2) }} SCR
                            </p>
                        </div>
                        <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded-full">
                            <i class="bi bi-cash-stack text-red-600 dark:text-red-400 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trip Detail Modals -->
        @foreach ($boatsFilter as $boat)
            @foreach ($boat->tripcreatemodels as $trip)
            <div id="modal-{{ $trip->id }}" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4 backdrop-blur-sm">
                <div class="bg-white dark:bg-gray-800 w-full max-w-6xl rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden max-h-[90vh] flex flex-col">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center p-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white flex items-center">
                            <i class="bi bi-journal-text mr-2 text-blue-500"></i>
                            Trip #{{ $trip->id }} - Detailed Ledger
                        </h3>
                        <button onclick="closeModal({{ $trip->id }})" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <i class="bi bi-x-lg text-xl"></i>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="flex-1 overflow-y-auto p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Expenses Section -->
                            <div>
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-medium text-gray-800 dark:text-white flex items-center">
                                        <i class="bi bi-credit-card-2-back-fill mr-2 text-red-500"></i>
                                        Expenses
                                    </h4>
                                    <span class="text-sm font-medium text-red-600 dark:text-red-400">
                                        Total: SCR {{ number_format($trip->expense->sum('amount'), 2) }}
                                    </span>
                                </div>

                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Description</th>
                                                <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                            @forelse ($trip->expense as $item)
                                            <tr>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    {{ \Carbon\Carbon::parse($item->date_time)->format('M j, Y') }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">
                                                    {{ $item->description }}
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $item->quantity }} {{ $item->unit }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-right font-medium text-red-600 dark:text-red-400">
                                                    {{ number_format($item->amount, 2) }} SCR
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="px-4 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                                    No expenses recorded for this trip
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Catch Section -->
                            <div>
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-medium text-gray-800 dark:text-white flex items-center">
                                        <i class="bi bi-basket2-fill mr-2 text-green-500"></i>
                                        Catch Records
                                    </h4>
                                    <span class="text-sm font-medium text-green-600 dark:text-green-400">
                                        Total: {{ $trip->catchfish->sum('weight') }} kg
                                    </span>
                                </div>

                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Species</th>
                                                <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Weight</th>
                                                <th scope="col" class="px-4 py-2 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                            @forelse ($trip->catchfish as $fish)
                                            <tr>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    {{ \Carbon\Carbon::parse($fish->date_time)->format('M j, Y') }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">
                                                    {{ $fish->fish_type }}
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-right text-blue-600 dark:text-blue-400">
                                                    {{ $fish->weight }} kg
                                                </td>
                                                <td class="px-4 py-2 whitespace-nowrap text-sm text-right font-medium text-green-600 dark:text-green-400">
                                                    {{ number_format($fish->price, 2) }} SCR
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="px-4 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                                    No catch records for this trip
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                        <button onclick="closeModal({{ $trip->id }})"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-md text-sm font-medium transition-colors duration-200">
                            Close
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
