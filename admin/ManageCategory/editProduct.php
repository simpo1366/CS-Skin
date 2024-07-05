<?php
include "../configDatabase.php";

// Initialize variables to hold product details
$productName = $mainCategory = $subCategory = $rarity = $float = $condition = $price = '';
// Check if productId is provided via GET
if (isset($_GET['productId'])) {
    
    $productId = $_GET['productId'];

    // Query to fetch product details
    $sql = "SELECT * FROM product_category WHERE Product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch product details
        $product = $result->fetch_assoc();
        $productName = $product['Product_name'];
        $mainCategory = $product['Product_main_category'];
        $subCategory = $product['Product_sub_category'];
        $rarity = $product['Product_rarity'];
        $float = $product['Product_float'];
        $condition = $product['Product_condition'];
        $price = $product['Product_price'];
    } else {
        echo "Product not found.";
        exit;
    }
}
else {
    // If productId is not provided, handle this case
    echo "Product ID not provided.";
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            font-family: arial;
            background-color:#F4F4FD;;
        }
        .card-header h4, .card-header u{
            font-weight: bold;
            color: darkorange;
        }

        .form-group label{
            font-weight: bold;
        }  
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <u><h4>Edit Product Form</h4></u>
            </div>
            <div class="card-body">
                
                <?php  if (!empty($productId)): ?>
                <form action="updateProduct.php" method="post">
                    <input type="hidden" name="productId" value="<?php echo htmlspecialchars($productId); ?>">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" class="form-control" id="productName" name="productName" value="<?php echo htmlspecialchars($productName); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mainCategory">Main Category:</label>
                        <select class="form-control" id="mainCategory" name="mainCategory" required onchange="updateSubCategories()">
                            <option value="knives" <?php echo $mainCategory == 'knives' ? 'selected' : ''; ?>>Knives</option>
                            <option value="pistols" <?php echo $mainCategory == 'pistols' ? 'selected' : ''; ?>>Pistols</option>
                            <option value="smgs" <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>SMGs</option>
                            <option value="assaultRifles" <?php echo $mainCategory == 'assaultRifles' ? 'selected' : ''; ?>>Assault Rifles</option>
                            <option value="sniperRifles" <?php echo $mainCategory == 'sniperRifles' ? 'selected' : ''; ?>>Sniper Rifles</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subCategory">Weapon Sub Category:</label>
                        <select id="subCategory" name="subCategory" class="form-control" required>
                            <option value="">Select Sub Category</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rarity">Rarity:</label>
                        <select id="rarity" name="rarity" class="form-control" required>
                            <option value="Consumer Grade"  <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>Consumer Grade</option>
                            <option value="Industrial Grade"  <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>Industrial Grade</option>
                            <option value="Mil-Spec"  <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>Mil-Spec</option>
                            <option value="Restricted"  <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>Restricted</option>
                            <option value="Classified"  <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>Classified</option>
                            <option value="Covert"  <?php echo $mainCategory == 'smgs' ? 'selected' : ''; ?>>Covert</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="float">Float:</label>
                        <input type="number" step="0.01" min="0" max="1" class="form-control" id="float" name="float" value="<?php echo htmlspecialchars($float); ?>" required oninput="updateCondition()">
                    </div>
                    <div class="form-group">
                        <label for="condition">Condition:</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="<?php echo htmlspecialchars($condition); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="price">Price (RM):</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
                <?php else: ?>
                <p>Please provide a valid Product ID.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Modal for Success Message -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Product updated successfully.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Check if URL contains success parameter, then show the modal
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            $('#successModal').modal('show');
        }

        // Call updateSubCategories function on page load to populate sub categories
        updateSubCategories();
    });

    const subCategories = {
        knives: ["Butterfly Knife", "Karambit", "Bayonet", "Shadow Daggers"],
        pistols: ["Desert Eagle", "Five-Seven", "P250", "USP-S"],
        smgs: ["MAC-10", "MP9", "P90", "MP7"],
        assaultRifles: ["AK-47", "AUG", "M4A1-S", "M4A4"],
        sniperRifles: ["AWP", "G3SG1", "SCAR-20", "SSG 08"],
    };

    function updateSubCategories() {
        const mainCategory = document.getElementById('mainCategory').value;
        const subCategoryDropdown = document.getElementById('subCategory');
        
        // Clear existing options
        subCategoryDropdown.innerHTML = '<option value="">Select Sub Category</option>';

        // Populate sub category options based on main category selection
        if (mainCategory && subCategories.hasOwnProperty(mainCategory)) {
            subCategories[mainCategory].forEach(function(subCat) {
                const option = document.createElement('option');
                option.value = subCat;
                option.textContent = subCat;
                if (subCat === '<?php echo $subCategory; ?>') {
                    option.selected = true;
                }
                subCategoryDropdown.appendChild(option);
            });
            subCategoryDropdown.disabled = false;
        } else {
            subCategoryDropdown.disabled = true;
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
    </script>
</body>
</html>
