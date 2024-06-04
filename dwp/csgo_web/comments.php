<?php include 'header.php'; ?>
<div>
    <div class="container mt-5">
        <h1 class="mb-4">Comments and Ratings</h1>
        <form method="post" action="" class="mb-4">
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment" id="comment" required></textarea>
            </div>
            <div class="form-group">
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
            <li class="list-group-item">
                <strong>User1</strong> rated it 
                <strong>5</strong> stars
                <p>Great product!</p>
            </li>
            <li class="list-group-item">
                <strong>User2</strong> rated it 
                <strong>4</strong> stars
                <p>Good value for money.</p>
            </li>
            <li class="list-group-item">
                <strong>User3</strong> rated it 
                <strong>3</strong> stars
                <p>It's okay.</p>
            </li>
            <li class="list-group-item">
                <strong>User4</strong> rated it 
                <strong>2</strong> stars
                <p>Not what I expected.</p>
            </li>
            <li class="list-group-item">
                <strong>User5</strong> rated it 
                <strong>1</strong> stars
                <p>Very disappointed.</p>
            </li>
        </ul>
    </div>
</div>
<?php include 'footer.php'; ?>


 

