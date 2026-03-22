<div>
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
                    <p class="text-xs text-ocean-600">Completed trips</p>
                    <p class="text-xl font-semibold text-ocean-800">42</p>
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

            {{-- <div class="bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg p-4 flex items-center">
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
            </div> --}}

            {{-- <div class="bg-gradient-to-br from-ocean-50 to-ocean-100 rounded-lg p-4 flex items-center">
                <div class="bg-white p-2 rounded-lg shadow-sm mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ocean-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-ocean-600">Avg. Catch</p>
                    <p class="text-xl font-semibold text-ocean-800">38.2kg</p>
                </div>
            </div> --}}
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
</div>
