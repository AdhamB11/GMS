<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milestones - Goals Management System</title>
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
                        <a class="nav-link active" href="milestones.php">Milestones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">Reports</a>
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
            <h2>Milestones</h2>
            <div>
                <select class="form-select d-inline-block w-auto me-2" id="goalSelector">
                    <option value="">Select Goal</option>
                    <!-- Goals will be loaded dynamically -->
                </select>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMilestoneModal">
                    <i class="fas fa-plus"></i> New Milestone
                </button>
            </div>
        </div>

        <!-- Timeline View -->
        <div class="card">
            <div class="card-body">
                <div class="timeline">
                    <!-- Milestones will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Create Milestone Modal -->
    <div class="modal fade" id="createMilestoneModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Milestone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createMilestoneForm">
                        <div class="mb-3">
                            <label for="milestoneGoal" class="form-label">Goal</label>
                            <select class="form-select" id="milestoneGoal" required>
                                <!-- Goals will be loaded dynamically -->
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="milestoneTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="milestoneTitle" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="milestoneDate" class="form-label">Completion Date</label>
                            <input type="date" class="form-control" id="milestoneDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createMilestone()">Create Milestone</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Milestone Template -->
    <template id="milestoneTemplate">
        <div class="timeline-item">
            <div class="timeline-marker"></div>
            <div class="timeline-content">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="milestone-title mb-0"></h5>
                    <div class="milestone-actions">
                        <button class="btn btn-sm btn-outline-success complete-milestone">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger delete-milestone">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <p class="text-muted mb-0">
                    <small class="milestone-date"></small>
                </p>
                <p class="milestone-goal text-primary mb-0"></p>
            </div>
        </div>
    </template>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/milestones.js"></script>
</body>
</html>
