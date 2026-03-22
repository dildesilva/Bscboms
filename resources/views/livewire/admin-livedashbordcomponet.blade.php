<div class="bg-gray-50 dark:bg-gray-900 min-h-screen p-3 sm:p-4 md:p-6 transition-colors duration-200 animate-fadeIn">
    <div class="max-w-7xl mx-auto space-y-4 sm:space-y-6">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 sm:gap-4">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white">Fishing Fleet Management Dashboard</h1>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">Real-time monitoring and analytics</p>
            </div>
        </div>
        <div>
            <livewire:admin-dashbordcardlive />
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
            <!-- Trip Status Distribution -->
            <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 p-4 sm:p-6 lg:col-span-2 transition-all duration-300 hover:shadow-md">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-white mb-3 sm:mb-4">Trip Status Distribution</h3>
                <div class="h-48 sm:h-64">
                    <canvas id="tripStatusChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Emergency Types -->
            <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 p-4 sm:p-6 transition-all duration-300 hover:shadow-md">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-white mb-3 sm:mb-4">All Return Types</h3>
                <div class="h-48 sm:h-64">
                    <canvas id="emergencyTypesChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>


        <div>
            <livewire:admin-dashbord-lasttripslive>
        </div>

    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Trip Status Distribution Chart with Gradient
    const tripStatusCtx = document.getElementById('tripStatusChart').getContext('2d');

    // Create gradient for bars
    const tripStatusGradient = tripStatusCtx.createLinearGradient(0, 0, 0, 300);
    tripStatusGradient.addColorStop(0, 'rgba(59, 130, 246, 0.8)');
    tripStatusGradient.addColorStop(1, 'rgba(59, 130, 246, 0.2)');

    const tripStatusGradient2 = tripStatusCtx.createLinearGradient(0, 0, 0, 300);
    tripStatusGradient2.addColorStop(0, 'rgba(168, 85, 247, 0.8)');
    tripStatusGradient2.addColorStop(1, 'rgba(168, 85, 247, 0.2)');

    const tripStatusGradient3 = tripStatusCtx.createLinearGradient(0, 0, 0, 300);
    tripStatusGradient3.addColorStop(0, 'rgba(16, 185, 129, 0.8)');
    tripStatusGradient3.addColorStop(1, 'rgba(16, 185, 129, 0.2)');

    const tripStatusGradient4 = tripStatusCtx.createLinearGradient(0, 0, 0, 300);
    tripStatusGradient4.addColorStop(0, 'rgba(239, 68, 68, 0.8)');
    tripStatusGradient4.addColorStop(1, 'rgba(239, 68, 68, 0.2)');

    const tripStatusChart = new Chart(tripStatusCtx, {
        type: 'bar',
        data: {
            labels: ['Active', 'Scheduled', 'Completed', 'All Trips'],
            datasets: [{
                label: 'Number of Trips',
                data: [
                    {{ $awiting + $scheduled + $tripsongoing }},
                    {{ $scheduled }},
                    {{ $completed }},
                    {{ $trips }}
                ],
                backgroundColor: [
                    tripStatusGradient,
                    tripStatusGradient2,
                    tripStatusGradient3,
                    tripStatusGradient4
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(168, 85, 247, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(239, 68, 68, 1)'
                ],
                borderWidth: 1,
                borderRadius: 6,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        font: {
                            size: window.innerWidth < 640 ? 10 : 12
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: window.innerWidth < 640 ? 10 : 12
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Emergency Types Doughnut Chart with Glass Effect
    const emergencyTypesCtx = document.getElementById('emergencyTypesChart').getContext('2d');

    const emergencyTypesChart = new Chart(emergencyTypesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Safe', 'Emergency'],
            datasets: [{
                data: [{{ $safe }}, {{ $emergency }}],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.7)',
                    'rgba(220, 38, 38, 0.7)'
                ],
                borderColor: [
                    'rgba(16, 185, 129, 1)',
                    'rgba(220, 38, 38, 1)'
                ],
                borderWidth: 1,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#6B7280',
                        font: {
                            size: window.innerWidth < 640 ? 10 : 12
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    // Handle window resize for charts
    window.addEventListener('resize', function() {
        tripStatusChart.resize();
        emergencyTypesChart.resize();
    });
});

// Add subtle animation to cards on scroll
const cards = document.querySelectorAll('.bg-white\\/70, .bg-gray-800\\/70');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = 1;
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, {threshold: 0.1});

cards.forEach(card => {
    card.style.opacity = 0;
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(card);
});
</script>
