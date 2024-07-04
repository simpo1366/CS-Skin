<?php
include "../../admin/configDatabase.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])) {
        $user_id = intval($_POST['id']);
        $user_name = $_POST['username'];
        $email = $_POST['email'];

        // Update user data
        $sql = "UPDATE user SET username = ?, email = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $user_name, $email, $user_id);
            if ($stmt->execute()) {
                header("Location: index.php"); // Redirect back to the user list page
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}

$conn->close();
?>
