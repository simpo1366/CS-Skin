<?php include 'header.php'; ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .contact-us {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .contact-us h1 {
        font-size: 2.5rem;
    }
    .contact-us h2 {
        font-size: 1.75rem;
        margin-top: 1.5rem;
    }
    .contact-us .form-group {
        margin-bottom: 1.5rem;
    }
    .contact-us .btn {
        background-color: #007bff;
        border-color: #007bff;
    }
    .contact-us .btn:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
<div>
    <main class="container mt-5 mb-5">
        <section class="contact-us">
            <h1 class="mb-4">CONTACT US</h1>
            <h2>Get in touch with us</h2>
            <p>Have any questions or feedback? We'd love to hear from you!</p>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <h2 class="mt-4">Customer Service Hotline</h2>
            <p>If you need immediate assistance, please call our customer service hotline:</p>
            <p class="font-weight-bold">+06 123-4567</p>
        </section>
    </main>
</div>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>