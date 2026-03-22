<div class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-200 p-6 animate-fadeIn">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Fisherman Management</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage fishermen, payments, and boat assignments</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row flex-wrap gap-2 mt-4 md:mt-0 text-sm">
            <!-- Crew Dashboard -->
            <button wire:click="changeTab('dashboard')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md flex items-center">
                <svg class="h-4 w-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zM6 10a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                CrewDash
            </button>

            <!-- Add Fisherman -->



            <!-- Active Fisherman -->
            <button wire:click="changeTab('ActiveFish')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md flex items-center">
                <svg class="h-4 w-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a1 1 0 011 1v2a1 1 0 01-2 0V4a1 1 0 011-1zm0 11a1 1 0 100-2 1 1 0 000 2zm6-4a1 1 0 110 2h-2a1 1 0 110-2h2zM6 10a1 1 0 100 2H4a1 1 0 100-2h2zm1.293-5.707a1 1 0 010 1.414L5.414 8.586a1 1 0 11-1.414-1.414L5.879 4.293a1 1 0 011.414 0zm7.414 0a1 1 0 010 1.414L13.414 8.586a1 1 0 001.414 1.414l2.121-2.121a1 1 0 00-1.414-1.414z"/>
                </svg>
                Active
            </button>

            <!-- Inactive Fisherman -->
            <button wire:click="changeTab('Inactive')" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md flex items-center">
                <svg class="h-4 w-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-9a1 1 0 10-2 0v2a1 1 0 102 0V9zM7 9a1 1 0 100 2h2a1 1 0 100-2H7z" clip-rule="evenodd" />
                </svg>
                Inactive
            </button>

            <!-- Bio Update -->
            <button wire:click="changeTab('Bio')" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-md flex items-center">
                <svg class="h-4 w-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 010 2.828l-9.9 9.9a1 1 0 01-.45.26l-4 1a1 1 0 01-1.21-1.21l1-4a1 1 0 01.26-.45l9.9-9.9a2 2 0 012.828 0zM5 13l1 1-2 2h3v2H3v-3l2-2z"/>
                </svg>
                Bio Update
            </button>

              <!-- Batch Payments -->
            <button wire:click="changeTab('Payments')" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-md flex items-center">
                <svg class="h-4 w-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zM6 10a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                Batch Payments
            </button>
        </div>
    </div>

    <!-- Tabs Content -->
    @if ($activeTab == 'dashboard')
        <livewire:adminfishman-stats-card />
        <livewire:adminfishman-fisherman-tabale />

    @elseif ($activeTab == 'Bio')
        <livewire:adminfishman-bio-update />

    @elseif ($activeTab == 'Payments')
        <livewire:adminfisham-pay />

    @elseif ($activeTab == 'ActiveFish')
        <livewire:adminfishman-active />

    @elseif ($activeTab == 'Inactive')
        <livewire:adminfishman-inactive />
    @endif

</div>
