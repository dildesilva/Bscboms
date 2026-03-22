<div class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-md">
    
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg border border-green-200">
            {{ session('message') }}
        </div>
    @endif

    <!-- Create Trip Form -->
    <form wire:submit.prevent="save" class="space-y-6">
        <div>
            <label for="departure-location" class="block text-sm font-medium text-gray-700 mb-1">Departure Location</label>
            <input wire:model.blur="departureLocation" type="text" id="departure-location"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                   placeholder="Enter departure location">
            @error('departureLocation')
                <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="departure-time" class="block text-sm font-medium text-gray-700 mb-1">Departure Time</label>
                <input wire:model.blur="departureTime" type="datetime-local" id="departure-time"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('departureTime')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="Planned-time" class="block text-sm font-medium text-gray-700 mb-1">Planned Arrival</label>
                <input wire:model.blur="plannedArrivalTime" type="datetime-local" id="Planned-time"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                @error('plannedArrivalTime')
                    <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="hidden">
            <input wire:model.blur="boat" type="text">
            <input wire:model.blur="boaTemail" type="text">
        </div>

        <div class="flex justify-end space-x-4 pt-4">
            <button type="button"
                    class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition duration-200"
                    onclick="closeCreateTripModal()">
                Cancel
            </button>
            <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Create Trip
            </button>
        </div>
    </form>
</div>
