<div wire:poll.2s wire:listen="tripDeleted" class="overflow-x-auto mt-6">


    <div wire:poll.5s>
        @if ($this->create)
            <button onclick="openCreateTripModal()" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300 text-sm">
                + Create Trip
            </button>
        @endif
    </div>




    <table class="min-w-full bg-white border-collapse text-sm">
        <thead>
            <tr class="bg-gray-200 text-gray-800">
                <th class="p-4 text-left">Trip ID</th>
                @if (Auth::user()->accountsType !="Boat")
                <th class="p-4 text-left">Boat</th>

                @endif


                <th class="p-4 text-left">Departure Location</th>
                <th class="p-4 text-left">Departure Time</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Emergency</th>
                <th class="p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if ($tripb->status !== 'completed') --}}

            @foreach ($trip as $tripb)



            {{-- @if ($tripb->status !== 'completed') --}}

            <tr class="border-b hover:bg-gray-50" wire:key="trip-{{ $tripb->id }}">
                <td class="p-4">{{ $tripb->id }}</td>

                @if (Auth::user()->accountsType !="Boat")
                <td class="p-4">{{ $tripb->boat }}</td>
                @endif

                <td class="p-4">{{ $tripb->departureLocation }}</td>
                <td class="p-4">{{ $tripb->departureTime }}</td>
                <td class="p-4">
                    <select class="select-box" wire:model="trip.{{ $tripb->id }}.status" wire:change="updateTripStatus({{ $tripb->id }}, $event.target.value)">
                        {{-- <option value="completed" class="status-completed" disabled noslect>{{ $tripb->status }}</option> --}}
                        <option selected hidden>{{ $tripb->status }}</option>

                        <option value="Return" class="status-return">Return</option>
                        <option value="Ongoing" class="status-ongoing">Ongoing</option>
                        <option value="Started" class="status-completed">Started</option>
                    </select>
                </td>
                <td class="p-4">
                    <select class="select-box" wire:model="trip.{{ $tripb->id }}.emergency" wire:change="updateEmergency({{ $tripb->id }}, $event.target.value)">
                        <option selected hidden>{{ $tripb->emergency }}</option>
                        <option value="Safe" class="emergency-safe">Safe</option>
                        <option value="Emergency" class="emergency-emergency">Emergency</option>
                    </select>
                </td>
                <td class="p-4">
                    <button wire:click="updateTripStatus({{ $tripb->id }}, 'completed')" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                        Done
                    </button>
                    @if (Auth::user()->accountsType !="Boat")
                    {{-- <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</button> --}}
                    <button wire:click="deleteTrip({{ $tripb->id }})" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                    @endif

                </td>
            </tr>

            </td>


            {{-- @endif --}}
            @endforeach

        </tbody>


    </table>
    <hr class="border-gray-700 my-7">
    <h2 class="text-xl font-bold">{{ __('Completed Trips') }}</h2>
    <table class="min-w-full bg-white border-collapse text-sm">
        <tbody>
            <tr>
                <th class="p-4 text-left">Trip ID</th>
                {{-- <th class="p-4 text-left">Departure Location</th> --}}
                <th class="p-4 text-left">Departure Time</th>
                <th class="p-4 text-left">Arrival Time</th>
                <th class="p-4 text-left">Late Time</th>
                <th class="p-4 text-left">Fishing Days</th>
                <th class="p-4 text-left">Emergency Status</th>
                <th class="p-4 text-left">Status</th>
            </tr>
            @foreach ($tripComlted as $tripb)


            <tr class="border-b hover:bg-gray-50" wire:key="trip-{{ $tripb->id }}">
                <td class="p-4">{{ $tripb->id }}</td>

                @if (Auth::user()->accountsType !="Boat")
                <td class="p-4">{{ $tripb->boat }}</td>
                @endif

                {{-- <td class="p-4">{{ $tripb->departureLocation }}</td> --}}
                <td class="p-4">{{ $tripb->departureTime }}</td>
                <td class="p-4">{{ $tripb->updated_at }}</td>
                {{-- <td class="p-4">{{ $tripb->status }}</td> --}}
                <td class="p-4">{{ $tripb->emergency }}</td>
                <td class="p-4 justify-centerv text-center"><p class="bg-blue-500 justify-center text-white  py-2 rounded-md">Completed</p>
                </td>
            </tr>

            </td>


            {{-- @endif --}}
            @endforeach
        </tbody>
    </table>

</div>
