<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headerlink.php';
        ?>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <section class="section-sm">
            <div class="container">
                <div class="section-title text-uppercase">
                    <h2>Product Category</h2>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $p_id = isset($_GET['p_id']) ? $_GET['p_id'] : '';
                    $sql = "SELECT * FROM products where p_id=$p_id";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $sub_category = $row['sub_category'];
                        ?>
                        <div class="col-lg-6">

                            <div class="product-pic-zoom">
                                <?php
                                $sql_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                $result_img = mysqli_query($conn, $sql_img);
                                // output data of each row
                                while ($row_img = mysqli_fetch_array($result_img)) {
                                    $thumb_img = $row_img['image'];
                                    ?>
                                    <img class="product-big-img" src="<?php echo $thumb_img ?>" alt="">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                                <div class="product-thumbs-track">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <div class="pt active" data-imgbigurl="<?php echo $row_thumb_img['image']; ?>">
                                            <img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt="">
                                        </div>
                                        <?php
                                    }
                                    $sql_img_count = "SELECT COUNT(*) as p_img FROM product_img where p_id=$p_id";
                                    $result_img_count = mysqli_query($conn, $sql_img_count);
                                    while ($row_img_count = mysqli_fetch_array($result_img_count)) {
                                        $p_img_count = $row_img_count['p_img'];
                                    }
                                    $sql_thumb_2 = "SELECT * FROM product_img where p_id=$p_id order by p_id desc limit 1," . $p_img_count;
                                    $result_thumb_2 = mysqli_query($conn, $sql_thumb_2);
                                    // output data of each row
                                    while ($row_thumb_2 = mysqli_fetch_array($result_thumb_2)) {
                                        ?>
                                        <div class="pt" data-imgbigurl="<?php echo $row_thumb_2['image']; ?>">
                                            <img src="<?php echo $row_thumb_2['thumbnail']; ?>" alt="">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 product-details">
                            <h2 class="p-title"><?php echo $row['p_name'] ?></h2>
                            <h3 class="p-price"><i class="fa fa-gbp"></i>&nbsp;
                                <?php
                                $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                echo trim($product_price);
                                ?>
                            </h3>
                            <h4 class="p-stock">Available: <span>In Stock</span></h4>
                            <div class="fw-size-choose">
                                <p>Size</p>
                                <?php
                                $size_array = $row ['size'];
                                $size_list = explode('^', $size_array);
                                ?>
                                <div class="sc-item <?php
                                if (in_array("XS", $size_list)) {
                                    
                                } else {
                                    ?>disable<?php } ?>">
                                    <input type="radio" <?php
                                    if (in_array("XS", $size_list)) {
                                        
                                    } else {
                                        ?>disabled="disabled"<?php } ?> value="XS" name="sc" id="x-small">
                                    <label for="x-small">XS</label>
                                </div>
                                <div class="sc-item <?php
                                     if (in_array("S", $size_list)) {
                                         
                                     } else {
                                         ?>disable<?php } ?>">
                                    <input type="radio" <?php
                                if (in_array("S", $size_list)) {
                                    
                                } else {
                                         ?>disabled="disabled"<?php } ?> value="S" name="sc" id="small">
                                    <label for="small">S</label>
                                </div>
                                <div class="sc-item <?php
                                    if (in_array("M", $size_list)) {
                                        
                                    } else {
                                        ?>disable<?php } ?>">
                                    <input type="radio" <?php
                                    if (in_array("M", $size_list)) {
                                        
                                    } else {
                                        ?>disabled="disabled"<?php } ?> value="M" name="sc" id="medium">
                                    <label for="medium">M</label>
                                </div>
                                <div class="sc-item <?php
                                           if (in_array("L", $size_list)) {
                                               
                                           } else {
                                               ?>disable<?php } ?>">
                                    <input type="radio" <?php
                                if (in_array("L", $size_list)) {
                                    
                                } else {
                                    ?>disabled="disabled"<?php } ?> value="L" name="sc" id="large">
                                    <label for="large">L</label>
                                </div>
                                <div class="sc-item <?php
                                if (in_array("XL", $size_list)) {
                                    
                                } else {
                                    ?>disable<?php } ?>">
                                    <input type="radio" <?php
                            if (in_array("XL", $size_list)) {
                                
                            } else {
                                    ?>disabled="disabled"<?php } ?> value="XL" name="sc" id="x-large">
                                    <label for="x-large">XL</label>
                                </div>
                                <div class="sc-item <?php
                                       if (in_array("XXL", $size_list)) {
                                           
                                       } else {
                                           ?>disable<?php } ?>">
                                    <input type="radio" <?php
                                       if (in_array("XXL", $size_list)) {
                                           
                                       } else {
                                           ?>disabled="disabled"<?php } ?> value="XXL" name="sc" id="xx-large">
                                    <label for="xx-large">XXL</label>
                                </div>
                            </div>
                            <div class="quantity">
                                <p>Quantity</p>
    <!--                                <div class="pro-qty"><input type="text" value="1"></div>-->.
                                <select class="form-control itemQty" name="p_qty" style="width: 60px">
                                    <option value="1" selected="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <a class="site-btn" href="signin">SHOP NOW</a>
                            <div id="accordion" class="accordion-area">
                                <div class="panel">
                                    <div class="panel-header" id="headingOne">
                                        <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Product Details</button>
                                    </div>
                                    <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="panel-body">
                                            <p><strong>Fabric:&nbsp;</strong><?php echo $row['fabric'] ?></p>
                                            <p><strong>Brand:&nbsp;</strong><?php echo $row['brand_name'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-header" id="headingThree">
                                        <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
                                    </div>
                                    <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="panel-body">
                                            <h4>7 Days Returns</h4>
                                            <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="social-sharing">
                                                            <a href=""><i class="fa fa-google-plus"></i></a>
                                                            <a href=""><i class="fa fa-pinterest"></i></a>
                                                            <a href=""><i class="fa fa-facebook"></i></a>
                                                            <a href=""><i class="fa fa-twitter"></i></a>
                                                            <a href=""><i class="fa fa-youtube"></i></a>
                                                        </div>-->
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="related-product-section">
            <div class="container">
                <div class="section-title">
                    <h2>RELATED PRODUCTS</h2>
                </div>
                <div class="product-slider owl-carousel">
                            <?php
                            $sql_related_items = "SELECT * FROM products where sub_category='$sub_category'";
                            $result_related_items = mysqli_query($conn, $sql_related_items);
                            // output data of each row
                            while ($row_related_items = mysqli_fetch_array($result_related_items)) {
                                $p_id_related_items = $row_related_items ['p_id'];
                                ?>
                        <div class="product-item">
                            <div class="pi-pic">
    <?php
    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id_related_items' limit 1";
    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
    // output data of each row
    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
        $thumb_img = $row_thumb_img['thumbnail'];
        ?>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row_related_items['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
        <?php
    }
    ?>
                            </div>
                            <div class="pi-text">
                                <h6>
                                    <i class="fa fa-gbp"></i>&nbsp;
    <?php
    $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row_related_items['price']);
    echo trim($product_price);
    ?>
                                </h6>
                                <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row_related_items['sub_category'] ?>"><p><?php echo $row_related_items['p_name'] ?></p></a>
                            </div>
                        </div>
        <?php
    }
    ?>
                </div>
            </div>
        </section>
<?php
include 'footer.php';
?>
        <!-- Footer section end -->
    </body>
<?php
include 'footerlink.php';
?>
</html>