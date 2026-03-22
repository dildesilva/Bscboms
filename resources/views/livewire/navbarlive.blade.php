<div wire:poll.2s>
    <nav wire:poll.2s class="w-[100%] h-[40px] z-10 p-2">
        <div class="flex flex-col md:flex-row w-[95%] m-auto">
            <!-- Logo/Branding -->
            <div class="flex text-[white] w-full md:w-[20%] m-auto">
                <a href="{{ route('dashboard') }}" class="text-sm md:text-base">
                    <i class="bi bi-speedometer2"></i>
                    <span class="hidden sm:inline">{{Auth::user()->accountsType}} Account</span>
                    <span class="sm:hidden">Dashboard</span>
                </a>
            </div>

            <!-- Main Menu - hidden on mobile -->
            <div class="hidden md:flex w-full md:w-[60%] m-auto">
                @if (Auth::user()->accountsType == "Admin")
                <ul class="flex m-auto">
                    <li class="mx-2 md:mx-5 text-[white] hover:text-red-400">
                        <a href="{{ route('boatadmin') }}">
                            <i class="bi bi-fan"></i> <span class="hidden sm:inline">Boats</span>
                        </a>
                    </li>
                    <li class="mx-2 md:mx-5 text-[white] hover:text-red-400">
                        <a href="{{ route('adminfisherman') }}">
                            <i class="bi bi-people-fill"></i> <span class="hidden sm:inline">Fisherman</span>
                        </a>
                    </li>
                </ul>
                @elseif (Auth::user()->accountsType == "Boat")
                <ul class="flex m-auto">
                    @if ($verifiedDone==false)
                    <li class="registerboat mx-2 md:mx-5 text-[white] hover:text-red-400">
                        <a href="{{ route('boatcomplet') }}">
                            <i class="bi bi-fan"></i> <span class="hidden sm:inline">Boats Details</span>
                        </a>
                    </li>
                    @else
                    <li class="mx-2 md:mx-5 text-[#23a7ff] hover:text-blue-400">
                        <i class="bi bi-patch-check-fill"></i> <span class="hidden sm:inline">Verified Boat</span>
                    </li>
                    @endif
                </ul>
                @endif
            </div>

            <!-- User Controls -->
            <div class="flex w-full md:w-[20%] items-center justify-end gap-2 md:gap-3 mt-1 md:mt-0">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center bg-gray-600 text-white px-2 md:px-3 py-1 rounded-md hover:bg-gray-500 transition text-xs md:text-sm">
                    <i class="bi bi-person-square mr-1"></i>
                    <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                    <span class="sm:hidden">Profile</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="flex">
                    @csrf
                    <button type="submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center bg-red-600 text-white px-2 md:px-3 py-1 rounded-md hover:bg-red-700 transition text-xs md:text-sm">
                        <i class="bi bi-box-arrow-right mr-1"></i>
                        <span class="hidden sm:inline">Log Out</span>
                        <span class="sm:hidden">Exit</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>
