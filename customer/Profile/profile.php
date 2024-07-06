<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php include "../Jesse's work/header.php" ?>

<?php
$new_password_error = "";
$confirm_password_error = "";

$error_code = "";
$error = false;

if (isset($_POST["change_passwordbtn"])) 
{
    include "dataconnection.php";
    $dbConnection = getDatabaseConnection();

    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    if (strlen($new_password) < 8) 
    {
        $error_code = "Password must have at least 8 characters";
        $error = true;
    }

    if ($confirm_password != $new_password) {
        $error_code = "Password does not match";
        $error = true;
    }

    if (!$error)
    {
        $statement = $dbConnection->prepare("UPDATE user SET password = ? WHERE username = ?");
        $statement->bind_param('ss', $password_hash, $_SESSION["username"]);
        $statement->execute();
        $statement->close();
    }
    else
    {
        $password_error = "Password does not match";
        $error = true;
    }
}
?>


    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
           Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <hr class="border-light m-0">
                            <h2 class="text-center">Account Type: <?= $_SESSION["role"]?></h2>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-4">Username:</div>
                                    <p><div class="border p-2"><?= $_SESSION["username"]?></div><p>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">Email:</div>
                                    <p><div class="border p-2"><?= $_SESSION["email"]?></div><p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">

                                <?php if(!empty($error_code)) { ?>
                                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?= $error_code ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="allert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>

                                <form method="POST">
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New_Password*</label>
                                    <input type="password" class="form-control" name="new_password">
                                    <span class="text-danger"><?= $new_password_error ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Re-enter New Password*</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                    <span class="text-danger"><?= $confirm_password_error ?></span>
                                    <div class="text-end mt-5">
                                        <button type="submit" name="change_passwordbtn" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
                                </form>    
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when the a new skin offer</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone want to trade skin with me</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../Jesse's work/footer.php"?>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>