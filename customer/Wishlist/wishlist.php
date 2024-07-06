<?php
include "../Jesse's work/header.php"; 

// Fetch wishlist items for the logged-in user
$user_id = $_SESSION['user_id']; // Make sure you have the user ID available here
$sql = "SELECT p.Product_id, p.Product_img, p.Product_name, p.Product_main_category, p.Product_sub_category, p.Product_rarity, p.Product_float, p.Product_condition, p.Product_price
        FROM product_category p
        JOIN wishlist w ON w.product_id = p.Product_id
        WHERE w.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result =  $stmt->get_result();

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="wishlist.css">

<title>My Wishlist</title>
<div id="body" class="container">
    <h1 class="ph1">MY WISHLIST</h1>
    <div class="grid-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Product_img']).'" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$row['Product_name'].'</h5>';
                echo '<p class="card-text">Category: '.$row['Product_main_category'].' - '.$row['Product_sub_category'].'</p>';
                echo '<p class="card-text">Rarity: '.$row['Product_rarity'].'</p>';
                echo '<p class="card-text">Float: '.$row['Product_float'].'</p>';
                echo '<p class="card-text">Condition: '.$row['Product_condition'].'</p>';
                echo '<p class="card-text">Price: $'.$row['Product_price'].'</p>';
                echo '<button class="deleteFromWishlistbttn" onclick="deleteFromWishlist('.$row['Product_id'].')">Remove from Wishlist</button>';
                echo '<button class="addToCartBttn" onclick="addToCart('.$row['Product_id'] .')">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Your wishlist is empty.";
        }   

        $stmt->close();
        $conn->close();
        ?>
    </div>
</div>
<script>
    function addToCart(productId) {
            const quantity = 1;
            const userId = <?php echo $_SESSION['user_id']; ?>; 

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../cart/addToCart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(`Product ${productId} Added to cart!`);
                } else {
                    alert('Error adding product to cart.');
                }
            };

        xhr.send(`product_id=${productId}&quantity=${quantity}&user_id=${userId}`);
        }
    function deleteFromWishlist(productId) {
            const userId = <?php echo $_SESSION['user_id']; ?>; 
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'deleteFromWishlist.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(`Product ${productId} deleted from Wishlist!`);
                    location.reload();
                } else {
                    alert('Error deleting product from wishlist.');
                }
            };

            xhr.send(`product_id=${productId}&user_id=${userId}`);
        }
</script>
<?php include "../Jesse's work/footer.php"; ?>
