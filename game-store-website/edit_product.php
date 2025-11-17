<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: fr_login.php");
    exit();
}
include 'condb.php';
$game_name = $_GET['game_name'];
$sql = "SELECT * FROM game,genre WHERE game_name = '$game_name' AND game.genre_id =genre.genre_id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

include 'includes/header.php';
include 'includes/navbarAdmin.php'
?>

<main style="background-image: linear-gradient(rgba(0, 0, 0,
        0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
        url(images/scifi-3.jpg); background-size: cover; height: 1000px;
        background-position: top;">
    <div class="container pt-5">
        <h1 class="text-light">Edit Product</h1>
        <div class="row mt-3">
            <div class="col-sm-5">
                <form action="update_product.php" method="post" class="text-light" name="game-form" enctype="multipart/form-data">
                    <label class="fs-5">Name</label>
                    <input type="text" name="game_name" class="form-control mt-2 mb-3" value="<?= $row['game_name'] ?>">
                    <label class="fs-5">Publisher</label>
                    <input type="text" name="publisher" class="form-control mt-2 mb-3" value="<?= $row['publisher'] ?>">
                    <label class="fs-5">Genre</label>
                    <input type="text" name="genre" class="form-control mt-2 mb-3" value="<?= $row['genre_name'] ?>" readonly>
                    <label class="fs-5">Description</label>
                    <input type="text" name="description" class="form-control mt-2 mb-3" value="<?= $row['description'] ?>">
                    <label class="fs-5">Price</label>
                    <input type="number" name="price" class="form-control mt-2 mb-3" value="<?= $row['price'] ?>">
                    <label class="fs-5">Image</label><br>
                    <img src="images/<?php echo $row['image'] ?>" class="mt-2 mb-5 img-thumbnail"><br>
                    <button type="submit" class="btn btn-primary me-2 fs-6 rounded-pill">Submit</button>
                    <div class="btn btn-danger me-2 fs-6 rounded-pill">
                        <a href="show_product.php" class="text-white" style="text-decoration: none;">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>