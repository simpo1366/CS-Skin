<?php
include "../../admin/configDatabase.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $cartItems = $_POST['cart_items'];
    $total = $_POST['total'];
    $name_on_card = $_SESSION['name_on_card'];
    $card_number = $_SESSION['card_number'];
    $expiry_date = $_SESSION['expiry_date'];
    $cvv = $_SESSION['cvv'];
    $status = "Pending";

    // Assuming you have an 'orders' table with the following columns: order_id, user_id, product_id, quantity, product_price, total, name_on_card, card_number, expiry_date
    $conn->begin_transaction();

    try {
        // Insert order details into orders table
        foreach ($cartItems as $item) {
            $sql = "INSERT INTO orders (user_id, product_id, quantity, product_price, total, name_on_card, card_number, expiry_date, cvv,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiidssssss", $user_id, $item['product_id'], $item['quantity'], $item['product_price'], $total, $name_on_card, $card_number, $expiry_date, $cvv,$status);
            $stmt->execute();
        }

        // Clear the cart
        $sql = "DELETE FROM carts WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $conn->commit();
        echo "Order placed successfully.";
        header("Location: ../history");
    } catch (Exception $e) {
        $conn->rollback();
        echo "Failed to place order: " . $e->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
