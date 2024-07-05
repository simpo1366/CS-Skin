<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
p{
  margin-bottom: 0;
}
.list-group{
    height: 70vh;
    width: 80vw;
    margin: 15px;
    margin-left: 10vw;
  }
  .list-item p{
    width: 30vw;
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
                <a class="nav-link" aria-current="page" href="#" >Manage Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Manage Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" >Manage Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" >Manage Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" >Manage Customer</a>
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
    <?php
include "./configDatabase.php";

$sql = "SELECT 
            p.Product_name, 
            SUM(o.quantity) AS total_quantity_sold, 
            SUM(o.quantity * p.Product_price) AS total_sales
        FROM 
            orders o
        JOIN 
            product_category p ON o.product_id = p.Product_id
        GROUP BY 
            p.Product_id";

$result = $conn->query($sql);

?>
 <div class="container mt-5">
        <h2>Sales Report</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Total Quantity Sold</th>
                    <th>Total Sales (RM)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row["Product_name"] . '</td>
                            <td>' . $row["total_quantity_sold"] . '</td>
                            <td>RM' . $row["total_sales"] . '</td>
                          </tr>';
                }
            } else {
                echo '<tr><td colspan="3">No sales data found</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
$sqlTotal = "SELECT 
                SUM(o.quantity) AS total_quantity_sold, 
                SUM(o.quantity * p.Product_price) AS total_sales
            FROM 
                orders o
            JOIN 
                product_category p ON o.product_id = p.Product_id";

$resultTotal = $conn->query($sqlTotal);
$total = $resultTotal->fetch_assoc();
?>

<div class="container mt-5">
    <h3>Total Sales</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Total Quantity Sold</th>
                <th>Total Sales (RM)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $total['total_quantity_sold']; ?></td>
                <td>RM<?php echo $total['total_sales']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>