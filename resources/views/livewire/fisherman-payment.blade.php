<div>
    <style>
        .tab-activeC {
            position: relative;
            color: #2E86AB;
            font-weight: 600;
        }
        .tab-activeC:after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background: #2E86AB;
            border-radius: 3px 3px 0 0;
        }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>

    <div class="container mx-auto px-4 py-8 max-w-6xl" id="payment-slip">
        <section>
            <!-- Header -->
            <div class="flex justify-between items-center mb-6 no-print">
                <h2 class="text-2xl font-semibold text-gray-800">Payment Slip</h2>
            </div>

            @if($fisherman)
            <!-- Payment Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-blue-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-white">Payment Receipt</h3>
                            <p class="text-blue-100">Fisherman Account Statement</p>
                        </div>
                        <div class="text-right">
                            <p class="text-blue-100">Receipt No:</p>
                            <p class="font-bold text-white">{{ $payment->slip_code ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Info -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <!-- Fisherman Details -->
                        <div>
                            <h4 class="font-bold text-gray-700 mb-3 border-b pb-2">Fisherman Details</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium text-gray-600">Name:</span> {{ $fisherman->name ?? 'N/A' }}</p>
                                <p>
                                    <span class="font-medium text-gray-600">Employer Number:</span>
                                    {{ optional($fisherman->tripMemberDetiles)->employer_number ?? 'N/A' }}
                                </p>
                                <p><span class="font-medium text-gray-600">Contact:</span> {{ $fisherman->contactnumber ?? 'N/A' }}</p>
                                <p><span class="font-medium text-gray-600">Email:</span> {{ $fisherman->email ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <!-- Payment Summary -->
                        <div>
                            <h4 class="font-bold text-gray-700 mb-3 border-b pb-2">Payment Information</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium text-gray-600">Date:</span>
                                    {{ optional(\Carbon\Carbon::parse($payment->payment_date ?? null))->format('F j, Y') ?? 'N/A' }}
                                </p>
                                <p><span class="font-medium text-gray-600">Month:</span> {{ $payment->month ?? 'N/A' }}</p>
                                <p><span class="font-medium text-gray-600">Status:</span>
                                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-2 py-0.5 rounded-full">Paid</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Notes & Total -->
                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-bold text-gray-700 mb-3">Payment Notes</h4>
                                <p class="text-gray-600">
                                    {{ $payment->notes ?? 'Payment processed automatically. Contact accounts department for queries.' }}
                                </p>
                            </div>
                            <div>
                                <div class="flex justify-between pt-3 border-t border-gray-300 mt-2">
                                    <span class="font-bold text-gray-700">Total Paid:</span>
                                    <span class="font-bold text-blue-600 text-lg">
                                        ${{ number_format($paymentBreakdown['total'] ?? 0, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-4 no-print">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <p class="text-sm text-gray-500">Thank you for your service!</p>
                            <p class="text-sm text-gray-500">Atlantic Fishing Co.</p>
                        </div>
                        <div class="flex space-x-4">
                            {{-- Optional buttons for reprint, email, etc. --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Payments -->
            <div class="no-print">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Payments</h3>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($recentPayments as $payment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ optional(\Carbon\Carbon::parse($payment->payment_date ?? null))->format('M d, Y') ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                            {{ $payment->slip_code ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            ${{ number_format($payment->amount ?? 0, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Paid
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No recent payments available.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
                <div class="text-center text-red-500">
                    <p>Fisherman data not found.</p>
                </div>
            @endif
        </section>
    </div>

    <!-- Print Handler -->
    @push('scripts')
        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('print-slip', () => {
                    const printContents = document.getElementById('payment-slip').innerHTML;
                    const originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                    window.location.reload();
                });
            });
        </script>
    @endpush
</div>
