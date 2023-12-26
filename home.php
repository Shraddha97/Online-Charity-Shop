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
        <!-- Header section end -->
        <!-- Hero section -->
        <section class="hero-section">
            <div class="hero-slider owl-carousel">
                <div class="hs-item set-bg" data-setbg="img/bg.jpg">
                    
                </div>
                <div class="hs-item set-bg" data-setbg="img/bg-2.jpg">
                    
                </div>
            </div>
            <div class="container">
                <!--<div class="slide-num-holder" id="snh-1"></div>-->
            </div>
        </section>
        <!-- Hero section end -->

        <!-- Features section -->
        <section class="features-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <div class="feature-icon">
                                <img src="img/icons/1.png" alt="#">
                            </div>
                            <h2>Fast Secure Payments</h2>
                        </div>
                    </div>
                    <div class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <div class="feature-icon">
                                <img src="img/icons/2.png" alt="#">
                            </div>
                            <h2>Premium Products</h2>
                        </div>
                    </div>
                    <div class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <div class="feature-icon">
                                <img src="img/icons/3.png" style="width: 46px" alt="#">
                            </div>
                            <h2>Free & fast Delivery</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features section end -->


        <!-- latest product section -->
        <section class="top-letest-product-section">
            <div class="container">
                <div class="section-title">
                    <h4>LATEST PRODUCTS</h4>                    
                    <span class="decor"></span>
                </div>
                <div id="cart_msg"></div>
                <div class="product-slider owl-carousel">
                    <?php
                    require_once ('DB.php');
                    $sql_related_items = "SELECT * FROM products limit 8";
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
                                <div class="pi-links">
                                    <div class="effect-ajax-cart">
                                        <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                    </div>
                                </div>
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
        <!-- latest product section end -->

        <!-- Our product range section -->
        <!-- Product section -->
        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Mens Wear</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Mens Wear' order by id desc limit 4";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Mens Wear" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>

        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Womens Wear</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Womens Wear' order by id desc limit 4";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Womens Wear" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>     


        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Jewellery</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Jewellery' order by id desc limit 4";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Jewellery" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>


        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Deodrants</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Deodrants'";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Deodrants" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>


        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Mugs</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Mugs' order by id desc limit 4";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Mugs" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>


        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Dinnerware</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Dinnerware' order by id desc limit 4";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Dinnerware" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>


        <section class="product-filter-section">
            <div class="container">
                <div class="section-title">
                    <h3>Flooring</h3>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <?php
                    require_once ('DB.php');
                    $sql = "SELECT * FROM products where sub_category='Flooring' order by id desc limit 4";
                    $result = mysqli_query($conn, $sql);
                    // output data of each row
                    while ($row = mysqli_fetch_array($result)) {
                        $p_id = $row ['p_id'];
                        ?>
                        <div class="col-lg-3 col-sm-6">

                            <div id="cart_msg"></div>
                            <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                    $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                    $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                    // output data of each row
                                    while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                        $thumb_img = $row_thumb_img['thumbnail'];
                                        ?>
                                        <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><img src="<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                        <?php
                                    }
                                    ?>
                                    <div class="pi-links">
                                        <div class="effect-ajax-cart">
                                            <a href="signin" type="button" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6><i class="fa fa-gbp"></i>&nbsp;
                                        <?php
                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['price']);
                                        echo trim($product_price);
                                        ?>
                                    </h6>
                                    <a href="product_details?p_id=<?php echo $p_id_related_items ?>&category=<?php echo $row['sub_category'] ?>"><p><?php echo $row['p_name'] ?></p></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="text-center pt-5">
                    <a href="product_category?category=Flooring" class="site-btn sb-line sb-dark">VIEW MORE</a>
                </div>
            </div>
        </section>
        <!-- Product section end -->
        <!-- Our product range section end -->

        <!-- Banner section 
        <a href="https://play.google.com/store/apps/details?id=com.spotify.music" target="_blank">
            <img src="img/banner-bg.png" />
        </a>
        <!-- Banner section end  -->

        <?php
        include 'footer.php';
        ?>
        <!-- Footer section end -->
    </body>
    <?php
    include 'footerlink.php';
    ?>
</html>
