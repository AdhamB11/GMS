// Load goals when the page loads
document.addEventListener('DOMContentLoaded', function() {
    loadGoals();
});

// Create new goal
function createGoal() {
    const title = document.getElementById('goalTitle').value;
    const description = document.getElementById('goalDescription').value;
    const deadline = document.getElementById('goalDeadline').value;
    const priority = document.getElementById('goalPriority').value;
    
    const formData = new FormData();
    formData.append('title', title);
    formData.append('description', description);
    formData.append('deadline', deadline);
    formData.append('priority', priority);
    
    fetch('api/create-goal.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('createGoalModal'));
            modal.hide();
            
            // Show success message
            showAlert(data.message, 'success');
            
            // Reload goals
            loadGoals();
            
            // Clear form
            document.getElementById('createGoalForm').reset();
        } else {
            showAlert(data.message, 'danger');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Error creating goal', 'danger');
    });
}

// Load goals
function loadGoals() {
    const container = document.querySelector('.goals-container');
    const statusFilter = document.getElementById('statusFilter').value;
    const priorityFilter = document.getElementById('priorityFilter').value;
    const searchQuery = document.getElementById('searchGoals').value;
    
    fetch(`api/get-goals.php?status=${statusFilter}&priority=${priorityFilter}&search=${searchQuery}`)
        .then(response => response.json())
        .then(data => {
            container.innerHTML = ''; // Clear existing goals
            
            if (data.success) {
                data.goals.forEach(goal => {
                    const goalElement = createGoalElement(goal);
                    container.appendChild(goalElement);
                });
            } else {
                container.innerHTML = '<div class="alert alert-info">No goals found</div>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            container.innerHTML = '<div class="alert alert-danger">Error loading goals</div>';
        });
}

// Create goal element from template
function createGoalElement(goal) {
    const template = document.getElementById('goalTemplate');
    const clone = template.content.cloneNode(true);
    
    clone.querySelector('.goal-title').textContent = goal.title;
    clone.querySelector('.goal-description').textContent = goal.description;
    clone.querySelector('.priority-tag').textContent = goal.priority;
    clone.querySelector('.priority-tag').classList.add(`priority-${goal.priority.toLowerCase()}`);
    clone.querySelector('.status-badge').textContent = goal.status;
    clone.querySelector('.status-badge').classList.add(`status-${goal.status.toLowerCase()}`);
    clone.querySelector('.deadline').textContent = `Due: ${formatDate(goal.deadline)}`;
    
    // Add event listeners for actions
    clone.querySelector('.edit-goal').addEventListener('click', () => editGoal(goal.id));
    clone.querySelector('.delete-goal').addEventListener('click', () => deleteGoal(goal.id));
    clone.querySelector('.view-milestones').addEventListener('click', () => viewMilestones(goal.id));
    
    return clone;
}

// Format date
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

// Show alert message
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const container = document.querySelector('.container');
    container.insertBefore(alertDiv, container.firstChild);
    
    // Auto dismiss after 5 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

// Event listeners for filters
document.getElementById('statusFilter').addEventListener('change', loadGoals);
document.getElementById('priorityFilter').addEventListener('change', loadGoals);
document.getElementById('searchGoals').addEventListener('input', debounce(loadGoals, 300));

// Debounce function for search
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
