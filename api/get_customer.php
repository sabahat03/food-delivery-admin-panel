<?php

include('cors.php');
include('../database.php');

$email = $_GET['email'];
// Query the database to check if credentials match
$query = "SELECT * FROM Customer Where C_Email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if ($customer) {
    // Valid credentials
    $response = [
        'success' => true,
        'message' => 'Customer Logged In',
        'customer' => $customer
    ];
} else {
    // Invalid credentials
    $response = [
        'success' => false,
        'message' => 'Error Logging In',
    ];
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>