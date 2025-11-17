<?php
session_start();
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna berdasarkan email dan username
    $sql = "SELECT * FROM users WHERE email = ? AND username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameter untuk query
    mysqli_stmt_bind_param($stmt, "ss", $email, $username);
    
    // Eksekusi query
    mysqli_stmt_execute($stmt);
    
    // Ambil hasil query
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data pengguna dalam sesi
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['success'] = "Sukses";

            if ($_SESSION['role'] == 'admin') {
                header('Location: homeAdmin.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $_SESSION['error'] = "Username atau password salah!";
            header('location: fr_login.php');
        }
    } else {
        $_SESSION['error'] = "Username atau email tidak ditemukan!";
        header('location: fr_login.php');
    }

    // Menutup statement dan koneksi
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
