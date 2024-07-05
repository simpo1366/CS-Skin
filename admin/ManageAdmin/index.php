<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
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
      <div class="formSection">
        <div class="card" style="background-color:white;">
          <div class="card-body">
            
            <u style="font-weight: bold; font-size: 23px; color:darkorange;"><h5 class="card-title" style="font-weight: bold; font-size: 23px; color:darkorange;">Add Admin Form</h5></u>
            <form action="addAdminForm.php" method="post" class="row g-3">
              <div class="col-md-12">
                <label for="validationDefault01" class="form-label" style="font-weight: bold; font-size: 16px; color: grey;"><i class="fa-solid fa-user-tie" style="margin: 0px 5px ;"></i>Admin name : </label>
                <input name="name" type="text" class="form-control" id="validationDefault01" required>
              </div>
              <div class="col-md-12">
                <label for="validationDefault02" class="form-label" style="font-weight: bold; font-size: 16px; color: grey;"><i class="fa-solid fa-lock" style="margin: 0px 5px;"></i>Admin password : </label>
                <input name="pass" type="password" class="form-control" id="validationDefault02" required>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit" style="width: 125px; margin-top: 5px;  transition: all 0.5s;"><span style="  display: inline-block;
  position: relative;
  transition: 0.5s;">Add</span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="listSection">
        <div class="card" style="background-color:white;">
          <div class="card-body">
            <u style="font-weight: bold; font-size: 23px; color:darkorange;"><h5 class="card-title" style="font-weight: bold; font-size: 23px; color:darkorange; ">Admin List</h5></u>
            <ul class="list-group">
              <?php
              include_once '../configDatabase.php';

              $sql = "SELECT * FROM admin";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $adminData = array();
                while($row = $result->fetch_assoc()) {
                    $adminData[] = $row; 
                }
              }
              foreach ($adminData as $admin) {
                echo '<li class="list-group-item" style="display: flex; justify-content: space-between;"<span>' 
                . $admin['admin_name'] . 
                '</span><button class="removeAdmin btn btn-outline-danger" style="margin-right:20px;"data-adminId=' 
                . $admin['admin_id'] . 
                '>Remove</button>' .'</li>';
              }
              ?>
            </ul>
          </div>
        </div>
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
    </script>
</body>
</html>