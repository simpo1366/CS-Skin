<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <?php

    if(isset($_SESSION["username"]))
    {
        header("location:");
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

                    header("location:signup.php");
                    exit;
                }
            }
            
            $statement->close();

            $error = "Email or Password invalid";
        }
    }
    ?>

  <div class="container mt-5 mb-5">
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
                        <button type="submit" name="cancelbtn" class="btn btn-white text-primary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>