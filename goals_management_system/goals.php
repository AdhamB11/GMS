<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goals - Goals Management System</title>
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
                        <a class="nav-link active" href="goals.php">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="milestones.php">Milestones</a>
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
            <h2>My Goals</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGoalModal">
                <i class="fas fa-plus"></i> New Goal
            </button>
        </div>

        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <select class="form-select" id="statusFilter">
                            <option value="">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" id="priorityFilter">
                            <option value="">All Priorities</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="searchGoals" placeholder="Search goals...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Goals List -->
        <div class="goals-container">
            <!-- Goals will be dynamically loaded here -->
        </div>
    </div>

    <!-- Create Goal Modal -->
    <div class="modal fade" id="createGoalModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Goal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createGoalForm">
                        <div class="mb-3">
                            <label for="goalTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="goalTitle" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="goalDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="goalDescription" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="goalDeadline" class="form-label">Deadline</label>
                            <input type="date" class="form-control" id="goalDeadline" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="goalPriority" class="form-label">Priority</label>
                            <select class="form-select" id="goalPriority">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createGoal()">Create Goal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Goal Template -->
    <template id="goalTemplate">
        <div class="goal-item">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="goal-title mb-1"></h5>
                    <p class="goal-description text-muted mb-2"></p>
                    <div class="d-flex gap-2">
                        <span class="priority-tag"></span>
                        <span class="status-badge"></span>
                        <small class="text-muted deadline"></small>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-link" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item edit-goal" href="#"><i class="fas fa-edit"></i> Edit</a></li>
                        <li><a class="dropdown-item view-milestones" href="#"><i class="fas fa-tasks"></i> Milestones</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item delete-goal text-danger" href="#"><i class="fas fa-trash"></i> Delete</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </template>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/goals.js"></script>
</body>
</html>
