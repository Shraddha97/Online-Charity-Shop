<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include 'admin_headerlink.php';
        session_start();
        if (isset($_SESSION['user'])) {
            
        } else {
            header("location:login");
        }
        ?>
    </head>
    <body class="theme-purple ls-opened">
        <?php
        include 'admin_header.php';
        ?>
        <?php
        include 'adminleftsidebar.php';
        ?>
        <section class="content">
            <div class="container-fluid">
                <!-- Hover Zoom Effect -->
                <div class="row">
                    <a href="add_product">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-purple hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <div class="content">
                                    <div class="text">ADD</div>
                                    <div class="number">New Product</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="view_products">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-indigo hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons mdi mdi-shopping"></i>
                                </div>
                                <div class="content">
                                    <div class="text">MANAGE</div>
                                    <div class="number">Products</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="view_pending_orders">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-teal hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">shopping_cart</i>
                                </div>
                                <div class="content">
                                    <div class="text">VIEW</div>
                                    <div class="number">Pending Orders</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <!--<a href="add_gallery_img">-->
                    <!--    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">-->
                    <!--        <div class="info-box-3 bg-pink hover-zoom-effect">-->
                    <!--            <div class="icon">-->
                    <!--                <i class="material-icons">add_a_photo</i>-->
                    <!--            </div>-->
                    <!--            <div class="content">-->
                    <!--                <div class="text">ADD</div>-->
                    <!--                <div class="number">Gallery Image</div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</a>-->
                    <!--<a href="view_gallery">-->
                    <!--    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">-->
                    <!--        <div class="info-box-3 bg-blue hover-zoom-effect">-->
                    <!--            <div class="icon">-->
                    <!--                <i class="material-icons">photo_library</i>-->
                    <!--            </div>-->
                    <!--            <div class="content">-->
                    <!--                <div class="text">MANAGE</div>-->
                    <!--                <div class="number">Gallery Image</div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</a>-->
                    <a href="change_pass">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-green hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">lock</i>
                                </div>
                                <div class="content">
                                    <div class="text">CHANGE</div>
                                    <div class="number">Password</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- #END# Hover Zoom Effect -->
            </div>
        </section>
        <?php
        include 'admin_footer.php';
        ?>
</html>
