<div class="w-[90%] h-[100%] m-auto items-center justify-center px-4 py-12">
    <div class="bg-[#d5d4d4] w-full rounded-2xl shadow-xl p-5 md:p-5">
        <div class="text-center">

            <h1 class="text-3xl font-semibold text-gray-900">BOMS</h1>
            <p class="text-gray-500 mt-2">Create account
                <div wire:loading class="flex items-center gap-2 text-blue-600 text-xs mb-2 ">
                    <svg class="animate-spin h-3 w-3 text-blue-500" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                    </svg>
                </div>
            </p>

            @if (session()->has('success'))
            <div id="successModal" class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                    <div class="flex justify-between items-center">
                        {{-- <h3 class="text-lg font-semibold text-green-700">Success</h3> --}}
                        {{-- <button onclick="document.getElementById('successModal').style.display='none'" class="text-gray-500 hover:text-gray-700"><i class="bi bi-x-square-fill"></i></button> --}}
                    </div>
                    <p class="mt-4 text-green-700">
                        {{ session('success') }}
                        <button onclick="document.getElementById('successModal').style.display='none'" class="text-gray-500 hover:text-gray-700">Okay</i></button>

                    </p>
                </div>
            </div>
        @endif
        </div>



        <form wire:submit.prevent="saveUser" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Account Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Account Type</label>
                <div class="flex items-center gap-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="accountsType" value="Admin" required class="accent-green-600" wire:model="accountsType" />
                        <span class="ml-2 text-gray-700">Admin</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="accountsType" value="Boat" required class="accent-green-600" wire:model="accountsType" />
                        <span class="ml-2 text-gray-700">Boat</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="accountsType" value="Fisherman" required class="accent-green-600" wire:model="accountsType" />
                        <span class="ml-2 text-gray-700">Fisherman</span>
                    </label>
                </div>
                @error('accountsType')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Name and Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" name="name" type="text" wire:model="name" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" name="email" type="email" wire:model="email" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Contact and DP -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contactnumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input id="contactnumber" name="contactnumber" type="text" wire:model="contactnumber" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                    @error('contactnumber')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="accountDP" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input id="accountDP" name="accountDP" type="file" wire:model="accountDP" required
                        class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-100 file:text-green-700 hover:file:bg-green-200" />
                    @error('accountDP')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Passwords -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" wire:model="password" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" wire:model="password_confirmation" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit -->
            <div class="flex pt-4">
                <button type="submit"
                    class="w-[20%] mx-2 bg-green-600 hover:bg-green-700 transition text-white py-3 px-6 rounded-md text-base font-medium">
                    Register
                </button>
                <button type="reset"
                    class="w-[20%] mx-2 bg-red-600 hover:bg-red-700 transition text-white py-3 px-6 rounded-md text-base font-medium">
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>
