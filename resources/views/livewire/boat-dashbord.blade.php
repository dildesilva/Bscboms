<!-- Liquid Glass Boat Dashboard - Mobile Responsive -->
<div class="bg-[#dedede] w-full min-h-screen p-2 sm:p-4 md:p-6 lg:p-8 transition-all duration-500">
    <div class="max-w-7xl mx-auto space-y-4 sm:space-y-6">


        <livewire:boat-dashbord-recent-trip />


        <!-- Boat Info + Trips Table -->
        <div class="grid grid-cols-1 z-10 gap-4 sm:gap-6">
            <!-- Boat Details with Glass Morphism -->
            <div class="bg-[#ffffff] backdrop-blur-lg p-4 sm:p-6 rounded-xl sm:rounded-2xl shadow-xl border border-white/30 hover:border-white/50 transition-all duration-300">
                <h3 class="text-lg sm:text-xl font-bold text-[#190a47] mb-4 sm:mb-6 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Boat Details</h3>

                @if ($boat)
                <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-2 sm:gap-3 md:gap-4 text-xs sm:text-sm">
                    @foreach([
                    'boatId' => 'Boat Email',
                    'boatName' => 'Boat Name',
                    'registrationNumber' => 'Reg. No.',
                    'year' => 'Year',
                    'engineType' => 'Engine Type',
                    'enginePower' => 'Engine Power',
                    'fishingMethod' => 'Fishing Method',
                    ] as $field => $label)
                    <div class="flex flex-col bg-[#0e0845] p-2 sm:p-3 md:p-4 rounded-lg sm:rounded-xl shadow-inner border border-white/20 backdrop-blur-sm hover:bg-white/40 transition">
                        <span class="text-white/70 font-medium">{{ $label }}</span>
                        <span class="font-semibold text-[#a2a2a2] truncate">{{ $boat->$field }}</span>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center text-white/50 text-sm sm:text-base py-4 sm:py-6 bg-white/10 rounded-xl">
                    No Verified Boat Details
                </div>
                @endif
            </div>
        </div>

<!-- Recent Trips Table with Glass Effect -->
<div class="bg-[#ffffff] backdrop-blur-lg p-4 sm:p-6 rounded-xl sm:rounded-2xl shadow-lg border border-white/30">
    <h3 class="text-base sm:text-lg font-semibold text-[white] mb-3 sm:mb-4 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Recent Trips</h3>

    <div class="overflow-x-auto rounded-lg sm:rounded-xl border border-white/20">
        <table class="min-w-full bg-white/10 backdrop-blur-sm text-[10px] xs:text-xs sm:text-xs border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-indigo-500/30 to-purple-500/30 text-[#0d0d53] text-left">
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10">Trip ID</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10">Start</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10 hidden xs:table-cell">Completed</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10 hidden sm:table-cell">Duration</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10">Return</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10">Fish (KG)</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10 hidden xs:table-cell">Cost</th>
                    <th class="py-2 px-2 sm:py-3 sm:px-4 border-b border-white/10">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trips as $trip)
                <tr class="border-b border-white/10 hover:bg-white/10 transition duration-150">
                    <td class="py-1 px-2 sm:py-2 sm:px-4 text-[blue]">{{ $trip->id }}</td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4 text-[blue]">{{ \Carbon\Carbon::parse($trip->departureTime)->format('M d') }}</td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4 text-[blue] hidden xs:table-cell">{{ \Carbon\Carbon::parse($trip->updated_at)->format('M d') }}</td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4 text-[blue] hidden sm:table-cell">
                        {{ \Carbon\Carbon::parse($trip->departureTime)->diffForHumans($trip->updated_at, ['parts' => 2, 'short' => true]) }}
                    </td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4 text-[blue]">{{ $trip->emergency ?? 'Normal' }}</td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4 bg-red-500 text-red-100 font-medium">{{ $trip->catchfish->sum('weight') }} KG</td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4 bg-emerald-500/20 text-emerald-100 font-medium hidden xs:table-cell">SCR {{ number_format($trip->expense->sum('amount'), 2) }}</td>
                    <td class="py-1 px-2 sm:py-2 sm:px-4">
                        <button onclick="openModal({{ $trip->id }})" class="hover:text-white bg-gradient-to-r from-indigo-500/80 to-purple-500/80 text-white text-[10px] xs:text-xs px-2 py-1 sm:px-3 sm:py-1 rounded hover:shadow-lg transition-all duration-300 hover:scale-105 whitespace-nowrap">
                            <i class="bi bi-box-arrow-up-right"></i> <span class="hidden xs:inline">View</span>
                        </button>
                    </td>
                </tr>

                <!-- Trip Modal -->
                <div id="modal-{{ $trip->id }}" class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center p-2 sm:p-4 transition-all duration-300">
                    <div class="bg-gradient-to-br from-gray-800/90 to-gray-900/90 w-full max-w-6xl p-4 sm:p-6 rounded-xl sm:rounded-2xl shadow-2xl border border-gray-700/50 relative text-xs sm:text-sm flex flex-col max-h-[90vh] sm:max-h-[80vh] overflow-hidden">
                        <button onclick="closeModal({{ $trip->id }})" class="absolute top-2 right-4 sm:top-4 sm:right-6 text-gray-400 hover:text-white text-xl sm:text-2xl font-bold transition duration-200 hover:scale-110">&times;</button>

                        <h3 class="text-lg sm:text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300 mb-4 sm:mb-6 pb-2 sm:pb-3 border-b border-gray-700 text-center">
                            T Ledger View – Trip {{ $trip->id }}
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 overflow-y-auto pr-1 scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-800/50">
                            <!-- Expenses -->
                            <div class="bg-gray-800/50 rounded-lg sm:rounded-xl border border-gray-700/50 p-3 sm:p-4">
                                <h4 class="text-sm sm:text-md font-bold text-blue-300 mb-2 sm:mb-3">Expenses</h4>
                                <div class="grid grid-cols-5 gap-2 sm:gap-4 bg-gray-700/70 text-gray-300 py-1 sm:py-2 px-1 sm:px-2 font-semibold uppercase text-[10px] xs:text-xs border-b border-gray-600">
                                    <div>Date</div><div>Desc</div><div class="text-right">Qty</div><div class="text-right">Unit</div><div class="text-right">Amt</div>
                                </div>
                                <div class="space-y-1 max-h-[30vh] sm:max-h-[35vh] overflow-y-auto pr-1">
                                    @forelse ($trip->expense as $item)
                                    <div class="grid grid-cols-5 gap-2 sm:gap-4 px-1 py-1 sm:px-2 sm:py-2 bg-gray-800/30 hover:bg-gray-700/50 rounded border-b border-gray-700/30 text-[10px] xs:text-xs">
                                        <div class="text-[blue]">{{ \Carbon\Carbon::parse($item->date_time)->format('M d') }}</div>
                                        <div class="text-[blue] truncate">{{ $item->description }}</div>
                                        <div class="text-right text-[blue]">{{ $item->quantity }}</div>
                                        <div class="text-right text-[blue]">{{ $item->unit }}</div>
                                        <div class="text-right text-white font-medium">{{ number_format($item->amount, 2) }}</div>
                                    </div>
                                    @empty
                                    <div class="text-center px-2 py-4 text-gray-400 bg-gray-800/20 rounded-lg">No expenses recorded.</div>
                                    @endforelse
                                </div>
                                <div class="mt-2 bg-gray-800/70 border-t border-gray-700 py-2 px-3 font-bold text-right text-white rounded-b-lg">
                                    Total Expenses: <span class="text-blue-300">SCR {{ number_format($trip->expense->sum('amount'), 2) }}</span>
                                </div>
                            </div>

                            <!-- Catch -->
                            <div class="bg-gray-800/50 rounded-lg border border-gray-700/50 p-3 sm:p-4">
                                <h4 class="text-sm sm:text-md font-bold text-green-300 mb-2">Catch Records</h4>
                                <div class="grid grid-cols-4 gap-2 bg-gray-700/70 text-gray-300 py-1 px-2 font-semibold uppercase text-[10px] xs:text-xs border-b border-gray-600">
                                    <div>Date</div><div>Fish</div><div class="text-right">KG</div><div class="text-right">Price</div>
                                </div>
                                <div class="space-y-1 max-h-[30vh] overflow-y-auto pr-1">
                                    @forelse ($trip->catchfish as $fish)
                                    <div class="grid grid-cols-4 gap-2 px-1 py-1 bg-gray-800/30 hover:bg-gray-700/50 rounded border-b border-gray-700/30 text-[10px] xs:text-xs">
                                        <div class="text-[blue]">{{ \Carbon\Carbon::parse($fish->date_time)->format('M d') }}</div>
                                        <div class="text-[blue] truncate">{{ $fish->fish_type }}</div>
                                        <div class="text-right text-[blue]">{{ $fish->weight }}</div>
                                        <div class="text-right text-white font-medium">SCR {{ number_format($fish->price, 2) }}</div>
                                    </div>
                                    @empty
                                    <div class="text-center px-2 py-4 text-gray-400 bg-gray-800/20 rounded-lg">No fish records.</div>
                                    @endforelse
                                </div>
                                <div class="mt-2 bg-gray-800/70 border-t border-gray-700 py-2 px-3 font-bold text-right text-white rounded-b-lg">
                                    Total Revenue: <span class="text-green-300">SCR {{ number_format($trip->catchfish->sum('price'), 2) }}</span>
                                </div>
                            </div>

                            <!-- Crew -->
                            <div class="bg-gray-800/50 rounded-lg border border-gray-700/50 p-3 sm:p-4">
                                <h4 class="text-sm sm:text-md font-bold text-purple-300 mb-2">Crew Members</h4>
                                <div class="grid grid-cols-3 gap-2 bg-gray-700/70 text-gray-300 py-1 px-2 font-semibold uppercase text-[10px] xs:text-xs border-b border-gray-600">
                                    <div>Name</div><div>Rank</div><div>Phone</div>
                                </div>
                                <div class="space-y-1 max-h-[30vh] overflow-y-auto pr-1">
                                    @php $members = $trip->addmembertrip; @endphp
                                    @if($members->isEmpty())
                                    <div class="text-center px-2 py-4 text-gray-400 bg-gray-800/20 rounded-lg">No crew members recorded.</div>
                                    @else
                                    @foreach($members as $member)
                                    @php $details = $member->tripmemberdetiles; @endphp
                                    <div class="grid grid-cols-3 gap-2 px-1 py-1 bg-gray-800/30 hover:bg-gray-700/50 rounded border-b border-gray-700/30 text-[10px] xs:text-xs">
                                        <div class="text-[blue] truncate">{{ $details->name ?? 'No details' }}</div>
                                        <div class="text-[blue]">{{ $details->rank ?? '-' }}</div>
                                        <div class="text-[blue]">{{ $details->phone_number ?? '-' }}</div>
                                    </div>
                                    @if (!$details)
                                    <div class="text-[10px] text-yellow-400/80 px-1 py-1 bg-yellow-900/20 rounded">⚠️ No details for: <strong>{{ $member->memberEmail }}</strong></div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                                <div class="mt-2 bg-gray-800/70 border-t border-gray-700 py-2 px-3 font-bold text-right text-white rounded-b-lg">
                                    Total Crew: <span class="text-purple-300">{{ $members->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-3 sm:py-4 text-red-300/80 bg-red-900/10 rounded-lg text-xs sm:text-sm">No Trips Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- JS -->
<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>






    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(`modal-${id}`).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Close modal when clicking outside content
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[id^="modal-"]').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    const id = this.id.split('-')[1];
                    closeModal(id);
                }
            });
        });
    });

</script>
