<?php
session_start();
include('condb.php');

if (!isset($_SESSION['username'])) {
    header("Location: fr_login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $payment_id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == 'Confirmed' || $status == 'Rejected') {
        $query = "UPDATE payments SET payment_status = '$status' WHERE payment_id = '$payment_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Pembayaran berhasil diperbarui!'); window.location='admin_check.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui status pembayaran.'); window.location='admin_check.php';</script>";
        }
    } else {
        echo "<script>alert('Status tidak valid!'); window.location='admin_check.php';</script>";
    }
} else {
    echo "<script>alert('ID atau status pembayaran tidak ditemukan!'); window.location='admin_check.php';</script>";
}

mysqli_close($conn);
?>
