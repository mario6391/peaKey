<?php include_once "header.php";?>

<section class="cid-qSjWn6PHJx mbr-fullscreen mbr-parallax-background" id="header15-m">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 199, 20);"></div>
    <div class="container align-center">
        <div class="row">
            <div class="mbr-white col-lg-8 col-md-7 content-container">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    Login
                </h1>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="form-container">
                    <div class="media-container-column" data-form-type="formoid">
                        <form class="mbr-form" action="includes/login.inc.php" method="POST">
                            <div data-for="name">
                                <div class="form-group">
                                    <input type="text" class="form-control px-3" name="uid" data-form-field="Name" placeholder="Name" required="" id="name-header15-m">
                                </div>
                            </div>
                            <div data-for="email">
                                <div class="form-group">
                                    <input type="password" class="form-control px-3" name="pwd" data-form-field="Email" placeholder="Passwort" required="" id="email-header15-m">
                                </div>
                            </div>
                            <span class="input-group-btn"><button name="submit" type="submit" class="btn btn-form btn-primary display-4">SENDEN</button></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php";?>
