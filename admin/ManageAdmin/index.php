<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg" style="background-color: #756477; height: 80px;">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#" style="color:#e8d4d4;">Admin</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#" style="color: #372938;font-weight:600;">Manage Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e8d4d4;">Manage Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color:#e8d4d4;">Manage Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color:#e8d4d4;">Manage Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color:#e8d4d4;">Manage Customer</a>
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
        <div class="card" style="background-color:#EDA7A7;color:white;">
          <div class="card-body">
            <u><h5 class="card-title">Add Admin Form</h5></u>
            <form action="addAdminForm.php" method="post" class="row g-3">
              <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Admin name : </label>
                <input name="name" type="text" class="form-control" id="validationDefault01" required>
              </div>
              <div class="col-md-12">
                <label for="validationDefault02" class="form-label">Admin password : </label>
                <input name="pass" type="password" class="form-control" id="validationDefault02" required>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="listSection">
        <div class="card" style="background-color:#EDA7A7;color:white;">
          <div class="card-body">
            <u><h5 class="card-title">Admin List</h5></u>
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
                '</span><button class="removeAdmin btn btn-outline-danger" style="margin-right:100px;"data-adminId=' 
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
                  
                    xhr.send('adminId=' + encodeURIComponent(adminId));
                    location.reload();
                });
            });
    </script>
</body>
</html>