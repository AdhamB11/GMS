// Load dashboard data when the page loads
document.addEventListener('DOMContentLoaded', function() {
    loadGoalsSummary();
    loadRecentMilestones();
    initializeProgressChart();
});

// Load goals summary
function loadGoalsSummary() {
    fetch('api/goals-summary.php')
        .then(response => response.json())
        .then(data => {
            const summaryHtml = `
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Total Goals
                        <span class="badge bg-primary rounded-pill">${data.total}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        In Progress
                        <span class="badge bg-info rounded-pill">${data.in_progress}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        Completed
                        <span class="badge bg-success rounded-pill">${data.completed}</span>
                    </div>
                </div>
            `;
            document.getElementById('goals-summary').innerHTML = summaryHtml;
        })
        .catch(error => {
            console.error('Error loading goals summary:', error);
            document.getElementById('goals-summary').innerHTML = 'Error loading data';
        });
}

// Load recent milestones
function loadRecentMilestones() {
    fetch('api/recent-milestones.php')
        .then(response => response.json())
        .then(data => {
            const milestonesHtml = data.map(milestone => `
                <div class="milestone-item mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">${milestone.title}</h6>
                            <small class="text-muted">Due: ${milestone.completion_date}</small>
                        </div>
                        <span class="status-badge status-${milestone.status.toLowerCase()}">
                            ${milestone.status}
                        </span>
                    </div>
                </div>
            `).join('');
            document.getElementById('recent-milestones').innerHTML = milestonesHtml;
        })
        .catch(error => {
            console.error('Error loading recent milestones:', error);
            document.getElementById('recent-milestones').innerHTML = 'Error loading data';
        });
}

// Initialize progress chart
function initializeProgressChart() {
    fetch('api/progress-data.php')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('progress-chart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'In Progress', 'Pending'],
                    datasets: [{
                        data: [data.completed, data.in_progress, data.pending],
                        backgroundColor: [
                            '#51cf66',
                            '#4dabf7',
                            '#e9ecef'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error loading progress chart:', error);
        });
}

// Handle goal creation
function createGoal(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);

    fetch('api/create-goal.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Refresh dashboard data
            loadGoalsSummary();
            loadRecentMilestones();
            initializeProgressChart();
            
            // Close modal if using Bootstrap modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('createGoalModal'));
            if (modal) {
                modal.hide();
            }
            
            // Show success message
            showAlert('Goal created successfully!', 'success');
        } else {
            showAlert('Error creating goal: ' + data.message, 'danger');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Error creating goal', 'danger');
    });
}

// Utility function to show alerts
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    const container = document.querySelector('.container');
    container.insertBefore(alertDiv, container.firstChild);
    
    // Auto dismiss after 5 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}
