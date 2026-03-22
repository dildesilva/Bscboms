<div>
    {{-- <div class="shadow-lg justify-center rounded-xl p-2 mb-2 flex space-x-6">
        <button onclick="openDiv('active')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border border-transparent hover:bg-[#e64a4a] transition-all transform hover:scale-105">Active trips</button>
        <button onclick="openDiv('awaiting')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border border-transparent hover:bg-[#e64a4a] transition-all transform hover:scale-105">Awaiting boats</button>
        <button onclick="openDiv('scheduled')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border border-transparent hover:bg-[#e64a4a] transition-all transform hover:scale-105">Scheduled trips</button>
        <button onclick="openDiv('emergency')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border border-transparent hover:bg-[#e64a4a] transition-all transform hover:scale-105">Emergency trips</button>
        <button onclick="openDiv('completed')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border border-transparent hover:bg-[#e64a4a] transition-all transform hover:scale-105">Completed trips</button>
    </div> --}}


    <div>
        <!-- Buttons for Tabs -->
        <div class="shadow-lg justify-center rounded-xl p-2 mb-2 flex space-x-6">
            <button wire:click="$set('activeTab', 'active')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border hover:bg-[#e64a4a] transition-all transform hover:scale-105">Active trips</button>
            <button wire:click="$set('activeTab', 'awaiting')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border hover:bg-[#e64a4a] transition-all transform hover:scale-105">Awaiting boats</button>
            <button wire:click="$set('activeTab', 'scheduled')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border hover:bg-[#e64a4a] transition-all transform hover:scale-105">Scheduled trips</button>
            <button wire:click="$set('activeTab', 'emergency')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border hover:bg-[#e64a4a] transition-all transform hover:scale-105">Emergency trips</button>
            <button wire:click="$set('activeTab', 'completed')" class="bg-[#4e3a3a] text-white px-5 py-2 rounded-md border hover:bg-[#e64a4a] transition-all transform hover:scale-105">Completed trips</button>
        </div>

        <!-- Trip Data -->
        <div wire:poll.2s> <!-- Only this section refreshes every 10s -->
            @if ($activeTab == 'active')
            <div id="active" class="bg-[#deccff]  shadow-md rounded-lg p-4 mb-8">
                <h2 class="text-xl font-semibold text-blue-700 mb-4">Active Fishing Trips</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-200 text-left">
                            <tr>
                                <th class="py-2 px-4 border">Boat Name</th>
                                <th class="py-2 px-4 border">Departure Date</th>
                                <th class="py-2 px-4 border">Planned Return</th>
                                <th class="py-2 px-4 border">Fishing Days</th>
                                <th class="py-2 px-4 border">Status</th>
                                <th class="py-2 px-4 border">Emergency</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tripsongoing as $count )
                            <tr class="text-gray-700">
                                <td  class="py-2 px-4 border">{{ $count->boat}}</td>
                                <td class="py-2 px-4 border">{{ $count->departureTime }}</td>
                                <td class="py-2 px-4 border">{{ $count->id }}</td>
                                <td class="py-2 px-4 border">{{ $count->duringDays }}</td>
                                <td  class="py-2 px-4 border">{{ $count->status }}</td>
                                <td class="py-2 px-4 border">{{ $count->emergency }}</td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
            @elseif ($activeTab == 'awaiting')
            {{-- <div wire:loading>Loading trips...</div>  --}}
            <div id="awaiting" class="bg-[#9cf7a0]  shadow-md rounded-lg p-4 mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Awaiting</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-200 text-left">
                            <tr>
                                <th class="py-2 px-4 border">Boat Name</th>
                                <th class="py-2 px-4 border">Departure Date</th>
                                <th class="py-2 px-4 border">Planned Return</th>
                                <th class="py-2 px-4 border">Fishing Days</th>
                                <th class="py-2 px-4 border">Emergency</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($awiting as $count )
                            <tr class="text-gray-700">
                                <td class="py-2 px-4 border">{{ $count->boat }}</td>
                                <td class="py-2 px-4 border">{{ $count->departureTime }}</td>
                                <td class="py-2 px-4 border">{{ $count->id }}</td>
                                <td class="py-2 px-4 border">{{ $count->duringDays }}</td>
                                <td class="py-2 px-4 border">{{ $count->emergency }}</td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
                {{-- @include('livewire.partials.trips-table', ['trips' => $awaiting, 'title' => 'Awaiting Boats']) --}}
            @elseif ($activeTab == 'scheduled')
                <div id="scheduled" class="bg-[#fffa92]  shadow-md rounded-lg p-4 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">scheduled</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-left">
                    <tr>
                        <th class="py-2 px-4 border">Boat Name</th>
                        <th class="py-2 px-4 border">Departure Date</th>
                        <th class="py-2 px-4 border">Planned Return</th>
                        {{-- <th class="py-2 px-4 border">Fishing Days</th> --}}
                        {{-- <th class="py-2 px-4 border">Emergency</th> --}}
                    </tr>
                </thead>
                <tbody>

                    @foreach ($scheduled as $count )
                    <tr class="text-gray-700">
                        <td class="py-2 px-4 border">{{ $count->boat }}</td>
                        <td class="py-2 px-4 border">{{ $count->departureTime }}</td>
                        <td class="py-2 px-4 border">{{ $count->id }}</td>
                        {{-- <td class="py-2 px-4 border">{{ $count->duringDays }}</td> --}}
                        {{-- <td class="py-2 px-4 border">{{ $count->emergency }}</td> --}}

                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
    @elseif ($activeTab == 'emergency')
    <div id="emergency" class="bg-[#fffa92]  shadow-md rounded-lg p-4 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">emergency</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-left">
                    <tr>
                        <th class="py-2 px-4 border">Boat Name</th>
                        <th class="py-2 px-4 border">Departure Date</th>
                        <th class="py-2 px-4 border">Planned Return</th>
                        <th class="py-2 px-4 border">Fishing Days</th>
                        <th class="py-2 px-4 border">Emergency</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($emergency as $count )
                    <tr class="text-gray-700">
                        <td class="py-2 px-4 border">{{ $count->boat }}</td>
                        <td class="py-2 px-4 border">{{ $count->departureTime }}</td>
                        <td class="py-2 px-4 border">{{ $count->id }}</td>
                        <td class="py-2 px-4 border">{{ $count->duringDays }}</td>
                        <td class="py-2 px-4 border">{{ $count->emergency }}</td>

                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
    @elseif ($activeTab == 'completed')
    <div id="completed" class="bg-[#fffa92]  shadow-md rounded-lg p-4 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">completed</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-left">
                    <tr>
                        <th class="py-2 px-4 border">Boat Name</th>
                        <th class="py-2 px-4 border">Departure Date</th>
                        <th class="py-2 px-4 border">Planned Return</th>
                        <th class="py-2 px-4 border">Fishing Days</th>
                        <th class="py-2 px-4 border">Emergency</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($completed as $count )
                    <tr class="text-gray-700">
                        <td class="py-2 px-4 border">{{ $count->boat }}</td>
                        <td class="py-2 px-4 border">{{ $count->departureTime }}</td>
                        <td class="py-2 px-4 border">{{ $count->id }}</td>
                        <td class="py-2 px-4 border">{{ $count->duringDays }}</td>
                        <td class="py-2 px-4 border">{{ $count->emergency }}</td>

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
// JavaScript function to open the corresponding div
function openDiv(divId) {
    // Hide all divs
    const divs = document.querySelectorAll('[id]');
    divs.forEach(div => {
        div.classList.add('hidden');
    });

    // Show the selected div
    const selectedDiv = document.getElementById(divId);
    selectedDiv.classList.remove('hidden');
}
</script>
