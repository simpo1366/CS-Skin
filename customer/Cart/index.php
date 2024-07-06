<?php include "../Jesse's work/header.php"; ?>

<div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product and Services List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .body {
            margin: 0;
            width: 100%;
            background-color: rgba(37, 37, 32, 0.348);
        }
        .ph1 {
            margin-top: 40px;
        }
        body {
            background-image: url("../Jesse's work/images/Homepage/CS2_image.png");
            background-size: cover;
            background-position: center;
            color: black;
            font-family: 'Stratum2-Black';
            width: 100%;
        }
        .websiteName {
            background-color: black;
            text-align: right;
            top: 0;
        }
        
        .websiteName {
            width: 100%;
            display: flex;
            justify-content: space-between;
            position: fixed;
            height: 80px;
            z-index: 1;
        }
        
        .headerLeftSection {
            display: flex;
        }
        
        .headerLeftSection h1 {
            color: white;
        }
        
        .headerLeftSection h1,
        .headerLeftSection img {
            margin: auto 10px;
        }
        
        .headerLeftSection img {
            height: 80px;
            border-radius: 50%;
        }
        
        .headerRightSection {
            display: flex;
        }
        
        .headerRightSection nav {
            margin: auto;
            width: 90px;
            display: flex;
            justify-content: center;
        }
        
        .headerRightSection nav a {
            text-decoration: none;
            color: white;
        }
        
        .headerRightSection nav a:visited {
            color: white;
        }
        
        .headerRightSection nav a:hover {
            color: plum;
            font-size: 18px;
        }
        
        .loginNav {
            display: flex;
            align-items: center;
        }
        
        .loginNav #loginBttn,
        .loginNav #signUpBttn {
            font-size: 18px;
            font-weight: bold;
            color: blue;
            padding: 10px 13px;
            border-radius: 5px;
            border-color: blue;
            border-width: 4px;
            margin: 0 15px;
        }
        
        .loginNav #signUpBttn {
            background-color: lightcyan;
        }
        /*sidebar*/
/*         
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
        } */
        
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
            margin-top: 70px;
        }
        
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }
            .sidebar a {
                font-size: 18px;
            }
        }
        
        .hidden {
            display: none;
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
        
        /*search Cart*/
        .searchCart{
            margin-top: 30px;
            height: 120px;
            background-color: grey;
            display: flex;
            align-items:end;
            justify-content:center;
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
            margin-bottom: 10px;
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
        
        .grid-container {
            position: relative;
            top: 80px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(8, 1fr);
            gap: 30px;
            /* Optional: Adds space between the grid items */
            margin-left: 60px;
            margin-right: 60px;
        }
        
        .grid-item {
            background-color: rgb(96, 90, 83);
            border: 1px solid #000;
            display: inline-block;
            /* Ensure the grid item doesn't take full width */
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 350px;
            /* Example height */
            width: 350px;
            flex-direction: column;
            font-size: 15px;
            border-radius: 3px;
            box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease;
        }
        
        .grid-item:hover {
            cursor: pointer;
            background-color: grey;
            transform: scale(1.06);
        }
        
        .grid-item img {
            height: 200px;
            width: 250px;
        }
        
        .grid-item .addCartBttn {
            width: 280px;
            height: 35px;
            border-radius: 5px;
            background-color: white;
            transition: transform 0.3s ease;
            border: none;
            padding: 10px 10px;
            margin: 35px 0px 0px 0px;
            cursor: pointer;
        }
        
        .grid-item .addCartBttn:hover {
            background-color: lightgreen;
        }
        
        .grid-item .addCartBttn:active {
            transform: scale(1.06);
        }
        /*list*/
        
        .list-group {
            height: 40vh;
            margin: 15px 5vw;
        }
        
        .list-item {
            display: flex;
            justify-content: space-between;
        }
        
        .list-item p {
            margin: auto 0;
            width: 19vw;
        }
        
        .list-item span {
            margin: auto 0;
        }
        
        .checkOut {
            margin: 15px 5vw;
            text-align: right;
            padding-bottom: 20px;
        }
        
        .price {
            margin-right: 15px;
            width: 180px;
        }
        
        .list-group .fa-cart-shopping {
            margin: 0 15px;
        }
        main{
            margin: 0;
            background-color: none;
        }
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
    </style>
</div>

<h1 class="ph1">MY SHOPPING CART</h1>
<div id="body"  style="background-color: rgba(37, 37, 32, 0.348);">
    <!-- <header class="websiteName">
        <div class="headerLeftSection">
            <img src="https://www.7gone.com/public/images/6684d7654481632539ef0b583b141704.png" alt="CS SKINS WEBSITE">
            <h1>CS SKINS WEBSITE</h1>
        </div>
        <div class="headerRightSection">
        </div>
        <div class="loginNav">
        </div>
    </header> -->
    <!-- <div class="searchCart">
        <div class="searchBar"><label for="searchBar" style="font-size: 18px;font-weight: bold;">Search Your
                Item:</label><input id="searchBar" type="search"></div>
        <div class="cart"><button style="font-size: 15pt;font-weight: bold;" onclick="location.href='../Cart'">Your Cart<i
                    class="fa-solid fa-cart-shopping"></i></button></div>
    </div> -->
    <!--side bar-->
    <!-- <div id="sidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a class="homeNav" href="../Jesse's work/home.php"><i class="fa-solid fa-house"></i>Home</a>
      <a href="../BuyProductList/index.php?mainCategory=Any&subCategory=Any" class="buyNav"><i class="fa-solid fa-cart-shopping"></i>Buy</a>
      <a href="../History" class="historyNav"><i class="fa-solid fa-clock-rotate-left"></i>History</a>
      <a href="../Jesse's work/aboutus.php" class="aboutNav"><i class="fa-solid fa-user-group"></i>About&nbsp;Us</a>
  </div> -->

    <div id="backdrop" class="backdrop"></div>

    <div id="main">
        <!-- <button class="openbtn" onclick="openNav()">☰</button> -->
        <div id="backdrop" class="backdrop"></div>
    </div>
    <main>
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
            <h4><i class="fa-solid fa-cart-shopping"></i>CART</h4>

            <?php
            include "../../admin/configDatabase.php";
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT c.product_id, c.quantity, p.Product_name, p.Product_price, p.Product_img 
                    FROM carts c 
                    JOIN product_category p ON c.product_id = p.Product_id 
                    WHERE c.user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result =  $stmt->get_result();
            $total = 0; // Initialize total
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imageUrl = base64_encode($row['Product_img']);
                    $itemTotal = $row["Product_price"] * $row["quantity"];
                    $total += $itemTotal;
                    echo '<li class="list-group-item">
                            <div class="list-item">
                                <img src="data:image/jpeg;base64,' . $imageUrl . '" alt="' . $row["Product_name"] . '" style="width: 50px; height: 50px;">
                                <p>' . $row["Product_name"] . '</p>
                                <span class="price">Price : RM' . $row["Product_price"] . '</span>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="reviewFromCart(' . $row["product_id"] . ')">REVIEW ITEM</button>
                                <span>Quantity : ' . $row["quantity"] . '</span>
                                <button class="btn btn-danger" onclick="deleteFromCart(' . $row["product_id"] . ')">DELETE</button>
                            </div>
                        </li>';
                }
            } else {
                echo "<li class='list-group-item'>empty cart</li>";
            }

            $stmt->close();
            $conn->close();
            ?>

        </ul>
        <div class="checkOut">
            <span>Total: RM <?php echo $total; ?></span>
            <form action="../CheckOut" method="POST">
        <button type="submit" class="btn btn-success">CHECK OUT</button>
    </form>
        </div>
    </main>
    <script>
        function deleteFromCart(productId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'deleteFromCart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(`Product ${productId} deleted from cart!`);
                    location.reload();
                } else {
                    alert('Error deleting product from cart.');
                }
            };

            xhr.send(`product_id=${productId}`);
        }
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
<?php include "../Jesse's work/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>