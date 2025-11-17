<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: fr_login.php');
    exit();
  }
include 'condb.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: fr_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $game_id = $_GET['game_id'];
    $total_price = $_GET['price'];
    $payment_status = 'Pending';


    $upload_dir = 'uploads/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (isset($_FILES['payment_proof']) && $_FILES['payment_proof']['error'] == 0) {
        $payment_proof = $upload_dir . basename($_FILES['payment_proof']['name']);

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($payment_proof, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "File yang diunggah tidak diperbolehkan. Hanya file gambar yang diizinkan.";
            exit();
        }

        if ($_FILES['payment_proof']['size'] > 2 * 1024 * 1024) {
            echo "Ukuran file terlalu besar. Maksimal 2MB.";
            exit();
        }

        if (!move_uploaded_file($_FILES['payment_proof']['tmp_name'], $payment_proof)) {
            echo "Gagal mengunggah bukti pembayaran.";
            exit();
        }
    } else {
        $payment_proof = null;
    }

    $query = "INSERT INTO payments (user_id, game_id, total_price, payment_proof, payment_status)
              VALUES ('$user_id', '$game_id', '$total_price', '$payment_proof', '$payment_status')";

    if (mysqli_query($conn, $query)) {
        echo "Anda akan melakukan pembayaran";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

$selected_method = $_POST['payment_method'] ?? null;

if (!isset($_GET['game_id'])) {
    echo "Game ID tidak ditemukan.";
    exit();
}

$game_id = $_GET['game_id'];

$query_game = "SELECT * FROM game WHERE game_id = '$game_id'";
$result_game = mysqli_query($conn, $query_game);

if (mysqli_num_rows($result_game) > 0) {
    $game = mysqli_fetch_assoc($result_game);
} else {
    echo "Game tidak ditemukan.";
    exit();
}



include 'includes/header.php';
include 'includes/navbar.php';
?>


<section style="background-image: linear-gradient(rgba(11, 21, 33, 1),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
    url(images/scifi-2.jpg); background-size: cover; background-position: top;">
    <div class="container text-light py-5">
        <h1 class="text-center mb-5">Anda akan Membeli</h1>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php if (!$selected_method): ?>
                <div class="card" style="background-color: #091b29;">
                    <img src="images/<?php echo $game['image']; ?>" class="card-img-top" style="object-fit: cover; height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $game['game_name']; ?></h5>
                        <p class="card-text"><?php echo $game['description']; ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item h5 text-primary" style="background-color: #091b29;">Rp.<?php echo $game['price']; ?> Rupiah</li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if (!$selected_method): ?>
                    <form method="POST" enctype="multipart/form-data" class="p-4 rounded" style="background-color:#091b29;">
                        <input type="hidden" name="game_id" value="<?= htmlspecialchars($game_id) ?>">
                        <input type="hidden" name="price" value="<?= htmlspecialchars($price) ?>">

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Metode Pembayaran</label>
                            <select class="form-select" id="payment_method" name="payment_method" required>
                                <option value="bank_transfer" <?= $selected_method === 'bank_transfer' ? 'selected' : '' ?>>
                                    Transfer Bank
                                </option>
                                <option value="ewallet" <?= $selected_method === 'ewallet' ? 'selected' : '' ?>>
                                    E-Wallet (Gopay, OVO, Dana)
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_proof" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="payment_proof" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill">Kirim Pembayaran</button>
                            <a href="store.php" class="btn btn-danger rounded-pill">Batal</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($selected_method): ?>
            <div class="mt-5">
                <?php
                switch ($selected_method) {
                    case 'bank_transfer':
                        include 'includes/payment_bank_transfer.php';
                        break;
                    case 'ewallet':
                        include 'includes/payment_ewallet.php';
                        break;
                    default:
                        echo '<div class="alert alert-danger">Metode pembayaran tidak valid.</div>';
                        break;
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php include 'includes/footer.php'; ?>
