<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: fr_login.php');
    exit();
}
include('condb.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: fr_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$limit = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$query = "SELECT p.payment_id, g.game_name, p.total_price, p.payment_status, p.payment_date
          FROM payments p
          JOIN game g ON p.game_id = g.game_id
          WHERE p.user_id = '$user_id'
          ORDER BY p.payment_date DESC
          LIMIT $limit OFFSET $offset";

$result = mysqli_query($conn, $query);

$total_query = "SELECT COUNT(*) as total FROM payments p WHERE p.user_id = '$user_id'";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_notifications = $total_row['total'];

mysqli_close($conn);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section style="background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
        url(images/scifi-2.jpg); background-size: cover;
        background-position: top;">
    <div class="container">
        <br>
        <h2 class="text-light">Notifikasi</h2>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($payment = mysqli_fetch_assoc($result)): ?>
                <div class="card mb-3" style="background-color:#091b29; color:white;">
                    <div class="card-header">
                        <h5 class="card-title"><?= $payment['game_name'] ?></h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Total Harga:</strong> <?= $payment['total_price'] ?> Rupiah</p>
                        
                        <p><strong>Status Pembayaran:</strong>
                        <?php
                            if ($payment['payment_status'] == 'Pending') {
                                echo '<span class="text-warning">Menunggu Konfirmasi</span>';
                            } elseif ($payment['payment_status'] == 'Confirmed') {
                                echo '<span class="text-success">Terkonfirmasi</span>';
                            } elseif ($payment['payment_status'] == 'Rejected') {
                                echo '<span class="text-danger">Ditolak</span>';
                            } else {
                                echo '<span class="text-muted">Belum Diketahui</span>';
                            }
                        ?>
                        </p>
                        <p><strong>Tanggal Pembayaran:</strong> <?= $payment['payment_date'] ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-warning text-light" style="background-color:#091b29;">
                <p>Belum ada pembayaran yang diajukan.</p>
            </div>
        <?php endif; ?>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&laquo;</span>
                    </li>
                <?php endif; ?>
                <?php if ($page * $limit < $total_notifications): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">&raquo;</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

    </div>
    <?php include 'includes/footer.php'; ?>
</section>
