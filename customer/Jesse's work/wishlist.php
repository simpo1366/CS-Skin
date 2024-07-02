<?php include 'header.php'; ?>
<style>
        @font-face {
            font-family: 'Stratum2-Black';
            src: url(fonts/Stratum2-Black.otf);
            font-weight: normal;
            font-style: normal;
        }
        body {
            background-image: url('images/Homepage/CS2_image.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }
        .custom-font {
            font-family: 'Stratum2-Black', sans-serif;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .card {
            background-color: orange;
        }
    </style>
</head>
    <div class="container mt-5">
        <h1 class="text-center custom-font text-dark">Wishlist</h1>
        <div class="row">
            <!-- Wishlist Items -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/Homepage/m4a1_howl.png" class="card-img-top" alt="Item 1">
                    <div class="card-body">
                        <h5 class="card-title">M4A4 | Howl</h5>
                        <p class="card-text">One of the most sought-after M4A4 skins.</p>
                        <a href="#" class="btn btn-primary">Remove from Wishlist</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/Homepage/p90_asiimov.png" class="card-img-top" alt="Item 2">
                    <div class="card-body">
                        <h5 class="card-title">P90 | Asiimov</h5>
                        <p class="card-text">Popular futuristic design for P90.</p>
                        <a href="#" class="btn btn-primary">Remove from Wishlist</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/Homepage/stattrak_karambit.png" class="card-img-top" alt="Item 3">
                    <div class="card-body">
                        <h5 class="card-title">StatTrak™ Karambit | Case Hardened</h5>
                        <p class="card-text">One of the most expensive knife skins.</p>
                        <a href="#" class="btn btn-primary">Remove from Wishlist</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
