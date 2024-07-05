<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
      body{
    background-color: #F4F4FD;;
}
main{
    display: flex;
}
main .formSection{
    width: 40vw;
    height: 100vh;
}
main .listSection{
    width: 50vw;
    height: 100vh;
    margin: 30px 0px;
}
.navbar-brand{
    margin-right: 50px;
}
.formSection .card{
    margin:30px;
    background-color:#F4F4FD;
}

.card-body h5{
    margin-bottom: 15px;
}

    .btn-primary span:hover{
    display: inline-block;
    position: relative;
    transition: all 0.5s ;
    }
.btn-primary span:after {
    content: '+';
    position: relative;
    opacity: 0;
    top: 0;
    left: -20px;
    transition: 0.5s;
    }
  .btn-primary:hover span{
    padding-right: 20px;
    }
  .btn-primary:hover span:after {
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
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #4A4860; height: 80px;">
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
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <main>
    <div class="row row-cols-1 row-cols-md-5 g-3">

<?php
include "../../admin/configDatabase.php";


$user_id = $_SESSION['user_id'] ?? 1;
$sql = "SELECT o.order_id,o.order_date, o.total, o.status, u.username, p.Product_name, p.Product_img, p.Product_price
        FROM orders o
        JOIN user u ON o.user_id = u.id
        JOIN product_category p ON o.product_id = p.Product_id
        WHERE o.user_id = '$user_id'";
$result = $conn->query($sql);
?>
  <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imageUrl = base64_encode($row['Product_img']);
                $status = $row["status"] ?? "Pending";
                echo '<div class="col">
                      <div class="card mb-3">
                        <div class="card-body" style="background-color:gray;color:white;width: 260px;border-radius:10px;">
                            <h5 class="card-title">Customer Name: ' . $row["username"] . '</h5>
                            <p class="card-text">Product Name: ' . $row["Product_name"] . '</p>
                            <img src="data:image/jpeg;base64,' . $imageUrl . '" alt="' . $row["Product_name"] . '" style="width: 100%; height: auto; border-radius: 10px;">
                            <p class="card-text">Product Price: RM' . $row["Product_price"] . '</p>
                            <p class="card-text">Order Time: ' . $row["order_date"] . '</p>
                            <p class="card-text">Status: ' . $status . '</p>
                            <p class="card-text">
                                <button class="btn btn-primary" onclick="updateStatus(' . $row["order_id"] . ', \'Complete\')">Complete</button>
                                <button class="btn btn-danger" onclick="updateStatus(' . $row["order_id"] . ', \'Cancel\')">Cancel</button>
                            </p>
                        </div>
                      </div>
                      </div>';
                      }
        }else {
            echo '<p class="text-center">No orders found</p>';
        }
        $conn->close();
        ?>


</div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
            const removeButtons = document.querySelectorAll('.removeAdmin');
            removeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const adminId = this.getAttribute('data-adminId');
                    
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'removeAdmin.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    // xhr.onload = function() {
                    //     if (xhr.status === 200) {
                    //         alert(xhr.responseText); 
                    //     } else {
                    //         alert('Request failed. Returned status of ' + xhr.status);
                    //     }
                    // };
                    xhr.send('adminId=' + encodeURIComponent(adminId));
                    location.reload();
                });
            });
    function updateStatus(orderId, status) {
        $.ajax({
            url: 'updateStatus.php',
            type: 'post',
            data: { order_id: orderId, status: status },
            success: ()=> {location.reload()}
        });
    }
    </script>
</body>
</html>