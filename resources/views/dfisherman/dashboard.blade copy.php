
@extends('layouts.dashbord')
@section('content')<style>
    .Dashboardfish {
        background-color: rgb(160, 159, 159);
        color: white;
    }


    .fisherman-dashboard {
        background-color: #f5f7fa;
        padding: 20px;
        min-height: 100vh;
    }
    .dashboard-header {
        background-color: #1a5276;
        color: white;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .stat-card.primary {
        border-left: 4px solid #3498db;
    }
    .stat-card.success {
        border-left: 4px solid #2ecc71;
    }
    .stat-card.warning {
        border-left: 4px solid #f39c12;
    }
    .stat-card.danger {
        border-left: 4px solid #e74c3c;
    }
    .stat-value {
        font-size: 24px;
        font-weight: bold;
    }
    .stat-label {
        color: #7f8c8d;
        font-size: 14px;
    }
    .recent-activity {
        background: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .activity-item {
        padding: 10px 0;
        border-bottom: 1px solid #ecf0f1;
    }
    .weather-widget {
        background: linear-gradient(135deg, #2980b9, #2c3e50);
        color: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }
</style>

<div class="fisherman-dashboard">
    <div class="dashboard-header">
        <h2><i class="fas fa-anchor"></i> Fisherman Dashboard</h2>
        <p>Welcome back, {{ Auth::user()->name }}! Here's your fishing overview.</p>
    </div>

    <div class="row">
        <!-- Quick Stats -->
        <div class="col-md-3">
            <div class="stat-card primary">
                <div class="stat-value">12</div>
                <div class="stat-label">Trips This Month</div>
                <i class="fas fa-ship float-right"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card success">
                <div class="stat-value">1,250 kg</div>
                <div class="stat-label">Total Catch</div>
                <i class="fas fa-fish float-right"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card warning">
                <div class="stat-value">$4,850</div>
                <div class="stat-label">Earnings</div>
                <i class="fas fa-dollar-sign float-right"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card danger">
                <div class="stat-value">3</div>
                <div class="stat-label">Pending Tasks</div>
                <i class="fas fa-tasks float-right"></i>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Weather Widget -->
        <div class="col-md-4">
            <div class="weather-widget">
                <h4><i class="fas fa-cloud-sun"></i> Weather Forecast</h4>
                <div class="current-weather">
                    <h3>24°C</h3>
                    <p>Partly Cloudy</p>
                    <p>Wind: 12 km/h NE</p>
                    <p>Humidity: 65%</p>
                </div>
                <hr>
                <div class="forecast">
                    <div class="row">
                        <div class="col">
                            <p>Tomorrow</p>
                            <p><i class="fas fa-sun"></i> 26°C</p>
                        </div>
                        <div class="col">
                            <p>Day After</p>
                            <p><i class="fas fa-cloud-rain"></i> 22°C</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <h5><i class="fas fa-trophy"></i> Leaderboard</h5>
                <ol>
                    <li>Ahmed - 1,450 kg</li>
                    <li>You - 1,250 kg</li>
                    <li>Mohammed - 1,100 kg</li>
                </ol>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-md-8">
            <div class="recent-activity">
                <h4><i class="fas fa-list"></i> Recent Activity</h4>
                <div class="activity-item">
                    <strong>New catch recorded</strong>
                    <p>150 kg of Tuna - 2 hours ago</p>
                </div>
                <div class="activity-item">
                    <strong>Boat maintenance completed</strong>
                    <p>Engine service - Yesterday</p>
                </div>
                <div class="activity-item">
                    <strong>New fishing quota assigned</strong>
                    <p>500 kg for this week - 2 days ago</p>
                </div>
                <div class="activity-item">
                    <strong>Payment received</strong>
                    <p>$1,250 for last week's catch - 3 days ago</p>
                </div>
            </div>

            <div class="stat-card mt-4">
                <h5><i class="fas fa-map-marked-alt"></i> Fishing Zones</h5>
                <div class="text-center">
                    <img src="{{ asset('images/fishing-zones.png') }}" alt="Fishing Zones Map" style="max-width: 100%; height: auto;">
                    <p class="mt-2">Current recommended zone: Zone 4 (Tuna abundant)</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
