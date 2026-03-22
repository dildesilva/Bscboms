<div wire:poll.60s>

    <div class="p-4">
        <h2 class="text-xl font-semibold mb-4">Available Boats</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 border-b">Boat ID</th>
                    <th class="py-3 px-6 border-b">Boat Name</th>
                    <th class="py-3 px-6 border-b">Type</th>
                    <th class="py-3 px-6 border-b">Status</th>
                    <th class="py-3 px-6 border-b">Capacity</th>
                    {{-- <th class="py-3 px-6 border-b">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($unavailableBoats as $boat)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $boat->id }}</td>
                        <td class="py-3 px-6">{{ $boat->name }}</td>
                        <td class="py-3 px-6">{{ $boat->type }}</td>
                        <td class="py-3 px-6">{{ $boat->status }}</td>
                        <td class="py-3 px-6">{{ $boat->capacity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 px-6 text-center text-gray-500">No available boats found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }

</script>

