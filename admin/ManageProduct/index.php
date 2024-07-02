<?php
  include 'configDatabase.php';
?>
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
        body{
          background-color: lightyellow;
          margin: 0;

        }
        .card {
            margin-bottom: 20px;
        }
        .container-main {
            display: flex;
            position: relative;
            right:175px;
        }

        #productForm{
          padding: 30px;
        }

        .container-form {
            width: 40vh; /* Adjust*/
            margin-right: 20px;
        }

        .container-cards {
            width: 60vw; /* Adjust*/
            height: 300px;/*Adjust*/
            padding: 30px;
        }   
        .weaponDetails {
            width: 20vw;
            background-color: white;
            display:flex;
            justify-content: center;
            align-items: center;
            text-align: left;
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
                        <form id="productForm">
                            <fieldset>
                                <legend>Add Product Form</legend>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Weapon Picture:</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple />
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
                                        <option value="Contraband">Contraband</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="float" class="form-label">Float:</label>
                                    <input type="number" step="0.0001" min="0" max="1" id="float" name="float" class="form-control" placeholder="0.0000" required />
                                </div>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-cards">
                <div id="productCards" class="row row-cols-1 row-cols-md-3 g-0.5 mt-4"></div>
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

        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const productName = document.getElementById('productName').value;
            const mainCategory = document.getElementById('mainCategory').value;
            const subCategory = document.getElementById('subCategory').value;
            const rarity = document.getElementById('rarity').value;
            const floatValue = document.getElementById('float').value;
            const productImage = document.getElementById('formFileMultiple').files[0];

            if (productImage) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageUrl = e.target.result;
                    addProductCard(productName, mainCategory, subCategory, rarity, floatValue, imageUrl);
                };
                reader.readAsDataURL(productImage);
            } else {
                addProductCard(productName, mainCategory, subCategory, rarity, floatValue, '');
            }

            // Reset form
            document.getElementById('productForm').reset();
            document.getElementById('subCategory').innerHTML = '<option value="">Select Sub Category</option>';
            document.getElementById('subCategory').disabled = true;
        });

        function addProductCard(name, mainCategory, subCategory, rarity, floatValue, imageUrl) {
            const productCards = document.getElementById('productCards');

            const card = document.createElement('div');
            card.className = 'col';
            card.innerHTML = `
                <div class="card weaponDetails">
                    <img src="${imageUrl || 'default-image-url.jpg'}" class="card-img-top" alt="${name}" style="width: 200px; height: 200px; object-fit: cover; margin: 0px 20px;" />
                    <div class="card-body">
                        <h5 class="card-title">${name}</h5>
                        <p class="card-text">Weapon Type: <span>${mainCategory} | ${subCategory}</span></p>
                        <p class="card-text">Rarity: <span>${rarity}</span></p>
                        <p class="card-text">Float: <span>${floatValue}</span></p>
                        <div class="btnDelete">
                            <button class="btn btn-danger" onclick="deleteCard(this)">Delete</button>
                        </div>
                    </div>
                </div>
            `;

            productCards.appendChild(card);
        }

        function deleteCard(button) {
            button.closest('.col').remove();
        }
    </script>
</body>
</html>
