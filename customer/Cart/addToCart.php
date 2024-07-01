<?php
session_start();
include "../../admin/configDatabase.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '$quantity') ON DUPLICATE KEY UPDATE quantity = quantity + '$quantity'";

if ($conn->query($sql) === TRUE) {
    echo "Product added to cart";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
