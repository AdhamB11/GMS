<?php
session_start();
require_once "includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    
    // Validate input
    $error = false;
    $error_message = "";
    
    if (empty($username)) {
        $error = true;
        $error_message .= "Username is required. ";
    }
    
    if (empty($email)) {
        $error = true;
        $error_message .= "Email is required. ";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $error_message .= "Invalid email format. ";
    }
    
    if (empty($password)) {
        $error = true;
        $error_message .= "Password is required. ";
    } elseif (strlen($password) < 6) {
        $error = true;
        $error_message .= "Password must be at least 6 characters. ";
    }
    
    if ($password !== $confirm_password) {
        $error = true;
        $error_message .= "Passwords do not match. ";
    }
    
    // Check if username exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $error = true;
        $error_message .= "Username already exists. ";
    }
    $stmt->close();
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $error = true;
        $error_message .= "Email already exists. ";
    }
    $stmt->close();
    
    if (!$error) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        
        if ($stmt->execute()) {
            $_SESSION["success_message"] = "Registration successful! Please login.";
            header("location: login.php");
            exit();
        } else {
            $error_message = "Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
    
    if ($error) {
        $_SESSION["error_message"] = $error_message;
        header("location: register.php");
        exit();
    }
}

$conn->close();
?>
