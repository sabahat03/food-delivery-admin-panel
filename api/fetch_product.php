<?php

include('cors.php');
include('../database.php');


// Query the database to check if credentials match
$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$product = $stmt->fetchALL(PDO::FETCH_ASSOC);

if ($product) {
    // Valid credentials
    $response = [
        'success' => true,
        'message' => 'food items Found',
        'products' => $product
    ];
} else {
    // Invalid credentials
    $response = [
        'success' => false,
        'message' => 'Error getting the food Items',
    ];
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>