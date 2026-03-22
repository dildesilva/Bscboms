<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6" wire:poll.2s>

    <!-- Total Fishermen Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-200">
                <i class="bi bi-people-fill text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Fishermen</p>
                <p class="text-xl font-semibold text-gray-700 dark:text-white">{{ $allFishman }}</p>
                <p class="text-xs text-gray-400 mt-2">Updated: {{ now() }}</p>
            </div>
        </div>
    </div>

    <!-- Active Today Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-200">
                <i class="bi bi-check-circle-fill text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Today</p>
                <p class="text-xl font-semibold text-gray-700 dark:text-white">{{ $activeuser }}</p>
                <p class="text-xs text-gray-400 mt-2 ">Active : {{ $activeuser }} / {{ $allFishman }}</p>
            </div>
        </div>
    </div>

    <!-- Verified Accounts Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-[#ffffff]  text-purple-600 dark:text-purple-200">
                <i class="bi bi-patch-check-fill  text-[#23a7ff]  hover:text-blue-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Verified Accounts</p>
                <p class="text-xl font-semibold text-gray-700 dark:text-white">{{ $varified }}</p>
                <p class="text-xs text-gray-400 mt-2 ">Verified : {{ $varified }} / {{ $allFishman }}</p>
            </div>
        </div>
    </div>

    <!-- Inactive Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-200">
                <i class="bi bi-x-circle-fill text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Inactive</p>
                <p class="text-xl font-semibold text-gray-700 dark:text-white">{{ $inactiveuser }}</p>
                <p class="text-xs text-gray-400 mt-2 ">Inactive : {{ $inactiveuser }}  / {{ $allFishman }}</p>
            </div>
        </div>
    </div>

</div>
