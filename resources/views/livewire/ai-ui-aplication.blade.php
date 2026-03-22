<div class="bg-gray-50 py-6 px-4">
    <div class="max-w-5xl mx-auto">

        @if (session()->has('success'))
     <div class="bg-green-500 text-white p-2 rounded mb-4">
         {{ session('success') }}
     </div>
 @endif

        <form wire:submit.prevent="updateData" class="space-y-4">


           


            {{-- ── SECTION: ENGINE DATA --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">

                <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-3">
                    Engine Data
                </h3>

                {{-- 3-column grid for all numeric engine fields --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">

                    {{-- Engine Age --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Engine Age <span class="text-gray-400">(Yrs)</span>
                        </label>
                        <input type="number" step="0.1" wire:model="engineageyears"
                            placeholder="e.g. 3.5"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('engineageyears')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Total Engine Hours --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Engine Hours</label>
                        <input type="number" wire:model="totalenginehours"
                            placeholder="e.g. 5000"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('totalenginehours')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Avg Daily Operating Hours --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Avg Daily Hours</label>
                        <input type="number" wire:model="avgdailyoperatinghours"
                            placeholder="e.g. 6"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('avgdailyoperatinghours')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Days Since Last Maintenance --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Days Since Maint.</label>
                        <input type="number" wire:model="dayssincelastmaintenance"
                            placeholder="e.g. 45"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('dayssincelastmaintenance')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Hours Since Last Service --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Hrs Since Service</label>
                        <input type="number" wire:model="hourssincelastservice"
                            placeholder="e.g. 300"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('hourssincelastservice')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Engine Temperature --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Engine Temp <span class="text-gray-400">(°C)</span>
                        </label>
                        <input type="number" step="0.1" wire:model="enginetempc"
                            placeholder="e.g. 82.5"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('enginetempc')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Oil Pressure --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Oil Pressure <span class="text-gray-400">(bar)</span>
                        </label>
                        <input type="number" step="0.01" wire:model="oilpressurebar"
                            placeholder="e.g. 3.8"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('oilpressurebar')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Coolant Level --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Coolant <span class="text-gray-400">(%)</span>
                        </label>
                        <input type="number" wire:model="coolantlevelpercent"
                            placeholder="e.g. 90"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('coolantlevelpercent')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Engine RPM --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Engine RPM</label>
                        <input type="number" wire:model="enginerpm"
                            placeholder="e.g. 1400"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('enginerpm')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Fuel Consumption --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Fuel <span class="text-gray-400">(L/h)</span>
                        </label>
                        <input type="number" step="0.1" wire:model="fuelconsumptionlph"
                            placeholder="e.g. 52.0"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('fuelconsumptionlph')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Vibration Level 1–5 --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Vibration <span class="text-gray-400">(1–5)</span>
                        </label>
                        <input type="number" min="1" max="5" wire:model="vibrationlevel"
                            placeholder="1–5"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('vibrationlevel')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Oil Change Days Ago --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Oil Change (days)</label>
                        <input type="number" wire:model="oilchangedaysago"
                            placeholder="e.g. 30"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('oilchangedaysago')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Filter Change Days Ago --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Filter Change (days)</label>
                        <input type="number" wire:model="filterchangedaysago"
                            placeholder="e.g. 35"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('filterchangedaysago')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Last Inspection Days Ago --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Last Inspection (days)</label>
                        <input type="number" wire:model="lastinspectiondays"
                            placeholder="e.g. 20"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('lastinspectiondays')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Sea Condition 1–5 --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">
                            Sea Condition <span class="text-gray-400">(1–5)</span>
                        </label>
                        <input type="number" min="1" max="5" wire:model="seacondition"
                            placeholder="1–5"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition placeholder-gray-400">
                        @error('seacondition')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            {{-- END: Engine Data --}}


            {{-- ── SECTION: CONDITION --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">

                <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-3">
                    Condition
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                    {{-- Hull Condition --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Hull Condition</label>
                        <select wire:model="hullcondition"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition">
                            <option>Good</option>
                            <option>Fair</option>
                            <option>Poor</option>
                        </select>
                    </div>

                    {{-- Unusual Sounds --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Unusual Sounds</label>
                        <select wire:model="unusualsounds"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>

                    {{-- Condition Severity --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Condition Severity</label>
                        <select wire:model="conditionseverity"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition">
                            <option>Normal</option>
                            <option>Warning</option>
                            <option>Emergency</option>
                        </select>
                    </div>

                </div>
            </div>
            {{-- END: Condition --}}


            {{-- ── SUBMIT BUTTON --}}
            <button
            type="submit"
                wire:click="updateData"
                {{-- wire:loading.attr="disabled" --}}
                class="w-full bg-indigo-600 hover:bg-indigo-700 disabled:opacity-60
                       text-white font-semibold py-2.5 px-6 rounded-xl text-sm
                       transition-all duration-200 focus:outline-none
                       focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-sm"
            >
                <span wire:loading.remove>Update</span>
                <span wire:loading>Processing...</span>
            </button>

        </form>
 </div>
</div>