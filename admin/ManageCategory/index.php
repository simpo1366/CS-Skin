<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    
    <style>
        body {
            background-color: #F4F4FD;
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

        #productForm .form-label{
            font-size: 18px;
            font-weight: 500;
        }
        .form-select{
            width: 100%;
            padding: 7px;
            border-radius: 3px;
            border: solid 1px lightgrey;
        }
        .form-select option{
            width: 100%;
        }
        .mb-3 .form-select option{
            color: black;
            background-color: white;
        }
        .mb-3 .form-select:hover{
            background-color: #fea64b;
        }
        /*css for add button*/
        .btn-primary{
            margin-top: 10px;
            width: 220px;
            height: 40px;
            padding:0px 40px;
        }
    .btn-primary span:hover{
    display: inline-block;
    position: relative;
    transition: 0.5s all;
    }
.btn-primary span:after {
    content: '+';
    position: relative;
    opacity: 0;
    top: 0;
    left: 20px;
    transition: 0.5s all;
    }
  .btn-primary:hover span{
    padding-right: 20px;
    }
  .btn-primary:hover span:after {
    opacity: 1;
    left: 0;
    }

     /*css for remove button*/
    .btn-danger{
        width: 220px;
        margin-top: 10px;
        height: 40px;
        padding:0px 20px;
    }
    .btn-danger span:hover{
    display: inline-block;
    position: relative;
    transition: 0.5s all;
    }
.btn-danger span:after {
    content: '-';
    position: relative;
    opacity: 0;
    top: 0;
    left: 20px;
    transition: 0.5s all;
    }
  .btn-danger:hover span{
    padding-right: 20px;
    }
  .btn-danger:hover span:after {
    opacity: 1;
    left: 0;
    }

  .nav-item .nav-link{
    color: #B0B0C0;
    text-decoration: none;
    padding: 10px 20px;
    position: relative;
    transition: color 0.3s;
}
.nav-item .nav-link:hover {
  color:#FFFFFF;
}
 
  .nav-item .nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -5px; /* Adjust this value to control the distance from the text */
    width: 100%;
    height: 2px; /* Adjust this value to control the thickness of the line */
    background-color: #FFFFFF; /* Color of the underline */
    transform: scaleX(0);
    transform-origin: bottom right;
    transition: transform 0.3s ease-out;
}
.nav-item .nav-link:hover::after {
    transform: scaleX(1);
    transform-origin: bottom left;
}

    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #4A4860; height: 80px">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#" style="color:white; font-weight:700;">ADMIN</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../AdminLanding" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../ManageAdmin" >Manage Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../ManageCustomer">Manage Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../ManageOrder">Manage Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../ManageCategory">Manage Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href="../salesReport.php" >Review Sales Report</a>
              </li>
            </ul>
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
                                <u style="color:darkorange;"><legend style="font-weight: 700; font-size:26px; color:darkorange;">Add Product Form</legend></u>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Weapon Picture:</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="productPic" required />
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
                                    <input type="number" step="0.01" min="0" max="1" id="float" name="float" class="form-control" placeholder="0.00" required oninput="updateCondition()"/>
                                </div>
                                <div class="mb-3">
                                    <label for="condition" class="form-label">Skin Condition:</label>
                                    <input type="text" id="condition" name="condition" class="form-control" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price (RM):</label>
                                    <input type="number" step="0.01" min="0"  id="price" name="price" class="form-control" placeholder="0.00" required />
                                </div>
                                <button type="submit" class="btn btn-primary" style="width: 225px; margin-top: 5px;  transition: all 0.5s;"><span style="  display: inline-block;
    position: relative;
  transition: 0.5s;">Add Product</span></button>
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
    $sql = "SELECT Product_id, Product_img, Product_name, Product_main_category, Product_sub_category, Product_rarity, Product_float, Product_condition, Product_price FROM product_category";
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
        $condition = htmlspecialchars($product['Product_condition']);

        echo '<div class="card weaponDetails">';
        echo '<img src="data:image/jpeg;base64,' . $imageUrl  . '" class="card-img-top" alt="' . $name . '" />';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $name . '</h5>';
        echo '<p class="card-text">Weapon Type: <span>' . $mainCategory . ' | ' . $subCategory . '</span></p>';
        echo '<p class="card-text">Rarity: <span>' . $rarity . '</span></p>';
        echo '<p class="card-text">Float: <span>' . $floatValue . '</span></p>';
        echo '<p class="card-text">Skin Condition: <span>' . $condition . '</span></p>';
        echo '<div class="btnEdit">';
        echo '<button class="btn btn-warning editProduct" style="width: 140px; margin-top: 5px; transition: all 0.5s;" data-productId=' . $id . '><span style="display: inline-block; position: relative; transition: 0.5s;">Edit</span></button>';
        echo '</div>';
        echo '<div class="btnDelete">';
        echo '<button class="btn btn-danger removeProduct" style="width: 140px; margin-top: 5px;  transition: all 0.5s;" data-productId=' . $id . '><span style="  display: inline-block;
  position: relative;
  transition: 0.5s;">Delete </span></button>';
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

        function updateCondition() {
    const floatValue = parseFloat(document.getElementById('float').value);
    let condition = "";

    if (floatValue >= 0 && floatValue < 0.07) {
        condition = "Factory New";
    } else if (floatValue >= 0.01 && floatValue < 0.15) {
        condition = "Minimal Wear";
    } else if (floatValue >= 0.15 && floatValue < 0.38) {
        condition = "Field-Tested";
    } else if (floatValue >= 0.38 && floatValue < 0.45) {
        condition = "Well-Worn";
    } else if (floatValue >= 0.45 && floatValue <= 1) {
        condition = "Battle-Scarred";
    } else {
        condition = "Invalid Float Value";
    }

    document.getElementById('condition').value = condition;
}

const editProductBtn = document.querySelectorAll('.editProduct');
editProductBtn.forEach(function(button) {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-productId');
        window.location.href = 'editProduct.php?productId=' + encodeURIComponent(productId);
    });
});

            const removeProductBtn = document.querySelectorAll('.removeProduct');
    removeProductBtn.forEach(function(button) {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-productId');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this product!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'removeProduct.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.send('productId=' + encodeURIComponent(productId));

                location.reload();
            }
        });
    });
});
    </script>
</body>
</html>
