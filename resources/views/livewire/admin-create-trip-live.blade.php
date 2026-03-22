<div class="animate-fadeIn bg-gray-50 dark:bg-gray-900 min-h-screen p-4 md:p-6 transition-colors duration-200">

    <!-- Header -->
   <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <!-- Title with tech glow effect -->
    <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600 drop-shadow-lg">
        Trip Management
    </h1>

    <!-- Tab buttons with glass morphism -->
    <div class="flex space-x-4 bg-white/10 backdrop-blur-md rounded-xl p-1 border border-white/20 shadow-lg shadow-blue-500/10">
        <button
            wire:click="changeTab('active')"
            class="px-6 py-2 rounded-lg transition-all duration-300
                   {{ $activeTab === 'active' ?
                      'bg-gradient-to-r from-red-500/80 to-red-600/80 text-white shadow-inner shadow-red-900/30' :
                      'bg-transparent text-white/70 hover:text-white hover:bg-white/5' }}"
        >
            Ongoing
        </button>
        <button
            wire:click="changeTab('completed')"
            class="px-6 py-2 rounded-lg transition-all duration-300
                   {{ $activeTab === 'completed' ?
                      'bg-gradient-to-r from-green-500/80 to-green-600/80 text-white shadow-inner shadow-green-900/30' :
                      'bg-transparent text-white/70 hover:text-white hover:bg-white/5' }}"
        >
            Completed
        </button>
    </div>

    <!-- Create button with glass and hover effects -->
    <button
        wire:click="$set('showCreateForm', true)"
        class="bg-gradient-to-r from-blue-500/90 to-blue-600/90 text-white px-6 py-3 rounded-xl
               shadow-lg hover:shadow-xl transition-all duration-300 flex items-center
               border border-blue-400/30 hover:border-blue-400/50
               hover:bg-gradient-to-r hover:from-blue-400/90 hover:to-blue-500/90
               active:scale-95 group"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:rotate-90 transition-transform" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Create New Trip
    </button>
</div>
   @if ($activeTab == 'active')

<div class="bg-white/5 rounded-lg border border-white/10 shadow-xl overflow-hidden mb-8 glass-tech-panel">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-white/10">
            <thead class="bg-blue-900/30">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">TRIP ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">DEPARTURE</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">VESSEL</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">STATUS</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 text-center uppercase tracking-wider">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @foreach($trips as $trip)
                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">#{{ $trip->id }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-blue-100">
                        <div class="font-medium">{{ $trip->departureLocation }}</div>
                        <div class="text-xs text-blue-300/80">
                            {{ \Carbon\Carbon::parse($trip->departureTime)->format('Y-m-d H:i') }}
                        </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-blue-100">{{ $trip->boat }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-4 font-medium rounded-full
                            {{ $trip->status === 'completed' ? 'bg-green-900/30 text-green-300 border border-green-400/20' :
                               'bg-blue-900/30 text-blue-300 border border-blue-400/20' }}">
                            {{ ucfirst($trip->status) }}
                        </span>
                    </td>
                   <td class="px-4 py-3 whitespace-nowrap text-sm">
    <div class="flex justify-center space-x-2">
        <button wire:click="crew({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-200 rounded border border-blue-400/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            Crew
        </button>


        <button wire:click="addFish({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-teal-600/20 hover:bg-teal-600/30 text-teal-200 rounded border border-teal-400/30 transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
            </svg>
            <span class="group-hover:text-teal-100">Catch</span>
        </button>
     <button wire:click="addExpenses({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-purple-600/20 hover:bg-purple-600/30 text-purple-200 rounded border border-purple-400/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
            </svg>
            Expenses
        </button>

        <button wire:click="completeTrip({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-yellow-600/20 hover:bg-yellow-600/30 text-yellow-200 rounded border border-yellow-400/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Complete
        </button>
    </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    @elseif ($activeTab == 'completed')
{{-- </div> --}}

<div class="bg-white/5 rounded-lg border border-white/10 shadow-xl overflow-hidden mb-8 glass-tech-panel">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-white/10">
            <thead class="bg-blue-900/30">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">TRIP ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">DEPARTURE</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">VESSEL</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">STATUS</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-blue-300 text-center uppercase tracking-wider">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
                @foreach($intrips as $trip)
                <tr class="hover:bg-blue-900/10 transition-colors">
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">#{{ $trip->id }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-blue-100">
                        <div class="font-medium">{{ $trip->departureLocation }}</div>
                        <div class="text-xs text-blue-300/80">
                            {{ \Carbon\Carbon::parse($trip->departureTime)->format('Y-m-d H:i') }}
                        </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-blue-100">{{ $trip->boat }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-4 font-medium rounded-full
                            {{ $trip->status === 'completed' ? 'bg-green-900/30 text-green-300 border border-green-400/20' :
                               'bg-blue-900/30 text-blue-300 border border-blue-400/20' }}">
                            {{ ucfirst($trip->status) }}
                        </span>
                    </td>
                   <td class="px-4 py-3 whitespace-nowrap text-sm">
    <div class="flex justify-center space-x-2">
        {{-- <button wire:click="crew({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-200 rounded border border-blue-400/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            Crew
        </button> --}}


        <button wire:click="addFish({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-teal-600/20 hover:bg-teal-600/30 text-teal-200 rounded border border-teal-400/30 transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 group-hover:animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
            </svg>
            <span class="group-hover:text-teal-100">Catch</span>
        </button>
     <button wire:click="addExpenses({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-purple-600/20 hover:bg-purple-600/30 text-purple-200 rounded border border-purple-400/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
            </svg>
            Expenses
        </button>

        {{-- <button wire:click="completeTrip({{ $trip->id }})"
                class="flex items-center text-xs px-2.5 py-1.5 bg-yellow-600/20 hover:bg-yellow-600/30 text-yellow-200 rounded border border-yellow-400/30 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Complete
        </button> --}}
    </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    @endif
  <!-- Create Trip Modal -->
@if($showCreateForm)
<div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center p-4 z-50">
    <div class="bg-white/5 border border-white/10 rounded-lg shadow-xl w-full max-w-md glass-tech-panel">
        <div class="px-5 py-3 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-sm font-medium text-white tracking-widest uppercase">New Trip Log</h3>
            <button wire:click="$set('showCreateForm', false)" class="text-blue-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div class="p-5">
            @if (session()->has('message'))
            <div class="mb-4 px-3 py-2 bg-blue-500/20 text-blue-100 text-xs rounded border border-blue-400/30">
                {{ session('message') }}
            </div>
            @endif

            <form wire:submit.prevent="createTrip" class="space-y-4">
                <div class="grid grid-cols-1 gap-3">
                    <div>
                        <label class="text-xs font-medium text-blue-300 mb-1 block">DEPARTURE LOCATION</label>
                        <input wire:model="departureLocation" type="text"
                               class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400 placeholder-blue-300/50"
                               placeholder="Enter coordinates"/>
                        @error('departureLocation') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">DEPARTURE TIME</label>
                            <input wire:model="departureTime" type="datetime-local"
                                   class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400"/>
                            @error('departureTime') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">PLANNED ARRIVAL TIME</label>
                            <input wire:model="plannedArrivalTime" type="datetime-local"
                                   class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400"/>
                            @error('plannedArrivalTime') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>

                        {{-- <label class="text-xs font-medium text-blue-300 mb-1 block">BOAT</label>
                        <input wire:model="boat" type="text"
                               class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400 placeholder-blue-300/50"/>
                        @error('boat') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror --}}


                     <label class="text-xs font-medium text-blue-300 mb-1 block">BOAT</label>
                            <select wire:model="boat" class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-[#0d277b]  focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                                <option value="">-- Select --</option>
@foreach ($usersBoat as $data )
 <option value="{{ $data->name }}">{{ $data->name }}</option>
@endforeach


                            </select>
                            @error('boat') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror


                    </div>

                    <div>

{{--
                        <label class="text-xs font-medium text-blue-300 mb-1 block">BOAT EMAIL</label>
                        <input wire:model="boaTemail" type="email"
                               class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400 placeholder-blue-300/50"/>
                        @error('boaTemail') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror --}}



                     <label class="text-xs font-medium text-blue-300 mb-1 block">BOAT EMAIL</label>
                            <select wire:model="boaTemail" class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-[#0d277b] focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                                <option value="">-- Select --</option>

                           @foreach ($usersBoat as $data )
 <option value="{{ $data->email }}">Email : {{ $data->name }}</option>
@endforeach

                            </select>
                            @error('boaTemail') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror



                    </div>

                    <div class="grid grid-cols-2 gap-3 hidden">
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">STATUS</label>
                            <select wire:model="status" class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                                <option value="">-- Select --</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                            </select>
                            @error('status') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">EMERGENCY</label>
                            <select wire:model="emergency" class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                                <option value="">-- Select --</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                            @error('emergency') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" wire:click="$set('showCreateForm', false)"
                            class="px-4 py-1.5 text-xs border border-white/10 rounded text-blue-300 hover:bg-white/5">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-1.5 text-xs bg-blue-600 rounded text-white hover:bg-blue-500 shadow-blue-500/50 hover:shadow-md">
                        Confirm Log
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<!-- Add Fish Modal -->
@if($showFishForm)
<div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center p-4 z-50">
    <div class="bg-white/5 border border-white/10 rounded-lg shadow-xl w-full max-w-md glass-tech-panel">
        <div class="px-5 py-3 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-sm font-medium text-white tracking-widest uppercase">Catch Report #{{ $selectedTripId }}</h3>
            <button wire:click="$set('showFishForm', false)" class="text-blue-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="p-5">
            @if (session()->has('message'))
    <div class="mb-3 text-sm text-green-400 bg-green-700/10 px-3 py-2 rounded border border-green-500/30">
        {{ session('message') }}
    </div>
@endif

          <form wire:submit.prevent="saveFishCatch" class="space-y-4">
    <div class="grid grid-cols-2 gap-3">
        <!-- Fish Species -->
        <div>
            <label class="text-xs font-medium text-blue-300 mb-1 block">SPECIES</label>
            <select class="select-box w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm text-[#101077] focus:ring-1 focus:ring-blue-400 focus:border-blue-400" wire:model="fishSpecies">
                <option value="" hidden>Select Fish Type</option>
                <option value="Red Snapper (Bourzwa)">Red Snapper (Bourzwa)</option>
                <option value="Yellowfin Tuna">Yellowfin Tuna</option>
                <option value="Jobfish (Vielle Capitaine)">Jobfish (Vielle Capitaine)</option>
                <option value="Grouper (Vielle)">Grouper (Vielle)</option>
                <option value="Trevally (Karangue)">Trevally (Karangue)</option>
                <option value="Parrotfish (Kakatwa)">Parrotfish (Kakatwa)</option>
                <option value="Emperor Fish (Capitaine)">Emperor Fish (Capitaine)</option>
                <option value="Barracuda (Bek)">Barracuda (Bek)</option>
                <option value="Prawns (Isso)">Prawns (Isso)</option>
                <option value="Lobster (Sandyen / Dongo)">Lobster (Sandyen / Dongo)</option>
                <option value="Squid (Calmar/Dallo)">Squid (Calmar/Dallo)</option>
                <option value="Octopus (Zourit)">Octopus (Zourit)</option>
                <option value="Other">Other</option>
            </select>
            @error('fishSpecies') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Fish Weight -->
        <div>
            <label class="text-xs font-medium text-blue-300 mb-1 block">WEIGHT (kg)</label>
            <input wire:model="fishWeight" type="number" step="0.01" class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm  text-[#101077]e focus:ring-1 focus:ring-blue-400 focus:border-blue-400"/>
            @error('fishWeight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Fish Quantity -->
        <div>
            <label class="text-xs font-medium text-blue-300 mb-1 block">QUANTITY</label>
            <input wire:model="fishQuantity" type="number" class="w-full bg-white/5 border border-white/10 rounded px-3 py-2 text-sm  text-[#101077] focus:ring-1 focus:ring-blue-400 focus:border-blue-400"/>
            @error('fishQuantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-2 pt-2">
        <button type="button" wire:click="$set('showFishForm', false)"
                class="px-4 py-1.5 text-xs border border-white/10 rounded text-blue-300 hover:bg-white/5">
            Cancel
        </button>
        <button type="submit"
                class="px-4 py-1.5 text-xs bg-blue-600 rounded text-white hover:bg-blue-500 shadow-blue-500/50 hover:shadow-md">
            Log Catch
        </button>
    </div>
</form>

        </div>
    </div>
</div>
@endif

<!-- Add Expenses Modal -->
@if($showExpensesForm)
<div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center p-4 z-50">
    <div class="bg-white/5 border border-white/10 rounded-lg shadow-xl w-full max-w-md glass-tech-panel">
        <div class="px-5 py-3 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-sm font-medium text-white tracking-widest uppercase">Expense Ledger #{{ $selectedTripId }}</h3>
            <button wire:click="$set('showExpensesForm', false)" class="text-blue-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="p-5">
            <form wire:submit.prevent="saveExpenses" class="space-y-4">
                <div class="space-y-3">
                    @foreach($expenses as $index => $expense)
                    <div class="grid grid-cols-5 gap-2 items-end border-b border-white/5 pb-3">
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">DATE</label>
                            <input type="datetime-local" wire:model="expenses.{{ $index }}.date_time" class="w-full bg-white/5 border border-white/10 rounded px-2 py-1.5 text-xs text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">DESC</label>
                            <input type="text" wire:model="expenses.{{ $index }}.description" class="w-full bg-white/5 border border-white/10 rounded px-2 py-1.5 text-xs text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">QTY</label>
                            <input type="number" wire:model="expenses.{{ $index }}.quantity" class="w-full bg-white/5 border border-white/10 rounded px-2 py-1.5 text-xs text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-blue-300 mb-1 block">UNIT</label>
                            <input type="text" wire:model="expenses.{{ $index }}.unit" class="w-full bg-white/5 border border-white/10 rounded px-2 py-1.5 text-xs text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                        </div>
                        <div class="flex items-center space-x-1">
                            <div class="flex-1">
                                <label class="text-xs font-medium text-blue-300 mb-1 block">AMT</label>
                                <input type="number" wire:model="expenses.{{ $index }}.amount" class="w-full bg-white/5 border border-white/10 rounded px-2 py-1.5 text-xs text-white focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                            </div>
                            <button type="button" wire:click="removeExpense({{ $index }})" class="text-red-400 hover:text-red-300 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button type="button" wire:click="addExpense" class="flex items-center text-xs text-blue-300 hover:text-blue-200 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Line Item
                </button>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" wire:click="$set('showExpensesForm', false)"
                            class="px-4 py-1.5 text-xs border border-white/10 rounded text-blue-300 hover:bg-white/5">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-1.5 text-xs bg-blue-600 rounded text-white hover:bg-blue-500 shadow-blue-500/50 hover:shadow-md">
                        Post Expenses
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif




<!-- Crew Management Modal -->
@if($showCrewForm)
<div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center p-4 z-50">
    <div class="bg-white/5 border border-white/10 rounded-lg shadow-xl w-full max-w-md glass-tech-panel">
        <div class="px-5 py-3 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-sm font-medium text-white tracking-widest uppercase">Manage Crew #{{ $selectedTripId }}</h3>
            <button wire:click="$set('showCrewForm', false)" class="text-blue-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="p-5">
            @if (session()->has('message'))
            <div class="mb-4 px-3 py-2 bg-blue-500/20 text-blue-100 text-xs rounded border border-blue-400/30">
                {{ session('message') }}
            </div>
            @endif

            <form wire:submit.prevent="saveCrew" class="space-y-4">
                <div class="space-y-3">
                    @foreach($tripMembers as $index => $member)
                    <div class="grid grid-cols-5  items-end border-b border-white/5 pb-3">
                        <div class="col-span-4">
                            <label class="text-xs font-medium text-blue-300 mb-1 block">CREW MEMBER EMAIL</label>
                            <select wire:model="tripMembers.{{ $index }}.email" class="w-full bg-[#0a1a46] border border-white/10 rounded px-3 py-2 text-sm text-[#ffd059] focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                                <option value="">Select Crew Member</option>
                                @foreach($inactiveUsers as $user)
                                    <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="flex justify-end">
                            <button type="button" wire:click="removeMember({{ $index }})" class="text-red-400 hover:text-red-300 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div> --}}
                    </div>
                    @endforeach
                </div>

                <button type="button" wire:click="addMember" class="flex items-center text-xs text-blue-300 hover:text-blue-200 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Crew Member
                </button>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" wire:click="$set('showCrewForm', false)"
                            class="px-4 py-1.5 text-xs border border-white/10 rounded text-blue-300 hover:bg-white/5">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-1.5 text-xs bg-blue-600 rounded text-white hover:bg-blue-500 shadow-blue-500/50 hover:shadow-md">
                        Save Crew
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif







<style>
    .glass-tech-panel {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 4px 20px rgba(0, 100, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        filter: invert(0.7) brightness(1.5) sepia(1) hue-rotate(180deg) saturate(5);
    }

    input, select {
        font-family: 'Courier New', monospace;
        font-size: 0.75rem;
    }

    .shadow-blue-500/50 {
        box-shadow: 0 2px 8px -1px rgba(59, 130, 246, 0.5);
    }
</style>
</div>



