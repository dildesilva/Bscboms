@extends('layouts.dashbord')
@section('content')
    <div class=" bg-[#dedede] container mx-auto px-4 py-6 h-[100%]">
        <!-- Header and Action Buttons -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Crew Management</h1>
            <div class="flex space-x-3">
                <button onclick="openOldTripMembers()"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center shadow-md transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    Previous Trip Members
                </button>
            </div>
        </div>
        <!-- Trips List -->
        <div class="space-y-4">
            @forelse ($eachtrip as $trip)
                <div
                    class="bg-[#cfcfcf] rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-200">

                    <div class="p-4">
                        <livewire:add-member-live :tripId="$trip->id" />
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No Trips Found</h3>
                    <p class="mt-1 text-gray-500">Create your first trip to get started</p>
                    <button
                        class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg inline-flex items-center shadow-md transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd" />
                        </svg>
                        Create New Trip
                    </button>
                </div>
            @endforelse
        </div>
        <!-- Old Trip Members Modal -->
        <div id="oldTripModal"
            class="fixed inset-0 z-50 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden flex items-center justify-center p-4">
            <div class="relative bg-[#dedede] rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-auto">
                <!-- Modal Header -->
                <div class="flex justify-between items-center p-4 border-b bg-gray-50">
                    <h3 class="text-xl font-semibold text-gray-900">Fishermen - Previous Trips</h3>
                    <button onclick="closeOldTripMembers()"
                        class="text-gray-500 hover:text-gray-700 rounded-full p-1 hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Modal Content -->
                <div class="p-4 ">
                    <div class="space-y-3">
                        @forelse ($oldtrip as $trip)
                            <div class="p-4  ">
                                <livewire:add-list-member :tripId="$trip->id" />
                            </div>
                        @empty
                            <!-- Empty state when no trips exist -->
                            <div class=" rounded-lg shadow-md p-6 text-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-900">No Trips Found</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="flex justify-end p-4 border-t bg-gray-50">
                    <button onclick="closeOldTripMembers()"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Old Trip Fishermen Modal Functions
        function openOldTripMembers() {
            document.getElementById('oldTripModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeOldTripMembers() {
            document.getElementById('oldTripModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Close modal when clicking outside
        document.getElementById('oldTripModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOldTripMembers();
            }
        });
    </script>
@endsection
