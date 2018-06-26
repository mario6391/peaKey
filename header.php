<?php
session_start();
include_once "includes/cart.php";
?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/peakey-122x42.png" type="image/x-icon">
        <meta name="description" content="">
        <title>PEAKey!</title>
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
        <link rel="stylesheet" href="assets/tether/tether.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="assets/dropdown/css/style.css">
        <link rel="stylesheet" href="assets/socicon/css/styles.css">
        <link rel="stylesheet" href="assets/animatecss/animate.min.css">
        <link rel="stylesheet" href="assets/theme/css/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    </head>

    <body>

        <section class="menu cid-qSvxoLamfl" once="menu" id="menu1-1">
            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top collapsed">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                   </button>
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                                <a href="index.php"><img src="assets/images/peakey-122x42.png" alt="Peakey" title="" style="height: 3.8rem;"></a>
                        </span>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                        <li class="nav-item dropdown">
                            <a class="nav-link link text-white dropdown-toggle display-4" href="" data-toggle="dropdown-submenu" aria-expanded="false">
                                <span class="mbri-hearth mbr-iconfont mbr-iconfont-btn"></span>SHOP
                            </a>


                            <div class="dropdown-menu">
                                <a class="text-white dropdown-item display-4" href="playstation.php">Playstation 4</a>
                                <a class="text-white dropdown-item display-4" href="xbox.php" aria-expanded="false">XBox One</a>
                                <a class="text-white dropdown-item display-4" href="steam.php" aria-expanded="true">Steam</a>
                            </div>
                        </li>

                        <!-- Wenn User eingeloggt ist zeige ihm im Dropdown Menü Logout an, ansonsten Login & Registrierung. MS -->
                        <?php
                            if(isset($_SESSION['u_id'])){
                                echo '  <li class="nav-item dropdown"><a class="nav-link link text-white dropdown-toggle display-4" href="" data-toggle="dropdown-submenu" aria-expanded="true">
                                <span class="mbri-smile-face mbr-iconfont mbr-iconfont-btn"></span>
                                Account</a>
                                <div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="logout.php">Logout</a></div>
                                </li>';
                            }
                            else{
                                echo '<li class="nav-item dropdown">
                                <a class="nav-link link text-white dropdown-toggle display-4" href="" data-toggle="dropdown-submenu" aria-expanded="false">
                                <span class="mbri-smile-face mbr-iconfont mbr-iconfont-btn"></span>
                                Account</a>
                                <div class="dropdown-menu "><a class="text-white dropdown-item display-4 " href="login.php">Login</a><a class="text-white dropdown-item display-4 " href="registrierung.php">Registrierung</a></div>
                                </li>'; 
                            }  
                        ?>



                    </ul>
                    <div class="navbar-buttons mbr-section-btn ">
                        <a class="btn btn-sm btn-primary display-4 " href="warenkorb.php">
                                <span class="mbri-shopping-cart mbr-iconfont mbr-iconfont-btn "></span>Warenkorb
                            </a>
                    </div>
                </div>
            </nav>
        </section>
