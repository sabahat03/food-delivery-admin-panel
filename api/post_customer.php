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
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_state = $_POST['c_state'];

    // Insert the data into the database using prepared statements.
    $sql = "INSERT INTO customer (c_name, c_email, c_state) VALUES (:name, :email, :state)";
    $stmt = $conn->prepare($sql);
    
    // Bind the parameters.
    $stmt->bindParam(':name', $c_name);
    $stmt->bindParam(':email', $c_email);
    $stmt->bindParam(':state', $c_state);

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