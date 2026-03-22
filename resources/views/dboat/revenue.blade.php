
@extends('layouts.dashbord')
@section('content')



<style>
    .Revenue {
        background-color: rgb(160, 159, 159);
        color: white;
    }
    .Revenue:hover{
        color: rgb(0, 0, 0);
    }

    .input-field {
        padding: 8px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
        transition: 0.3s;
    }

    .input-field:focus {
        outline: none;
        border-color: #4b9fd7;
        box-shadow: 0 0 4px rgba(59, 130, 246, 0.4);
    }

    .total-container {
        background-color: #f8f9fa;
        padding: 12px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
    }

    .locked { background-color: #e5e7eb; cursor: not-allowed; }
</style>

<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Catch Revenue Management</h1>

        <!-- Search Option -->
        <div class="mb-4">
            <label for="tripSearch" class="block text-sm font-medium text-gray-700">Search by Trip ID:</label>
            <input type="number" id="tripSearch" class="input-field mt-1" placeholder="Enter Trip ID" oninput="filterTrips()">
        </div>

        @php
            $trips = [
                [
                    'trip_id' => 1,
                    'catches' => [
                        ['date' => '2025-02-05', 'fisherman_id' => 4, 'fish_type' => 'Tuna', 'quantity' => 50, 'weight' => 120],
                        ['date' => '2025-02-05', 'fisherman_id' => 4, 'fish_type' => 'Mackerel', 'quantity' => 30, 'weight' => 80]
                    ]
                ],
                [
                    'trip_id' => 2,
                    'catches' => [
                        ['date' => '2025-02-06', 'fisherman_id' => 4, 'fish_type' => 'Swordfish', 'quantity' => 10, 'weight' => 50]
                    ]
                ]
            ];
        @endphp

        @foreach($trips as $trip)
            <div class="trip-container mb-6 border p-4 rounded-md shadow-sm" data-trip-id="{{ $trip['trip_id'] }}">
                <h2 class="text-lg font-semibold text-gray-700">Trip ID: {{ $trip['trip_id'] }}</h2>
                <table class="min-w-full bg-white border-collapse text-sm mt-2">
                    <thead>
                        <tr class="bg-gray-200 text-gray-800">
                            <th class="p-4 text-left">Date</th>
                            <th class="p-4 text-left">Fisherman ID</th>
                            <th class="p-4 text-left">Fish Type</th>
                            <th class="p-4 text-left">Quantity</th>
                            <th class="p-4 text-left">Weight (kg)</th>
                            <th class="p-4 text-left">Price (LKR/kg)</th>
                            <th class="p-4 text-left">Total Price (LKR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trip['catches'] as $catch)
                            <tr class="catch-row border-b">
                                <td class="p-4">{{ $catch['date'] }}</td>
                                <td class="p-4">{{ $catch['fisherman_id'] }}</td>
                                <td class="p-4">{{ $catch['fish_type'] }}</td>
                                <td class="p-4">{{ $catch['quantity'] }}</td>
                                <td class="p-4">{{ $catch['weight'] }}</td>
                                <td class="p-4">
                                    <input type="number" class="input-field price-input" data-weight="{{ $catch['weight'] }}" placeholder="Enter Price" oninput="updateTotalPrice(this)">
                                </td>
                                <td class="p-4 total-price">0</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total Revenue for this Trip -->
                <div class="mt-4 p-4 bg-gray-200 rounded-md">
                    <h2 class="text-lg font-semibold text-gray-700">Total Revenue for Trip {{ $trip['trip_id'] }}:</h2>
                    <p class="text-lg font-bold text-gray-900"><span class="trip-total">0</span> LKR</p>
                </div>

                <!-- Finalize Revenue Button -->
                <button class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-md finalize-trip-btn" onclick="finalizeTrip(this)">
                    Finalize Revenue
                </button>
            </div>
        @endforeach
    </div>
</div>

<!-- JavaScript for Price Calculation, Finalization & Trip Search -->
<script>
    function updateTotalPrice(input) {
        let weight = parseFloat(input.dataset.weight);
        let pricePerKg = parseFloat(input.value) || 0;
        let totalPrice = weight * pricePerKg;

        let totalPriceCell = input.parentElement.nextElementSibling;
        totalPriceCell.textContent = totalPrice.toLocaleString();

        updateTripTotal(input);
    }

    function updateTripTotal(input) {
        let tripContainer = input.closest('.trip-container');
        let tripTotal = 0;

        tripContainer.querySelectorAll('.total-price').forEach(cell => {
            tripTotal += parseFloat(cell.textContent.replace(/,/g, '')) || 0;
        });

        tripContainer.querySelector('.trip-total').textContent = tripTotal.toLocaleString();
    }

    function finalizeTrip(button) {
        let tripContainer = button.closest('.trip-container');

        tripContainer.querySelectorAll('.price-input').forEach(input => {
            if (input.value.trim() === "") {
                alert("Please enter all prices before finalizing.");
                return;
            }
            input.setAttribute('readonly', true);
            input.classList.add('locked');
        });

        button.disabled = true;
        button.classList.add('bg-gray-400', 'cursor-not-allowed');
        button.textContent = "Revenue Finalized";
    }

    function filterTrips() {
        let searchValue = document.getElementById('tripSearch').value;
        let tripContainers = document.querySelectorAll('.trip-container');

        tripContainers.forEach(container => {
            let tripId = container.getAttribute('data-trip-id');
            if (searchValue === '' || tripId === searchValue) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    }
</script>

@endsection
