<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Goals Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            padding: 100px 0;
        }
        
        .feature-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #4f46e5;
            margin-bottom: 1rem;
        }
        
        .cta-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }
        
        .testimonial-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-bullseye text-primary"></i> GMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
                    <a href="register.php" class="btn btn-primary">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" style="margin-top: 56px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Achieve Your Goals with Smart Management</h1>
                    <p class="lead mb-4">Track, manage, and accomplish your goals with our intuitive goal management system. Stay organized and motivated on your journey to success.</p>
                    <a href="register.php" class="btn btn-light btn-lg">Get Started Free</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x400" alt="Goal Management" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-tasks feature-icon"></i>
                            <h4>Goal Tracking</h4>
                            <p>Set, track, and achieve your goals with our intuitive tracking system.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line feature-icon"></i>
                            <h4>Progress Analytics</h4>
                            <p>Visualize your progress with detailed charts and analytics.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-bell feature-icon"></i>
                            <h4>Smart Reminders</h4>
                            <p>Never miss a deadline with our intelligent reminder system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="mb-3">"This platform has completely transformed how I manage my goals. The visual tracking is incredible!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="User" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">John Doe</h6>
                                <small class="text-muted">Entrepreneur</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="mb-3">"The milestone tracking feature helps me stay focused and motivated throughout my projects."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="User" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Jane Smith</h6>
                                <small class="text-muted">Project Manager</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="mb-3">"Simple, intuitive, and effective. Exactly what I needed to keep track of my personal goals."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="User" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Mike Johnson</h6>
                                <small class="text-muted">Student</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Simple Pricing</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <h3>Free</h3>
                            <div class="display-4 my-3">$0</div>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Up to 5 Goals</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic Analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Email Reminders</li>
                            </ul>
                            <a href="register.php" class="btn btn-outline-primary">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 border-primary">
                        <div class="card-body text-center">
                            <h3>Pro</h3>
                            <div class="display-4 my-3">$9</div>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Unlimited Goals</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced Analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Priority Support</li>
                            </ul>
                            <a href="register.php" class="btn btn-primary">Choose Pro</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <h3>Team</h3>
                            <div class="display-4 my-3">$29</div>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Team Collaboration</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom Reports</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>API Access</li>
                            </ul>
                            <a href="register.php" class="btn btn-outline-primary">Choose Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Achieve Your Goals?</h2>
            <p class="lead mb-4">Join thousands of users who are already achieving their goals with GMS.</p>
            <a href="register.php" class="btn btn-primary btn-lg">Get Started Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About GMS</h5>
                    <p>Your ultimate goal management solution for personal and professional success.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#features" class="text-light">Features</a></li>
                        <li><a href="#testimonials" class="text-light">Testimonials</a></li>
                        <li><a href="#pricing" class="text-light">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>Email: support@gms.com<br>Phone: (123) 456-7890</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Goals Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
