<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        @font-face {
            font-family: 'Stratum2-Black';
            src: url(fonts/Stratum2-Black.otf);
            font-weight: normal;
            font-style: normal;
        }
        .bg-dark.bg-gradient .nav {
            font-family: 'Stratum2-Black';
            font-weight: 700;
            letter-spacing: 2px;
            opacity: .8;
            margin: 0px 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 3px 0px;
            text-transform: uppercase;
            border-top: 3px solid transparent;
            border-bottom: 3px solid transparent;
            text-shadow: 1px 1px 2px #000;
        }

        .dropdown.text-end .dropdown-item {
            font-family: 'Stratum2-Black';
            font-weight: 700;
            letter-spacing: 2px;
            opacity: .8;
            display: flex;
            flex-direction: row;
            align-items: center;
            border-top: 3px solid transparent;
            border-bottom: 3px solid transparent;
            text-shadow: 1px 1px 2px #000;
        }

        .col.mb-3 .text-dark {
            font-family: 'Stratum2-Black';
            align-items: center;
            flex-direction: row;
        }

        .col.mb-3 .nav {
            font-family: 'Stratum2-Black';
            flex-direction: row;
            text-transform: uppercase;
        }
    </style>
    
    <?php include 'database.php'; ?>
</head>
<body>
    <div class="bg-dark bg-gradient">
        <div class="container pb-3 pt-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="images/Header/csgo_icon.png" alt="" width="100px">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-light">Catalog</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">Shopping Cart</a></li>
                    <li><a href="#" class="nav-link px-2 link-light">Wishlist</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Orders</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container" style="min-height: 700px;">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-OU3FKNskSwpNgy/gJCFaonJ4G5ubpO27Qpz9NTfRyy5YfBeGD2Qja/7ImUJjXt1p" crossorigin="anonymous"></script>