<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../Jesse's work/header.css">
    
</head>
<body>
    <div class="bg-dark bg-gradient">
        <div class="container pb-3 pt-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="../Jesse's work/home.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="../Jesse's work/images/Header/csgo_icon.png" alt="" width="100px">
                </a>
                
                <div id="login-signup" class="text-end" style="display: none;">
                    <a href="../Login/login.php" class="btn btn-primary me-2">LOG IN</a>
                    <a href="../Sign Up/signup.php" class="btn btn-secondary">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        header("location:../Jesse's work/home.php");
        exit;
    }

    $error = "";

    if(isset($_POST["loginbtn"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($username) || empty($password))
        {
            $error = "Username and Password are required!";
        }
        else
        {
            include "dataconnection.php";
            $dbConnection = getDatabaseConnection();

            $statement = $dbConnection->prepare("SELECT id, email, password FROM user where username = ?");

            $statement->bind_param('s', $username);

            $statement->execute();

            $statement->bind_result($id, $email, $stored_password);

            if($statement->fetch())
            {
                if(password_verify($password, $stored_password))
                {
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;

                    header("location:../Jesse's work/home.php");
                    exit;
                }
            }
            
            $statement->close();

            $error = "Email or Password invalid";
        }
    }
    ?>

  <div class="container mt-5 mb-5" style="min-height: 600px; align-content: center;">
        <div class="row">
            <div class="col-lg-6 mx-auto border shadow p-4 bg-white">
                <h2 class="text-center  mb-4">Login</h2>
                <hr />

                <?php if(!empty($error)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $error ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="allert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p class="text-center text-muted mt-5 mb-0">Don't have already an account? <a href="../Sign Up/signup.php"
                    class="fw-bold text-body"><u>Sign up here</u></a></p>
            </div>
        </div>
    </div>
    <footer>
<div class="border-top bg-warning ">
<div class="container">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-1 mt-5">
    <div class="col mb-4">
      <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
        <img src="../Jesse's work/images/Header/csgo_icon.png" alt="" width="100px">
      </a>
      <p class="text-dark">© 2024</p>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
      <h5 class="text-dark">CUSTOMER SERVICE</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="contactus.php" class="nav-link p-0 text-dark">Help | Contact us</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5 class="text-dark">INFORMATION</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="aboutus.php" class="nav-link p-0 text-dark">About us</a></li>

      </ul>
    </div>

    <div class="col mb-3">
      <h5 class="text-dark">FOLLOW US</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="https://www.facebook.com/CSGOworld.online/" class="nav-link p-0 text-dark">Facebook</a></li>
        <li class="nav-item mb-2"><a href="https://www.instagram.com/csgoskins_official/?hl=en" class="nav-link p-0 text-dark">Instagram</a></li>
        <li class="nav-item mb-2"><a href="https://twitter.com/csgoskins_gg?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="nav-link p-0 text-dark">Twitter</a></li>

      </ul>
    </div>
  </div>
</div>
</div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
