<?php
include('cors.php');
include('../database.php');

// Assuming you have already established a PDO database connection in database.php
// Replace database credentials with your own.

header('Content-Type: application/json');

// Initialize an empty response.
$response = array();

// Check if the request is a POST request.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the POST request.
    $c_id = $_POST['C_ID'];
    $order_destination = $_POST['Order_Destination'];
    $order_price = $_POST['Order_Price'];
    $order_status = "Order confirmed";

    // Insert the data into the database using prepared statements.
    $sql = "INSERT INTO orders (C_ID, Order_Destination, Order_Price, Order_Status) VALUES (:id, :dest, :price,:status)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':id', $c_id);
    $stmt->bindParam(':dest', $order_destination);
    $stmt->bindParam(':price', $order_price);
    $stmt->bindParam(':status', $order_status);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Data inserted successfully.";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $stmt->errorInfo();
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method.";
}

// Output the response as JSON.
echo json_encode($response);
?>