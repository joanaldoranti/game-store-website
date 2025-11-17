<?php
session_start();
include('condb.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: fr_login.php");
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['error'] = "Pengguna tidak ditemukan!";
        header('Location: listPengguna.php');
        exit();
    }

    $user = mysqli_fetch_assoc($result);
} else {
    $_SESSION['error'] = "ID pengguna tidak ditemukan!";
    header('Location: listPengguna.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $update_query = "UPDATE users SET email = '$email', username = '$username', role = '$role' WHERE id = '$user_id'";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['success'] = "Data pengguna berhasil diubah!";
        header('Location: listPengguna.php');
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat mengubah data pengguna.";
    }
}

include 'includes/header.php';
include 'includes/navbarAdmin.php';
?>
<main style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9), rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
    url(images/scifi-2.jpg); background-size: cover; background-position: top; height: 100vh;">
    <div class="container pb-5 pt-5">
        <h2 class="text-light text-center">Edit Pengguna</h2>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success text-center">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>
        <form action="edit_user.php?id=<?= $user['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label text-light">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label text-light">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label text-light">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="user" <?= ($user['role'] == 'user') ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="listPengguna.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</main>

<script src="js/bootstrap.bundle.min.js"></script>

<?php include 'includes/footer.php'; ?>
