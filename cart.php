<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
  header('Location: fr_login.php');
  exit();
}
include('condb.php');
$total = 0;
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main style="background-image: linear-gradient(rgba(11, 21, 33, 1), rgba(11, 21, 33, 0.8),rgba(11, 21, 33, 1)),
          url(images/scifi-1.jpg); background-size: cover;
          background-position: top; min-height: 700px">
  <div class="container text-light pb-5">
    <h1 class="text-light pt-5">Your Cart</h1>
    <table class="table text-light" style="background-color:#091b29">
      <tr class="text-center h6">
        <th class="p-3">Product</th>
        <th class="p-3">Price</th>
        <th class="p-3">Action</th>
      </tr>
      <?php
      $sql = "SELECT * FROM cart,game WHERE cart.game_name = game.game_name";
      $hand = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($hand)) {
      ?>
        <tr class="text-center">
          <td class="p-3"><?= $row["game_name"] ?></td>
          <td class="p-3"><?= $row["price"] ?> Rupiah</td>
          <td>
            <a href="delete_cart.php?cart_id=<?= $row["cart_id"] ?>" class="btn btn-danger rounded-pill">DELETE</a>
            <a href="bayar_game.php?game_id=<?= $row['game_id'] ?>&game_name=<?= $row['game_name'] ?>&price=<?= $row['price'] ?>" class="btn btn-success rounded-pill flex-grow-1 me-3">
              Beli
            </a>
          </td>
        </tr>
      <?php
      }
      $total = 0;
      foreach ($hand as $key => $value) {
        $price = $value['price'];
        $total += ($price);
      }
      mysqli_close($conn);
      ?>
      <h5 class="mt-5 text-primary mb-3">Total : <?php echo $total; ?>.00 Rupiah</h5>
    </table>
  </div>
</main>

<?php include 'includes/footer.php'; ?>