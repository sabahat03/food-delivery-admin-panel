<?php
include('database.php');
try {
    $sql = "DELETE FROM orders WHERE Order_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    $id = 1; // Example record ID to delete

    $stmt->execute();
    header("Location: index.php?page=Orders");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>