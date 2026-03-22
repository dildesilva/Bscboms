<div  wire:poll.2s>
      <style>
            .tab-activeB {
                position: relative;
                color: #2E86AB;
                font-weight: 600;
            }

            .tab-activeB:after {
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

@forelse ($currentTrip as $trip )
<section class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Current Trip Details</h2>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">#TripID-{{ $trip->id }}</h3>
                    <p class="text-sm text-gray-600">Boat: <span class="font-medium">{{ $trip->boat }}</span></p>
                </div>
                <div class="mt-2 md:mt-0">
                    <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded-full">
                        {{ $trip->status }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                <div class="bg-blue-50 p-3 rounded">
                    <p class="text-xs text-gray-500">Departure</p>
                    <p class="text-sm font-semibold">{{ $trip->departureTime }}</p>
                </div>
                <div class="bg-blue-50 p-3 rounded">
                    <p class="text-xs text-gray-500">Expected Return</p>
                    <p class="text-sm font-semibold">{{ $trip->plannedArrivalTime }}</p>
                </div>
                <div class="bg-blue-50 p-3 rounded">
                    <p class="text-xs text-gray-500">Departure Location</p>
                    <p class="text-sm font-semibold">{{ $trip->departureLocation }}</p>
                </div>
            </div>

            {{-- <div class="mb-4">
                <h4 class="text-sm font-medium text-gray-700 mb-1">Crew Members</h4>
                <div class="flex flex-wrap gap-1">
                    <span class="bg-gray-100 px-2 py-0.5 rounded-full text-xs">John Smith (Captain)</span>
                    <span class="bg-gray-100 px-2 py-0.5 rounded-full text-xs">Mike Johnson</span>
                    <span class="bg-gray-100 px-2 py-0.5 rounded-full text-xs">Carlos Mendez</span>
                    <span class="bg-gray-100 px-2 py-0.5 rounded-full text-xs">You</span>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@empty

@endforelse


        <!-- Older Trips Section -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Older Trips</h2>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trip ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Boat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emergency / Safe</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                     @forelse ($donetrips as $trip )
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">#TripID-{{ $trip->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                  {{ $trip->updated_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                   {{ $trip->boat }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                      {{ $trip->emergency }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                         {{ $trip->status }}
                                    </span>
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Report</a>
                                </td> --}}
                            </tr>
@empty

@endforelse

                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">12</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>

</div>
