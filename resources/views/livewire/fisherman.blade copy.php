<div>
    <div class="container mx-auto px-4 py-6 max-w-6xl">
        <!-- Header -->
        <header class="flex justify-between items-center mb-6 md:mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-ocean-600">Fisherman<span class="text-ocean-800"> Dashboard</span></h1>
                <p class="text-xs md:text-sm text-ocean-500">Professional Dashboard</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="hidden md:block text-right">
                    <p class="text-sm font-medium text-ocean-700">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-ocean-500">ID: FSH-2846</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-ocean-400 to-ocean-600 flex items-center justify-center text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </header>

        <!-- Tabs Navigation -->
        <div class="flex overflow-x-auto scrollbar-hide mb-6 md:mb-8">
            <div class="flex space-x-1 rounded-lg bg-ocean-50 p-1">
                <button wire:click="changeTab('dashboard')" class="px-4 py-2 text-sm md:text-base tab-activeA whitespace-nowrap">Dashboard</button>
                <button wire:click="changeTab('Trips')" class="px-4 py-2 text-sm md:text-base tab-activeB text-ocean-600 hover:text-ocean-800 whitespace-nowrap">Trips</button>
                <button wire:click="changeTab('Payments')" class="px-4 py-2 text-sm md:text-base tab-activeC text-ocean-600 hover:text-ocean-800 whitespace-nowrap">Payments</button>
                <button wire:click="changeTab('Details')" class="px-4 py-2 text-sm md:text-base tab-activeD text-ocean-600 hover:text-ocean-800 whitespace-nowrap">My Details</button>
                {{-- <button class="px-4 py-2 text-sm md:text-base text-ocean-600 hover:text-ocean-800 whitespace-nowrap">Gear</button> --}}
            </div>
        </div>

        @if ($activeTab == 'dashboard')

        <style>
            .tab-activeA {
                position: relative;
                color: #2E86AB;
                font-weight: 600;
            }

            .tab-activeA:after {
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

        <div class="grid grid-cols-1 gap-5 mb-6">
            <!-- Quick Stats -->
            <div class="glass-card rounded-xl p-5 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="col-span-2 md:col-span-1 bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg p-4 flex items-center">
                    <div class="bg-white p-2 rounded-lg shadow-sm mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ocean-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-ocean-600">Today's Catch</p>
                        <p class="text-xl font-semibold text-ocean-800">42.5kg</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg p-4 flex items-center">
                    <div class="bg-white p-2 rounded-lg shadow-sm mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ocean-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-ocean-600">Current Trip</p>
                        <p class="text-xl font-semibold text-ocean-800">6h 22m</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg p-4 flex items-center">
                    <div class="bg-white p-2 rounded-lg shadow-sm mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ocean-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 7H7v6h6V7z" />
                            <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 010-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-ocean-600">Fuel Level</p>
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                            <div class="bg-gradient-to-r from-ocean-400 to-ocean-600 h-1.5 rounded-full" style="width: 78%"></div>
                        </div>
                        <p class="text-xs font-medium text-ocean-700 mt-1">78% remaining</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg p-4 flex items-center">
                    <div class="bg-white p-2 rounded-lg shadow-sm mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ocean-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-ocean-600">Avg. Catch</p>
                        <p class="text-xl font-semibold text-ocean-800">38.2kg</p>
                    </div>
                </div>
            </div>
        </div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <!-- Weather & Conditions -->
            <div class="glass-card rounded-xl p-5">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-ocean-800">Weather & Conditions</h2>
                    <span class="text-xs bg-ocean-100 text-ocean-700 px-2 py-1 rounded-full">LIVE</span>
                </div>

                <div class="flex items-center mb-5">
                    <div class="bg-gradient-to-br from-yellow-100 to-yellow-50 p-3 rounded-xl mr-4 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-ocean-800 font-medium">Mostly Sunny</p>
                        <p class="text-sm text-ocean-600">Good fishing conditions</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-ocean-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                            </svg>
                            <span class="text-xs text-ocean-600">Wave height</span>
                        </div>
                        <span class="text-sm font-medium text-ocean-800">1.2 - 1.5m</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-ocean-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs text-ocean-600">Wind</span>
                        </div>
                        <span class="text-sm font-medium text-ocean-800">12 knots NE</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-ocean-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs text-ocean-600">Next tide</span>
                        </div>
                        <span class="text-sm font-medium text-ocean-800">Rising in 3h14m</span>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="glass-card rounded-xl p-5">
                <h2 class="text-lg font-semibold text-ocean-800 mb-4">Recent Activity</h2>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-ocean-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-ocean-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium text-ocean-800">Trip completed</p>
                                <span class="text-xs text-ocean-500">4:30 PM</span>
                            </div>
                            <p class="text-xs text-ocean-600">North Bay • 5.2 hours • 38kg catch</p>
                            <div class="mt-1 flex items-center">
                                <span class="inline-block w-2 h-2 rounded-full bg-ocean-400 mr-1"></span>
                                <span class="text-xs text-ocean-500">Yesterday</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium text-ocean-800">Payment received</p>
                                <span class="text-xs text-ocean-500">8:15 AM</span>
                            </div>
                            <p class="text-xs text-ocean-600">$420.00 for yesterday's catch</p>
                            <div class="mt-1 flex items-center">
                                <span class="inline-block w-2 h-2 rounded-full bg-green-400 mr-1"></span>
                                <span class="text-xs text-ocean-500">Today</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between">
                                <p class="text-sm font-medium text-ocean-800">Maintenance due</p>
                                <span class="text-xs text-ocean-500">10:30 AM</span>
                            </div>
                            <p class="text-xs text-ocean-600">Engine service in 12 days</p>
                            <div class="mt-1 flex items-center">
                                <span class="inline-block w-2 h-2 rounded-full bg-yellow-400 mr-1"></span>
                                <span class="text-xs text-ocean-500">Today</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location & Map -->
            <div class="glass-card rounded-xl p-5">
                <h2 class="text-lg font-semibold text-ocean-800 mb-4">Current Location</h2>

                <div class="relative bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg overflow-hidden h-48">
                    <!-- Abstract map using divs -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-full h-full relative">
                            <!-- Water areas -->
                            <div class="absolute top-0 left-0 right-0 bottom-0 bg-ocean-100"></div>

                            <!-- Land masses -->
                            <div class="absolute bottom-0 left-0 w-2/5 h-1/3 bg-gradient-to-b from-ocean-200 to-ocean-300 rounded-tl-xl"></div>
                            <div class="absolute bottom-0 right-0 w-1/3 h-1/4 bg-gradient-to-b from-ocean-200 to-ocean-300 rounded-tr-xl"></div>

                            <!-- Location markers -->
                            <div class="absolute top-1/3 left-1/4 w-3 h-3 rounded-full bg-white border-2 border-ocean-600"></div>
                            <div class="absolute top-1/2 right-1/4 w-2 h-2 rounded-full bg-ocean-400"></div>
                            <div class="absolute bottom-1/4 left-1/2 w-2 h-2 rounded-full bg-ocean-400"></div>

                            <!-- Current location -->
                            <div class="absolute bottom-1/3 right-1/3 w-4 h-4 rounded-full bg-coral border-2 border-white flex items-center justify-center">
                                <div class="w-2 h-2 rounded-full bg-white animate-pulse"></div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-3 left-3 right-3 bg-white bg-opacity-90 rounded-lg p-3 shadow-xs">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-ocean-800">North Fishing Grounds</p>
                                <p class="text-xs text-ocean-600">3.2nm from port</p>
                            </div>
                            <div class="text-xs bg-ocean-100 text-ocean-700 px-2 py-1 rounded-full">ACTIVE</div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3">
                    <button class="text-xs bg-ocean-50 text-ocean-700 px-3 py-2 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        View Map
                    </button>
                    <button class="text-xs bg-coral text-white px-3 py-2 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Log Catch
                    </button>
                </div>
            </div>
        </div>



        @elseif ($activeTab == 'Trips')
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

         {{-- <div class="container mx-auto px-4  max-w-6xl"> --}}
        <!-- Header -->

        <!-- Current Trip Section -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Current Trip Details</h2>
                {{-- <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i> New Trip
                </button> --}}
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Deep Sea Fishing Expedition</h3>
                            <p class="text-gray-600">Boat: <span class="font-medium">Blue Horizon II</span></p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <span class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">
                                In Progress
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500">Departure</p>
                            <p class="font-semibold">June 15, 2023</p>
                            <p class="text-gray-600">7:00 AM</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500">Expected Return</p>
                            <p class="font-semibold">June 17, 2023</p>
                            <p class="text-gray-600">5:00 PM</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500">Fishing Zone</p>
                            <p class="font-semibold">North Atlantic</p>
                            <p class="text-gray-600">Zone 4B</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-medium text-gray-700 mb-2">Crew Members</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">John Smith (Captain)</span>
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">Mike Johnson</span>
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">Carlos Mendez</span>
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">You</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                        {{-- <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt mr-2"></i> Track Location
                        </button>
                        <button class="flex-1 bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 py-2 px-4 rounded-lg flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i> Update Log
                        </button>
                        <button class="flex-1 bg-white border border-gray-300 hover:bg-gray-50 py-2 px-4 rounded-lg flex items-center justify-center">
                            <i class="fas fa-phone-alt mr-2"></i> Contact Crew
                        </button> --}}
                    </div>
                </div>
            </div>
        </section>

        <!-- Older Trips Section -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Older Trips</h2>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trip</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Boat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zone</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Trip 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Coastal Fishing</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    May 28 - 29, 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Sea Explorer
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Coastal 2A
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Report</a>
                                </td>
                            </tr>

                            <!-- Trip 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Deep Water Tuna</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    May 15 - 18, 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Blue Horizon II
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    North Atlantic 3C
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Report</a>
                                </td>
                            </tr>

                            <!-- Trip 3 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Lobster Season</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    April 30 - May 2, 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Mariner's Pride
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Coastal 1B
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Reported
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>

                            <!-- Trip 4 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">Early Season Test</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    April 10 - 11, 2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Sea Explorer
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    Bay Area
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Report</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
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
                </div>
            </div>
        </section>
    {{-- </div> --}}

        @elseif ($activeTab == 'Payments')

          <style>
            .tab-activeC {
                position: relative;
                color: #2E86AB;
                font-weight: 600;
            }

            .tab-activeC:after {
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

        <section>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Payment Slip</h2>
                <div class="flex space-x-3">
                    <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-print mr-2"></i> Print
                    </button>
                    <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-download mr-2"></i> Download
                    </button>
                </div>
            </div>

            <!-- Payment Slip Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <!-- Payment Header -->
                <div class="bg-blue-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-white">Payment Receipt</h3>
                            <p class="text-blue-100">Fisherman Account Statement</p>
                        </div>
                        <div class="text-right">
                            <p class="text-blue-100">Receipt No:</p>
                            <p class="font-bold text-white">PAY-2023-00654</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <!-- Fisherman Details -->
                        <div>
                            <h4 class="font-bold text-gray-700 mb-3 border-b pb-2">Fisherman Details</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium text-gray-600">Name:</span> John Fisherman</p>
                                <p><span class="font-medium text-gray-600">Account ID:</span> FM-45872</p>
                                <p><span class="font-medium text-gray-600">Contact:</span> +1 (555) 123-4567</p>
                                <p><span class="font-medium text-gray-600">Email:</span> john.fisherman@example.com</p>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div>
                            <h4 class="font-bold text-gray-700 mb-3 border-b pb-2">Payment Information</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium text-gray-600">Date:</span> June 10, 2023</p>
                                <p><span class="font-medium text-gray-600">Payment Method:</span> Bank Transfer</p>
                                <p><span class="font-medium text-gray-600">Transaction ID:</span> TXN789456123</p>
                                <p><span class="font-medium text-gray-600">Status:</span> <span class="bg-green-100 text-green-800 text-sm font-semibold px-2 py-0.5 rounded-full">Completed</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Trip Details -->
                    <div class="mb-8">
                        <h4 class="font-bold text-gray-700 mb-3 border-b pb-2">Trip Details</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trip</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Boat</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catch Weight</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rate</th>
                                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Deep Sea Tuna</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">May 28-29, 2023</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Blue Horizon II</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">1,250 kg</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">$4.20/kg</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">$5,250.00</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Coastal Fishing</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">May 15-16, 2023</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Sea Explorer</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">850 kg</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">$3.75/kg</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">$3,187.50</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Payment Summary -->
                    <div class="bg-blue-50 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-bold text-gray-700 mb-3">Payment Notes</h4>
                                <p class="text-gray-600"> Please allow 1-2 business days for the amount to reflect in your account. Contact accounts@fishingco.com for any queries.</p>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium text-gray-600">Subtotal:</span>
                                    <span class="font-medium">$8,437.50</span>
                                </div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium text-gray-600">Deductions:</span>
                                    <span class="font-medium">-$375.00</span>
                                </div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium text-gray-600">Equipment Fees:</span>
                                    <span class="font-medium">-$120.00</span>
                                </div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium text-gray-600">Tax:</span>
                                    <span class="font-medium">$673.50</span>
                                </div>
                                <div class="flex justify-between pt-3 border-t border-gray-300 mt-2">
                                    <span class="font-bold text-gray-700">Total Amount:</span>
                                    <span class="font-bold text-blue-600 text-lg">$8,616.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Footer -->
                <div class="bg-gray-50 px-6 py-4">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <p class="text-sm text-gray-500">Thank you for your service!</p>
                            <p class="text-sm text-gray-500">Atlantic Fishing Co.</p>
                        </div>
                        <div class="flex space-x-4">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                                <i class="fas fa-file-invoice-dollar mr-2"></i> Request Invoice
                            </button>
                            <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                                <i class="fas fa-question-circle mr-2"></i> Help
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Payments Section -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Payments</h3>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 15, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">PAY-2023-00542</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$7,842.50</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bank Transfer</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">April 30, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">PAY-2023-00489</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$5,675.20</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Check</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">April 15, 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">PAY-2023-00421</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$6,120.75</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bank Transfer</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

        <h1>dilsham2</h1>
        @elseif ($activeTab == 'Details')

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

        </header>

        <!-- Current Team Section -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Current Team Members</h2>

            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Team Member 1 -->
                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-4">
                                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-2xl font-bold mr-4">
                                    MS
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Mike Smith</h4>
                                    <p class="text-sm text-gray-600">Captain</p>
                                </div>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><i class="fas fa-id-card mr-2 text-gray-500"></i> FM-32567</p>
                                <p><i class="fas fa-phone mr-2 text-gray-500"></i> +1 (555) 234-5678</p>
                                <p><i class="fas fa-certificate mr-2 text-gray-500"></i> License: FL-6543210</p>
                                <p><span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded-full">Active</span></p>
                            </div>
                        </div>

                        <!-- Team Member 2 -->
                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-4">
                                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-2xl font-bold mr-4">
                                    CJ
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Carlos Johnson</h4>
                                    <p class="text-sm text-gray-600">First Mate</p>
                                </div>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><i class="fas fa-id-card mr-2 text-gray-500"></i> FM-28945</p>
                                <p><i class="fas fa-phone mr-2 text-gray-500"></i> +1 (555) 345-6789</p>
                                <p><i class="fas fa-certificate mr-2 text-gray-500"></i> License: FL-9876543</p>
                                <p><span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded-full">Active</span></p>
                            </div>
                        </div>

                        <!-- Team Member 3 -->
                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-4">
                                <div class="w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 text-2xl font-bold mr-4">
                                    TM
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Thomas Miller</h4>
                                    <p class="text-sm text-gray-600">Deckhand</p>
                                </div>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><i class="fas fa-id-card mr-2 text-gray-500"></i> FM-41256</p>
                                <p><i class="fas fa-phone mr-2 text-gray-500"></i> +1 (555) 456-7890</p>
                                <p><i class="fas fa-certificate mr-2 text-gray-500"></i> License: FL-1234567</p>
                                <p><span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-0.5 rounded-full">On Leave</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- All Team Members Section -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">All Team Members</h2>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Member</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">License</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Team Member 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold mr-3">
                                            MS
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Mike Smith</div>
                                            <div class="text-sm text-gray-500">FM-32567</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Captain
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    +1 (555) 234-5678
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    FL-6543210
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Message</a>
                                </td>
                            </tr>

                            <!-- Team Member 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-3">
                                            CJ
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Carlos Johnson</div>
                                            <div class="text-sm text-gray-500">FM-28945</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    First Mate
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    +1 (555) 345-6789
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    FL-9876543
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Message</a>
                                </td>
                            </tr>

                            <!-- Team Member 3 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 font-bold mr-3">
                                            TM
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Thomas Miller</div>
                                            <div class="text-sm text-gray-500">FM-41256</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    Deckhand
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    +1 (555) 456-7890
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    FL-1234567
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        On Leave
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Message</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>


        @endif

    </div>
</div>
