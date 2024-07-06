<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="adminlogin.css">
    <link rel="stylesheet" href="../Jesse's work/header.css">
    
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
            </div>
        </div>
    </nav>

    <?php

    $error = "";

    if(isset($_POST["loginbtn"]))
    {
        $admin_name = $_POST["admin_name"];
        $password = $_POST["password"];

        if(empty($admin_name) || empty($password))
        {
            $error = "Admin Name and Password are required!";
        }
        else
        {
            include "dataconnection.php";
            $dbConnection = getDatabaseConnection();

            $statement = $dbConnection->prepare("SELECT admin_id, admin_name, admin_pass FROM admin where admin_name = ?");

            $statement->bind_param('s', $admin_name);

            $statement->execute();

            $statement->bind_result($id, $name, $stored_password,);

            if($statement->fetch())
            {
                if(($password == $stored_password))
                {   
                    header("location:../AdminLanding/index.php");
                    exit;
                }
            }
            
            $statement->close();

            $error = "Name or Password invalid";
        }
    }
    ?>

  <div class="container mt-5 mb-5" style="min-height: 600px; align-content: center;">
        <div class="row">
            <div class="col-lg-6 mx-auto border shadow p-4 bg-white rounded">
                <h2 class="text-center mb-4">Admin Login</h2>
                <hr />

                <?php if(!empty($error)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $error ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="allert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="admin_name" class="form-label">Admin Name</label>
                        <input type="text" class="form-control" name="admin_name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
  </div>

  <section class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Welcome to Our Website</span></h2>
                                <p class="lead fw-light mb-4"></p>
                                <p class="text-muted">To Empower gamers with the best CSGO skins – quality, variety, and service at its best.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
