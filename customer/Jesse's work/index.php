<?php include 'header.php'; ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-image: url('images/Homepage/CS2_image.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
    }
    .hero {
        background-image: url(''); /* Replace with your hero image */
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 100px 0;
        text-align: center;
    }
    .hero h1 {
        font-family: 'Stratum2-Black';
        font-size: 4rem;
        text-transform: uppercase;
        color: black;
        margin-bottom: 0.5rem;
    }
    .hero p {
        font-family: 'Stratum2-Black';
        font-size: 1.5rem;
        color: black;
    }
    .features {
        padding: 50px 0;
    }
    .features .icon {
        font-family: 'Stratum2-Black';
        font-size: 3rem;
        color: #007bff;
        margin-bottom: 1rem;
    }
    .features h3 {
        font-family: 'Stratum2-Black';
        font-size: 1.50rem;
        text-transform: uppercase;
    }
    .features p {
        font-family: 'Stratum2-Black';
        font-size: 1rem;
        text-transform: uppercase;
    }
    .cta {
        background-color: #007bff;
        color: #fff;
        padding: 50px 0;
        text-align: center;
        margin-bottom: 50px;
    }
    .cta h2 {
        font-family: 'Stratum2-Black';
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    .cta a {
        font-family: 'Stratum2-Black';
        font-size: 1.25rem;
        padding: 10px 20px;
    }
</style>
<div>
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1>Welcome to the official CS Skins Marketplace</h1>
                <p>Buy, sell, and trade Counter-Strike skins with ease</p>
                <a href="../Sign Up/signup.php" class="btn btn-primary btn-lg">Get Started</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features text-center">
            <div class="bg-dark bg-gradient container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon"><i class="fas fa-exchange-alt"></i></div>
                        <h3>Easy Trading</h3>
                        <p>Seamlessly trade skins with other users on our platform.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="icon"><i class="fas fa-shield-alt"></i></div>
                        <h3>Secure Transactions</h3>
                        <p>All transactions are protected with top-notch security measures.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="icon"><i class="fas fa-thumbs-up"></i></div>
                        <h3>Trusted Community</h3>
                        <p>Join a community of trustworthy and verified traders.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="cta">
            <div class="container">
                <h2>Ready to Start Trading?</h2>
                <p>Join our community today and take your skin trading to the next level.</p>
                <a href="../Sign Up/signup.php" class="btn btn-light btn-lg">Sign Up Now</a>
            </div>
        </section>
    </main>
</div>
<?php include 'footer.php'; ?>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>