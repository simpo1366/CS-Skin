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
            background-color: rgba(0, 0, 0, 0.8);
            font-family: 'Arial', sans-serif;
        }
        .modal-header{
            background-color: #443d4a;
            color:white;
            width: 800px;
            /* top:200px; */
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
            background-color: #443d4a;
            padding: 15px 30px 30px 30px;
            border-radius: 0 0 3% 3%;
            text-align: left;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        .modal-box-header{
            background-image: url("https://screenshots.cs.money/csmoney2/c55bba56d68963236d2045e2e3a1cf2f_large_preview.png");
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
            font-size: 15px
        }
        .modal-box-body h3 {
            font-weight: bold;
            color: azure;
            font-size: 20px;
        }
        .modal-box-body p strong{
            color: #8f6fd0;
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
            width: 0;
            background-color: #4caf50;
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
        .float-pointer {
            transform: translateX(-50%);
            width: 5px;
            height: 5px;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #ecedec;
            z-index: 1;
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
                echo '<p><strong>Float Value:</strong> <span>' . htmlspecialchars($row['Product_float']) . '</span></p>';
                echo '<p><strong>Rarity:</strong> <span>' . htmlspecialchars($row['Product_rarity']) . '</span></p>';
                echo '<div class="float-container">';
                echo '<div class="float-bar" id="float-bar" style="background-color: ' . $color . ';width:300px;"></div>';
                echo '<div class="float-label" id="float-label" data-float="'. $row['Product_float'] .' "> ' . htmlspecialchars($row['Product_float']) . '</div>';
                echo '<div class="float-pointer" id="float-pointer"></div>';
                echo '</div>';
                echo '<p><strong>Price:</strong> <span>RM ' . htmlspecialchars($row['Product_price']) . '</span></p>';
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