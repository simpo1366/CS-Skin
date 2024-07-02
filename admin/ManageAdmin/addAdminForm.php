<?php
include '../configDatabase.php';

$name = $_POST['name'];
$pass = $_POST['pass'];

$sql = "INSERT INTO admin (admin_name, admin_pass) VALUES ('$name', '$pass')";

$conn->query($sql);

$conn->close();
header("Location: index.php");
?>
