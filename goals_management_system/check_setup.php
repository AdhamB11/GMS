<?php
echo "<h2>Goals Management System - Setup Check</h2>";

// Check PHP version
echo "<p>PHP Version: " . phpversion() . "</p>";

// Check MySQL connection
require_once "includes/config.php";
if ($conn) {
    echo "<p style='color: green;'>✓ Database connection successful</p>";
} else {
    echo "<p style='color: red;'>✗ Database connection failed</p>";
}

// Check required directories
$directories = ['css', 'js', 'includes'];
foreach ($directories as $dir) {
    if (is_dir($dir)) {
        echo "<p style='color: green;'>✓ Directory '$dir' exists</p>";
    } else {
        echo "<p style='color: red;'>✗ Directory '$dir' is missing</p>";
    }
}

// Check required files
$files = [
    'index.php',
    'login.php',
    'register.php',
    'goals.php',
    'milestones.php',
    'reports.php',
    'css/style.css',
    'js/dashboard.js',
    'includes/config.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        echo "<p style='color: green;'>✓ File '$file' exists</p>";
    } else {
        echo "<p style='color: red;'>✗ File '$file' is missing</p>";
    }
}
?>
