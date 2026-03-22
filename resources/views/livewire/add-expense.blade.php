
{{-- @livewire('add-expense', ['tripId' => $tripId]) --}}

<div>

    {{-- @livewire('add-expense', ['tripId' => $tripId]) --}}
    <!-- Add Expense Modal -->
    <div id="expense-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Add Expense : {{ $tripId }}</h2>

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

                <form wire:submit.prevent="saveExpense"  id="expense-form">
                    <!-- Removed hidden tripID field, tripId passed directly -->
                    {{-- <div class="mb-4">
                        <label for="expense-date" class="block text-sm text-gray-600">Date</label>
                        <input type="datetime-local" class="input-field" wire:model="date_time">
                        @error('date_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div> --}}

                    {{-- <div class="mb-4">
                        <label class="block text-sm text-gray-600">Expense Description</label>
                        <input type="text" class="input-field" wire:model="description" placeholder="Enter description">
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div> --}}






{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmha --}}


<div class="mb-4">
    <label class="block text-sm text-gray-600">Expense Description</label>
    <select class="input-field" wire:model="description">
        <option value="">-- Select an item --</option>
        <option value="1.7 mm Fishing Line">1.7 mm Fishing Line</option>
        <option value="2.5 mm Fishing Line">2.5 mm Fishing Line</option>
        <option value="3.2 Long Hook Thaiwan">3.2 Long Hook Thaiwan</option>
        <option value="4 mm Nylon Rope 100m">4 mm Nylon Rope 100m</option>
        <option value="AB Glue">AB Glue</option>
        <option value="AIS Buoy">AIS Buoy</option>
        <option value="Battery Box">Battery Box</option>
        <option value="Battery water">Battery water</option>
        <option value="Bypass Oil Filter (35A40–01800)(C–5809)">Bypass Oil Filter (35A40–01800)(C–5809)</option>
        <option value="Cable Tie 8X250">Cable Tie 8X250</option>
        <option value="Cable tie">Cable tie</option>
        <option value="Cleaning white red">Cleaning white red</option>
        <option value="Cleaning wire ball">Cleaning wire ball</option>
        <option value="Coolant Radiator">Coolant Radiator</option>
        <option value="Coper washer">Coper washer</option>
        <option value="Cotton gloves">Cotton gloves</option>
        <option value="Engine Oil 5ltr">Engine Oil 5ltr</option>
        <option value="Fuel Filter Bulk Head GTB 34 New Boat">Fuel Filter Bulk Head GTB 34 New Boat</option>
        <option value="Gasket glue">Gasket glue</option>
        <option value="Green Tube 1.8mm">Green Tube 1.8mm</option>
        <option value="Hand gloves gary">Hand gloves gary</option>
        <option value="Hand saw">Hand saw</option>
        <option value="Hardware item">Hardware item</option>
        <option value="Ice for boat">Ice for boat</option>
        <option value="Impeller 160–230hp (JIKJMP037) Dooss">Impeller 160–230hp (JIKJMP037) Dooss</option>
        <option value="Incense stick">Incense stick</option>
        <option value="LED Cabin Hood Light">LED Cabin Hood Light</option>
        <option value="LPG Gas">LPG Gas</option>
        <option value="Medi exp.">Medi exp.</option>
        <option value="Milk Bait">Milk Bait</option>
        <option value="Oil Filter 26452 72001 (M 4 2)">Oil Filter 26452 72001 (M 4 2)</option>
        <option value="Oil Filter 32540–11600 (M8/M9)">Oil Filter 32540–11600 (M8/M9)</option>
        <option value="Oil Filter 400508 – 00093">Oil Filter 400508 – 00093</option>
        <option value="Omo">Omo</option>
        <option value="Oxygen refill for cylinder - krishantha">Oxygen refill for cylinder - krishantha</option>
        <option value="Paint - white enamel">Paint - white enamel</option>
        <option value="Plastic jug">Plastic jug</option>
        <option value="Plastic stainer">Plastic stainer</option>
        <option value="Polythine Clear">Polythine Clear</option>
        <option value="PVC item">PVC item</option>
        <option value="Rubber gloves">Rubber gloves</option>
        <option value="Sea Anchor Large">Sea Anchor Large</option>
        <option value="Sea Water Pum Copmeet">Sea Water Pum Copmeet</option>
        <option value="Sfa Water charges">Sfa Water charges</option>
        <option value="snap L">snap L</option>
        <option value="Spadle">Spadle</option>
        <option value="Squid Jig 12.5">Squid Jig 12.5</option>
        <option value="Steel wool">Steel wool</option>
        <option value="Swivell No.02">Swivell No.02</option>
        <option value="Thinner">Thinner</option>
        <option value="Water btl 5ltr">Water btl 5ltr</option>
        <option value="Winch Belt Large">Winch Belt Large</option>
        <option value="Winch Tyre">Winch Tyre</option>
        <option value="Other">Other (manual entry)</option>
    </select>
    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>






                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">Quantity</label>
                        <input type="number" class="input-field" wire:model="quantity" placeholder="Enter quantity">
                        @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">Unit</label>
                        <select class="select-box" wire:model="unit">
                            <option value="">Select Unit</option>
                            <option value="kg">kg</option>
                            <option value="L">L</option>
                            <option value="service">Service</option>
                            <option value="salary">Salary</option>
                            <option value="count">Count</option>
                            <option value="hour">Hour</option>
                        </select>
                        @error('unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">Amount</label>
                        <input type="number" class="input-field" wire:model="amount" placeholder="Enter amount">
                        @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-4" onclick="closeExpenseModal()">Cancel</button>
                        <button type="reset" class="bg-orange-500 text-white px-4 py-2 rounded-md mr-4">Reset</button>
                        <button type="button" onsubmit="clearForm(event)" wire:click="saveExpense" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-300">Add Expense</button>
                        {{-- <p wire:loading.delay class="text-orange-500">Please wait...</p> --}}


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

    function clearForm(event) {
        event.preventDefault(); // Prevent form submission (remove this if using Livewire)
        document.getElementById("expense-form").reset(); // Clear form
    }
    </script>
