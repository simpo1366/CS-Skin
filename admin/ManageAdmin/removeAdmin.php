<?php
include '../configDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminId = $_POST['adminId'];

    $sql = "DELETE FROM admin WHERE admin_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $adminId);

    if ($stmt->execute()) {
        echo "Admin removed successfully.";

    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();


} 
?>
