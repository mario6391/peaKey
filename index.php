<?php include_once "header.php";?>
<section class="header6 cid-qSvxZWorRN mbr-fullscreen" data-bg-video="https://www.youtube.com/watch?v=r5c0-TFP18g" id="header6-2">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    <?php 
                    if(isset($_SESSION['u_id'])){
                        
                        ?> Willkommen zurück,
                    <?php echo $_SESSION['u_name']; ?> :)

                    <?php  
                        
                        
                    }
                    else{
                        echo "Willkommen bei PEAKey.de!";
                    }
                    ?>


                </h1>

                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                    Dein Onlineshop für PS4 Keys und mehr...!
                    <br> Für welche Plattform suchst du?
                </p>
                <div class="mbr-section-btn align-center">
                    <a class="btn btn-md btn-primary display-4" href="playstation.php">PS4</a>
                    <a class="btn btn-md btn-primary display-4" href="xbox.php">XBOX</a>
                    <a class="btn btn-md btn-primary display-4" href="steam.php">STEAM</a></div>
            </div>
        </div>
    </div>
</section>


<section class="tabs4 cid-qSvBaNNAOQ">
    <?php 
        if(isset($_SESSION['u_id'])){
            $user = $_SESSION['u_name'];
            echo ' <div class="container">
            <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">Accountdetails:</h2> 
            <br>
            <br>';
    ?>
    <table>
        <tr>
            <th width="50%">Name</th>
            <th width="50%">Email</th>
        </tr>
        <tr>
            <td width="50%">
                <?php echo $_SESSION['u_name']; ?>
            </td>
            <td width="10%">
                <?php echo $_SESSION['u_email']; ?>
            </td>
        </tr>
    </table>
    <?php
            $connect = mysqli_connect("localhost", "root", "", "cart");
            $sql="SELECT * FROM orders WHERE order_name ='{$_SESSION['u_name']}' ORDER BY order_id DESC LIMIT 1";
            $result = mysqli_query($connect, $sql);
                if ($result):
                    if(mysqli_num_rows($result)>0):
                        while($order = mysqli_fetch_assoc($result)):
        ?>
        <br><br><br>
        <form class="signup-form" action="includes/ordersave.inc.php" method="POST">
            <table>
                <tr>
                    <th>
                        <h4>Letzte Bestellung</h4>
                    </th>
                </tr>
                <tr>
                    <th width="50%">Key</th>

                    <th width="35%">EUR</th>
                    <th width="5%"></th>
                </tr>
                <tr>
                    <td width="50%">
                        <?php echo $order['order_detail']; ?>
                        <input type="hidden" name="detail" value="<?php echo $order['order_detail']; ?>" />
                    </td>

                    <td width="35%">
                        <?php echo $order['order_total']; ?>
                        <input type="hidden" name="total" value="<?php echo $order['order_total']; ?>" />
                    </td>
                    <td width="5%">
                        <button type="submit" name="submit3">ERNEUT BESTELLEN</button>
                    </td>
                </tr>
            </table>
        </form>
        <a href="logout.php">Logout</a>
        <?php
        endwhile;
        endif; 
        endif;
    }else{
          echo ' <div class="container">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">Hallo Gast! </h2>
                        <div class="media-container-row mt-5 pt-3">
                            <div class="mbr-figure" style="width: 42%;">
                                <img src="assets/images/crash-bandicoot-remaster-warped-capa-760x428.jpg" alt="Crash" title="">
                            </div>
                        <div class="tabs-container">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link mbr-fonts-style active show display-7" role="tab" href="login.php" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link mbr-fonts-style active show display-7" role="tab" href="registrierung.php" aria-selected="true">Registrierung</a>
                                </li>
                            </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane in active" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mbr-text py-5 mbr-fonts-style display-7">
                                        Registriere dich bei uns um eine Bestellung zu tätigen! Zahlreiche Spiele für jede Plattform erwarten dich zu unschlagbaren Preisen!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <div id="tab2" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mbr-text py-5 mbr-fonts-style display-7">Registriere dich bei uns um eine Bestellung zu tätigen! Zahlreiche Spiele für jede Plattform erwarten dich zu unschlagbaren Preisen!&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>';
    }
 ?>
</section>
<?php include_once "footer.php";?>
