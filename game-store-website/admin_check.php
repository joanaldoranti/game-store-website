<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: fr_login.php');
    exit();
}

include('condb.php');
$query = "SELECT p.payment_id, u.username, g.game_name, p.total_price, p.payment_proof
          FROM payments p
          JOIN users u ON p.user_id = u.id
          JOIN game g ON p.game_id = g.game_id
          WHERE p.payment_status = 'Pending'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

include 'includes/header.php';
include 'includes/navbarAdmin.php';
?>
<main style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9), rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
        url(images/dark.varder.jpg); background-size: cover;
        background-position: top; height: 100%;">
    <div class="container pb-5 pt-5 table-responsive">
        <h1 class="text-light">Daftar Pembayaran yang Menunggu Konfirmasi</h1>
        <table class="table text-light" style="background-color:#091b29">
            <tr class="text-center h6">
                <th class="p-3">ID Pembayaran</th>
                <th class="p-3">Username</th>
                <th class="p-3">Game</th>
                <th class="p-3">Total Harga</th>
                <th class="p-3">Bukti Pembayaran</th>
                <th class="p-3">Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="text-center">
                    <td class="p-3"><?= $row['payment_id'] ?></td>
                    <td class="p-3"><?= $row['username'] ?></td>
                    <td class="p-3"><?= $row['game_name'] ?></td>
                    <td class="p-3"><?= number_format($row['total_price'], 2) ?> Rupiah</td>
                    <td class="p-3"><a href="<?= $row['payment_proof'] ?>" target="_blank" class="btn btn-info rounded-pill">Lihat Bukti</a></td>
                    <td class="p-3">
                        <a href="confirm_payment.php?id=<?= $row['payment_id'] ?>&status=Confirmed" class="btn btn-success rounded-pill">Konfirmasi</a>
                        <a href="confirm_payment.php?id=<?= $row['payment_id'] ?>&status=Rejected" class="btn btn-danger rounded-pill" onclick="Del(this.href);return false;">Tolak</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>
<script src="js/bootstrap.bundle.min.js"></script>
<?php include 'includes/footer.php'; ?>
