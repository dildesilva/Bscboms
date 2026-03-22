
<div wire:poll.2s>
    <nav wire:poll.2s class="w-[100%]    h-[40px]  z-10 p-2 ">
        <div class="flex w-[95%] m-auto">
            <div class="flex text-[white] w-[20%] m-auto"><a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> {{Auth::user()->accountsType}} Acoount
                </a></div>
            <div class="flex w-[60%] m-auto">
                @if (Auth::user()->accountsType =="Admin")
                <ul class="flex m-auto ">
                    <li class="mx-5 text-[white] hover:text-red-400"><a href="{{ route('boatadmin') }}" ><i class="bi bi-fan"></i> Boats</a></li>
                    <li class="mx-5 text-[white] hover:text-red-400"><a href="{{ route('adminfisherman') }}"><i class="bi bi-people-fill"></i> Fisherman</a></li>
                    {{-- <li class="mx-5 text-[white] hover:text-red-400"><a href=""><i class="bi bi-credit-card-2-back-fill"></i> Payroll</a></li> --}}


                </ul>
                @elseif (Auth::user()->accountsType =="Boat")
                <ul class="flex m-auto ">
                    @if ($verifiedDone==false)
                    <li class="registerboat mx-5 text-[white] hover:text-red-400"><a href="{{ route('boatcomplet') }}"><i class="bi bi-fan"></i> Boats Details</a></li>
                    @else
                    <li class=" mx-5 text-[#23a7ff] hover:text-blue-400"><i class="bi bi-patch-check-fill"></i> </i>Verified Boat</a></li>

                    @endif
                    {{-- <li class="registerboat mx-5 text-[white] hover:text-red-400"><a href="{{ route('boatcomplet') }}" wire:navigate><i class="bi bi-fan"></i> Boats Details</a></li> --}}



                </ul>
                @endif
            </div>
            <div class="flex w-full md:w-[20%] items-center justify-end gap-3">
                <!-- Profile Button -->
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center bg-gray-600 text-white px-3 py-1 rounded-md hover:bg-gray-500 transition text-sm">
                    <i class="bi bi-person-square mr-1"></i>
                    <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                </a>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="flex">
                    @csrf
                    <button type="submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition text-sm">
                        <i class="bi bi-box-arrow-right mr-1"></i>
                        <span class="hidden sm:inline">Log Out</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

</div>
