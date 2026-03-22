{{-- crew-dashboard.blade.php --}}
<div class="min-h-screen bg-gradient-to-br from-[#050e1f] via-[#0a1f3d] to-[#07304e] font-sans select-none">

    {{-- ===== AMBIENT BLOBS ===== --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#23a7ff]/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 -right-24 w-80 h-80 bg-[#0077cc]/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 left-1/3 w-72 h-72 bg-[#23a7ff]/5 rounded-full blur-3xl"></div>
    </div>

    {{-- ===== DESKTOP LAYOUT WRAPPER ===== --}}
    <div class="relative z-10 flex min-h-screen">

        {{-- ===================== --}}
        {{-- DESKTOP SIDEBAR       --}}
        {{-- ===================== --}}
        <aside class="hidden lg:flex flex-col w-64 xl:w-72 shrink-0 sticky top-0 h-screen
                      bg-white/[0.04] backdrop-blur-2xl border-r border-white/[0.08]">

            {{-- Sidebar Brand --}}
            <div class="px-6 pt-8 pb-6 border-b border-white/[0.08]">
                <h1 class="text-xl font-black text-white tracking-tight">
                    Crew<span class="text-[#23a7ff]">Dashboard</span>
                </h1>
                <p class="text-[10px] font-semibold tracking-[0.2em] text-[#7ec8f7] uppercase mt-1">
                    Professional Platform
                </p>
            </div>

            {{-- Sidebar User --}}
            <div class="px-6 py-5 border-b border-white/[0.08]">
                <div class="flex items-center gap-3">
                    <div class="relative shrink-0">
                        <div class="w-11 h-11 rounded-full ring-2 ring-[#23a7ff]/50 ring-offset-2 ring-offset-[#050e1f] overflow-hidden">
                            <img src="{{ asset('storage/profiles/' . Auth::user()->accountDP) }}"
                                 alt="DP" class="w-full h-full object-cover" />
                        </div>
                        @if($verifiedDone)
                        <span class="absolute -bottom-0.5 -right-0.5 w-4 h-4 bg-[#23a7ff] rounded-full border-2 border-[#050e1f] flex items-center justify-center">
                            <i class="bi bi-check text-white text-[8px] font-black"></i>
                        </span>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-white truncate flex items-center gap-1">
                            {{ Auth::user()->name }}
                            @if($verifiedDone)
                                <i class="bi bi-patch-check-fill text-[#23a7ff] text-xs shrink-0"></i>
                            @endif
                        </p>
                        <p class="text-xs text-[#7ec8f7] truncate mt-0.5">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            {{-- Sidebar Nav Links --}}
            <nav class="flex-1 px-4 py-5 space-y-1 overflow-y-auto">

                <p class="text-[10px] font-bold tracking-[0.18em] text-[#4a90b8] uppercase px-3 mb-3">Navigation</p>

                {{-- Trips --}}
                <button wire:click="changeTab('dashboard')"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left transition-all duration-200 group
                        {{ $activeTab == 'dashboard'
                            ? 'bg-[#23a7ff]/15 border border-[#23a7ff]/25'
                            : 'hover:bg-white/[0.06] border border-transparent' }}">
                    <i class="bi bi-compass{{ $activeTab == 'dashboard' ? '-fill' : '' }} text-lg
                        {{ $activeTab == 'dashboard' ? 'text-[#23a7ff]' : 'text-[#7ec8f7] group-hover:text-white' }}
                        transition-colors duration-200 w-5 text-center"></i>
                    <span class="text-sm font-semibold transition-colors duration-200
                        {{ $activeTab == 'dashboard' ? 'text-white' : 'text-[#a8cfe8] group-hover:text-white' }}">
                        Trips
                    </span>
                    @if($activeTab == 'dashboard')
                    <div class="ml-auto w-1.5 h-1.5 rounded-full bg-[#23a7ff]"></div>
                    @endif
                </button>

                {{-- Payments --}}
                <button wire:click="changeTab('Payments')"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left transition-all duration-200 group
                        {{ $activeTab == 'Payments'
                            ? 'bg-[#23a7ff]/15 border border-[#23a7ff]/25'
                            : 'hover:bg-white/[0.06] border border-transparent' }}">
                    <i class="bi bi-wallet{{ $activeTab == 'Payments' ? '2' : '' }} text-lg
                        {{ $activeTab == 'Payments' ? 'text-[#23a7ff]' : 'text-[#7ec8f7] group-hover:text-white' }}
                        transition-colors duration-200 w-5 text-center"></i>
                    <span class="text-sm font-semibold transition-colors duration-200
                        {{ $activeTab == 'Payments' ? 'text-white' : 'text-[#a8cfe8] group-hover:text-white' }}">
                        Payments
                    </span>
                    @if($activeTab == 'Payments')
                    <div class="ml-auto w-1.5 h-1.5 rounded-full bg-[#23a7ff]"></div>
                    @endif
                </button>

                {{-- My Details --}}
                <button wire:click="changeTab('Details')"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left transition-all duration-200 group
                        {{ $activeTab == 'Details'
                            ? 'bg-[#23a7ff]/15 border border-[#23a7ff]/25'
                            : 'hover:bg-white/[0.06] border border-transparent' }}">
                    <i class="bi bi-person{{ $activeTab == 'Details' ? '-fill' : '' }} text-lg
                        {{ $activeTab == 'Details' ? 'text-[#23a7ff]' : 'text-[#7ec8f7] group-hover:text-white' }}
                        transition-colors duration-200 w-5 text-center"></i>
                    <span class="text-sm font-semibold transition-colors duration-200
                        {{ $activeTab == 'Details' ? 'text-white' : 'text-[#a8cfe8] group-hover:text-white' }}">
                        My Details
                    </span>
                    @if($activeTab == 'Details')
                    <div class="ml-auto w-1.5 h-1.5 rounded-full bg-[#23a7ff]"></div>
                    @endif
                </button>

                {{-- Verify (only if not done) --}}
                @if(!$verifiedDone)
                <button wire:click="changeTab('acountVerify')"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-left transition-all duration-200 group
                        {{ $activeTab == 'acountVerify'
                            ? 'bg-yellow-400/15 border border-yellow-400/30'
                            : 'hover:bg-yellow-400/[0.06] border border-transparent' }}
                        mt-2">
                    <span class="relative flex h-2 w-2 shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-400"></span>
                    </span>
                    <i class="bi bi-shield-lock-fill text-lg text-yellow-300 w-5 text-center"></i>
                    <span class="text-sm font-bold text-yellow-200">Verify Account</span>
                </button>
                @endif

            </nav>

            {{-- Sidebar Logout --}}
            <div class="px-4 py-5 border-t border-white/[0.08]">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                               hover:bg-red-500/10 active:scale-95 transition-all duration-200 group border border-transparent hover:border-red-500/20">
                        <i class="bi bi-box-arrow-right text-lg text-[#7ec8f7]/60 group-hover:text-red-400 transition-colors duration-200 w-5 text-center"></i>
                        <span class="text-sm font-semibold text-[#a8cfe8]/60 group-hover:text-red-400 transition-colors duration-200">
                            Log Out
                        </span>
                    </button>
                </form>
            </div>

        </aside>

        {{-- ===================== --}}
        {{-- MAIN CONTENT AREA     --}}
        {{-- ===================== --}}
        <div class="flex-1 flex flex-col min-w-0">

            {{-- ===== MOBILE + DESKTOP TOP HEADER ===== --}}
            <header class="sticky top-0 z-50 bg-white/5 backdrop-blur-2xl border-b border-white/[0.08]">
                <div class="px-4 lg:px-8 py-3 flex items-center justify-between">

                    {{-- Mobile Brand (hidden on desktop) --}}
                    <div class="lg:hidden">
                        <h1 class="text-base font-black text-white tracking-tight leading-none">
                            Crew<span class="text-[#23a7ff]">Dashboard</span>
                        </h1>
                        <span class="text-[9px] font-semibold tracking-widest text-[#7ec8f7]/70 uppercase">Professional</span>
                    </div>

                    {{-- Desktop Page Title --}}
                    <div class="hidden lg:flex items-center gap-3">
                        <div class="w-1 h-6 rounded-full bg-gradient-to-b from-[#23a7ff] to-[#0055aa]"></div>
                        <div>
                            <h2 class="text-lg font-extrabold text-white leading-none">
                                @if ($activeTab == 'dashboard') Trip History
                                @elseif ($activeTab == 'Payments') Payments
                                @elseif ($activeTab == 'Details') My Details
                                @elseif ($activeTab == 'acountVerify') Verify Account
                                @endif
                            </h2>
                            <p class="text-xs text-[#7ec8f7] mt-0.5">
                                👋 Welcome back, <span class="font-semibold text-[#a8d8f0]">{{ Auth::user()->name }}</span>
                            </p>
                        </div>
                    </div>

                    {{-- Right Controls --}}
                    <div class="flex items-center gap-2.5">
                        @if (!$verifiedDone)
                        <button wire:click="changeTab('acountVerify')"
                            class="flex items-center gap-1.5 px-3 py-1.5 rounded-full
                                   bg-yellow-400/15 border border-yellow-400/30
                                   text-yellow-200 text-[11px] font-bold
                                   hover:bg-yellow-400/25 active:scale-95 transition-all duration-200">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-400"></span>
                            </span>
                            Verify
                        </button>
                        @else
                        <div class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#23a7ff]/10 border border-[#23a7ff]/20">
                            <i class="bi bi-patch-check-fill text-[#23a7ff] text-xs"></i>
                            <span class="text-[11px] font-bold text-[#7ec8f7]">Verified</span>
                        </div>
                        @endif

                        {{-- Avatar --}}
                        <div class="relative shrink-0">
                            <div class="w-9 h-9 rounded-full ring-2 ring-[#23a7ff]/50 ring-offset-2 ring-offset-[#050e1f] overflow-hidden">
                                <img src="{{ asset('storage/profiles/' . Auth::user()->accountDP) }}"
                                     alt="DP" class="w-full h-full object-cover" />
                            </div>
                            @if($verifiedDone)
                            <span class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-[#23a7ff] rounded-full border-2 border-[#050e1f] flex items-center justify-center">
                                <i class="bi bi-check text-white text-[7px] font-black"></i>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>
            </header>

            {{-- ===== MOBILE GREETING (shown below header on mobile only) ===== --}}
            <div class="lg:hidden px-4 pt-5 pb-2">
                <p class="text-[#7ec8f7]/80 text-xs font-medium">
                    Welcome back, <span class="text-[#a8d8f0] font-bold">{{ Auth::user()->name }}</span>
                </p>
                <div class="flex items-center gap-2.5 mt-1">
                    <div class="w-1 h-6 rounded-full bg-gradient-to-b from-[#23a7ff] to-[#0055aa]"></div>
                    <h2 class="text-xl font-extrabold text-white tracking-tight">
                        @if ($activeTab == 'dashboard') Trip History
                        @elseif ($activeTab == 'Payments') Payments
                        @elseif ($activeTab == 'Details') My Details
                        @elseif ($activeTab == 'acountVerify') Verify Account
                        @endif
                    </h2>
                </div>
            </div>

            {{-- ===== CONTENT CARD ===== --}}
            <main class="flex-1 px-4 lg:px-8 pb-32 lg:pb-8 pt-3 lg:pt-6">
                <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity duration-200">

                    {{-- Loading Bar --}}
                    <div wire:loading class="w-full h-0.5 bg-gradient-to-r from-transparent via-[#23a7ff] to-transparent rounded-full mb-4 animate-pulse"></div>

                    <div class="bg-white/[0.06] backdrop-blur-xl rounded-3xl border border-white/[0.08] shadow-2xl shadow-black/30 overflow-hidden">
                        {{-- Top accent --}}
                        <div class="h-px w-full bg-gradient-to-r from-transparent via-[#23a7ff]/40 to-transparent"></div>
                        <div class="p-4 md:p-6 lg:p-8">
                            @if ($activeTab == 'dashboard')
                                <livewire:fisherman-trip />
                            @elseif ($activeTab == 'Payments')
                                <livewire:fisherman-payment />
                            @elseif ($activeTab == 'acountVerify')
                                <livewire:fishacount-verify />
                            @elseif ($activeTab == 'Details')
                                <livewire:fisherman-data />
                            @endif
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    {{-- ===================== --}}
    {{-- MOBILE BOTTOM NAV     --}}
    {{-- (hidden on desktop)   --}}
    {{-- ===================== --}}
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 z-50" style="padding-bottom: env(safe-area-inset-bottom)">
        <div class="bg-[#060f20]/90 backdrop-blur-2xl border-t border-white/[0.10] shadow-[0_-8px_32px_rgba(0,0,0,0.5)]">
            <div class="flex items-end justify-around px-2 pt-2 pb-3">

                {{-- Trips --}}
                <button wire:click="changeTab('dashboard')"
                    class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-2xl transition-all duration-200 active:scale-90
                        {{ $activeTab == 'dashboard' ? 'bg-[#23a7ff]/15' : '' }}">
                    <i class="bi bi-compass{{ $activeTab == 'dashboard' ? '-fill' : '' }} text-[22px]
                        {{ $activeTab == 'dashboard' ? 'text-[#23a7ff]' : 'text-[#7ec8f7]/50' }}
                        transition-all duration-200"></i>
                    <span class="text-[10px] font-bold
                        {{ $activeTab == 'dashboard' ? 'text-[#23a7ff]' : 'text-[#7ec8f7]/50' }}
                        transition-all duration-200">Trips</span>
                    <div class="w-1 h-1 rounded-full mt-0.5 {{ $activeTab == 'dashboard' ? 'bg-[#23a7ff]' : 'bg-transparent' }}"></div>
                </button>

                {{-- Payments --}}
                <button wire:click="changeTab('Payments')"
                    class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-2xl transition-all duration-200 active:scale-90
                        {{ $activeTab == 'Payments' ? 'bg-[#23a7ff]/15' : '' }}">
                    <i class="bi bi-wallet{{ $activeTab == 'Payments' ? '2' : '' }} text-[22px]
                        {{ $activeTab == 'Payments' ? 'text-[#23a7ff]' : 'text-[#7ec8f7]/50' }}
                        transition-all duration-200"></i>
                    <span class="text-[10px] font-bold
                        {{ $activeTab == 'Payments' ? 'text-[#23a7ff]' : 'text-[#7ec8f7]/50' }}
                        transition-all duration-200">Payments</span>
                    <div class="w-1 h-1 rounded-full mt-0.5 {{ $activeTab == 'Payments' ? 'bg-[#23a7ff]' : 'bg-transparent' }}"></div>
                </button>

                {{-- Center FAB --}}
                @if (!$verifiedDone)
                <button wire:click="changeTab('acountVerify')"
                    class="flex flex-col items-center gap-0.5 -mt-7 active:scale-90 transition-all duration-200">
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-400 to-orange-500
                                shadow-lg shadow-orange-500/40 flex items-center justify-center
                                {{ $activeTab == 'acountVerify' ? 'ring-4 ring-yellow-400/40 ring-offset-2 ring-offset-[#060f20]' : '' }}">
                        <span class="absolute inset-0 rounded-2xl animate-ping bg-yellow-400/20"></span>
                        <i class="bi bi-shield-lock-fill text-2xl text-white relative z-10"></i>
                    </div>
                    <span class="text-[10px] font-bold text-yellow-300 mt-1">Verify</span>
                    <div class="w-1 h-1 rounded-full mt-0.5"></div>
                </button>
                @else
                <div class="flex flex-col items-center gap-0.5 -mt-7">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#23a7ff] to-[#0055aa]
                                shadow-lg shadow-blue-500/30 flex items-center justify-center">
                        <i class="bi bi-patch-check-fill text-2xl text-white"></i>
                    </div>
                    <span class="text-[10px] font-bold text-[#23a7ff] mt-1">Verified</span>
                    <div class="w-1 h-1 rounded-full mt-0.5"></div>
                </div>
                @endif

                {{-- Details --}}
                <button wire:click="changeTab('Details')"
                    class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-2xl transition-all duration-200 active:scale-90
                        {{ $activeTab == 'Details' ? 'bg-[#23a7ff]/15' : '' }}">
                    <i class="bi bi-person{{ $activeTab == 'Details' ? '-fill' : '' }} text-[22px]
                        {{ $activeTab == 'Details' ? 'text-[#23a7ff]' : 'text-[#7ec8f7]/50' }}
                        transition-all duration-200"></i>
                    <span class="text-[10px] font-bold
                        {{ $activeTab == 'Details' ? 'text-[#23a7ff]' : 'text-[#7ec8f7]/50' }}
                        transition-all duration-200">Details</span>
                    <div class="w-1 h-1 rounded-full mt-0.5 {{ $activeTab == 'Details' ? 'bg-[#23a7ff]' : 'bg-transparent' }}"></div>
                </button>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex flex-col items-center gap-0.5 px-4 py-1.5 rounded-2xl
                               hover:bg-red-500/10 active:scale-90 transition-all duration-200 group">
                        <i class="bi bi-power text-[22px] text-[#7ec8f7]/50 group-hover:text-red-400 transition-colors duration-200"></i>
                        <span class="text-[10px] font-bold text-[#7ec8f7]/50 group-hover:text-red-400 transition-colors duration-200">Logout</span>
                        <div class="w-1 h-1 rounded-full mt-0.5"></div>
                    </button>
                </form>

            </div>
        </div>
    </nav>

</div>