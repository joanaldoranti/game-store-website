<?php
session_start();
include('condb.php');
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(11, 21, 33, 0.5), rgba(11, 21, 33, 1)),
            url(images/girl.jpg); background-size: cover; height: 600px; background-position: top;">
    <div class="container text-center pt-5">
        <h1 class="display-1 text-light mt-5 pt-5"><strong>Game Store</strong></h1>
        <?php if (isset($_SESSION['username'])) : ?>
            <p class="text-light">Welcome <?php echo $_SESSION['username']; ?></p>
        <?php endif ?>
        <p class="text-light h4">Discover games you will love</p>
        <button type="button" class="btn btn-primary mt-5 pt-2 pb-2 ps-3 pe-3 rounded-pill"><a href="store.php" class="text-light text-decoration-none"><strong>Start Exploring</strong></a></button>
    </div>
</main>

<section style="background-color: #0b1521; height: 100%;">
    <div class="container pt-5 pb-5">
        <span class="d-flex justify-content-left align-items-center pt-5">
            <i class="bi bi-award-fill text-primary me-3"></i>
            <h4 class="text-light">WE RECOMMEND</h4>
        </span>
        <div class="row mt-5 gap-5">
            <div class="card text-light rounded" style="background-color: #091b29; height: 38rem; max-width: 20rem;">
                <img src="https://wallpapercave.com/dwp1x/wp2354929.jpg" class="card-img-top mt-4" width="200px" height="200px" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Sea of thieves</h5>
                    <p class="card-text">Xbox Game Studios</p>
                    <p class="card-text text-secondary">is an action-adventure game developed by Rare, where players take on the role of pirates in a vast open world filled with treasure, islands, and sea creatures.</p>
                    <p class="card-text h5">Rp.100.000</p>
                    <a href="store.php" class="btn btn-primary mt-3 rounded-pill">See more</a>
                </div>
            </div>
            <div class="card text-light rounded" style="background-color:#091b29; height: 38rem; max-width: 20rem;">
                    <img src="https://wallpapercave.com/dwp1x/wp4460371.jpg" class="card-img-top mt-4" width="200px" height="200px" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">PUBG: BATTLEGROUNDS</h5>
                        <p class="card-text">KRAFTON, Inc.</p>
                        <p class="card-text text-secondary">Land on strategic
                            locations, loot weapons and supplies, and survive to
                            become the last team standing across various,
                            diverse Battlegrounds. Squad up and join the
                            Battlegrounds.<br></p>
                        <p class="card-text h5">Rp.100.000</p>
                        <a href="store.php" class="btn btn-primary mt-3 rounded-pill">See
                            more</a>
                    </div>
                </div>
                <div class="card text-light rounded" style="background-color:#091b29; height: 38rem; max-width: 20rem;">
                    <img src="https://wallpapercave.com/dwp1x/wp11967643.jpg" class="card-img-top mt-4" width="200px" height="200px" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Dead by daylight</h5>
                        <p class="card-text">Behaviour Interactive Inc.</p>
                        <p class="card-text text-secondary">multiplayer (4vs1)
                            horror game where one player takes on the role of
                            the savage Killer, and the other four players play
                            as Survivors, trying to escape the Killer and avoid
                            being caught and killed.</p>
                        <p class="card-text h5">Rp.100.000</p>
                        <a href="store.php" class="btn btn-primary mt-3 rounded-pill">See
                            more</a>
                    </div>
                </div>
        </div>
        <div class="container pt-5 pb-5">
            <span class="d-flex justify-content-left align-items-center pt-5">
                <i class="bi bi-columns-gap text-primary me-3"></i>
                <h4 class="text-light">GENRE</h4>
            </span>
            <table class="table text-light text-center table-borderless mt-4 ms-0" style="background-color: #091b29; max-width: 60rem;">
                <tr>
                    <td>Action</td>
                    <td>Adventure</td>
                    <td>Casual</td>
                </tr>
                <tr>
                    <td>Indie</td>
                    <td>Racing</td>
                    <td>RPG</td>
                </tr>
                <tr>
                    <td>Simulation</td>
                    <td>Sports</td>
                    <td>Strategy</td>
                </tr>
            </table>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>

