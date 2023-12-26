
<style>
    @media only screen and (max-device-width: 425px) {
        #snackbar {
            width: 96% !important;
            margin-left: 0px !important;
            left: 2% !important;
        }
    }
    #snackbar {
        visibility: hidden; /* Hidden by default. Visible on click */
        width: 98%; /* Set a default minimum width */
        background-color: #333; /* Black background color */
        color: #fff; /* White text color */
        text-align: center; /* Centered text */
        border-radius: 2px; /* Rounded borders */
        padding: 16px; /* Padding */
        position: fixed; /* Sit on top of the screen */
        z-index: 9999999; /* Add a z-index if needed */
        top: 30%; /* 30px from the bottom */
        left: 1%;
        font-size: 15px;
    }
    .show_result {
        visibility: visible !important; /* Show the snackbar */
        -webkit-animation: fadein 0.5s;
    }
    @-webkit-keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30%; opacity: 1;}
    }
    @keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30%; opacity: 1;}
    }
    @-webkit-keyframes fadeout {
        from {top: 30%; opacity: 1;}
        to {top: 0; opacity: 0;}
    }
    @keyframes fadeout {
        from {top: 30%; opacity: 1;}
        to {top: 0; opacity: 0;}
    }
</style>
<?php
$b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
?>
<input type="hidden" class="b_id" id="b_id" value="<?php echo $b_id ?>" />
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section hidden-sm hidden-xs">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="home?b_id=<?php echo $b_id ?>" class="site-logo">
                        <img src="../img/logo.png" href="/Home" alt="">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="header-search-form">
                        <input id="search_keyword" name="search_keyword" type="text" placeholder="Search for products...">
                        <button onclick="window.open('searched_product?search_keyword=' + document.getElementById('search_keyword').value + '&b_id=' + document.getElementById('b_id').value, '_self')"><i class="flaticon-search"></i></button>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 order-sm-1">
                    <div class="user-panel">
                        <div class="up-item">
                            <div class="shopping-card">
                                <i class="flaticon-bag"></i>
                                <span class="cart_number">0</span>
                            </div>
                            <a href="cart?b_id=<?php echo $b_id ?>">Shopping Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                <li><a href="home?b_id=<?php echo $b_id ?>">Home</a></li>
                <li><a href="about-us?b_id=<?php echo $b_id ?>">About Us</a></li>
                <li><a href="javascript:void(0);">Kitchen</a>
                    <ul class="sub-menu">
                        <li><a href="product_category?category=Mugs&b_id=<?php echo $b_id ?>">Mugs</a></li>
                        <li><a href="product_category?category=Dinnerware&b_id=<?php echo $b_id ?>">Dinnerware</a></li>

                    </ul>
                </li> 

                <li><a href="javascript:void(0);">Fashion</a>
                    <ul class="sub-menu">
                        <li><a href="product_category?category=Mens%20Wear&b_id=<?php echo $b_id ?>">Mens Wear</a></li>
                        <li><a href="product_category?category=Womens%20Wear&b_id=<?php echo $b_id ?>">Womens Wear</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);">Accessories</a>
                    <ul class="sub-menu">
                        <li><a href="product_category?category=Jewellery&b_id=<?php echo $b_id ?>">Jewellery</a></li>
                        <li><a href="product_category?category=Deodrants&b_id=<?php echo $b_id ?>">Deodrants</a></li>
                   
                    </ul>
                </li>
                <li><a href="javascript:void(0);">Home Decor</a>
                    <ul class="sub-menu">
                        <li><a href="product_category?category=Flooring&b_id=<?php echo $b_id ?>">Flooring</a></li>
                        <li><a href="product_category?category=Bath&b_id=<?php echo $b_id ?>">Bath</a></li>
                   
                    </ul>
                </li>
                <!--<li><a href="gallery?b_id=<?php echo $b_id ?>">Gallery</a></li>-->
                <li><a href="contact-us?b_id=<?php echo $b_id ?>">Contact Us</a></li>
                <li>
                    <a href="javascript:void(0);">
                        <?php
                        require_once ('DB.php');
                        $sql_b_name = "SELECT b_name FROM buyer_register where b_id='$b_id'";
                        $result_b_name = mysqli_query($conn, $sql_b_name);
                        // output data of each row
                        while ($row_b_name = mysqli_fetch_array($result_b_name)) {
                            ?>                        
                            <?php echo $row_b_name ['b_name']; ?>&nbsp;<i class="fa fa-caret-down hidden-xs"></i>
                            <?php
                        }
                        ?>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="my_account?b_id=<?php echo $b_id ?>"><i class="mdi mdi-account"></i> My Account</a></li>
                        <li><a href="my_orders?b_id=<?php echo $b_id ?>"<i class="mdi mdi-package-variant"></i> My Orders</a></li>
                        <li><a href="update_password?b_id=<?php echo $b_id ?>"><i class="mdi mdi-lock"></i> Change Password</a></li>
                        <li><a href="javascript:void(0);" onclick="window.open('buyer_logout','_self')"><i class="mdi mdi-logout"></i> Logout</a></li>
                    </ul>
                </li>               
            </ul>
        </div>
    </nav>
</header>
<header class="header-section hidden-lg hidden-md">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="home?b_id=<?php echo $b_id ?>" class="site-logo">
                        <img src="../img/logo.png" alt="">
                    </a>
                </div>

                <div class="col-xl-4 col-lg-5 order-sm-1">
                    <div class="user-panel">
                        <div class="up-item">
                            <div class="shopping-card">
                                <a href="cart?b_id=<?php echo $b_id ?>"><i class="flaticon-bag"></i>
                                <span class="cart_number">0</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <!-- menu -->
                        <ul class="main-menu">
                            <li><a href="home?b_id=<?php echo $b_id ?>">Home</a></li>
                            <li><a href="about-us?b_id=<?php echo $b_id ?>">About Us</a></li>
                            <li><a href="javascript:void(0);">Kitchen</a>
                                <ul class="sub-menu">
                                    <li><a href="product_category?category=Mugs&b_id=<?php echo $b_id ?>">Mugs</a></li>
                        <li><a href="product_category?category=Dinnerware&b_id=<?php echo $b_id ?>">Dinnerware</a></li>

                                </ul>
                            </li> 

                            <li><a href="javascript:void(0);">Fashion</a>
                                <ul class="sub-menu">
                                    <li><a href="product_category?category=Mens%20Wear&b_id=<?php echo $b_id ?>">Mens Wear</a></li>
                                     <li><a href="product_category?category=Womens%20Wear&b_id=<?php echo $b_id ?>">Womens Wear</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Accessories</a>
                                <ul class="sub-menu">
                                    <li><a href="product_category?category=Jewellery&b_id=<?php echo $b_id ?>">Jewellery</a></li>
                                     <li><a href="product_category?category=Deodrants&b_id=<?php echo $b_id ?>">Deodrants</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Home Decor</a>
                                <ul class="sub-menu">
                                    <li><a href="product_category?category=Flooring&b_id=<?php echo $b_id ?>">Flooring</a></li>
                                     <li><a href="product_category?category=Bath&b_id=<?php echo $b_id ?>">Bath</a></li>
              
                                </ul>
                            </li>
                            <!--<li><a href="gallery?b_id=<?php echo $b_id ?>">Gallery</a></li>-->
                            <li><a href="contact-us?b_id=<?php echo $b_id ?>">Contact Us</a></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <?php
                                    require_once ('DB.php');
                                    $sql_b_name = "SELECT b_name FROM buyer_register where b_id='$b_id'";
                                    $result_b_name = mysqli_query($conn, $sql_b_name);
                                    // output data of each row
                                    while ($row_b_name = mysqli_fetch_array($result_b_name)) {
                                        ?>                        
                                        <?php echo $row_b_name ['b_name']; ?>&nbsp;<i class="fa fa-caret-down hidden-xs"></i>
                                        <?php
                                    }
                                    ?>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="my_account?b_id=<?php echo $b_id ?>"><i class="mdi mdi-account"></i> My Account</a></li>
                                    <li><a href="my_orders?b_id=<?php echo $b_id ?>"<i class="mdi mdi-package-variant"></i> My Orders</a></li>
                                    <li><a href="update_password?b_id=<?php echo $b_id ?>"><i class="mdi mdi-lock"></i> Change Password</a></li>
                                    <li><a href="javascript:void(0);" onclick="window.open('buyer_logout', '_self')"><i class="mdi mdi-logout"></i> Logout</a></li>
                                </ul>
                            </li>               
                        </ul>
                    </div>
                </nav>
                <div class="col-xl-6 col-lg-5">
                    <div class="header-search-form">
                        <input id="search_keyword_resp" name="search_keyword" type="text" placeholder="Search for products...">
                        <button onclick="window.open('searched_product?search_keyword=' + document.getElementById('search_keyword_resp').value + '&b_id=' + document.getElementById('b_id').value, '_self')"><i class="flaticon-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>