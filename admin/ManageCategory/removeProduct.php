<?php
include '../configDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Product_Id = $_POST['productId'];

    $sql = "DELETE FROM product_category WHERE Product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $Product_Id);

    $stmt->execute();
    $stmt->close();
    $conn->close();
} 
?>