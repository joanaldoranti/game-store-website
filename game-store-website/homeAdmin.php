<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: fr_login.php');
    exit();
}

include 'condb.php';
include 'includes/header.php';
include 'includes/navbarAdmin.php';
?>

<main style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(11, 21, 33, 0.5), rgba(11, 21, 33, 1)),
            url(images/dark.varder.jpg); background-size: cover; height: 600px; background-position: top;">
    <div class="container text-center pt-5">
        <h1 class="display-1 text-light mt-5 pt-5"><strong>Game Store</strong></h1>
        <?php if (isset($_SESSION['username'])) : ?>
            <p class="text-light">Welcome <?php echo $_SESSION['username']; ?></p>
        <?php endif ?>
        <p class="text-light h4">Discover games you will love</p>
    </div>
</main>

<section style="background-image: linear-gradient(rgba(0, 0, 0,
        0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
        url(images/scifi-2.jpg); background-size: cover;
        background-position: top;">
    <div class="container pb-5 pt-5 table-responsive">
        <h1 class="text-light">Our Product</h1>
        <a href="fr_product.php" class="btn btn-primary mb-5 mt-5 rounded-pill fs-6">ADD+</a>
        <table class="table text-light" style="background-color:#091b29">
            <tr class="text-center h6">
                <th class="p-3">Name</th>
                <th class="p-3">Publisher</th>
                <th class="p-3">Genre</th>
                <th class="p-3">Description</th>
                <th class="p-3">Price</th>
                <th class="p-3">Image</th>
                <th class="p-3">Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM game, genre WHERE game.genre_id = genre.genre_id";
            $hand = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($hand)) {
            ?>
                <tr class="text-center">
                    <td class="p-3"><?= $row["game_name"] ?></td>
                    <td class="p-3"><?= $row["publisher"] ?></td>
                    <td class="p-3"><?= $row["genre_name"] ?></td>
                    <td class="p-3"><?= $row["description"] ?></td>
                    <td class="p-3">Rp.<?= $row["price"] ?> Rupiah</td>
                    <td class="p-3"><img src="images/<?= $row["image"] ?>" width="150px" height="100px"> </td>
                    <td class="p-3"><a href="edit_product.php?game_name=<?= $row["game_name"] ?>" class="btn btn-warning rounded-pill">EDIT</a></td>
                    <td class="p-3"><a href="delete_product.php?game_name=<?= $row["game_name"] ?>" class="btn btn-danger rounded-pill" onclick="Del(this.href);return:false;">DELETE</a></td>
                </tr>
            <?php
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
</section>



<?php include 'includes/footer.php'; ?>