<?php
session_start();
require_once "../includes/db_connect.php";

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "Please login first"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = ["success" => false, "message" => ""];
    
    // Get post data
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $deadline = trim($_POST["deadline"]);
    $priority = trim($_POST["priority"]);
    $user_id = $_SESSION["id"];
    
    // Validate input
    if (empty($title)) {
        $response["message"] = "Title is required";
    } elseif (empty($deadline)) {
        $response["message"] = "Deadline is required";
    } else {
        // Insert goal into database
        $sql = "INSERT INTO goals (user_id, title, description, deadline, priority, status) VALUES (?, ?, ?, ?, ?, 'pending')";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("issss", $user_id, $title, $description, $deadline, $priority);
            
            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "Goal created successfully";
                $response["goal_id"] = $conn->insert_id;
            } else {
                $response["message"] = "Error creating goal: " . $conn->error;
            }
            
            $stmt->close();
        } else {
            $response["message"] = "Error preparing statement: " . $conn->error;
        }
    }
    
    echo json_encode($response);
    exit;
}

$conn->close();
?>
