<?php include_once "header.php";?>
<section class="cid-qSjVSVwwe5 mbr-fullscreen mbr-parallax-background" id="header15-l">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 199, 20);"></div>
    <div class="container align-center ">
        <div class="row">
            <div class="mbr-white col-lg-8 col-md-7 content-container">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Registrierung</h1>
                <p class="mbr-text pb-3 mbr-fonts-style display-5"></p>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="form-container">
                    <div class="media-container-column" data-form-type="formoid">
                        <form class="mbr-form" action="includes/signup.inc.php" method="post">
                            <div data-for="name">
                                <div class="form-group">
                                    <input type="text" class="form-control px-3" name="username" data-form-field="Name" placeholder="Username" required="" id="name-header15-l">
                                </div>
                            </div>
                            <div data-for="email">
                                <div class="form-group">
                                    <input type="email" class="form-control px-3" name="email" data-form-field="Email" placeholder="Email" required="" id="email-header15-l">
                                </div>
                            </div>
                            <div data-for="pwd">
                                <div class="form-group">
                                    <input type="password" class="form-control px-3" name="password" data-form-field="Password" placeholder="Passwort">
                                </div>
                            </div>

                            <div data-for="pwd_rep">
                                <div class="form-group">
                                    <input type="password" class="form-control px-3" name="password_repeat" data-form-field="Password" placeholder="Passwort erneut eingeben">
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
