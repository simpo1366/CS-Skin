
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: lightyellow;
            margin: 0;
        }
        .card {
            margin-bottom: 15px;
        }
        .container-main {
            display: flex;
            position: relative;
            right: 175px;
        }
        #productForm {
            padding: 30px;
        }
        .container-form {
            width: 600px; /* Adjust */
            margin-right: 20px;
        }
        .container-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 30px;
            width: 300px;
        }
        .weaponDetails {
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: left;
            padding: 20px;
            width: 250px; /* Adjust width */
            height: auto; /* Adjust height */
        }
        .weaponDetails img {
            width: 200px; /* Adjust image width */
            height: 175px; /* Adjust image height */
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #756477; height: 80px">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#" style="color: #e8d4d4">Admin</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" style="color: #e8d4d4;">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #e8d4d4;" aria-current="page">Manage Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #e8d4d4">Manage Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #372938; font-weight: 600;">Manage Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #e8d4d4">Manage Customer</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container mt-4">
        <div class="container-main">
            <div class="container-form">
                <div class="card addWeapon">
                    <div>
                        <form id="productForm" action="addProduct.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Add Product Form</legend>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Weapon Picture:</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="productPic" require />
                                </div>
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Skin Name:</label>
                                    <input type="text" id="productName" name="productName" class="form-control" placeholder="Insert skin name" required />
                                </div>
                                <div class="mb-3">
                                    <label for="mainCategory" class="form-label">Weapon Main Category:</label>
                                    <select id="mainCategory" name="mainCategory" class="form-select" onchange="updateSubCategories()">
                                        <option value="">Select Category</option>
                                        <option value="knives">Knives</option>
                                        <option value="pistols">Pistols</option>
                                        <option value="smgs">SMGs</option>
                                        <option value="assaultRifles">Assault Rifles</option>
                                        <option value="sniperRifles">Sniper Rifles</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="subCategory" class="form-label">Weapon Sub Category:</label>
                                    <select id="subCategory" name="subCategory" class="form-select" disabled>
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rarity" class="form-label">Rarity:</label>
                                    <select id="rarity" name="rarity" class="form-select">
                                        <option value="">Select Rarity</option>
                                        <option value="Consumer Grade">Consumer Grade</option>
                                        <option value="Industrial Grade">Industrial Grade</option>
                                        <option value="Mil-Spec">Mil-Spec</option>
                                        <option value="Restricted">Restricted</option>
                                        <option value="Classified">Classified</option>
                                        <option value="Covert">Covert</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="float" class="form-label">Float:</label>
                                    <input type="number" step="0.01" min="0" max="1" id="float" name="float" class="form-control" placeholder="0.00" required />
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price (RM):</label>
                                    <input type="number" step="0.01" min="0"  id="price" name="price" class="form-control" placeholder="0.00" required />
                                </div>
                                <button type="submit" class="btn btn-primary" >Add Product</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-cards" id="productCards">
            <?php

include "../configDatabase.php";

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

        echo '<div class="card weaponDetails">';
        echo '<img src="data:image/jpeg;base64,' . $imageUrl  . '" class="card-img-top" alt="' . $name . '" />';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $name . '</h5>';
        echo '<p class="card-text">Weapon Type: <span>' . $mainCategory . ' | ' . $subCategory . '</span></p>';
        echo '<p class="card-text">Rarity: <span>' . $rarity . '</span></p>';
        echo '<p class="card-text">Float: <span>' . $floatValue . '</span></p>';
        echo '<div class="btnDelete">';
        echo '<button class="btn btn-danger removeProduct" data-productId=' . $id . '>Delete</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// Fetch products and render them
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $products = fetchProducts($conn);
    renderProducts($products);
}

// Close the database connection
$conn->close();

?>

            </div>
        </div>
    </main>
    <script>
        const subCategories = {
            knives: ["Butterfly Knife", "Karambit", "Bayonet", "Shadow Daggers"],
            pistols: ["Desert Eagle", "Five-Seven", "P250", "USP-S"],
            smgs: ["MAC-10", "MP9", "P90", "MP7"],
            assaultRifles: ["AK-47", "AUG", "M4A1-S", "M4A4"],
            sniperRifles: ["AWP", "G3SG1", "SCAR-20", "SSG 08"],
        };

        function updateSubCategories() {
            const mainCategory = document.getElementById('mainCategory').value;
            const subCategory = document.getElementById('subCategory');
            subCategory.innerHTML = '<option value="">Select Sub Category</option>';
            if (mainCategory) {
                subCategories[mainCategory].forEach(function(subCat) {
                    const option = document.createElement('option');
                    option.value = subCat;
                    option.textContent = subCat;
                    subCategory.appendChild(option);
                });
                subCategory.disabled = false;
            } else {
                subCategory.disabled = true;
            }
        }
            const removeProductBtn = document.querySelectorAll('.removeProduct');
            removeProductBtn.forEach(function(button) {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-productId');
                    
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'removeProduct.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                  
                    xhr.send('productId=' + encodeURIComponent(productId));
                    location.reload();
                });
            });
    </script>
</body>
</html>
