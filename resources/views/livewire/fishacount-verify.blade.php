<div>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" class="w-full border rounded-lg p-2" readonly>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">User Email ID</label>
                <input type="text" wire:model="userEmailId" class="w-full border rounded-lg p-2" readonly>
                @error('userEmailId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Employer Number</label>
                <input type="text" wire:model="employerNumber" class="w-full border rounded-lg p-2">
                @error('employerNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">NIC</label>
                <input type="text" wire:model="nic" class="w-full border rounded-lg p-2">
                @error('nic') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" wire:model="dob" class="w-full border rounded-lg p-2">
                @error('dob') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" wire:model="country" class="w-full border rounded-lg p-2">
                @error('country') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Rank</label>
                <select wire:model="rank" class="w-full border rounded-lg p-2">
                    <option value="">Select Rank</option>
                    <option value="Captain">Captain</option>
                    <option value="Chief Engineer">Chief Engineer</option>
                    <option value="First Mate">First Mate</option>
                    <option value="Second Mate">Second Mate</option>
                    <option value="Deckhand">Deckhand</option>
                    <option value="Oiler">Oiler</option>
                    <option value="Cook">Cook</option>
                    <option value="Fisherman">Fisherman</option>
                </select>
                @error('rank') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <select wire:model="gender" class="w-full border rounded-lg p-2">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Emergency Contact Number</label>
                <input type="text" wire:model="phoneNumber" class="w-full border rounded-lg p-2">
                @error('phoneNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Register Boat
        </button>
    </form>
</div>
