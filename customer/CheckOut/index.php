<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product and Services List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body{
    margin:0;
    width: 100%;
    background-color: rgba(37, 37, 32, 0.348);
    }
        h1{
            margin: 0;
        }
        .websiteName{
            background-color: black;
            text-align: right;
            top: 0;
        }
        .websiteName{
            width: 100%;
            display: flex;
            justify-content: space-between;
            position: fixed;
            height: 80px;
            z-index: 1;
        }
        .headerLeftSection{
            display: flex;
        }
        .headerLeftSection h1{
            color: white;
        }
        .headerLeftSection h1, .headerLeftSection img{
            margin: auto 10px;
        }
        .headerLeftSection img{
            height: 80px;
            border-radius: 50%;
        }
        .headerRightSection{
            display: flex;  
        }
        .headerRightSection nav{
            margin: auto ;
            width: 90px;
            display: flex;
            justify-content: center;
        }
        .headerRightSection nav a{
            text-decoration: none;
            color: white;
        }
        .headerRightSection nav a:visited{
            color: white;
        }
        .headerRightSection nav a:hover{
            color: plum;
            font-size: 18px;
        }
        .loginNav{
            display: flex;
            align-items: center;
        }
        .loginNav #loginBttn, .loginNav #signUpBttn{
            font-size: 18px;
            font-weight: bold;
            color: blue;
            padding: 10px 13px;
            border-radius: 5px;
            border-color: blue;
            border-width: 4px;
            margin: 0 15px;
        }
        .loginNav #signUpBttn{
            background-color: lightcyan;
        }
        /*search Cart*/
        .searchCart {
            height: 150px;
            background-color: grey;
            display: flex;
            align-items: end;
            justify-content: center;
        }
        
        .searchBar #searchBar {
            margin: 15px;
            width: 300px;
            height: 40px;
            font-size: 15pt;
        }
        
        .searchCart .cart button {
            width: 180px;
            height: 50px;
            background-color: lightgrey;
            padding: 10px 20px;
            display: flex;
            justify-content: right;
            align-items: center;
            margin-left: 70px;
        }
        
        .searchCart .cart button i {
            width: 30px;
            height: 30px;
            margin-top: 20px;
            margin-left: 10px;
        }   
        .searchCart .cart button:hover {
            background-color: whitesmoke;
        } 
        .searchCart .cart button:active {
            position: relative;
            top: 4px;
            transition: all 0.3s;
        }
        .hidden {
            display: none;
        }
                /*sidebar*/
                .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 2;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }        
        .sidebar i {
            margin-right: 20px;
            margin-left: 20px;
            position: relative;
            top: 6px;
        }
        
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: flex;
            transition: 0.3s;
        }
        
        .sidebar a:hover {
            color: orange;
        }
        
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: orange;
            padding: 10px 15px;
            border: none;
            position: fixed;
            top: 160px;
            left: 20px;
            z-index: 1;
        }
        
        #main {
            transition: margin-left .2s;
            padding: 16px;
        }
        
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }
            .sidebar a {
                font-size: 18px;
            }
        }

        /* Backdrop styling */
        .backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            display: none;
        }
        .container { width: 65%; margin: auto; }
        .cart { margin-bottom: 20px; }
        .cart table { width: 100%; border-collapse: collapse; }
        .cart table, .cart th, .cart td { border: 1px solid black; }
        .cart th, .cart td { padding: 10px; text-align: left; }
        .payment { margin-top: 20px; background-color: white; padding: 20px;border-radius:6px;}
        .payment input[type="text"], .form input[type="number"], .form input[type="submit"] { width: 100%; padding: 10px; margin-bottom: 10px; }


        /*check out info*/
        .CheckOutInfo{
        margin-left: 30px;
        }
        .CheckOutInfo h5{
        margin: 10px 0;
        }
        .checkOut{
            display:flex;
            justify-content:space-between;
            margin:20px 0;
        }
        .list-item {
            display: flex;
            justify-content: space-between;
        }
        
        .list-item p {
            width: 19vw;
        }
        
        .list-item span {
            margin: auto 0;
        }
        .price {
            margin-right: 15px;
            width: 180px;
        }.list-group .fa-money-bill-1 {
            margin: 0 15px;
        }
        .error{
            color:red;
            font-weight:600;
            margin:0;
        }
    </style>
</head>
<body>
<header class="websiteName">
        <div class="headerLeftSection">
            <img src="https://www.7gone.com/public/images/6684d7654481632539ef0b583b141704.png" alt="CS SKINS WEBSITE">
            <h1>CS SKINS WEBSITE</h1>
        </div>
        <div class="headerRightSection">
            <nav><a href="../Home/">Home</a></nav>
            <nav><a href="#">Market</a></nav>
            <nav><a href="#">About Us</a></nav>
            <nav><a href="#">Join Us</a></nav>
        </div>
        <div class="loginNav">
            <button id="loginBttn">Login</button>
            <button id="signUpBttn">Sign Up</button>
        </div>
    </header>

    <div class="searchCart">
        <div class="searchBar"><label for="searchBar" style="font-size: 18px;font-weight: bold;">Search Your
                Item:</label><input id="searchBar" type="search"></div>
        <div class="cart"><button style="font-size: 15pt;font-weight: bold;">Your Cart<i
                    class="fa-solid fa-cart-shopping"></i></button></div>
    </div>
    <!--side bar-->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="homeNav" href="#"><i class="fa-solid fa-house"></i>Home</a>
        <a href="#" class="buyNav"><i class="fa-solid fa-cart-shopping"></i>Buy</a>
        <a href="sellpage.html" class="sellNav"><i class="fa-solid fa-sack-dollar"></i>Sell</a>
        <a href="#" class="historyNav"><i class="fa-solid fa-clock-rotate-left"></i>History</a>
        <a href="#" class="aboutNav"><i class="fa-solid fa-user-group"></i>About&nbsp;Us</a>
    </div>

    <div id="backdrop" class="backdrop"></div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰</button>
        <div id="backdrop" class="backdrop"></div>
    </div>    

    
<div class="container">
<ul class="list-group">
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="productModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                    </div>
                </div>
            </div>
            <h4><i class="fa-solid fa-money-bill-1"></i></i>Cash Out</h4>
            
            <?php
            include "../../admin/configDatabase.php";
            $_SESSION['user_id'] = 1;
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT c.product_id, c.quantity, p.Product_name, p.Product_price, p.Product_img 
                    FROM carts c 
                    JOIN product_category p ON c.product_id = p.Product_id 
                    WHERE c.user_id = '$user_id'";
            $result = $conn->query($sql);
            $total = 0; // Initialize total
            $cartItems = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imageUrl = base64_encode($row['Product_img']);
                    $itemTotal = $row["Product_price"] * $row["quantity"];
                    $total += $itemTotal;
                    $cartItems[] = [
                        'product_id' => $row["product_id"],
                        'product_name' => $row["Product_name"],
                        'product_price' => $row["Product_price"],
                        'quantity' => $row["quantity"],
                        'item_total' => $itemTotal
                    ];
                    echo '<li class="list-group-item">
                            <div class="list-item">
                                <img src="data:image/jpeg;base64,' . $imageUrl . '" alt="' . $row["Product_name"] . '" style="width: 50px; height: 50px;">
                                <p>' . $row["Product_name"] . '</p>
                                <span class="price">Price : RM' . $row["Product_price"] . '</span>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="reviewFromCart(' . $row["product_id"] . ')">review item page</button>
                                <span>Quantity : ' . $row["quantity"] . '</span>
                            </div>
                        </li>';
                }
            } else {
                echo "<li class='list-group-item'>empty cart</li>";
            }

            $conn->close();
            ?>

          </ul>

    <div class="payment">
        <h2>Payment Information</h2>
        <form action="submitInformation.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="name_on_card" placeholder="Name on Card" required>
            <p class="error"></p>
            <input type="text" name="card_number" placeholder="Card Number" required>
            <p class="error"></p>
            <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" required>
            <p class="error"></p>
            <input type="text" name="cvv" placeholder="CVV" required>
            <p class="error"></p>
            <input class="btn btn-outline-success" type="submit" value="Submit Payment Info">
        </form>
    </div>
    <div class="payment">
    <div class="CheckOutInfo">
            <h5>
               Check Out Info:
            </h5>
            <p>Payment Type: Credit Card</p>
            <p>Name on Card: <?php echo isset($_SESSION['name_on_card']) ? $_SESSION['name_on_card'] : ''; ?></p>
            <p>Card Number: <?php echo isset($_SESSION['card_number']) ? $_SESSION['card_number'] : ''; ?></p>
            <p>Product subtotal: RM<?php echo $total; ?></p>
            <p>Service Tax (6%): RM<?php echo $total * 0.06; ?></p>
            <p>Total Payment: RM<?php echo $total * 1.06; ?></p>
    </div>
    </div>
    <div class="checkOut">
        <button class="btn btn-warning" onclick="location.href='../Cart'">Back To Cart</button>
        <form action="Checkout.php" method="post">
        <?php
        // Add hidden inputs for each cart item
        foreach ($cartItems as $index => $item) {
            echo '<input type="hidden" name="cart_items[' . $index . '][product_id]" value="' . $item['product_id'] . '">';
            echo '<input type="hidden" name="cart_items[' . $index . '][product_name]" value="' . $item['product_name'] . '">';
            echo '<input type="hidden" name="cart_items[' . $index . '][product_price]" value="' . $item['product_price'] . '">';
            echo '<input type="hidden" name="cart_items[' . $index . '][quantity]" value="' . $item['quantity'] . '">';
            echo '<input type="hidden" name="cart_items[' . $index . '][item_total]" value="' . $item['item_total'] . '">';
        }
        ?>
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <button type="submit" class="btn btn-success">Cash Out</button>
        </form>
    </div>
</div>

</body>
    <script>
        function reviewFromCart(productId) {
            const modalBody = document.querySelector(".modal-body");
            fetch(`reviewProduct.php?id=${productId}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            "Network response was not ok " + response.statusText
                        );
                    }
                    return response.text();
                })
                .then((data) => {
                    modalBody.innerHTML = data;
                })
                .catch((error) => {
                    console.error("There was a problem with the fetch operation:", error);
                    modalBody.innerHTML = "<p>Error loading content.</p>";
                });
        }
        function openNav() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("backdrop").style.display = "block";
        }
        function closeNav() {/*sidebar close*/
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("backdrop").style.display = "none";
        }
        function validateForm() {
            let isValid = true;

            // Name on Card validation
            const nameOnCard = document.querySelector('input[name="name_on_card"]');
            const nameOnCardError = nameOnCard.nextElementSibling;
            const nameOnCardRegex = /^[a-zA-Z\s]+$/;
            if (!nameOnCardRegex.test(nameOnCard.value)) {
                nameOnCardError.textContent = "Invalid name. Only letters and spaces are allowed.";
                isValid = false;
            } else {
                nameOnCardError.textContent = "";
            }

            // Card Number validation
            const cardNumber = document.querySelector('input[name="card_number"]');
            const cardNumberError = cardNumber.nextElementSibling;
            const cardNumberRegex = /^\d{16}$/;
            if (!cardNumberRegex.test(cardNumber.value)) {
                cardNumberError.textContent = "Invalid card number. It should be a 16-digit number.";
                isValid = false;
            } else {
                cardNumberError.textContent = "";
            }

            // Expiry Date validation
            const expiryDate = document.querySelector('input[name="expiry_date"]');
            const expiryDateError = expiryDate.nextElementSibling;
            const expiryDateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
            if (!expiryDateRegex.test(expiryDate.value)) {
                expiryDateError.textContent = "Invalid expiry date. Use MM/YY format.";
                isValid = false;
            } else {
                expiryDateError.textContent = "";
            }

            // CVV validation
            const cvv = document.querySelector('input[name="cvv"]');
            const cvvError = cvv.nextElementSibling;
            const cvvRegex = /^\d{3}$/;
            if (!cvvRegex.test(cvv.value)) {
                cvvError.textContent = "Invalid CVV. It should be a 3-digit number.";
                isValid = false;
            } else {
                cvvError.textContent = "";
            }

            return isValid;
        }
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
