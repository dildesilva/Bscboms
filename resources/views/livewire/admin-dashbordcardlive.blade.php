<div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6" wire:poll.2s>
    <!-- Active Trips Card -->
    <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 p-4 sm:p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">Active Trips</p>
                <p class="mt-1 text-2xl sm:text-3xl font-semibold text-blue-600 dark:text-blue-400">{{ $awiting + $scheduled + $tripsongoing }}</p>
            </div>
            <div class="bg-blue-100/50 dark:bg-blue-900/20 p-2 sm:p-3 rounded-full backdrop-blur-sm">
                <i class="bi bi-activity text-blue-600 dark:text-blue-400 text-lg sm:text-xl"></i>
            </div>
        </div>
        <div class="mt-2 sm:mt-4 flex items-center text-xs sm:text-sm text-green-600 dark:text-green-400">
            <i class="bi bi-arrow-up-short mr-1"></i>
            {{-- <span>12% from last week</span> --}}
        </div>
    </div>

    <!-- Awaiting Boats Card -->
    <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 p-4 sm:p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">Awaiting Boats</p>
                <p class="mt-1 text-2xl sm:text-3xl font-semibold text-amber-600 dark:text-amber-400">{{ $awiting }}</p>
            </div>
            <div class="bg-amber-100/50 dark:bg-amber-900/20 p-2 sm:p-3 rounded-full backdrop-blur-sm">
                <i class="bi bi-hourglass-split text-amber-600 dark:text-amber-400 text-lg sm:text-xl"></i>
            </div>
        </div>
        <div class="mt-2 sm:mt-4 flex items-center text-xs sm:text-sm text-red-600 dark:text-red-400">
            <i class="bi bi-arrow-down-short mr-1"></i>
            {{-- <span>5% from last week</span> --}}
        </div>
    </div>

    <!-- Emergency Trips Card -->
    <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 p-4 sm:p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">Emergency Trips</p>
                <p class="mt-1 text-2xl sm:text-3xl font-semibold text-red-600 dark:text-red-400">{{ $emergency }}</p>
            </div>
            <div class="bg-red-100/50 dark:bg-red-900/20 p-2 sm:p-3 rounded-full backdrop-blur-sm">
                <i class="bi bi-exclamation-triangle-fill text-red-600 dark:text-red-400 text-lg sm:text-xl"></i>
            </div>
        </div>
        <div class="mt-2 sm:mt-4 flex items-center text-xs sm:text-sm text-green-600 dark:text-green-400">
            <i class="bi bi-arrow-down-short mr-1"></i>
            {{-- <span>3% from last week</span> --}}
        </div>
    </div>

    <!-- Completed Trips Card -->
    <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 p-4 sm:p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">Completed Trips</p>
                <p class="mt-1 text-2xl sm:text-3xl font-semibold text-green-600 dark:text-green-400">{{ $completed }}</p>
            </div>
            <div class="bg-green-100/50 dark:bg-green-900/20 p-2 sm:p-3 rounded-full backdrop-blur-sm">
                <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 text-lg sm:text-xl"></i>
            </div>
        </div>
        <div class="mt-2 sm:mt-4 flex items-center text-xs sm:text-sm text-green-600 dark:text-green-400">
            <i class="bi bi-arrow-up-short mr-1"></i>
            {{-- <span>8% from last week</span> --}}
        </div>
    </div>

</div>
