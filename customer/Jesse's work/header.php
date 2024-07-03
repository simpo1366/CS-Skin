<?php 
session_start();

if (isset($_SERVER['REQUEST_URI'])) {
    $URI = $_SERVER['REQUEST_URI'];
} else {
    $URI = '';
}
include 'database.php';
$conn = getDBConnection(); 
if (isset($_SESSION['id'])) {
    $isLoggedIn = $_SESSION;
} else {
    $isLoggedIn = [];
}
// Note: Do not destroy the session here as it will log out the user
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <div class="bg-dark bg-gradient">
        <div class="container pb-3 pt-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="home.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="images/Header/csgo_icon.png" alt="" width="100px">
                </a>
                <ul id="header-options" class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-light">Catalog</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">Shopping Cart</a></li>
                    <li><a href="wishlist.php" class="nav-link px-2 link-light">Wishlist</a></li>
                </ul>
                <form id="search" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <div id="profile-dropdown" class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Orders</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../Login/logout.php">Sign out</a></li>
                    </ul>
                </div>
                <div id="login-signup" class="text-end" style="display: none;">
                    <a href="../Login/login.php" class="btn btn-primary me-2">LOG IN</a>
                    <a href="../Sign Up/signup.php" class="btn btn-secondary">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container" style="min-height: 700px;">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-OU3FKNskSwpNgy/gJCFaonJ4G5ubpO27Qpz9NTfRyy5YfBeGD2Qja/7ImUJjXt1p" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var isLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
                var URI = <?php echo json_encode($URI); ?>;
                console.log(isLoggedIn);
                if (URI.includes('login.php') || URI.includes('signup.php')) {
                    document.getElementById('header-options').style.display = 'none';
                    document.getElementById('search').style.display = 'none';
                }
                if (isLoggedIn.id) {
                    document.getElementById('profile-dropdown').style.display = 'block';
                    document.getElementById('login-signup').style.display = 'none';
                    console.log("1");
                } else {
                    document.getElementById('profile-dropdown').style.display = 'none';
                    document.getElementById('login-signup').style.display = 'block';
                    console.log("0");
                }
            });
        </script>
</body>
</html>
