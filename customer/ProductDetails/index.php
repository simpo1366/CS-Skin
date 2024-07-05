<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS:GO Skin Modal</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }
        .modal-header{
            background-color: #605A53;
            color:white;
            width: 800px;
            margin-left: -30%;
        }
        .modal-box {
            width: 800px;
            height: 400px;
            display: flex;
            position: absolute;
            top:200px;
            left: 50%;
            align-items: center;
            transform: translate(-50%, -50%);
            background-color: #605A53;
            padding: 15px 30px 30px 30px;
            border-radius: 0 0 3% 3%;
            text-align: left;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        .modal-box-header{
            width: 400px;
        }
        .modal-box-header img {
            width: 70%;
            height: 65%;
            margin-right: 30px;
            border-bottom: 1px solid #ddd;
        }
        .modal-box-body {
            width: 300px;
            padding: 10px 0;
            font-size: 17px;
        }
        .modal-box-body h3 {
            font-weight: bold;
            color: orange;
            font-size: 20px;
        }
        .modal-box-body p{
            margin-bottom: 5px;
        }
        .modal-box-body p strong{
            color: white;
        }
        .modal-box-body p span{
            color: white;
        }
        .float-container {
            width: auto;
            background-color: #ddd;
            border-radius: 5px;
            overflow: hidden;
            height: 20px;
            margin: 10px 0;
            position: relative;
        }
        .float-bar {
            height: 100%;
            width: 100%;
            transition: width 0.3s ease;
        }
        .float-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000;
            z-index: 2;
        }
        .modal-box-body .addToCartBttn{
            background-color: #8f6fd0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
            width: 100%; /* Adjust the width to match the image */
            padding: 8px 0;
            font-size: 16px; 
            font-weight: bold; 
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #7b8186;
        }
    </style>
</head>
<body>
    <div class="modal-box">
    <?php
        include "../../admin/configDatabase.php";
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM product_category WHERE Product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['Product_float'] >= 0.45) {
                $color = 'red';
            }
            elseif ($row['Product_float'] >= 0.38) {
                $color = 'orange';
            }
            elseif ($row['Product_float'] >= 0.15) {
                $color = 'yellow';
            }
            elseif ($row['Product_float'] >= 0.07) {
                $color = 'lightgreen';
            } else {
                $color = '#ADD8E6';
            }
            echo '<div class="modal-box-header">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Product_img']) . '" alt="' . htmlspecialchars($row['Product_name']) .'">';
            echo '</div>';
            echo '<div class="modal-box-body">';           
            echo '<h3>' . htmlspecialchars($row['Product_name']) . '</h3>';
            echo '<p><strong>Main Category:</strong> <span>' . htmlspecialchars($row['Product_main_category']) . '</span></p>';
            echo '<p><strong>Sub Category:</strong> <span>' . htmlspecialchars($row['Product_sub_category']) . '</span></p>';
            echo '<p><strong>Float Value:</strong> <span>' . htmlspecialchars($row['Product_float']) . ' | '.htmlspecialchars($row['Product_condition']) . '</span></p>';
            echo '<p><strong>Rarity:</strong> <span>' . htmlspecialchars($row['Product_rarity']) . '</span></p>';
            echo '<div class="float-container">';
            echo '<div class="float-bar" id="float-bar" style="background-color: ' . $color . ';"></div>';
            echo '<div class="float-label" id="float-label" data-float="'. htmlspecialchars($row['Product_float']) .'"> ' . htmlspecialchars($row['Product_float']) . '</div>';
            echo '</div>';
            echo '<p><strong>Price:</strong> <span>RM ' . htmlspecialchars($row['Product_price']) . '</span></p>';
            echo '<button class="addToCartBttn" onclick="addToCart('. $id .')">Add to cart</button>';
            echo '</div>';
        } else {
            echo '<p>No product found.</p>';
        }

        $stmt->close();
        $conn->close();
    ?>
    </div>
</body>
</html>
