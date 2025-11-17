<?php
session_start();
include 'condb.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main style="background-image: linear-gradient(rgba(11, 21, 33, 1), rgba(11, 21, 33, 0.8),rgba(11, 21, 33, 1)),
        url(images/scifi-1.jpg); background-size: cover; background-position: top; height: 100vh;">
    <div class="container pt-5 text-light">
        <h1>Login</h1>
        <form action="login_db.php" method="post">
            <div class="col-md-6 mt-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" required>
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary rounded-pill me-2">Submit</button>
                <a class="btn btn-danger me-2 fs-6 rounded-pill" href="signup.php">Sign Up</a>
            </div>
        </form>
    </div>
</main>
<script src="bootstrap/js/bootstrap.min.js"></script>


<?php include 'includes/footer.php'; ?>
