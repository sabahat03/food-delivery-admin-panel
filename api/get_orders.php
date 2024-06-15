<?php

include('cors.php');
include('../database.php');

$c_id = $_GET['id'];
// Query the database to check if credentials match
$query = "SELECT * FROM orders Where c_id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $c_id);
$stmt->execute();
$order = $stmt->fetchALL(PDO::FETCH_ASSOC);

if ($order) {
    // Valid credentials
    $response = [
        'success' => true,
        'message' => 'Orders fetched',
        'orders' => $order
    ];
} else {
    // Invalid credentials
    $response = [
        'success' => false,
        'message' => 'Error fetching',
    ];
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>