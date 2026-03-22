@extends('layouts.dashbord')
@section('content')
<style>
    .Trips {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .Trips:hover{
        color: rgb(0, 0, 0);
    }
    /* Refined Inputs and Select Boxes */
    .input-field, .select-box {
        padding: 0.75rem 1.25rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        width: 100%;
        transition: all 0.3s ease-in-out;
    }

    .select-box {
        background-color: #fff;
        color: #333;
    }

    .select-box:focus {
        outline: none;
        border-color: #4b9fd7;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.4);
    }

    .input-field:focus {
        outline: none;
        border-color: #4b9fd7;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.4);
    }
</style>
<div >
    <!-- Container for Trip Dashboard -->
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-7xl h-[100vh] mx-auto bg-[#dedede] px-6 rounded-lg shadow-md">
          <livewire:tripcreatefetch/>

        </div>
    </div>

    <!-- Modal for Create Trip (Only Start Date & Start Location) -->
    <div id="create-trip-modal" class="fixed flex inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create New Trip</h2>

          {{--  --}}
          <livewire:tripcreate />
        </div>
    </div>
    <!-- JavaScript for Modal & Status/Emergency Dropdowns -->
    <script>
        // Function to open the "Create Trip" modal
        function openCreateTripModal() {
            document.getElementById('create-trip-modal').classList.remove('hidden');
        }
        // Function to close the "Create Trip" modal
        function closeCreateTripModal() {
            document.getElementById('create-trip-modal').classList.add('hidden');
        }
    </script>
</div>
@endsection
