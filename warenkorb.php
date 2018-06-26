<?php include_once "header.php";?>
<div class="container">
    <?php
            $connect = mysqli_connect("localhost", "root", "", "cart");
            $query = 'SELECT * FROM products ORDER by id ASC';
            $result = mysqli_query($connect, $query);
        ?>
        <div style="clear:both"></div>
        <br /> <br /> <br /> <br /> <br />
        <form class="signup-form" action="includes/ordersave.inc.php" method="POST">


            <div style="overflow-x:auto;">
                <table>

                    <tr>
                        <th colspan="5">
                            <h3>Warenkorb</h3>
                        </th>
                    </tr>
                    <tr>
                        <th width="40%">Key</th>
                        <th width="10%">Menge</th>
                        <th width="20%">EUR </th>


                    </tr>

                    <?php  
                    $quantNeu = "";
            $comma_separated ="";
                    $neu="";
                if(!empty($_SESSION['shopping_cart'])):  
                    $total = 0; 
                    $comma_separated="";
                        foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>

                    <tr>
                        <td>
                            <?php echo $product['name']; ?>
                        </td>
                        <td>
                            <?php echo $product['quantity']; ?>
                        </td>
                        <td>€
                            <?php echo $product['price']; ?>
                        </td>

                        <td>
                            <button type="button"><a href="warenkorb.php?action=delete&id=<?php echo $product['id']; ?>">löschen</a></button>

                        </td>
                    </tr>


                    <?php  
                    $total = $total + ($product['quantity'] * $product['price']);   
                    
                    $quantArray = array($product['quantity']);
                    $array = array($product['name']);
                    
                    $quant_separated = implode(",", $quantArray);
                    $comma_separated = implode(",", $array);
                    
                    $quantNeu .= $quant_separated."/";
                    $neu .= $comma_separated."/";
                ?>

                    <input type="hidden" name="detail" value="<?php echo $neu; ?>" />
                    <input type="hidden" name="detail_total" value="<?php echo $total; ?>" />
                    <input type="hidden" name="quantity" value="<?php echo $quantNeu; ?>" />

                    <?php endforeach; ?>
                    <hr>
                    <tr>
                    </tr>
                    <tr>
                        <br>
                        <hr>
                        <td>Total</td>
                        <td> </td>

                        <td>€
                            <?php echo number_format($total, 2); ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <!-- Wenn etwas im Warenkorb ist, dann zeige die Buttons -->
                        <td colspan="5">
                            <?php 
                                if (isset($_SESSION['shopping_cart'])):
                                if (count($_SESSION['shopping_cart']) > 0):
                            ?>
                            <hr>
                            <p>Bestellung abschließen:</p>
                            <button class="btn btn-md btn-primary display-4" type="submit" name="submit">KeyGarantie! +5EUR</button>
                            <button class="btn btn-md btn-primary display-4" type="submit" name="submit2">Ohne KeyGarantie! +0EUR</button>
                            <hr>
                            <?php endif; endif; ?>
                        </td>
                    </tr>
                    <?php endif;?>
                </table>
                <hr>
            </div>




        </form>
</div>
<?php include_once "footer.php";?>
