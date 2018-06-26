<section once="" class="cid-qSvCsWnOB7" id="footer7-4">





    <div class="container">

        <?php

  $mysqli = new mysqli("localhost", "root", "", "cart");

  $ergebnis = $mysqli->query("SELECT * FROM users;");

  $anzahlKunde=$ergebnis->num_rows;

  $ergebnis->close();

  $mysqli->close();
  ?>



            <div class="media-container-row align-center mbr-white"><br><br>
                <a href="agb.php">
                    <p style="text-align: left; font-size: 20px;">AGB</p>
                </a>
                <a href="impressum.php">
                    <p style="text-align: left; font-size: 20px;">Impressum</p>
                </a>
                <a href="datenschutz.php">
                    <p style="text-align: left; font-size: 20px;">Datenschutz</p>
                </a>
                <a href="widerruf.php">
                    <p style="text-align: left; font-size: 20px;">Widerrufsbelehrung</p>
                </a>
                <p style="text-align: right; font-size: 20px;">
                    <?php echo $anzahlKunde; ?> Kunde/n online!</p>
                <div class="row row-links">
                    <ul class="foot-menu">





                        <li class="foot-menu-item mbr-fonts-style display-7"></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"></li>
                        <li class="foot-menu-item mbr-fonts-style display-7"></li>
                    </ul>
                </div>
                <div class="row social-row">
                    <div class="social-list align-right pb-2">






                        <div class="soc-item">
                            <a href="https://twitter.com" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="row row-copirayt">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7"></p>
                </div>
            </div>
    </div>
</section>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
<script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
<script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
<script src="assets/mbr-tabs/mbr-tabs.js"></script>
<script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="assets/theme/js/script.js"></script>


<input name="animation" type="hidden">
</body>

</html>
