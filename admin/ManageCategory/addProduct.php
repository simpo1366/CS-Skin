<?php

include "../configDatabase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productPic = $_FILES['productPic']['tmp_name'];
    $productName = $_POST['productName'];
    $mainCategory = $_POST['mainCategory'];
    $subCategory = isset($_POST['subCategory']) ? $_POST['subCategory'] : NULL; 
    $rarity = $_POST['rarity'];
    $float = $_POST['float'];
    $condition = $_POST['condition'];
    $price = $_POST['price'];

    $productPicContent = file_get_contents($productPic);
    $null = NULL; 


    $stmt = $conn->prepare("INSERT INTO product_category (Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_condition, Product_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("bsssssss", $null, $productName, $mainCategory, $subCategory, $rarity, $float, $condition, $price);
    $stmt->send_long_data(0, $productPicContent); 

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

//$conn->close();
header("Location: index.php");
?>
