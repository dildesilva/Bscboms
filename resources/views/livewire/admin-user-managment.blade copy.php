<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">User Management</h1>
        <div class="space-x-3">
            <button wire:click="$set('activeTab', 'active')" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-900 transition">All Type Acoounts</button>

            <button wire:click="$set('activeTab', 'admin')" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Admin Acoounts</button>
            <button wire:click="$set('activeTab', 'Boats')" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Boat Acoounts</button>
            <button wire:click="$set('activeTab', 'Fisherman')" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Fisherman Acoounts</button>
            {{-- <button wire:click="$set('activeTab', 'admin')" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition">Other</button> --}}

        </div>
    </div>

    @if ($activeTab == 'admin')
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Admin Acoounts</h2>
    <table class="min-w-full table-auto border border-red-200 text-sm text-left text-gray-700" wire:poll='refresh'>
        <thead class="bg-gray-100 border border-red-200 text-black uppercase text-md font-bold tracking-wider">
            <tr>
                <th class="px-4 py-3">ID</th>
                {{-- <th class="px-4 py-3">Profile</th> --}}
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Account Type</th>
                <th class="px-4 py-3">Contact No</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            {{-- <div wire:loading class="flex items-center gap-2 text-blue-600 text-xs mb-2 ">
            <svg class="animate-spin h-3 w-3 text-blue-500" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            Updating...
        </div> --}}
            @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mb-2 p-2 bg-green-100 text-green-800 text-xs rounded">
                {{ session('success') }}
            </div>
            @endif

        </thead>
        <tbody class="divide-y  divide-red-200">
            @foreach ($admin as $user)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $user->id }}</td>
                {{-- <td class="px-4 py-3">
                    <img src="{{ asset('storage/' . $user->accountDP) }}" alt="Profile"
                class="w-10 h-10 rounded-full object-cover border border-gray-300">
                </td> --}}
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->name }}" wire:change="updateUser({{ $user->id }}, 'name', $event.target.value)">

                </td>
                <td class="px-4 py-3">

                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->accountsType }}" wire:change="updateUser({{ $user->id }}, 'accountsType', $event.target.value)">

                </td>
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value=" {{ $user->contactnumber }}" wire:change="updateUser({{ $user->id }}, 'contactnumber', $event.target.value)">

                </td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3 flex items-center gap-2">
                    {{-- <button class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md text-xs">Edit</button> --}}
                    <button class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded-md text-xs" wire:click="deleteUser({{ $user->id }})">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if ($activeTab == 'Boats')
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Boat Acoounts</h2>
    <table class="min-w-full table-auto border border-red-200 text-sm text-left text-gray-700" wire:poll='refresh'>
        <thead class="bg-gray-100 border border-red-200 text-black uppercase text-md font-bold tracking-wider">
            <tr>
                <th class="px-4 py-3">ID</th>
                {{-- <th class="px-4 py-3">Profile</th> --}}
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Account Type</th>
                <th class="px-4 py-3">Contact No</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            {{-- <div wire:loading class="flex items-center gap-2 text-blue-600 text-xs mb-2 ">
            <svg class="animate-spin h-3 w-3 text-blue-500" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            Updating...
        </div> --}}
            @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mb-2 p-2 bg-green-100 text-green-800 text-xs rounded">
                {{ session('success') }}
            </div>
            @endif

        </thead>
        <tbody class="divide-y  divide-red-200">
            @foreach ($boats as $user)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $user->id }}</td>
                {{-- <td class="px-4 py-3">
                    <img src="{{ asset('storage/' . $user->accountDP) }}" alt="Profile"
                class="w-10 h-10 rounded-full object-cover border border-gray-300">
                </td> --}}
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->name }}" wire:change="updateUser({{ $user->id }}, 'name', $event.target.value)">

                </td>
                <td class="px-4 py-3">

                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->accountsType }}" wire:change="updateUser({{ $user->id }}, 'accountstype', $event.target.value)">

                </td>
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value=" {{ $user->contactnumber }}" wire:change="updateUser({{ $user->id }}, 'contactnumber', $event.target.value)">

                </td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3 flex items-center gap-2">
                    {{-- <button class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md text-xs">Edit</button> --}}
                    <button class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded-md text-xs" wire:click="deleteUser({{ $user->id }})">
                        Delete
                    </button>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if ($activeTab == 'Fisherman')
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Fisherman Acoounts</h2>
    <table class="min-w-full table-auto border border-red-200 text-sm text-left text-gray-700">
        <thead class="bg-gray-100 border border-red-200 text-black uppercase text-md font-bold tracking-wider">
            <tr>
                <th class="px-4 py-3">ID</th>
                {{-- <th class="px-4 py-3">Profile</th> --}}
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Account Type</th>
                <th class="px-4 py-3">Contact No</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            {{-- <div wire:loading class="flex items-center gap-2 text-blue-600 text-xs mb-2 ">
            <svg class="animate-spin h-3 w-3 text-blue-500" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            Updating...
        </div> --}}
            @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mb-2 p-2 bg-green-100 text-green-800 text-xs rounded">
                {{ session('success') }}
            </div>
            @endif

        </thead>
        <tbody class="divide-y  divide-red-200">
            @foreach ($fisherman as $user)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $user->id }}</td>
                {{-- <td class="px-4 py-3">
                    <img src="{{ asset('storage/' . $user->accountDP) }}" alt="Profile"
                class="w-10 h-10 rounded-full object-cover border border-gray-300">
                </td> --}}
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->name }}" wire:change="updateUser({{ $user->id }}, 'name', $event.target.value)">

                </td>
                <td class="px-4 py-3">

                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->accountsType }}" wire:change="updateUser({{ $user->id }}, 'accountsType', $event.target.value)">

                </td>
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value=" {{ $user->contactnumber }}" wire:change="updateUser({{ $user->id }}, 'contactnumber', $event.target.value)">

                </td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3 flex items-center gap-2">
                    {{-- <button class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md text-xs">Edit</button> --}}
                    <button class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded-md text-xs" wire:click="deleteUser({{ $user->id }})">
                        Delete
                    </button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


    @if ($activeTab == 'active')
    <h2 class="text-xl font-semibold text-gray-800 mb-4">All Acoounts</h2>
    <table class="min-w-full table-auto border border-red-200 text-sm text-left text-gray-700" wire:poll='refresh'>
        <thead class="bg-gray-100 border border-red-200 text-black uppercase text-md font-bold tracking-wider">
            <tr>
                <th class="px-4 py-3">ID</th>
                {{-- <th class="px-4 py-3">Profile</th> --}}
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Account Type</th>
                <th class="px-4 py-3">Contact No</th>
                <th class="px-4 py-3">Email</th>
                {{-- <th class="px-4 py-3">Actions</th> --}}
            </tr>
            {{-- <div wire:loading class="flex items-center gap-2 text-blue-600 text-xs mb-2 ">
            <svg class="animate-spin h-3 w-3 text-blue-500" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
            </svg>
            Updating...
        </div> --}}
            @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mb-2 p-2 bg-green-100 text-green-800 text-xs rounded">
                {{ session('success') }}
            </div>
            @endif

        </thead>
        <tbody class="divide-y  divide-red-200">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $user->id }}</td>
                {{-- <td class="px-4 py-3">
                    <img src="{{ asset('storage/' . $user->accountDP) }}" alt="Profile"
                class="w-10 h-10 rounded-full object-cover border border-gray-300">
                </td> --}}
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->name }}" wire:change="updateUser({{ $user->id }}, 'name', $event.target.value)">

                </td>
                <td class="px-4 py-3">

                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value="{{ $user->accountsType }}" wire:change="updateUser({{ $user->id }}, 'accountsType', $event.target.value)">

                </td>
                <td class="px-4 py-3">
                    <input type="text" class="w-full px-2 py-1 border rounded text-xs" value=" {{ $user->contactnumber }}" wire:change="updateUser({{ $user->id }}, 'contactnumber', $event.target.value)">

                </td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3 flex items-center gap-2">
                    {{-- <button class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded-md text-xs">Edit</button> --}}
                    {{-- <button class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded-md text-xs">Delete</button> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


</div>

