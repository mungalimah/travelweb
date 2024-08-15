<?php
session_start();

if (isset($_COOKIE['last_active'])) {
    if (time() - $_COOKIE['last_active'] > 300) {
        session_unset();
        session_destroy();
        setcookie("last_active", "", time() - 3600); // Expire the cookie
        header('Location: login.php');
        exit;
    } else {
        setcookie("last_active", time(), time() + 300); // Refresh cookie for 5 minutes
    }
} else {
    if (isset($_SESSION['namauser'])) {
        setcookie("last_active", time(), time() + 300); // Set cookie for 5 minutes
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagabondia</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php" id="logo"><span>Vagabondia</span> Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?target=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?target=gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?target=packages">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?target=kredit">Simulasi</a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarNavLightDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    More
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    <li>
                                        <?php if (isset($_SESSION['namauser'])): ?>
                                            <a class="dropdown-item" href="index.php?target=admin">CRUD</a>
                                        <?php else: ?>
                                            <a class="dropdown-item" href="index.php?target=crud">CRUD</a>
                                        <?php endif; ?>
                                    </li>
                                    <li><a class="dropdown-item" href="form_input.html">Form</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success" type="button">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <?php
    if (!isset($_GET['target'])) {
        require ('home.php');
    } elseif ($_GET['target'] == 'about') {
        require ('about.php');
    } elseif ($_GET['target'] == 'gallery') {
        require ('gallery.php');
    } elseif ($_GET['target'] == 'packages') {
        require ('packages.php');
    } elseif ($_GET['target'] == 'kredit') {
        require ('kredit.php');
    } elseif ($_GET['target'] == 'login') {
        require ('login.php');
    } elseif ($_GET['target'] == 'logout') {
        require ('logout.php');
    } elseif ($_GET['target'] == 'crud') {
        require ('crud_user.php');
    } elseif ($_GET['target'] == 'admin') {
        require ('crud_admin.php');
    } elseif ($_GET['target'] == 'tambah') {
        require ('form_tambah.php');
    } else {
        require ('error.php');
    }
    ?>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
