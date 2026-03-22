@extends('layouts.dashbord')
@section('content')
<style>
    /* Input Styling */
    .input-field,
    .select-box {
        padding: 8px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
        transition: 0.3s;
    }

    .glass {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 1rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    }

    .input-field:focus,
    .select-box:focus {
        outline: none;
        border-color: #4b9fd7;
        box-shadow: 0 0 4px rgba(59, 130, 246, 0.4);
    }

    /* Section Title */
    .section-title {
        font-size: 18px;
        font-weight: bold;
        margin-top: 16px;
        color: #333;
    }

</style>
<!--  Header -->
<div class="bg-[#dedede] pt-3  w-[100%] h-[100%]">

<div class="w-[90%]  bg-[#ffffff] mx-auto  rounded-xl p-3 flex items-center justify-between border border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800">Catch Records Management</h1>
    <button id="" onclick="openCatch()" class="bg-green-500 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-green-700 transition-all duration-200">
        Old Catch Records
    </button>
</div>
<hr class="border-green-700 my-3 justify-center w-[90%] m-auto">
<!-- last Background -->
<div id="OldCatch" class="fixed inset-0 bg-black/50 hidden flex justify-center items-center z-50">
    <!-- Modal Container -->
    <div class="glass p-6 w-[800px] h-[600px] flex flex-col text-white">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-3">
            <h2 class="text-2xl font-semibold text-gray-800">Old Trips</h2>
            <button onclick="closeOld()" class="text-red-500 hover:text-gray-800 transition">
                ✕
            </button>
        </div>
        <div id="OldCatchZA" class="flex-1 overflow-auto p-4 text-gray-600 overflow-y-scroll">
            <button onclick="OldCatchZb()" class="text-green-700 hover:text-gray-800 transition">
                See All >
            </button>
            @if ($latest)
            <livewire:catch-oldtrip :tripId="$latest->id" />
            @endif
        </div>
        <div id="OldCatchZ" class="flex-1 hidden overflow-auto p-4 text-gray-600 overflow-y-scroll">
            <button onclick="OldCatchZc()" class="text-green-700 hover:text-gray-800 transition">
                < See last </button>
                    @foreach ($oldtrip as $oldtrips)
                    <livewire:catch-oldtrip :tripId="$oldtrips->id" />

                    @endforeach
        </div>
    </div>
</div>

<!-- old Background -->
@foreach ($eachtrip as $deachtrip)

<livewire:catch-recordsferch :tripId="$deachtrip->id" />
<livewire:catch-record-frome :tripId="$deachtrip->id" />
@endforeach
</div>
<script>
    // Open Expense Modal Function
    function OldCatchZb() {
        document.getElementById('OldCatchZ').classList.remove('hidden');
        // document.getElementById('OldCatchZA').classList.add('hidden');
        document.getElementById('OldCatchZA').classList.add("hidden");

    }
    // Open Expense Modal Function
    function openCatch() {
        document.getElementById('OldCatch').classList.remove('hidden');
    }

    function OldCatchZc() {
        document.getElementById('OldCatchZA').classList.remove('hidden');
        document.getElementById('OldCatchZ').classList.add('hidden');

    }
    // Open Expense Modal Function
    function closeOld() {
        document.getElementById('OldCatch').classList.add("hidden");
    }

</script>
@endsection
