<div class="max-w-7xl mx-auto space-y-4 sm:space-y-6" wire:poll.2s>
     <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start gap-3 sm:gap-4 backdrop-blur-sm">
            <div class="bg-white/30 p-3 sm:p-4 rounded-xl border border-white/40 shadow-lg w-full sm:w-auto">
                <h1 class="text-2xl sm:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-800">{{ $boatName }}</h1>
                <p class="text-xs sm:text-sm text-indigo-600/80">Real-time fishing operations monitoring</p>
            </div>
            <div class="w-full sm:w-auto flex justify-end">
                <div class="bg-white/50 shadow-lg p-2 sm:p-3 rounded-xl border border-white/30 flex items-center backdrop-blur-sm w-full sm:w-auto justify-between sm:justify-normal">
                    <span class="text-xs sm:text-sm font-medium mr-2 text-indigo-700/80">Local Time:</span>
                    <span class="font-mono text-xs sm:text-sm md:text-base text-indigo-800 font-bold drop-shadow-sm">{{ now() }}</span>
                </div>
            </div>
        </div>

        <!-- Stats Cards - Mobile Stacked -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-3 md:gap-4" wire:poll.2s>
            @php $tripId = $tripCrunnt?->id ?? 'N/A'; @endphp

            @foreach([
            ['label' => 'Current Trip ID', 'value' =>'Trip ID - #'. $tripId, 'color' => 'from-blue-400 to-blue-600'],
            ['label' => 'Completed', 'value' => $completedAll, 'color' => 'from-amber-400 to-amber-600'],
            ['label' => 'Emergency', 'value' => $emergencytrip, 'color' => 'from-emerald-400 to-emerald-600'],
            ['label' => 'Trip Expenses', 'value' => 'Rs. ' . number_format($ongoingtripEx, 2), 'color' => 'from-rose-400 to-rose-600']
            ] as $stat)
            <div class="bg-gradient-to-br {{ $stat['color'] }} bg-opacity-20 backdrop-blur-md rounded-xl sm:rounded-2xl border border-white/30 shadow-lg p-3 hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-[10px] xs:text-xs text-[blue]">{{ $stat['label'] }}</p>
                        <h3 class="text-sm sm:text-base md:text-lg font-bold text-white drop-shadow-md">{{ $stat['value'] }}</h3>
                    </div>
                    <div class="p-1 sm:p-2 rounded-full bg-white/20 backdrop-blur-sm">
                        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-full bg-white/80 shadow-inner flex items-center justify-center">
                            <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-gradient-to-br {{ $stat['color'] }}"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
