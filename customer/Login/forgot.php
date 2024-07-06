<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="forgot.css">
</head>
<body>

<?php

    $username_error = "";
    $email_error = "";
    $password_error = "";
    $confirm_password_error = "";
    $error_code = "";

    $error = false;

    include "dataconnection.php";
    $dbConnection = getDatabaseConnection();

    if (isset($_POST["forgotbtn"])) 
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        if(empty($username) || empty($email))
        {
            $error_code = "Username and Email are required!";
            $error = true;
        }

        $statement = $dbConnection->prepare("SELECT id FROM user WHERE username = ? AND email = ?");
        $statement->bind_param("ss", $username, $email);
        $statement->execute();
        $statement->store_result();

        if($statement->num_rows == 0)
        {
            $error_code = "Username or Email is invalid";
            $error = true;
        }
        $statement->close();

        if(strlen($password) < 8)
        {
            $password_error = "Password must have at least 8 character";
            $error = true;
        }

        if($confirm_password != $password)
        {
            $confirm_password_error = "Password does not match";
            $error = true;
        }
        
        if (!$error)
        {
            $statement = $dbConnection->prepare("UPDATE user SET password = ? WHERE username = ? AND email = ?");
            $statement->bind_param('sss', $password_hash, $username, $email);
            $statement->execute();
            $statement->close();

            header("location:../Login/login.php");
        }
    }
?>
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
    <div class="container mt-5 mb-5" style="min-height: 600px; align-content: center;">
        <div class="row">
            <div class="col-lg-6 mx-auto border shadow p-4 bg-white">
                <h2 class="text-center  mb-4">Forgot Password</h2>
                <hr />

                <?php if(!empty($error_code)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $error_code ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="allert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Change Password</label>
                        <input type="password" class="form-control" name="password">
                        <span class="text-danger"><?= $password_error ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Re-enter Password</label>
                        <input type="password" class="form-control" name="confirm_password">
                        <span class="text-danger"><?= $confirm_password_error ?></span>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="forgotbtn" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>
                <p class="text-center text-muted mt-5 mb-0">Don't have already an account? <a href="../Sign Up/signup.php"
                    class="fw-bold text-body"><u>Sign up here</u></a></p>
            </div>
        </div>
    </div>

    <?php include "../Jesse's work/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>