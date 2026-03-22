<div wire:poll.2s>
    <div class="bg-[#f0fdf4] w-[95%] m-auto min-h-[400px] rounded-xl shadow-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

        @forelse ($allBoat as $countBoat)
            <div
                x-data="{ showMore: false }"
                class="bg-[#b6b6b6] p-4 rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex flex-col items-center text-gray-800"
            >

            
                <!-- Profile -->
                <div class="w-[90%] rounded-md h-24 overflow-hidden mb-3">
                    <img src="{{ asset('image/optimized_image.webp') }}" alt="Profile" class="w-full h-full">
                </div>

                <!-- Basic Info -->
                <h2 class="text-lg font-bold">{{ $countBoat->name }}</h2>
                <p class="text-sm text-gray-500 mb-1">Account Type: {{ $countBoat->accountsType }}</p>
                <p class="text-sm mb-1 font-medium">Boat Name: {{ $countBoat->boat->boatName ?? 'Not Verified Boat' }}</p>
                <p class="text-sm mb-1">Contact: {{ $countBoat->contactnumber ?? 'N/A' }}</p>
                <p class="text-sm mb-1">
                    Email:
                    <span class="{{ $countBoat->email_verified_at ? 'text-green-600' : 'text-red-500' }}">
                        {{ $countBoat->email }} ({{ $countBoat->email_verified_at ? 'Verified' : 'Unverified' }})
                    </span>
                </p>
                <p class="text-xs text-gray-400 mt-2">Created at: {{ $countBoat->created_at->format('Y-m-d') }}</p>

                <!-- Toggle Button -->
                @if ($countBoat->boat)
                    <button
                        @click="showMore = !showMore"
                        class="mt-3 px-4 py-1 bg-[#396d05] text-white rounded-md text-sm hover:bg-[#2f5904] transition"
                    >
                        <span x-text="showMore ? 'Hide Details' : 'View More'"></span>
                    </button>

                    <!-- Hidden Boat Info -->
                    <div x-show="showMore" x-transition class="mt-4 w-full text-left bg-gray-50 p-3 rounded-md text-sm">
                        <h3 class="text-gray-700 font-semibold mb-1">Boat Details</h3>
                        <p>Registration No: {{ $countBoat->boat->registrationNumber ?? 'N/A' }}</p>
                        <p>Hull ID: {{ $countBoat->boat->hullId ?? 'N/A' }}</p>
                        <p>Year: {{ $countBoat->boat->year ?? 'N/A' }}</p>
                        <p>Length: {{ $countBoat->boat->length ?? 'N/A' }} ft</p>
                        <p>Engine Type: {{ $countBoat->boat->engineType ?? 'N/A' }}</p>
                        <p>Engine Power: {{ $countBoat->boat->enginePower ?? 'N/A' }} HP</p>
                        <p>Fishing Method: {{ $countBoat->boat->fishingMethod ?? 'N/A' }}</p>
                        <p>Max Crew: {{ $countBoat->boat->maxCrew ?? 'N/A' }}</p>
                        <p>Boat ID: {{ $countBoat->boat->boatId ?? 'N/A' }}</p>
                    </div>
                @endif
            </div>

        @empty
            <div class="col-span-3 text-center text-gray-600">No Boat Accounts Found.</div>
        @endforelse

    </div>
</div>
