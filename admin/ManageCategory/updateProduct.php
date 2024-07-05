<?php
include "../configDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $mainCategory = $_POST['mainCategory'];
    $subCategory = $_POST['subCategory'];
    $rarity = $_POST['rarity'];
    $float = $_POST['float'];
    $price = $_POST['price'];
    
    // Update query
    $sql = "UPDATE product_category SET 
        Product_name = ?, 
        Product_main_category = ?, 
        Product_sub_category = ?, 
        Product_rarity = ?, 
        Product_float = ?, 
        Product_price = ? 
        WHERE Product_id = ?";
    $stmt = $conn->prepare($sql);
    
$stmt->bind_param('ssssdii', $productName, $mainCategory, $subCategory, $rarity, $float, $price, $productId);

    if ($stmt->execute()) {
        // Success message and redirect
        $stmt->close();

        header('Location: editProduct.php?productId=' . urlencode($productId) . '&success=' . urlencode(true));

        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
