<?php
session_start();
include "../../admin/configDatabase.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];

$sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id') ON DUPLICATE KEY UPDATE user_id = user_id";

if ($conn->query($sql) === TRUE) {
    echo "Product added to wishlist";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
