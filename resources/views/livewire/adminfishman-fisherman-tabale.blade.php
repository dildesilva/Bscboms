<div class="bg-white/60 dark:bg-gray-900/80 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-700 backdrop-blur-md p-4" wire:poll.3s>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.4s ease-in-out both;
        }
    </style>

    <div class="overflow-x-auto space-y-4">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Verified Fisherman Profiles</h1>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Active crew members and their contact information</p>
            </div>
            <a href="{{ route('createnew') }}" class="mt-3 md:mt-0 inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium px-3 py-1.5 rounded-lg shadow transition">
                <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
                Add Fisherman
            </a>
        </div>

        <!-- Table -->
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-xs">
            <thead class="bg-gray-100 dark:bg-gray-800/60">
                <tr>
                    <th class="px-4 py-3 text-left font-bold text-gray-700 dark:text-gray-300 uppercase">Fisherman</th>
                    <th class="px-4 py-3 text-left font-bold text-gray-700 dark:text-gray-300 uppercase">Fisherman Bio</th>
                    <th class="px-4 py-3 text-left font-bold text-gray-700 dark:text-gray-300 uppercase">Contact Details</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800">
                @forelse ($activeuser as $data)
                <tr class="transition duration-200 hover:bg-blue-50/30 dark:hover:bg-gray-800/40">
                    <!-- Fisherman Info -->
                    <td class="px-4 py-4 align-top">
                        <div class="flex items-start gap-3">
                          <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-200 to-blue-400 dark:from-blue-800 dark:to-blue-900 flex items-center justify-center shadow overflow-hidden">
    @if(!empty($data->user->accountDP))
        <img src="{{ asset('storage/profiles/' . $data->user->accountDP) }}"
             alt="DP"
             class="h-full w-full object-cover rounded-full" />
    @else
        <span class="text-base font-bold text-blue-700 dark:text-blue-200">
            {{ strtoupper(substr($data->user->name ?? 'U', 0, 1)) }}
        </span>
    @endif
</div>

                            <div>
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $data->name }}
                                    <i class="bi bi-patch-check-fill text-[#23a7ff] ml-1 hover:text-blue-400"></i>
                                </h3>
                                {{-- <p class="text-[10px] text-gray-500 dark:text-gray-400">ID: {{ $data->id }}</p> --}}
                                <p class="text-[10px] text-gray-500 dark:text-gray-400">Rank: {{ $data->rank }}</p>
                                <p class="text-[10px] text-gray-500 dark:text-gray-400">EMP No: {{ $data->employer_number }}</p>
                            </div>
                        </div>
                    </td>

                    <!-- Bio -->
                    <td class="px-4 py-4 align-top">
                        <div class="space-y-0.5 text-[11px] text-gray-700 dark:text-gray-300">
                            <p><strong>NIC:</strong> <span class="text-gray-500 dark:text-gray-400">{{ $data->nic }}</span></p>
                            <p><strong>DOB:</strong> <span class="text-gray-500 dark:text-gray-400">{{ $data->dob }}</span></p>
                            <p><strong>Gender:</strong> <span class="text-gray-500 dark:text-gray-400">{{ $data->gender }}</span></p>
                            <p><strong>Country:</strong> <span class="text-gray-500 dark:text-gray-400">{{ $data->country }}</span></p>
                            <p><strong>Verified:</strong> <span class="text-gray-500 dark:text-gray-400">{{ $data->created_at->format('F d, Y') }}</span></p>
                            <p><strong>Updated:</strong> <span class="text-gray-500 dark:text-gray-400">{{ $data->updated_at->diffForHumans() }}</span></p>
                        </div>
                    </td>

                    <!-- Contact -->
                    <td class="px-4 py-4 align-top">
                        <div class="space-y-3 text-[11px] text-gray-700 dark:text-gray-300">
                            <div class="flex items-start gap-2">
                                <div class="text-blue-600 dark:text-blue-300">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">Email</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $data->userEmailId }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-2">
                                <div class="text-green-600 dark:text-green-300">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">Phone</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $data->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-10 text-center">
                        <div class="text-gray-400 dark:text-gray-500 flex flex-col items-center animate-fade-in">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 10h.01M15 10h.01M9.172 16.172a4 4 0 015.656 0M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">No fishermen records found</p>
                            <p class="text-xs mt-1">Try adjusting your search or filters</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
