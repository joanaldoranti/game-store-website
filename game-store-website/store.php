<?php
session_start();
include('condb.php');
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: fr_login.php');
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: fr_login.php");
    exit();
}

$query_product = "SELECT * FROM game, genre
WHERE game.genre_id = genre.genre_id
ORDER BY genre_name ASC";
$result_product = mysqli_query($conn, $query_product);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<body>
    <main style="background-color:#0b1521;">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/scifi-4.jpg" class="d-block w-100 rounded">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-6"><strong>Welcome to our store</strong></h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/scifi-6.jpg" class="d-block w-100 rounded">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-6"><strong>No discount forever</strong></h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/scifi-5.jpg" class="d-block w-100 rounded">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-6"><strong>Every product too expensive</strong></h1>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <section style="background-image: linear-gradient(rgba(11, 21, 33, 1),rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.9),rgba(11, 21, 33, 0.9), rgba(11, 21, 33, 1)),
            url(images/scifi-2.jpg); background-size: cover;
            background-position: top;">
            <div class="container pb-5">
                <h1 class="mt-5 text-center text-light">Our Store</h1>
                <div class="row pt-5 gap-5 d-flex justify-content-center pb-5">
                    <?php foreach ($result_product as $row_pro) { ?>
                        <div class="card" style="width: 20rem; background-color:#091b29;">
                            <img src="images/<?php echo $row_pro['image']; ?>" class="card-img-top mt-4" width="200px" height="200px" style="object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-light"><?php echo $row_pro['game_name']; ?></h5>
                                <a class="text-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Description
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card-text text-light"><?php echo $row_pro['description']; ?></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-light" style="background-color:#091b29;">Publisher : <?php echo $row_pro['publisher']; ?></li>
                                <li class="list-group-item text-light" style="background-color:#091b29">Genre : <?php echo $row_pro['genre_name']; ?></li>
                                <li class="list-group-item h5 text-primary" style="background-color:#091b29">Rp.<?php echo $row_pro['price']; ?> Rupiah</li>
                            </ul>
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <a href="bayar_game.php?game_id=<?= $row_pro['game_id'] ?>&game_name=<?= $row_pro['game_name'] ?>&price=<?= $row_pro['price'] ?>"
                                class="btn btn-success rounded-pill flex-grow-1 me-3">
                                    Beli
                                </a>
                                <a href="add_to_cart.php?game_name=<?= $row_pro['game_name'] ?>&price=<?= $row_pro['price'] ?>"
                                class="btn btn-primary rounded-pill">
                                    <i class="bi bi-cart"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php include 'includes/footer.php'; ?>
    </main>
</body>
