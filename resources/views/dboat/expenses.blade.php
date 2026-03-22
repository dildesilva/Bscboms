@extends('layouts.dashbord')
@section('content')
<style>
    .Expenses {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .Expenses:hover{
        color: rgb(0, 0, 0);
    }
 .glass {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 1rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    }
    /* Table Styling */
    .expense-row:nth-child(even) { background-color: #f9fafb; }
    .expense-row:hover { background-color: #f3f4f6; }

    /* Input Styling */
    .input-field, .select-box {
        padding: 8px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
        transition: 0.3s;
    }

    .input-field:focus, .select-box:focus {
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


<div class="bg-[#dedede] pt-3  w-[100%] h-[100%]">

<!-- Expense Management Header -->
<div class="w-[90%]  bg-[#ffffff] mx-auto  rounded-xl p-3 flex items-center justify-between border border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800">Boat Trip Expense Management</h1>

    <button id="" onclick="openOldExpModal()" class="bg-red-900 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-red-700 transition-all duration-200">
        Old Trip Expenses
    </button>
</div>
<hr class="border-red-700 my-3 justify-center w-[90%] m-auto">

<div id="oldexp" class="fixed inset-0 bg-black/50 hidden flex justify-center items-center z-50">
    <!-- Modal Container -->
    <div class="glass p-6 w-[800px] h-[600px] flex flex-col text-white">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b border-white/20 pb-3">
            <h2 class="text-2xl font-semibold">Old Trip Expenses</h2>
            <button onclick="closeOldExpModal()" class="text-red-400 hover:text-white transition text-xl">
                ✕
            </button>
        </div>
        <div class="flex-1 overflow-auto p-4">
            @foreach ($oldtrip as $oldone)
                <livewire:expensefetch-oldtrip :tripId="$oldone->id" />
            @endforeach
        </div>
    </div>
</div>
<!-- JavaScript for Modal -->
<script>
    function openOldExpModal() {
        document.getElementById("oldexp").classList.remove("hidden");
        document.getElementById("expensebtn").classList.add("hidden"); // Hide button

    }

    function closeOldExpModal() {
        document.getElementById("oldexp").classList.add("hidden");
        document.getElementById("expensebtn").classList.remove("hidden"); // Show button again
    }
</script>



@foreach ($eachtrip as $deachtrip)

    <!-- Pass the Trip ID to both Livewire components -->
    <livewire:add-expense :tripId="$deachtrip->id" >
    <livewire:expensefetch :tripId="$deachtrip->id" />
    {{-- </livewire:add-expense> --}}
@endforeach


</div>

@endsection

