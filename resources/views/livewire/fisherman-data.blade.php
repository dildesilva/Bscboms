<div wire:poll.2s>
    <style>
        .tab-activeD {
            position: relative;
            color: #2E86AB;
            font-weight: 600;
        }
        .tab-activeD:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background: #2E86AB;
            border-radius: 3px 3px 0 0;
        }
    </style>

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Current Team Section -->
        <section class="mb-12">

            @if($userBio)
                <div class="mx-4 sm:mx-auto bg-[#e3e3e354] rounded-lg shadow-sm overflow-hidden border border-gray-100">
                    <!-- Profile Header -->
                    <div class="bg-gradient-to-r from-[#8585b4] to-[#9474c2] p-4 sm:p-5 text-white">
                        <div class="flex flex-col sm:flex-row items-center sm:space-x-4 space-y-3 sm:space-y-0">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-white bg-opacity-20 flex items-center justify-center text-white text-2xl sm:text-3xl font-bold">
                                @if(!empty($userBio->user->accountDP))
                                    <img src="{{ asset('storage/profiles/' . $userBio->user->accountDP) }}"
                                         alt="DP"
                                         class="h-full w-full object-cover rounded-full" />
                                @else
                                    <span>{{ strtoupper(substr($userBio->name ?? 'U', 0, 1)) }}</span>
                                @endif
                            </div>

                            <div class="text-center sm:text-left">
                                <h3 class="text-xl sm:text-2xl font-semibold leading-tight">{{ $userBio->name ?? 'N/A' }}</h3>
                                <p class="text-blue-100 text-sm sm:text-base mt-1">{{ $userBio->rank ?? 'N/A' }}</p>
                                <p class="text-blue-100 text-xs sm:text-sm opacity-90 mt-1">#EMP - {{ $userBio->employer_number ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Details -->
                    <div class="p-4 sm:p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Personal Information -->
                            <div class="space-y-3">
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Personal</h4>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-id-card mt-0.5 text-blue-600 text-sm"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">National ID</p>
                                        <p class="text-gray-800 text-sm">{{ $userBio->nic ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-birthday-cake mt-0.5 text-blue-600 text-sm"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Date of Birth</p>
                                        <p class="text-gray-800 text-sm">{{ $userBio->dob ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-venus-mars mt-0.5 text-blue-600 text-sm"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Gender</p>
                                        <p class="text-gray-800 text-sm">{{ $userBio->gender ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="space-y-3">
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Contact</h4>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-envelope mt-0.5 text-blue-600 text-sm"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Email</p>
                                        <p class="text-gray-800 text-sm break-all">{{ $userBio->userEmailId ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-phone-alt mt-0.5 text-blue-600 text-sm"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Phone</p>
                                        <p class="text-gray-800 text-sm">{{ $userBio->phone_number ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-globe mt-0.5 text-blue-600 text-sm"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Country</p>
                                        <p class="text-gray-800 text-sm">{{ $userBio->country ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-4 sm:px-6 pb-4 border-t border-gray-100 bg-[#0d0669]">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pt-3 space-y-2 sm:space-y-0">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Active Status
                            </span>
                            <p class="text-xs text-[#ffffff]">Last updated: {{ now()->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center text-red-600 font-semibold p-6">
                    User bio data not found.
                </div>
            @endif
        </section>

        <!-- All Team Members Section -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">All Team Members</h2>

            @if($team && $team->count() > 0)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">License</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($team as $data)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold mr-3">
                                                    {{ strtoupper(substr($data->name ?? 'U', 0, 2)) }}
                                                </div>
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $data->name ?? 'N/A' }}</div>
                                                    <div class="text-sm text-gray-500">{{ $data->employer_number ?? 'N/A' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $data->userEmailId ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $data->rank ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $data->phone_number ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="text-center text-gray-500 font-medium p-4">No team members available.</div>
            @endif
        </section>
    </div>
</div>
