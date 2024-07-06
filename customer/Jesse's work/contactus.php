<?php 
include 'header.php'; 

if ($conn === null) {
    die("Database connection failed. Please check your connection settings.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO website_reviews (user_id, comment, rating) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param('isi', $user_id, $comment, $rating);

        if ($stmt->execute() === false) {
            die("Execute failed: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("User not logged in.");
    }
}

// Fetch the latest 10 comments and join with users table to get usernames
$sql = "SELECT wr.comment, wr.rating, u.username 
        FROM website_reviews wr
        JOIN user u ON wr.user_id = u.id
        ORDER BY wr.created_at DESC
        LIMIT 10";
$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>
<link rel="stylesheet" href="contactus.css">

<div>
    <div class="container mt-5 text-dark">
        <h1 class="mb-4">POST YOUR REVIEW OF OUR SITE!</h1>
        <form method="post" action="" class="mb-4">
            <div class="form-group mb-2">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment" id="comment" required></textarea>
            </div>
            <div class="form-group mb-2" id="">
                <label for="rating">Rating:</label>
                <select class="form-control" name="rating" id="rating" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <ul class="list-group">
            <?php while ($row = $result->fetch_assoc()): ?>
                <li class="list-group-item">
                    <strong><?php echo htmlspecialchars($row['username']); ?></strong> rated it 
                    <strong><?php echo htmlspecialchars($row['rating']); ?></strong> stars
                    <p><?php echo htmlspecialchars($row['comment']); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
<?php 
include 'footer.php'; 
$conn->close(); 
?>

