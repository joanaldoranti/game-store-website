<?php
session_start();
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $role = 'user';

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Cek apakah email atau username sudah terdaftar
    $sql_check = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $result_check = mysqli_query($conn, $sql_check);
    
    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['error'] = "Email atau Username sudah terdaftar!";
        header("Location: signup.php");
        exit();
    }

    // Query untuk memasukkan data user dengan role
    $sql = "INSERT INTO users (email, username, password, role) VALUES ('$email', '$username', '$hashedPassword', '$role')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: fr_login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan, silakan coba lagi.";
        header("Location: signup.php");
        exit();
    }
}
include 'includes/header.php';
?>


<main style="background-image: linear-gradient(rgba(11, 21, 33, 1), rgba(11, 21, 33, 0.8), rgba(11, 21, 33, 1)),
    url(images/scifi-1.jpg); background-size: cover; background-position: top; height: 100vh;">
    <div class="container pt-5 text-light">
        <h1 class="text-center">Create an Account</h1>
        
        <?php
        // Menampilkan pesan error atau success jika ada
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success text-center">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <form action="signup.php" method="POST">
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
                <button type="submit" class="btn btn-primary rounded-pill me-2">Sign Up</button>
                <a class="btn btn-danger me-2 fs-6 rounded-pill" href="fr_login.php">Login</a>
            </div>
        </form>
    </div>
</main>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include 'includes/footer.php'; ?>
