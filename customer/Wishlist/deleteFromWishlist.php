<?php
session_start();
include "../../admin/configDatabase.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$sql = "DELETE FROM wishlist WHERE user_id = '$user_id' AND product_id = '$product_id'";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted from wishlist";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

