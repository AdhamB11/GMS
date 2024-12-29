<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Goals Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">GMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="goals.php">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="milestones.php">Milestones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="reports.php">Reports</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Reports & Analytics</h2>
            <div>
                <button class="btn btn-outline-primary me-2" onclick="exportPDF()">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
                <select class="form-select d-inline-block w-auto" id="timeRange">
                    <option value="7">Last 7 Days</option>
                    <option value="30">Last 30 Days</option>
                    <option value="90">Last 90 Days</option>
                    <option value="365">Last Year</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Progress Overview -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Progress Overview</h5>
                        <canvas id="progressChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Goal Completion Rate -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Goal Completion Rate</h5>
                        <canvas id="completionRateChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Priority Distribution -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Priority Distribution</h5>
                        <canvas id="priorityChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Timeline Performance -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Timeline Performance</h5>
                        <canvas id="timelineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Statistics -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Detailed Statistics</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>Value</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Goals</td>
                                <td id="totalGoals">-</td>
                                <td id="totalGoalsChange">-</td>
                            </tr>
                            <tr>
                                <td>Completion Rate</td>
                                <td id="completionRate">-</td>
                                <td id="completionRateChange">-</td>
                            </tr>
                            <tr>
                                <td>Average Time to Complete</td>
                                <td id="avgTimeToComplete">-</td>
                                <td id="avgTimeToCompleteChange">-</td>
                            </tr>
                            <tr>
                                <td>On-time Completion Rate</td>
                                <td id="onTimeRate">-</td>
                                <td id="onTimeRateChange">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/reports.js"></script>
</body>
</html>
