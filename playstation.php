<?php include_once "header.php";?>
<section class="features3 cid-qSjXie6KYM" id="features3-s">
    <div class="container">
        <?php
                $connect = mysqli_connect("localhost", "root", "", "cart");
                $query = 'SELECT * FROM products ORDER by id ASC';
                $result = mysqli_query($connect, $query);
                    if ($result):
                        if(mysqli_num_rows($result)>0):
                            while($product = mysqli_fetch_assoc($result)):
                ?>
            <div>
                <form method="post" action="playstation.php?action=add&id=<?php echo $product['id']; ?>">
                    <div class="media-container-row">
                        <div class="card p-3 col-12 col-md-6 col-lg-4">
                            <div class="card-wrapper">
                                <div class="card-img"><br><br><br>
                                    <img src="<?php echo $product[ 'image']; ?>" />
                                </div>
                                <div class="card-box">
                                    <h4 class="card-title mbr-fonts-style display-7"><br>
                                        <?php echo $product['name']; ?>
                                    </h4>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        EUR
                                        <?php echo $product['price']; ?>
                                        <input type="text" name="quantity" class="form-control" value="1" />
                                    </p>
                                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                                    <br>
                                    <div class="mbr-section-btn text-center">
                                        <input type="submit" name="add_to_cart" style="margin-      top:5px;" class="btn btn-info" value="Zum Warenkorb hinzufügen" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                endwhile;
            endif;
        endif;   
        ?>
    </div>

    <?php 
include_once "footer.php";
?>
