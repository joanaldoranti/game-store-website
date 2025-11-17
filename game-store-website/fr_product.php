<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: fr_login.php');
    exit();
}
include 'condb.php';
include 'includes/header.php';
include 'includes/navbarAdmin.php'
?>

<main style="background-image: linear-gradient(rgba(0, 0, 0,
        0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
        url(images/scifi-3.jpg); background-size: cover; height: 800px;
        background-position: top;">
    <div class="container pt-5">
        <h1 class="text-light">Add Product</h1>
        <div class="row mt-3">
            <div class="col-sm-5 me-5">
                <form action="insert_product.php" method="post" class="text-light" name="game-form" enctype="multipart/form-data">
                    <label class="fs-5">Name</label>
                    <input type="text" name="game_name" class="form-control mt-2 mb-3" placeholder="Enter name" required>
                    <label class="fs-5">Publisher</label>
                    <input type="text" name="publisher" class="form-control mt-2 mb-3" placeholder="Enter publisher" required>
                    <label class="fs-5">Genre</label>
                    <select class="form-select mt-2 mb-3" name="genre">
                        <?php
                        $sql = "SELECT * FROM genre ORDER BY genre_name";
                        $hand = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($hand)) {
                        ?>
                            <option value="<?= $row['genre_id'] ?>"><?= $row['genre_name'] ?></option>
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                    <label class="fs-5">Description</label>
                    <input type="text" name="description" class="form-control mt-2 mb-3 fs-6" placeholder="Enter description" required>
                    <label class="fs-5">Price</label>
                    <input type="number" name="price" class="form-control mt-2 mb-3" placeholder="Enter price" required>
                    <label class="fs-5">Image</label>
                    <input type="file" name="file1" class="form-control mt-2 mb-3" required>
                    <button type="submit" class="btn btn-primary me-2 fs-6 rounded-pill">Submit</button>
                    <a href="show_product.php" class="btn btn-danger fs-6 rounded-pill">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
