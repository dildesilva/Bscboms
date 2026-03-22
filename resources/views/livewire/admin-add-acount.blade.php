<div class="animate-fadeIn min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-3 sm:p-4 transition-colors duration-200">

    <div class="w-full max-w-4xl">
        <div class="backdrop-blur-md bg-white/70 dark:bg-gray-800/70 rounded-xl shadow-xl overflow-hidden border border-white/20 dark:border-gray-700/50">

            <!-- Header -->
            <div class="bg-gradient-to-r from-[#1d1657] to-[#330080] p-3 text-center border-b border-white/20 dark:border-gray-700/50">
                <p class="text-green-100 text-sm font-medium">Create New User Account</p>

                <!-- Loading Spinner -->
                <div wire:loading class="flex justify-center items-center mt-1">
                    <svg class="animate-spin h-4 w-4 text-white/80" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>

            <!-- Flash Messages -->
            <div class="p-4 sm:p-5">

                <!-- Global Error List -->
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 border border-red-300/50 dark:border-red-800/50 rounded-md text-xs text-red-700 dark:text-red-300">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success Message -->
                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="fixed inset-0 z-50 flex items-center justify-center p-4 backdrop-blur-sm">

                        <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-lg shadow-lg border border-green-200 dark:border-green-700 p-4 max-w-xs w-full mx-auto">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <div class="ml-3">
                                    <h3 class="text-sm font-semibold text-green-700 dark:text-green-300">Success</h3>
                                    <p class="text-xs text-gray-700 dark:text-gray-200 mt-0.5">
                                        {{ session('success') }}
                                    </p>
                                </div>
                                <button @click="show = false" class="ml-auto text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- General Error Message -->
                @if (session()->has('error'))
                    <div class="mb-4 p-3 bg-red-100 dark:bg-red-900/30 border border-red-400/50 dark:border-red-700/50 rounded-md text-xs text-red-700 dark:text-red-300">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form -->
                <form wire:submit.prevent="saveUser" enctype="multipart/form-data" class="space-y-4">
           {{-- <form wire:submit.prevent="saveUser" enctype="multipart/form-data" class="space-y-4"></form> --}}
                    <!-- Account Type -->
                    <div>
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-2">Account Type</label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                            @foreach (['Admin' => 'Full access', 'Boat' => 'Vessels', 'Fisherman' => 'Catch reports'] as $type => $desc)
                                <label class="flex items-center p-2 border border-gray-300/70 dark:border-gray-700/50 rounded-md cursor-pointer hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-all duration-150 has-[:checked]:border-green-400 has-[:checked]:bg-green-50/50 dark:has-[:checked]:bg-green-900/20 backdrop-blur-sm">
                                    <input type="radio" name="accountsType" value="{{ $type }}" required wire:model="accountsType"
                                        class="h-3 w-3 text-green-600 focus:ring-green-400 border-gray-300 dark:border-gray-600 dark:bg-gray-700" />
                                    <div class="ml-2">
                                        <span class="block text-xs font-medium text-gray-900 dark:text-white">{{ $type }}</span>
                                        <span class="block text-2xs text-gray-500 dark:text-gray-400">{{ $desc }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('accountsType') <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Name & Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="name" class="text-xs text-gray-700 dark:text-gray-300">Full Name</label>
                            <input id="name" type="text" wire:model="name" required placeholder="John Doe"
                                class="w-full text-xs px-3 py-1.5 rounded-md border border-gray-300 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 shadow-sm focus:ring-green-400 focus:border-green-400" />
                            @error('name') <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="text-xs text-gray-700 dark:text-gray-300">Email</label>
                            <input id="email" type="email" wire:model="email" required placeholder="user@example.com"
                                class="w-full text-xs px-3 py-1.5 rounded-md border border-gray-300 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 shadow-sm focus:ring-green-400 focus:border-green-400" />
                            @error('email') <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Contact & Photo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="contactnumber" class="text-xs text-gray-700 dark:text-gray-300">Contact Number</label>
                            <input id="contactnumber" type="text" wire:model="contactnumber" required placeholder="+123456789"
                                class="w-full text-xs px-3 py-1.5 rounded-md border border-gray-300 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 shadow-sm focus:ring-green-400 focus:border-green-400" />
                            @error('contactnumber') <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="accountDP" class="text-xs text-gray-700 dark:text-gray-300">Profile Photo</label>
                            <label class="flex flex-col items-center justify-center h-24 border-2 border-dashed rounded-md cursor-pointer bg-white/50 dark:bg-gray-800/50 border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Click to upload</p>
                                <input type="file" id="accountDP" wire:model="accountDP" required class="hidden" />
                            </label>
                            @if($accountDP)
                                <p class="mt-0.5 text-2xs text-gray-600 dark:text-gray-400 truncate">{{ $accountDP->getClientOriginalName() }}</p>
                            @endif
                            @error('accountDP') <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Password & Confirm -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="password" class="text-xs text-gray-700 dark:text-gray-300">Password</label>
                            <input id="password" type="password" wire:model="password" required placeholder="••••••••"
                                class="w-full text-xs px-3 py-1.5 rounded-md border border-gray-300 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 shadow-sm focus:ring-green-400 focus:border-green-400" />
                            @error('password') <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="text-xs text-gray-700 dark:text-gray-300">Confirm Password</label>
                            <input id="password_confirmation" type="password" wire:model="password_confirmation" required placeholder="••••••••"
                                class="w-full text-xs px-3 py-1.5 rounded-md border border-gray-300 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 text-gray-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 shadow-sm focus:ring-green-400 focus:border-green-400" />
                            @error('password_confirmation') <p class="mt-0.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Submit/Reset -->
                    <div class="flex flex-col sm:flex-row justify-end gap-2 pt-4">
                        <button type="reset" class="text-xs px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-md font-medium text-gray-700 dark:text-gray-300 bg-white/50 dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all">Reset</button>
                        <button type="submit" class="text-xs px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium transition-all">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
