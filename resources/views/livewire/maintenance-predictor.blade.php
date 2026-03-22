<div class="bg-gray-50 py-6 px-4">
    <div class="max-w-7xl mx-auto">

        {{-- ── PAGE HEADER ── --}}
        <div class="mb-5">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">
                AI Maintenance Predictor
            </h2>
            <p class="text-xs text-gray-500 mt-0.5">
                Enter boat and engine details to receive a predictive maintenance report.
            </p>
        </div>

        {{-- ── TWO-COLUMN GRID ── --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 items-start">

            {{-- ════ LEFT SIDE — FORM (2/3 width) ════ --}}
            <div class="lg:col-span-2">
                <form wire:submit.prevent="predict" class="space-y-4">

                    {{-- ── SECTION: BOAT INFORMATION ── --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hidden">
                        <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-3">
                            Boat Information
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            {{-- Boat ID --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Boat ID</label>
                                <input type="text" wire:model="boatid"
                                    placeholder="{{ $dasun->boatName }}" readonly
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('boatid') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Boat Type --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Boat Type</label>
                                <input wire:model="boattype" readonly
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition">
                            </div>

                            {{-- Engine Model --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Engine Model</label>
                                <input type="text" wire:model="enginemodel" readonly
                                    placeholder="e.g. Cummins 6BTA"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('enginemodel') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Engine Power --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Engine Power</label>
                                <input type="text" wire:model="enginePower" readonly
                                    placeholder="e.g. 250 HP"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                            </div>

                        </div>
                    </div>

                    {{-- ── SECTION: ENGINE DATA ── --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                        <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-3">
                            Engine Data
                        </h3>
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
                                @error('engineageyears') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Total Engine Hours --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Engine Hours</label>
                                <input type="number" wire:model="totalenginehours"
                                    placeholder="e.g. 5000"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('totalenginehours') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Avg Daily Operating Hours --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Avg Daily Hours</label>
                                <input type="number" wire:model="avgdailyoperatinghours"
                                    placeholder="e.g. 6"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('avgdailyoperatinghours') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Days Since Last Maintenance --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Days Since Maint.</label>
                                <input type="number" wire:model="dayssincelastmaintenance"
                                    placeholder="e.g. 45"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('dayssincelastmaintenance') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Hours Since Last Service --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Hrs Since Service</label>
                                <input type="number" wire:model="hourssincelastservice"
                                    placeholder="e.g. 300"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('hourssincelastservice') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
                                @error('enginetempc') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
                                @error('oilpressurebar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
                                @error('coolantlevelpercent') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Engine RPM --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Engine RPM</label>
                                <input type="number" wire:model="enginerpm"
                                    placeholder="e.g. 1400"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('enginerpm') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
                                @error('fuelconsumptionlph') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Vibration Level --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">
                                    Vibration <span class="text-gray-400">(1–5)</span>
                                </label>
                                <input type="number" min="1" max="5" wire:model="vibrationlevel"
                                    placeholder="1–5"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('vibrationlevel') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Oil Change Days Ago --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Oil Change (days)</label>
                                <input type="number" wire:model="oilchangedaysago"
                                    placeholder="e.g. 30"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('oilchangedaysago') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Filter Change Days Ago --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Filter Change (days)</label>
                                <input type="number" wire:model="filterchangedaysago"
                                    placeholder="e.g. 35"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('filterchangedaysago') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Last Inspection Days Ago --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Last Inspection (days)</label>
                                <input type="number" wire:model="lastinspectiondays"
                                    placeholder="e.g. 20"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('lastinspectiondays') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            {{-- Sea Condition --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">
                                    Sea Condition <span class="text-gray-400">(1–5)</span>
                                </label>
                                <input type="number" min="1" max="5" wire:model="seacondition"
                                    placeholder="1–5"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500
                                           focus:border-transparent transition placeholder-gray-400">
                                @error('seacondition') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </div>

                    {{-- ── SECTION: CONDITION ── --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">

                        <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-3">
                            Condition
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                            
                              {{-- Last Maintenance Type --}}
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Last Maintenance Type</label>
                        <select
                            wire:model="lastmaintenancetype"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition"
                        >
                             <option></option>
                            <option>Oil &amp; filter change</option>
                            <option>Routine inspection</option>
                            <option>Major service</option>
                            <option>Fuel filter replacement</option>
                            <option>Cooling system service</option>
                            <option>Belt replacement</option>
                            <option>Propeller service</option>
                        </select>
                    </div>

                    {{-- Maintenance Reason — full row --}}
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Maintenance Reason</label>
                        <select
                            wire:model="maintenancereason"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                   focus:border-transparent transition"
                        >
                            <option></option>
                            <option>Routine preventive maintenance</option>
                            <option>Approaching service interval</option>
                            <option>Service interval reached (hours)</option>
                            <option>Oil change due soon</option>
                            <option>Abnormal vibration/noise</option>
                            <option>Hull/inspection required</option>
                            <option>Oil change overdue</option>
                            <option>Cooling system check required</option>
                            <option>Low oil pressure</option>
                            <option>Overheating risk</option>
                            <option>Emergency: engine protection</option>
                            <option>Filter replacement due</option>
                        </select>
                    </div>

                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Hull Condition</label>
                                <select wire:model="hullcondition"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    <option>Good</option>
                                    <option>Fair</option>
                                    <option>Poor</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Unusual Sounds</label>
                                <select wire:model="unusualsounds"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    <option>No</option>
                                    <option>Yes</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Condition Severity</label>
                                <select wire:model="conditionseverity"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    <option>Normal</option>
                                    <option>Warning</option>
                                    <option>Emergency</option>
                                </select>
                            </div>



                        </div>
                    </div>



                    {{-- ── SUBMIT BUTTON ── --}}
                    <button type="submit" wire:loading.attr="disabled"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 disabled:opacity-60
                               text-white font-semibold py-2.5 px-6 rounded-xl text-sm
                               transition-all duration-200 focus:outline-none
                               focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-sm">
                        <span wire:loading.remove>Run Prediction</span>
                        <span wire:loading>Processing...</span>
                    </button>

                    {{-- ── ERROR ALERT ── --}}
                    @if($errorMessage)
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                            <p class="font-semibold text-xs">Something went wrong</p>
                            <pre class="text-xs mt-1 whitespace-pre-wrap text-red-600">{{ $errorMessage }}</pre>
                        </div>
                    @endif

                </form>
            </div>
            {{-- END: LEFT SIDE --}}


            {{-- ════ RIGHT SIDE — RESULT PANEL (1/3 width) ════ --}}
            <div class="lg:col-span-1 space-y-4">

                {{-- ── Boat Summary Card ── --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-3">
                        Boat Summary
                    </h3>
                    <ul class="space-y-2 text-xs text-gray-600">
                        <li class="flex justify-between">
                            <span class="text-gray-400">Boat ID</span>
                            <span class="font-medium text-gray-800">{{ $boatid ?? '—' }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Type</span>
                            <span class="font-medium text-gray-800">{{ $boattype ?? '—' }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Engine</span>
                            <span class="font-medium text-gray-800">{{ $enginemodel ?? '—' }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Power</span>
                            <span class="font-medium text-gray-800">{{ $enginePower ?? '—' }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Engine Hours</span>
                            <span class="font-medium text-gray-800">{{ $totalenginehours ?? '—' }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Hull Condition</span>
                            <span class="font-medium text-gray-800">{{ $hullcondition ?? '—' }}</span>
                        </li>
                    </ul>
                </div>

                {{-- ── Prediction Result Card (shows after prediction) ── --}}
                @if($prediction)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-3">Prediction Result</h3>

                        {{-- 2×2 metric cards --}}
                        <div class="grid grid-cols-2 gap-3 mb-3">

                            {{-- Days Until Maintenance --}}
                            <div class="rounded-lg border border-gray-100 bg-gray-50 p-3 text-center">
                                <p class="text-3xl font-extrabold text-indigo-600">
                                    {{ $prediction['days_until_maintenance'] }}
                                </p>
                                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">Days Until Maint.</p>
                            </div>

                            {{-- AI Confidence --}}
                            <div class="rounded-lg border border-gray-100 bg-gray-50 p-3 text-center">
                                <p class="text-3xl font-extrabold
                                    {{ $prediction['probability_percent'] >= 75 ? 'text-red-500' :
                                       ($prediction['probability_percent'] >= 65 ? 'text-amber-500' : 'text-green-500') }}">
                                    {{ $prediction['probability_percent'] }}%
                                </p>
                                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">AI Confidence</p>
                            </div>

                            {{-- Predicted Due Date --}}
                            <div class="rounded-lg border border-gray-100 bg-gray-50 p-3 text-center">
                                <p class="text-sm font-bold text-gray-800">
                                    {{ $prediction['predicted_due_date'] }}
                                </p>
                                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wide">Next Maint. Date</p>
                            </div>

                            {{-- Risk Level --}}
                            <div class="rounded-lg border border-gray-100 bg-gray-50 p-3 flex flex-col items-center justify-center">
                                @if($prediction['risk_level'] === 'HIGH')
                                    <span class="px-2.5 py-0.5 rounded-full bg-red-100 text-red-700
                                                 text-xs font-bold uppercase tracking-wide">High Risk</span>
                                    <p class="text-xs text-gray-400 mt-1">Schedule immediately</p>
                                @elseif($prediction['risk_level'] === 'MEDIUM')
                                    <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-700
                                                 text-xs font-bold uppercase tracking-wide">Medium Risk</span>
                                    <p class="text-xs text-gray-400 mt-1">Within 2 weeks</p>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full bg-green-100 text-green-700
                                                 text-xs font-bold uppercase tracking-wide">Low Risk</span>
                                    <p class="text-xs text-gray-400 mt-1">Routine check</p>
                                @endif
                            </div>

                        </div>

                        {{-- Status Banner --}}
                        <div class="rounded-lg px-4 py-3
                            {{ $prediction['needs_maintenance'] ? 'bg-red-50 border border-red-200' : 'bg-green-50 border border-green-200' }}">
                            @if($prediction['needs_maintenance'])
                                <p class="font-semibold text-red-700 text-xs">
                                    ⚠ Maintenance required — before {{ $prediction['predicted_due_date'] }}
                                </p>
                            @else
                                <p class="font-semibold text-green-700 text-xs">
                                    ✓ No immediate action — next check {{ $prediction['predicted_due_date'] }}
                                </p>
                            @endif
                            <p class="text-xs text-gray-400 mt-0.5">
                                Predicted {{ $prediction['today'] }}
                                &nbsp;&middot;&nbsp;
                                Threshold: {{ $prediction['threshold_used'] }}
                            </p>
                        </div>
                    </div>

                @else
                    {{-- Placeholder before prediction runs --}}
                    <div class="bg-white rounded-xl shadow-sm border border-dashed border-gray-200 p-6 text-center">
                        <div class="text-4xl mb-2">🤖</div>
                        <p class="text-xs text-gray-400">Fill in the form and click<br><span class="font-semibold text-indigo-500">Run Prediction</span> to see results here.</p>
                    </div>
                @endif

                {{-- ── Tips Card (always visible) ── --}}
                <div class="bg-indigo-50 rounded-xl border border-indigo-100 p-4">
                    <h3 class="text-xs font-semibold text-indigo-600 uppercase tracking-widest mb-2">
                        Quick Tips
                    </h3>
                    <ul class="space-y-1.5 text-xs text-indigo-800">
                        <li>Normal engine temp: 75 - 95 °C</li>
                        <li>Oil pressure should be 2.5 - 5 bar</li>
                        <li>Coolant should stay above 80%</li>
                        <li>Service every 250 - 300 hours</li>
                        <li>Sea condition 4 - 5 increases wear</li>
                    </ul>
                </div>

            </div>
            {{-- END: RIGHT SIDE --}}

        </div>
        {{-- END: TWO-COLUMN GRID --}}

    </div>
</div>