<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <!--Search Cart-->
    <div class="searchCart">
        <div class="searchBar"><label for="searchBar" style="font-size: 18px;font-weight: bold;">Search Your Item:</label><input id="searchBar" type="search"></div>
        <div class="cart"><button style="font-size: 15pt;font-weight: bold;">Your Cart<i class="fa-solid fa-cart-shopping"></i></button></div>
    </div>

    <!--Weapon Type Sorting Feature-->
    <div class="sortingFeatures">
      <div class="dropdown">
        <button onclick="toggleColor(this); sortItems('Knives')">Knives</button>
        <div class="dropdownContent">
          <button onclick="toggleColor(this); sortItems('Knives','Butterfly Knife')">Butterfly Knife</button>
          <button onclick="toggleColor(this); sortItems('Knives', 'Karambit')">Karambit</button>
          <button onclick="toggleColor(this); sortItems('Knives', 'Bayonet')">Bayonet</button>
          <button onclick="toggleColor(this); sortItems('Knives', 'Shadow Daggers')">Shadow Daggers</button>
        </div>
      </div>
      <div class="dropdown">
        <button onclick="toggleColor(this); sortItems('Pistols')">Pistols</button>
        <div class="dropdownContent">
          <button onclick="toggleColor(this); sortItems('Pistols','Desert Eagle')">Desert Eagle</button>
          <button onclick="toggleColor(this); sortItems('Pistols','Five-Seven')">Five-Seven</button>
          <button onclick="toggleColor(this); sortItems('Pistols','P250')">P250</button>
          <button onclick="toggleColor(this); sortItems('Pistols','USP-S')">USP-S</button>
        </div>
      </div>
      <div class="dropdown">
        <button onclick="toggleColor(this); sortItems('SMGs')">SMGs</button>
        <div class="dropdownContent">
          <button onclick="toggleColor(this); sortItems('SMGs', 'MAC-10')">MAC-10</button>
          <button onclick="toggleColor(this); sortItems('SMGs', 'MP9')">MP9</button>
          <button onclick="toggleColor(this); sortItems('SMGs', 'P90')">P90</button>
          <button onclick="toggleColor(this); sortItems('SMGs', 'MP7')">MP7</button>
        </div>
      </div>
      <div class="dropdown">   
        <button onclick="toggleColor(this); sortItems('Assault Rifles')">Assault Rifles</button>
        <div class="dropdownContent">
          <button onclick="toggleColor(this); sortItems('Assault Rifles' , 'AK-47')">AK-47</button>
          <button onclick="toggleColor(this); sortItems('Assault Rifles' , 'AUG')">AUG</button>
          <button onclick="toggleColor(this); sortItems('Assault Rifles' , 'M4A1-S')">M4A1-S</button>
          <button onclick="toggleColor(this); sortItems('Assault Rifles' , 'M4A4')">M4A4</button>
        </div>
      </div>
      <div class="dropdown">
        <button onclick="toggleColor(this); sortItems('Sniper Rifles')">Sniper Rifles</button>
        <div class="dropdownContent">
          <button onclick="toggleColor(this); sortItems('Sniper Rifles', 'AWP')">AWP</button>
          <button onclick="toggleColor(this); sortItems('Sniper Rifles', 'G3SG1')">G3SG1</button>
          <button onclick="toggleColor(this); sortItems('Sniper Rifles', 'SCAR-20')">SCAR-20</button>
          <button onclick="toggleColor(this); sortItems('Sniper Rifles', 'SSG 08')">SSG 08</button>
        </div>
      </div>
        <button onclick="toggleColor(this); sortItems('Any')">Any</button>
    </div>
    <!--product section-->
      <main>
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
        <div class="grid-container">
          <?php
          
            include "../../admin/configDatabase.php";

            // Function to fetch products from the database
            function fetchProducts($connect) {
              $sql = "SELECT Product_id, Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_price FROM product_category";
              $result = $connect->query($sql);
              return $result;
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
                $price = htmlspecialchars($product['Product_price']);

                echo '<div class="grid-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-productid=' . $id .'>';
                echo '<figure class="weapon">';
                echo '<img src="data:image/jpeg;base64,' . $imageUrl . '" alt="'. $name .'">';
                echo '</figure>';
                echo '<figcaption> <span>'. $name .'</span></figcaption>';
                echo '<p>Float Value: <span>'. $floatValue .' | '. $floatValue.'</span></p>';
                echo '<p>RM <span>'. $price .'<span> </p>';
                echo '<button class="buyItemBtn">';
                echo '<i class="fa-solid fa-cart-shopping"></i>';
                echo '</button>';
                echo '</div>';                
                }
            }

              // Fetch and render products
              $products = fetchProducts($conn);
              renderProducts($products);
          ?>
        </div>

      </main>

</body>
<script src="./index.js"></script>
<script src="./utils/RenderProductDetails.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
