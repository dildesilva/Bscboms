<div>
    <div class="p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Fisherman Bio Manager</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage fisherman biographical information</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <div class="relative flex-grow">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search fishermen..."
                        class="w-full pl-9 pr-4 py-2 text-sm border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                    <i class="bi bi-search absolute left-3 top-2.5 text-gray-400 dark:text-gray-500 text-sm"></i>
                </div>
                <select wire:model.live="perPage" class="px-3 py-2 text-sm border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>

        @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg flex items-start">
            <div class="flex-shrink-0">
                <i class="bi bi-check-circle-fill text-green-500 text-lg"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Update successful</h3>
                <p class="text-sm text-green-700 dark:text-green-300 mt-1">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <div wire:loading class="mb-4 p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg flex items-center">
            <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-sm text-blue-800 dark:text-blue-200">Loading fishermen data...</span>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-xs">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">NIC</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Employer #</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Contact Info</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Personal Details</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Last Updated</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($fishermen as $fisherman)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            #{{ $fisherman->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text"
                                class="w-full px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                value="{{ $fisherman->name }}"
                                wire:change="updateFisherman({{ $fisherman->id }}, 'name', $event.target.value)">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text"
                                class="w-full px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                value="{{ $fisherman->nic }}"
                                wire:change="updateFisherman({{ $fisherman->id }}, 'nic', $event.target.value)">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="text"
                                class="w-full px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                value="{{ $fisherman->employer_number }}"
                                wire:change="updateFisherman({{ $fisherman->id }}, 'employer_number', $event.target.value)">
                        </td>
                        <td class="px-6 py-4">
                            <div class="grid grid-cols-1 gap-2">
                                <input type="email"
                                    class="w-full px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                    placeholder="Email"
                                    value="{{ $fisherman->userEmailId }}"
                                    wire:change="updateFisherman({{ $fisherman->id }}, 'userEmailId', $event.target.value)">

                                <input type="tel"
                                    class="w-full px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                    placeholder="Phone"
                                    value="{{ $fisherman->phone_number }}"
                                    wire:change="updateFisherman({{ $fisherman->id }}, 'phone_number', $event.target.value)">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="grid grid-cols-2 gap-2">
                                <select wire:change="updateFisherman({{ $fisherman->id }}, 'gender', $event.target.value)"
                                    class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                                    <option value="male" {{ $fisherman->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $fisherman->gender === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $fisherman->gender === 'other' ? 'selected' : '' }}>Other</option>
                                </select>

                                <input type="date"
                                    class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                    value="{{ $fisherman->dob }}"
                                    wire:change="updateFisherman({{ $fisherman->id }}, 'dob', $event.target.value)">

                                <input type="text"
                                    class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                    placeholder="Country"
                                    value="{{ $fisherman->country }}"
                                    wire:change="updateFisherman({{ $fisherman->id }}, 'country', $event.target.value)">

                                <input type="text"
                                    class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
                                    placeholder="Rank"
                                    value="{{ $fisherman->rank }}"
                                    wire:change="updateFisherman({{ $fisherman->id }}, 'rank', $event.target.value)">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $fisherman->updated_at->diffForHumans() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $fishermen->links() }}
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('notify', (event) => {
                Toastify({
                    text: event.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: event.type === 'success' ? "#10B981" : "#EF4444",
                }).showToast();
            });
        });
    </script>
    @endpush
</div>
