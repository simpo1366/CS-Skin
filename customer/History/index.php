<?php
include "../../admin/configDatabase.php";
session_start();

$user_id = $_SESSION['user_id'];
$sql = "SELECT o.order_id, o.order_date, o.product_price, o.quantity, o.status, p.Product_name
        FROM orders o
        JOIN product_category p ON o.product_id = p.Product_id
        WHERE o.user_id = '$user_id'";
$result = $conn->query($sql);
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
        .searchCart{
            height: 150px;
            background-color: grey;
            display: flex;
            align-items:end;
            justify-content:center;
        }
        .searchBar #searchBar{
            margin: 15px;
            width: 300px;
            height: 40px;
            font-size: 15pt;
        }
        .searchCart .cart button{
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
        .searchCart .cart button i{
            width: 30px;
            height: 30px;
            margin-top: 20px ;
            margin-left: 10px;
        }
        .searchCart .cart button:hover{
            background-color: whitesmoke;
        }

        .searchCart .cart button:active{
            position: relative;
            top: 4px;
            transition: all 0.3s;
        }
        .history {
            width: 60vw;
            border-collapse: collapse;
            margin: 20px 300px;
            background-color: white;
            border-radius: 5px;
        }
        th, td {
            border-radius: 5px;
            padding: 8px;
            text-align: left;
            text-transform: capitalize; /* Capitalize the first letter of each word */
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
            text-transform: capitalize; /* Capitalize the first letter of each word */
        }
        .button.review {
            background-color: #007bff;
        }
        .status {
            padding: 4px 8px;
            background-color: #e0e0e0;
            color: #555;
            border-radius: 4px;
            text-transform: capitalize; /* Capitalize the first letter of each word */
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

        /* list item php styling
        .list-group{
            width: 80vw;
            height: 50vh;
            margin: 0px;
            padding: 0;
        }
        .list-item{
            display:flex;
            justify-content: space-between;
            background-color: white;
            margin:0px;
            padding: 5px 10px;
        }
        .list-item p{
            width: 30vw;
        }
        .list-item span{
            margin: auto 0;
        }
        .list-item .desc{
            color: orange;
            font-weight: bold;
        }
        .list-item .details{
            color: grey;
            font-weight: normal;
        }
        .list-group .fa-clock-rotate-left{
            margin: 0 15px;
        } */
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

    <table class="history">
        <thead>
            <tr>
                <th>Time</th>
                <th>Product Name</th>
                <th>Total Price</th>
                <th>Total Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td class="details" name="Payment_time">' . $row["order_date"] . '</td>
                                <td class="details" name="Payment_time">' . $row["Product_name"] . '</td>
                                <td class="details" name="Payment_price">' . $row["product_price"] . '</td>
                                <td class="details" name="Payment_quantity">' . $row["quantity"] . '</td>
                                <td class="details" name="Payment_quantity">' . $row["status"] . '</td>
                                <td class="details">
                                    <a href="#" class="btn btn-primary review">Comment</a>
                                </td>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-center">No orders found</td></tr>';
                }
                $conn->close();
                ?>
    </table>
</body>
<!-- Footer HTML -->
</main>
<script>
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
</html>