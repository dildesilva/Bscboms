<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                 Boat Maintenance Predictor AI
            </h1>
            <p class="mt-2 text-lg text-gray-600">
                Enter your boat's current status to predict the next maintenance date
            </p>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left Column -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Boat Current Status
                        </h2>
                    </div>

                    <!-- Form Body -->
                    <div class="p-6">
                        <form wire:submit.prevent="predictMaintenance" class="space-y-8">

                            <!-- Basic Information -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                    <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-blue-600 font-bold">1</span>
                                    </span>
                                    Basic Information
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Record Date</label>
                                        <input type="date" wire:model.live="record_date"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('record_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Boat ID</label>
                                        <input type="text" wire:model="boat_id" readonly
                                               class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-600">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Boat Type</label>
                                        <select wire:model.live="boat_type"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($boat_types as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        @error('boat_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Engine Model</label>
                                        <select wire:model.live="engine_model"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($engine_models as $model)
                                                <option value="{{ $model }}">{{ $model }}</option>
                                            @endforeach
                                        </select>
                                        @error('engine_model') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Maintenance Type</label>
                                        <select wire:model.live="last_maintenance_type"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($maintenance_types as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        @error('last_maintenance_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Engine Statistics -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                    <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-blue-600 font-bold">2</span>
                                    </span>
                                    Engine Statistics
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Engine Age (years)</label>
                                        <input type="number" step="0.1" wire:model.live="engine_age_years"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('engine_age_years') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Total Engine Hours</label>
                                        <input type="number" wire:model.live="total_engine_hours"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('total_engine_hours') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Daily Avg Hours</label>
                                        <input type="number" step="0.1" wire:model.live="avg_daily_operating_hours"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('avg_daily_operating_hours') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Maintenance History -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                    <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-blue-600 font-bold">3</span>
                                    </span>
                                    Maintenance History
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Days Since Last Maintenance</label>
                                        <input type="number" wire:model.live="days_since_last_maintenance"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('days_since_last_maintenance') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Hours Since Last Service</label>
                                        <input type="number" wire:model.live="hours_since_last_service"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('hours_since_last_service') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Oil Change (days ago)</label>
                                        <input type="number" wire:model.live="oil_change_days_ago"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('oil_change_days_ago') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Filter Change (days ago)</label>
                                        <input type="number" wire:model.live="filter_change_days_ago"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('filter_change_days_ago') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Inspection Days</label>
                                        <input type="number" wire:model.live="lastinspectiondays"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('lastinspectiondays') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Condition Severity</label>
                                        <select wire:model.live="condition_severity"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($severity_levels as $level)
                                                <option value="{{ $level }}">{{ $level }}</option>
                                            @endforeach
                                        </select>
                                        @error('condition_severity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Sensor Readings -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                    <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-blue-600 font-bold">4</span>
                                    </span>
                                    Current Sensor Readings
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Engine Temp (°C)
                                            @if($engine_temp_c > 95)
                                                <span class="text-red-500 text-xs ml-1">⚠ High</span>
                                            @endif
                                        </label>
                                        <input type="number" step="0.1" wire:model.live="engine_temp_c"
                                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @if($engine_temp_c > 95) border-red-300 bg-red-50 @else border-gray-300 @endif">
                                        @error('engine_temp_c') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Oil Pressure (bar)
                                            @if($oil_pressure_bar < 2.5)
                                                <span class="text-red-500 text-xs ml-1">⚠ Low</span>
                                            @endif
                                        </label>
                                        <input type="number" step="0.1" wire:model.live="oil_pressure_bar"
                                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @if($oil_pressure_bar < 2.5) border-red-300 bg-red-50 @else border-gray-300 @endif">
                                        @error('oil_pressure_bar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Coolant Level (%)</label>
                                        <input type="number" wire:model.live="coolant_level_percent"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('coolant_level_percent') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Engine RPM</label>
                                        <input type="number" wire:model.live="engine_rpm"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('engine_rpm') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Fuel Consumption (L/h)</label>
                                        <input type="number" step="0.1" wire:model.live="fuel_consumption_lph"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('fuel_consumption_lph') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Vibration Level</label>
                                        <input type="number" step="0.1" wire:model.live="vibration_level"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        @error('vibration_level') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="flex items-center space-x-3">
                                        <input type="checkbox" wire:model.live="unusual_sounds"
                                               class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Unusual sounds detected from engine</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Environmental Conditions -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                    <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-blue-600 font-bold">5</span>
                                    </span>
                                    Environmental Conditions
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Sea Condition (1-5)</label>
                                        <div class="flex items-center space-x-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <button type="button"
                                                        wire:click="$set('sea_condition', {{ $i }})"
                                                        class="w-10 h-10 rounded-full flex items-center justify-center transition-all {{ $sea_condition >= $i ? 'bg-blue-500 text-white shadow' : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}">
                                                    {{ $i }}
                                                </button>
                                            @endfor
                                        </div>
                                        @error('sea_condition') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Hull Condition</label>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($hull_conditions as $condition)
                                                <button type="button"
                                                        wire:click="$set('hull_condition', '{{ $condition }}')"
                                                        class="px-4 py-2 rounded-lg text-sm font-medium transition-all {{ $hull_condition == $condition ? 'bg-blue-500 text-white shadow' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                                    {{ $condition }}
                                                </button>
                                            @endforeach
                                        </div>
                                        @error('hull_condition') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <button type="button"
                                        wire:click="resetForm"
                                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                    Reset
                                </button>

                                <button type="submit"
                                        wire:loading.attr="disabled"
                                        class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all disabled:opacity-50 disabled:cursor-not-allowed flex items-center space-x-2">
                                    <span wire:loading.remove wire:target="predictMaintenance">
                                        Predict Maintenance
                                    </span>
                                    <span wire:loading wire:target="predictMaintenance" class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Analyzing...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:col-span-1">
                @if($show_results && $prediction_result)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 sticky top-6">

                        <div class="px-6 py-4
                            @if($maintenance_urgency == 'CRITICAL') bg-red-500
                            @elseif($maintenance_urgency == 'HIGH') bg-orange-500
                            @elseif($maintenance_urgency == 'MEDIUM') bg-yellow-500
                            @elseif($maintenance_urgency == 'LOW') bg-green-500
                            @else bg-blue-500 @endif">
                            <h2 class="text-xl font-semibold text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Prediction Results
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-center mb-6">
                                <span class="px-4 py-2 rounded-full text-sm font-semibold
                                    @if($maintenance_urgency == 'CRITICAL') bg-red-100 text-red-800
                                    @elseif($maintenance_urgency == 'HIGH') bg-orange-100 text-orange-800
                                    @elseif($maintenance_urgency == 'MEDIUM') bg-yellow-100 text-yellow-800
                                    @elseif($maintenance_urgency == 'LOW') bg-green-100 text-green-800
                                    @else bg-blue-100 text-blue-800 @endif">
                                    {{ $maintenance_urgency }} URGENCY
                                </span>
                            </div>

                            <div class="text-center mb-6">
                                <div class="text-5xl font-bold
                                    @if($maintenance_urgency == 'CRITICAL') text-red-600
                                    @elseif($maintenance_urgency == 'HIGH') text-orange-600
                                    @elseif($maintenance_urgency == 'MEDIUM') text-yellow-600
                                    @elseif($maintenance_urgency == 'LOW') text-green-600
                                    @else text-blue-600 @endif">
                                    {{ $predicted_days }}
                                </div>
                                <div class="text-gray-500 mt-1">Days Until Maintenance</div>
                            </div>

                            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                                <div class="text-sm text-gray-500 mb-1">Recommended Maintenance Date</div>
                                <div class="text-xl font-semibold text-gray-800">{{ $predicted_date }}</div>
                                <div class="text-xs text-gray-400 mt-1">
                                    Confidence: {{ $confidence_level }}
                                </div>
                            </div>

                            <div class="space-y-3">
                                <button type="button"
                                        onclick="alert('Maintenance scheduled for {{ $predicted_date }}')"
                                        class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                                    📅 Schedule Maintenance
                                </button>

                                <button type="button"
                                        onclick="window.print()"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                    🖨️ Print Report
                                </button>
                            </div>

                            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                                <h4 class="font-medium text-blue-800 mb-2 flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Health Tips
                                </h4>

                                <ul class="text-sm text-blue-700 space-y-2">
                                    @if($engine_temp_c > 95)
                                        <li>• Check cooling system immediately</li>
                                    @endif
                                    @if($oil_pressure_bar < 2.5)
                                        <li>• Low oil pressure - check oil level</li>
                                    @endif
                                    @if($vibration_level > 5)
                                        <li>• High vibration - inspect engine mounts</li>
                                    @endif
                                    @if($days_since_last_maintenance > 90)
                                        <li>• Long time since last maintenance</li>
                                    @endif
                                    @if(!$engine_temp_c > 95 && !$oil_pressure_bar < 2.5 && !$vibration_level > 5 && !$days_since_last_maintenance > 90)
                                        <li>• No immediate warning signs detected</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                @elseif($error_message)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-red-100">
                        <div class="bg-red-500 px-6 py-4">
                            <h2 class="text-xl font-semibold text-white">Error</h2>
                        </div>

                        <div class="p-6">
                            <div class="text-center text-red-600 mb-4">
                                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-lg font-medium">{{ $error_message }}</p>
                            </div>

                            <button wire:click="predictMaintenance"
                                    class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                Try Again
                            </button>
                        </div>
                    </div>

                @else
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                            <h2 class="text-xl font-semibold text-white">Ready to Predict</h2>
                        </div>

                        <div class="p-6">
                            <div class="text-center text-gray-500 mb-6">
                                <svg class="w-20 h-20 mx-auto mb-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <p class="text-lg font-medium mb-2">AI-Powered Predictions</p>
                                <p class="text-sm">Enter boat data on the left and click "Predict Maintenance" to get an AI-powered maintenance recommendation.</p>
                            </div>

                            <div class="space-y-3 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 13l4 4L19 7" />
                                    </svg>
                                    Trained on 2,300 maintenance records
                                </div>

                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 13l4 4L19 7" />
                                    </svg>
                                    Neural network prediction model
                                </div>

                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 13l4 4L19 7" />
                                    </svg>
                                    Real-time interactive form
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Toast Notifications -->
        <div
            x-data="{ show: false, message: '', type: 'info' }"
            @warning-message.window="show = true; message = $event.detail; type = 'warning'; setTimeout(() => show = false, 5000)"
            @critical-alert.window="show = true; message = $event.detail; type = 'critical'; setTimeout(() => show = false, 5000)"
            x-show="show"
            x-transition
            class="fixed bottom-4 right-4 z-50"
            style="display: none;"
        >
            <div x-show="type == 'warning'" class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow-lg">
                <span x-text="message"></span>
            </div>

            <div x-show="type == 'critical'" class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
                <span x-text="message"></span>
            </div>
        </div>
    </div>
</div>
