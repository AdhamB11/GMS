<?php
session_start();
require_once "../includes/db_connect.php";

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "Please login first"]);
    exit;
}

$response = ["success" => false, "goals" => []];

// Get filter parameters
$status = isset($_GET['status']) ? $_GET['status'] : '';
$priority = isset($_GET['priority']) ? $_GET['priority'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$user_id = $_SESSION["id"];

// Build query
$sql = "SELECT * FROM goals WHERE user_id = ?";
$params = [$user_id];
$types = "i";

if (!empty($status)) {
    $sql .= " AND status = ?";
    $params[] = $status;
    $types .= "s";
}

if (!empty($priority)) {
    $sql .= " AND priority = ?";
    $params[] = $priority;
    $types .= "s";
}

if (!empty($search)) {
    $sql .= " AND (title LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= "ss";
}

$sql .= " ORDER BY deadline ASC";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param($types, ...$params);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $response["goals"][] = [
                "id" => $row["id"],
                "title" => $row["title"],
                "description" => $row["description"],
                "deadline" => $row["deadline"],
                "priority" => $row["priority"],
                "status" => $row["status"]
            ];
        }
        
        $response["success"] = true;
    }
    
    $stmt->close();
}

echo json_encode($response);
$conn->close();
?>
