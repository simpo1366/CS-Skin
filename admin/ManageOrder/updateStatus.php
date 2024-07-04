<?php
include "../../admin/configDatabase.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $order_id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
    header('location:index.php');
}
?>
