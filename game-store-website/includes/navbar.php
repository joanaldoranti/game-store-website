<!-- navbar.php -->
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary pt-3 pb-3" data-bs-theme="dark" style="background-color: #0b1521 !important;">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="padding: 10px 20px;">
                <i class="bi bi-joystick me-2" style="color: #3b78e6; font-size: 30px;"></i>
                <strong>GAMESTORE</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="store.php">Store</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.php">
                                <i class="bi bi-cart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="notifikasi.php">
                                <i class="bi bi-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-danger d-flex align-items-center ps-3 pt-0 pb-0 pe-3 rounded-pill">
                                <a href="logout.php" class="nav-link text-light"><strong>Logout</strong></a>
                            </button>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary d-flex align-items-center ps-3 pt-0 pb-0 pe-3 rounded-pill">
                                <a class="nav-link text-light" href="fr_login.php"><strong>Login</strong></a>
                            </button>
                        </li>
                        <li class="nav-item ms-2">
                            <button type="button" class="btn btn-danger d-flex align-items-center ps-3 pt-0 pb-0 pe-3 rounded-pill">
                                <a class="nav-link text-light" href="signup.php"><strong>Sign up</strong></a>
                            </button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
