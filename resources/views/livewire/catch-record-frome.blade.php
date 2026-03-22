
<div>
    <div id="expense-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New : {{ $tripId }}</h2>
            <div>
                 @if (session()->has('message'))
                    <div class="bg-green-500 text-white p-2 mb-4 rounded-md">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="bg-red-500 text-white p-2 mb-4 rounded-md">
                        {{ session('error') }}
                    </div>
                @endif
                <p wire:loading.delay class="text-orange-500">Please wait...</p>

                <form wire:submit.prevent="saveCatch"  id="expense-form">
                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">Unit</label>
                        <select class="select-box" wire:model="fish">
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
                        @error('fish') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">Weight (kg)</label>
                        <input type="text" class="input-field" wire:model="weight" placeholder="Enter kg">
                        @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">Quantity</label>
                        <input type="number" class="input-field" wire:model="quantity" placeholder="Enter quantity">
                        @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-4" onclick="closeExpenseModal()">Cancel</button>
                        <button type="reset" class="bg-orange-500 text-white px-4 py-2 rounded-md mr-4">Reset</button>
                        <button type="button" wire:click="saveCatch" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Livewire Scripts -->
<script>
    // Close Expense Modal Function
    function closeExpenseModal() {
        document.getElementById('expense-modal').classList.add('hidden');
    }
    </script>
