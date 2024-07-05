<?php
    session_start();
    include "../../admin/configDatabase.php";

    $sql = "SELECT Product_id, Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_condition, Product_price 
        FROM product_category";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

body{
    margin:0;
    width: 100%;
    font-family: Arial, sans-serif;
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
    
/* CSS for Sorting Features */
.sortingFeatures {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    position: relative;
    bottom: 10px;
}

.dropdown {
    position: relative;
    display: inline-block;
    margin: 0px 10px;
    width: 150px; /* Set a fixed width if needed */
    box-sizing: border-box;
}

.dropbtn {/*change*/
    background-color: #white;
    color: black;
    border-radius: 5px;
    padding: 15px 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    width: 100%; /* Make the button take the full width of the dropdown */
    box-sizing: border-box;
    transition: background-color 0.3s ease;
}

.dropbtn img {
    margin-right: 5px;
}

.dropdownContent {
    display: none;
    position: absolute;
    background-color: whitesmoke;
    min-width: 100%; /* Make sure the dropdown content matches the width of the dropdown */
    box-sizing: border-box;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    opacity: 0.9;
    transition: background-color 0.3s ease;
}

.dropdownContent a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    cursor: pointer;
}

.dropdown:hover .dropdownContent {
    display: block;
}

/* Adjustments for "Any" Button */
.dropdown:last-child .dropbtn {
    background-color: lightblue;
    color:white;
}

.dropdown:last-child .dropdownContent {
    min-width: 100%; /* Ensure this dropdown content matches the width of the dropdown */
}

/* Hover effects */
.dropdownContent a:hover {
    background-color: darkorange;
}

/* Adjustments for "Any" Button */
.dropdown:last-child .dropbtn {
    justify-content: center;
    background-color: #2196F3; /* Change color as needed */
    transition: background-color 0.3s ease;
}

.dropdown:last-child .dropdownContent {
    min-width: 100%; /* Adjust width if necessary */
}



/*Searchcart css*/
.searchCart{
    margin-top: 30px;
    height: 120px;
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
.cart a{ 
    text-decoration: none;
    color: black;   
}
.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(8, 1fr);
    gap: 30px; /* Optional: Adds space between the grid items */
    margin-left: 80px;
    margin-right: 80px;
}
.grid-item {
    background-color: rgb(96, 90, 83);
    border: 1px solid #000;
    display: inline-block; /* Ensure the grid item doesn't take full width */
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Center the content vertically */
    overflow: hidden; /* Hide any overflowing content */
    padding: 10px;
    position: relative;
    transition: transform 0.3s ease-in-out; /* Optional: Add a smooth hover effect */
    text-align: center; /* Center text content */
    text-decoration: none; /* Remove underline from links */
    width: 100%; /* Ensure grid items take full width of their container */
}

.grid-item:hover {
    transform: scale(1.05); /* Optional: Scale up the item on hover */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow */
}

.grid-item img {
    max-width: 100%; /* Ensure images don't exceed their container */
    height: auto; /* Maintain aspect ratio */
    object-fit: cover; /* Cover the entire area of the container */
}

.grid-item figcaption {
    margin-top: auto; /* Push the caption to the bottom */
    font-weight: bold;
    color: darkorange;
    font-size: 18px;
}

.grid-item p {
    margin: 3px 0; /* Optional: Adjust spacing around paragraphs */
    font-size: 17px;
    font-weight: 500;
    color: white;
}
.buyItemBtn {
    margin-top: 5px;
    border-radius: 5px;
}
.buyItemBtn:hover{
    background-color: lightgreen;
    transition: background-color 0.5s ease;

}
</style>
</head>


<body style="background-color: rgba(37, 37, 32, 0.348);">
    <!--header-->
    <header class="websiteName"> 
        <div class="headerLeftSection">
            <img src="https://www.7gone.com/public/images/6684d7654481632539ef0b583b141704.png" alt="CS SKINS WEBSITE">
            <h1>CS SKINS WEBSITE</h1>
        </div>       

        <div class="loginNav">
        </div>
    </header>

    <!--side bar-->
    <div id="sidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a class="homeNav" href="../Jesse's work/home.php"><i class="fa-solid fa-house"></i>Home</a>
      <a href="../BuyProductList" class="buyNav"><i class="fa-solid fa-cart-shopping"></i>Buy</a>
      <a href="../History" class="historyNav"><i class="fa-solid fa-clock-rotate-left"></i>History</a>
      <a href="../Jesse's work/aboutus.php" class="aboutNav"><i class="fa-solid fa-user-group"></i>About&nbsp;Us</a>
  </div>

  <!--Search Cart-->
  <div class="searchCart">
        <div class="searchBar"><label for="searchBar" style="font-size: 18px;font-weight: bold;">Search Your Item:</label><input id="searchBar" type="search"></div>
        <div class="cart"><a href="../Cart/index.php"><button style="font-size: 15pt;font-weight: bold;">Your Cart<i class="fa-solid fa-cart-shopping"></i></a></button></div>
    </div>

  <div id="backdrop" class="backdrop"></div>

  <div id="main">
      <button class="openbtn" onclick="openNav()">☰</button>
      <div id="backdrop" class="backdrop"></div>
  </div>

        <!-- Sorting Features -->
<div class="sortingFeatures text-center mb-3"  style=" margin: 0;">
<?php
$categories = [
    'knives' => [
        ['name' => 'Karambit', 'value' => 'Karambit'],
        ['name' => 'Butterfly Knife', 'value' => 'Butterfly Knife'],
        ['name' => 'Bayonet', 'value' => 'Bayonet'],
        ['name' => 'Shadow Daggers', 'value' => 'Shadow Daggers']
    ],
    'pistols' => [
        ['name' => 'Desert Eagle', 'value' => 'Desert Eagle'],
        ['name' => 'Five-Seven', 'value' => 'Five-Seven'],
        ['name' => 'P250', 'value' => 'P250'],
        ['name' => 'USP-S', 'value' => 'USP-S']
    ],
    'smgs' => [
        ['name' => 'MAC-10', 'value' => 'MAC-10'],
        ['name' => 'MP9', 'value' => 'MP9'],
        ['name' => 'P90', 'value' => 'P90'],
        ['name' => 'MP7', 'value' => 'MP7']
    ],
    'assaultRifles' => [
        ['name' => 'AK-47', 'value' => 'AK-47'],
        ['name' => 'AUG', 'value' => 'AUG'],
        ['name' => 'M4A1-S', 'value' => 'M4A1-S'],
        ['name' => 'M4A4', 'value' => 'M4A4']
    ],
    'sniperRifles' => [
        ['name' => 'AWP', 'value' => 'AWP'],
        ['name' => 'G3SG1', 'value' => 'G3SG1'],
        ['name' => 'SCAR-20', 'value' => 'SCAR-20'],
        ['name' => 'SSG 08', 'value' => 'SSG 08']
    ]
];

$icons = [
    'knives' => 'icons/bayonet.png',
    'pistols' => 'icons/pistol.png',
    'smgs' => 'icons/uzi.png',
    'assaultRifles' => 'icons/ak-47.png',
    'sniperRifles' => 'icons/sniper.png'
];

// Mapping array for display names
$displayNames = [
    'knives' => 'Knives',
    'pistols' => 'Pistols',
    'smgs' => 'SMGs',
    'assaultRifles' => 'Assault Rifles',
    'sniperRifles' => 'Sniper Rifles'
];
?>

<div class="sortingFeatures text-center mb-3" style="margin: 0;">
<?php
foreach ($categories as $category => $items) {
    $displayName = $displayNames[$category];
    echo '<div class="dropdown">';
    echo '<button class="dropbtn"><img src="' . $icons[$category] . '" alt="' . $displayName . '" width="20" height="20"> ' . $displayName . '</button>';
    echo '<div class="dropdownContent">';
    echo '<a href="#" data-main-category="' . htmlspecialchars($category) . '" data-sub-category="Any">All ' . $displayName . '</a>';
    foreach ($items as $item) {
        echo '<a href="#" data-main-category="' . htmlspecialchars($category) . '" data-sub-category="' . htmlspecialchars($item['value']) . '">' . htmlspecialchars($item['name']) . '</a>';
    }
    echo '</div></div>';
}
?>

    <!-- "Any" Button -->
    <div class="dropdown">
        <button class="dropbtn">Any</button>
        <div class="dropdownContent">
            <a href="#" data-main-category="Any" data-sub-category="Any">All Items</a>
        </div>
    </div>
</div>

        <!--product details section-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="productModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-weight: bold;">PRODUCT DETAILS</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
              </div>
            </div>
        </div>

        <!-- Product grid -->
        <div class="grid-container">
            <?php
    // Function to fetch products from the database with optional sorting
    function fetchProducts($connect, $mainCategory = null, $subCategory = null) {
    $sql = "SELECT Product_id, Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_condition, Product_price FROM product_category";

    if ($mainCategory && $mainCategory !== 'Any') {
        $sql .= " WHERE Product_main_category = '$mainCategory'";
        if ($subCategory && $subCategory !== 'Any') {
            $sql .= " AND Product_sub_category = '$subCategory'";
        }
    } elseif ($subCategory && $subCategory !== 'Any') {
        $sql .= " WHERE Product_sub_category = '$subCategory'";
    }
    
    $result = $connect->query($sql);
    return $result;
}


    // Display products based on current sorting parameters
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['mainCategory']) && isset($_GET['subCategory'])) {
    $mainCategory = $_GET['mainCategory'] ?? 'Any';
    $subCategory = $_GET['subCategory'] ?? 'Any';

    // Fetch products based on selected categories
    $products = fetchProducts($conn, $mainCategory, $subCategory);

                    // Render products as needed
                    renderProducts($products);
                }

                    // Function to render products as HTML
    function renderProducts($products) {
        while ($product = $products->fetch_assoc()) {
            $id = htmlspecialchars($product['Product_id']);
            $imageUrl = base64_encode($product['Product_img']);
            $name = htmlspecialchars($product['Product_name']);
            $mainCategory = htmlspecialchars($product['Product_main_category']);
            $subCategory = htmlspecialchars($product['Product_sub_category']);
            $rarity = htmlspecialchars($product['Product_rarity']);
            $floatValue = htmlspecialchars($product['Product_float']);
            $condition = htmlspecialchars($product['Product_condition']);
            $price = htmlspecialchars($product['Product_price']);

            echo '<div class="grid-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-productid=' . $id .'>';
            echo '<figure class="weapon">';
            echo '<img src="data:image/jpeg;base64,' . $imageUrl . '" alt="'. $name .'">';
            echo '</figure>';
            echo '<figcaption> <span>'. $name .'</span></figcaption>';
            echo '<p><span>'. $floatValue .' | '. $condition.'</span></p>';
            echo '<p>RM <span>'. $price .'<span> </p>';
            echo '<button class="buyItemBtn">';
            echo '<i class="fa-solid fa-cart-shopping"></i>';
            echo '</button>';
            echo '</div>';                
        }
    }
            ?>
        </div>
    </div>

    <!-- Optional: Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-gL2q5hOvK1l6XwRSazg7R1bmVtn9JLr7H6ONgkXuy/gYlV10Pb5vY0Y3tlz/vyNf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-9F/UpnHwZ8KH2/GqSNFVn2EjsdPp5VtiE4Nb0QtI1b6O6FKolZ4+OJtfEQYmVFXt" crossorigin="anonymous"></script>
    <script src="../../admin/scripts.js"></script>

    <script>
       document.addEventListener("DOMContentLoaded", function() {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.dropbtn');
        const content = dropdown.querySelector('.dropdownContent');

        btn.addEventListener('click', function() {
            content.classList.toggle('show');
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', function(event) {
            if (!dropdown.contains(event.target)) {
                content.classList.remove('show');
            }
        });

        // Handle sorting when a category is selected
        const links = content.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const mainCategory = this.getAttribute('data-main-category');
                const subCategory = this.getAttribute('data-sub-category');
                filterProducts(mainCategory, subCategory);
            });
        });
    });

    // Function to filter products based on selected categories
    function filterProducts(mainCategory, subCategory) {
        // Example: Redirect or reload page with parameters
        window.location.href = 'index.php?mainCategory=' + mainCategory + '&subCategory=' + (subCategory || 'Any');
    }
});

        </script>
        <script src="./index.js"></script>
        <script src="./utils/RenderProductDetails.js"></script>
        <script>

        //add to cart function
        function addToCart(productId) {

        const quantity = 1;
        const userId = <?php $_SESSION['user_id'] = 1;echo $_SESSION['user_id']; ?>; 

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

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
