<?php

include "../configDatabase.php";

// Define the function
    // Validate and sanitize input
    //$product_img = $_POST['productPic'];
    $productName = $_POST['productName'];
    $mainCategory = $_POST['mainCategory'];
    $subCategory = $_POST['subCategory'];
    $rarity = $_POST['rarity'];
    $float = $_POST['float'];
    $price = $_POST['price'];

    // // Prepare the SQL statement
    // $sql = "INSERT INTO product_category(Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_price)
    //         VALUES ('$product_img', '$productName', '$mainCategory', '$subCategory', '$rarity', '$float', '$price')";
    // // Execute the query
    // $conn->query($sql);

    if (isset($_FILES['productPic']) && $_FILES['productPic']['error'] == UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['productPic']['tmp_name']);
        
        // Prepare the SQL statement
        $sql = $conn->prepare("INSERT INTO product_category (Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_price)
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('bssssss', $imageData, $productName, $mainCategory, $subCategory, $rarity, $float, $price);

        // Execute the query
        $sql->send_long_data(0, $imageData);
        $sql->execute();
        $sql->close();
    }

//$conn->close();
header("Location: index.php");
?>
