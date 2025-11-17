<?php
session_start();
include('condb.php');

if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = '$user_id'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Pengguna berhasil dihapus.";
        header('Location: listPengguna.php');
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menghapus pengguna.";
        header('Location: admin_users_list.php');
    }
}

mysqli_close($conn);
?>
