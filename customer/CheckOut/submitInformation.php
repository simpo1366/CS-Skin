<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name_on_card'] = $_POST['name_on_card'];
    $_SESSION['card_number'] = $_POST['card_number'];
    $_SESSION['expiry_date'] = $_POST['expiry_date'];
    $_SESSION['cvv'] = $_POST['cvv'];
    
    header("Location: index.php"); // Redirect back to cart page
    exit;
} else {
    echo "Invalid request.";
}
?>
