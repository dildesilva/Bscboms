<div class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-200 animate-fadeIn">
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Boat Management Dashboard</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Monitor and manage fleet operations</p>
            </div>

            <!-- Tab Navigation -->
            <div class="flex flex-wrap gap-2">
                <button wire:click="$set('activeTab', 'active')"
                    class="px-4 py-2 rounded-md transition-all font-medium text-sm flex items-center
                    {{ $activeTab === 'active' ?
                       'bg-blue-600 text-white shadow-md' :
                       'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <i class="bi bi-grid-fill mr-2 text-xs"></i> All Boats
                </button>

                <button wire:click="$set('activeTab', 'viewAvailableBoats')"
                    class="px-4 py-2 rounded-md transition-all font-medium text-sm flex items-center
                    {{ $activeTab === 'viewAvailableBoats' ?
                       'bg-green-600 text-white shadow-md' :
                       'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <i class="bi bi-check-circle-fill mr-2 text-xs"></i> Available
                </button>

                <button wire:click="$set('activeTab', 'awiting')"
                    class="px-4 py-2 rounded-md transition-all font-medium text-sm flex items-center
                    {{ $activeTab === 'awiting' ?
                       'bg-amber-600 text-white shadow-md' :
                       'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <i class="bi bi-hourglass-split mr-2 text-xs"></i> Awaiting
                </button>

                <button wire:click="$set('activeTab', 'openUpdateSection')"
                    class="px-4 py-2 rounded-md transition-all font-medium text-sm flex items-center
                    {{ $activeTab === 'openUpdateSection' ?
                       'bg-indigo-600 text-white shadow-md' :
                       'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                    <i class="bi bi-pencil-square mr-2 text-xs"></i> Update
                </button>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            @if ($activeTab == 'active')
            <!-- All Boats Grid -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Fleet Overview</h2>
                    {{-- <div class="relative w-64">
                        <input type="text" placeholder="Search boats..."
                            class="w-full pl-9 pr-4 py-2 text-sm border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                        <i class="bi bi-search absolute left-3 top-2.5 text-gray-400 dark:text-gray-500 text-sm"></i>
                    </div> --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse ($allBoat as $countBoat)
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden shadow-xs hover:shadow-md transition-shadow duration-200">
                        <!-- Boat Image Header -->
                        <div class="relative h-32 bg-gradient-to-r from-blue-500 to-blue-700 overflow-hidden">
                            {{-- <img src="{{ asset('profiles/' . $profilePath) }}" alt="Boat" class="w-full h-full object-cover opacity-70"> --}}

                            <img src="{{ asset('storage/profiles/' . $countBoat->accountDP) }}" alt="Boat" class="w-full h-full object-cover opacity-70">

                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-white font-medium text-lg">{{ $countBoat->boat->boatName ?? 'Unregistered' }}</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                @if ($countBoat->boat)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full flex items-center">
                                    <i class="bi bi-patch-check-fill mr-1 text-blue-500"></i> Verified
                                </span>
                                @else
                                <span class="bg-amber-100 text-amber-800 text-xs font-medium px-2.5 py-0.5 rounded-full flex items-center">
                                    <i class="bi bi-hourglass-split mr-1 text-amber-500"></i> Pending
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Boat Details -->
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="font-medium text-gray-800 dark:text-white">{{ $countBoat->name }}</h3>
                                <span class="text-xs px-2 py-1 rounded bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                    {{ $countBoat->accountsType }}
                                </span>
                            </div>

                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Contact:</span>
                                    <span class="text-gray-800 dark:text-white">{{ $countBoat->contactnumber ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Email:</span>
                                    <span class="{{ $countBoat->email_verified_at ? 'text-green-600 dark:text-green-400' : 'text-amber-600 dark:text-amber-400' }}">
                                        {{ $countBoat->email_verified_at ? 'Verified' : 'Unverified' }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Registered:</span>
                                    <span class="text-gray-800 dark:text-white">{{ $countBoat->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>

                            @if ($countBoat->boat)
                            <button onclick="openModal({{ $countBoat->id }})"
                                class="mt-4 w-full py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-md text-sm font-medium transition-colors duration-200 flex items-center justify-center">
                                <i class="bi bi-eye-fill mr-2"></i> View Details
                            </button>

                            <!-- Modal -->
                            <div id="modal-{{ $countBoat->id }}" class="fixed inset-0 z-50 hidden bg-black/30 flex items-center justify-center p-4 backdrop-blur-sm">
                                <div class="bg-white dark:bg-gray-800 w-full max-w-3xl rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                                    <div class="flex justify-between items-center p-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white flex items-center">
                                            <i class="bi bi-info-circle-fill mr-2 text-blue-500"></i>
                                            Boat Specifications
                                        </h3>
                                        <button onclick="closeModal({{ $countBoat->id }})" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                            <i class="bi bi-x-lg text-lg"></i>
                                        </button>
                                    </div>

                                    <div class="p-6">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Boat Name</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->boatName ?? 'N/A' }}</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Registration Number</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->registrationNumber ?? 'N/A' }}</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Hull Identification</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->hullId ?? 'N/A' }}</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Year Built</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->year ?? 'N/A' }}</p>
                                                </div>
                                            </div>

                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Vessel Length</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->length ?? 'N/A' }} ft</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Engine Configuration</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->engineType ?? 'N/A' }}</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Engine Power</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->enginePower ?? 'N/A' }} HP</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Maximum Crew</label>
                                                    <p class="text-gray-800 dark:text-white font-medium">{{ $countBoat->boat->maxCrew ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                                        <button onclick="closeModal({{ $countBoat->id }})"
                                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-md text-sm font-medium transition-colors duration-200">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-span-3 py-12 text-center">
                        <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                            <i class="bi bi-slash-circle text-3xl text-gray-400 dark:text-gray-500"></i>
                        </div>
                        <h4 class="text-lg font-medium text-gray-800 dark:text-white mb-1">No vessels found</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">There are currently no boats registered in the system</p>
                    </div>
                    @endforelse
                </div>
            </div>

            @elseif ($activeTab == 'viewAvailableBoats')
            <livewire:admin-available-boats />

            @elseif ($activeTab == 'awiting')
            <!-- Awaiting Boats Table -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Awaiting Vessels</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Boats currently at sea or pending return</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <select class="appearance-none pl-3 pr-8 py-2 text-sm border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                                <option>All Statuses</option>
                                <option>At Sea</option>
                                <option>Delayed</option>
                                <option>Emergency</option>
                            </select>
                            <i class="bi bi-chevron-down absolute right-3 top-2.5 text-gray-400 pointer-events-none"></i>
                        </div>
                        <button class="px-3 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg text-gray-700 dark:text-gray-300">
                            <i class="bi bi-funnel-fill text-sm"></i>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Vessel</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Departure</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Est. Return</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Days Out</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($awiting as $count)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                                            <i class="bi bi-boat text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $count->boat }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $count->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">{{ $count->departureTime }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">On schedule</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">{{ $count->departureTime }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $count->duringDays > 7 ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' : 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' }}">
                                        {{ $count->duringDays }} days
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($count->emergency)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 flex items-center">
                                        <i class="bi bi-exclamation-triangle-fill mr-1"></i> Emergency
                                    </span>
                                    @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                        Normal
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 mr-3">
                                        <i class="bi bi-telephone-fill"></i>
                                    </button>
                                    <button class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif ($activeTab == 'openUpdateSection')
            <!-- Boat Editor -->
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Boat Registry Editor</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Update vessel specifications and details</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                        <div class="relative flex-grow">
                            <input type="text" wire:model="search" placeholder="Search registry..."
                                class="w-full pl-9 pr-4 py-2 text-sm border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                            <i class="bi bi-search absolute left-3 top-2.5 text-gray-400 dark:text-gray-500 text-sm"></i>
                        </div>
                        <button wire:click="applySearch"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center whitespace-nowrap">
                            <i class="bi bi-funnel-fill mr-2"></i> Apply Filters
                        </button>
                    </div>
                </div>

                @if (session()->has('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                    class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg flex items-start">
                    <div class="flex-shrink-0">
                        <i class="bi bi-check-circle-fill text-green-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Update successful</h3>
                        <p class="text-sm text-green-700 dark:text-green-300 mt-1">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                <div wire:loading class="mb-4 p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-sm text-blue-800 dark:text-blue-200">Processing registry updates...</span>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-xs">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Boat Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Registration</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Hull ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Specifications</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Last Updated</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($boats as $boat)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    #{{ $boat->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="text"
                                        class="w-full px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                        value="{{ $boat->boatName }}"
                                        wire:change="updateBoat({{ $boat->id }}, 'boatName', $event.target.value)">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="text"
                                        class="w-full px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                        value="{{ $boat->registrationNumber }}"
                                        wire:change="updateBoat({{ $boat->id }}, 'registrationNumber', $event.target.value)">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="text"
                                        class="w-full px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                        value="{{ $boat->hullId }}"
                                        wire:change="updateBoat({{ $boat->id }}, 'hullId', $event.target.value)">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="text"
                                            class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                            placeholder="Year"
                                            value="{{ $boat->year }}"
                                            wire:change="updateBoat({{ $boat->id }}, 'year', $event.target.value)">

                                        <input type="text"
                                            class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                            placeholder="Length"
                                            value="{{ $boat->length }}"
                                            wire:change="updateBoat({{ $boat->id }}, 'length', $event.target.value)">

                                        <input type="text"
                                            class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                            placeholder="Engine"
                                            value="{{ $boat->engineType }}"
                                            wire:change="updateBoat({{ $boat->id }}, 'engineType', $event.target.value)">

                                        <input type="text"
                                            class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                            placeholder="Power"
                                            value="{{ $boat->enginePower }}"
                                            wire:change="updateBoat({{ $boat->id }}, 'enginePower', $event.target.value)">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $boat->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
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
