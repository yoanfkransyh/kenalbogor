<!-- Navbar -->
<nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a href="landingPage.php" class="navbar-brand">
                <img src="assets/Logo.png" alt="Logo" class="logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tempatSejarahPage.php">Bersejarah</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tempatWisataPage.php">Wisata</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="teamPage.php">Team</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                    <div class="flex-shrink-0 dropdown-lg">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/profile.png" alt="profile" width="15%">
                            <span class="text-admin ms-2"><?php echo $_SESSION['nama'] ?> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow p-2">
                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['status'] == 'Admin') { ?>
                                <li><a class="dropdown-item text-light" href="adminPage.php">Setting</a></li>
                            <?php } ?>
                            <li><a class="dropdown-item text-light" href="action/logout.php">Keluar</a></li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="loginPage.php">
                        <button class="btn btn-primary w-100">Masuk</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->