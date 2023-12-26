<?php
$random_url = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 1000000);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="" style="background: url(Admin/images/8858419809540ae.jpg) no-repeat no-repeat">
            <div class="user-info">
                <div class="image">
                    <img src="Admin/images/user.png" width="60" height="60" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rushabh Trading Co Admin Panel</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="log_out"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="admin_panel">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">store</i>
                        <span>Products</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="add_product">Add Product</a>
                            <a href="view_products">View Products</a>
                        </li>
                    </ul>
                </li>
                <!--<li>-->
                <!--    <a href="javascript:void(0);" class="menu-toggle">-->
                <!--        <i class="material-icons">photo_library</i>-->
                <!--        <span>Gallery</span>-->
                <!--    </a>-->
                <!--    <ul class="ml-menu">-->
                <!--        <li>-->
                <!--            <a href="add_gallery_img">Add Images</a>-->
                <!--            <a href="view_gallery">View Images</a>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
                
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">shopping_cart</i>
                        <span>Orders</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="view_pending_orders">View Pending Orders</a>
                            <a href="all_orders">View All Orders</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">account_circle</i>
                        <span>My Account</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="change_pass">Change Password</a>
                        </li>
                    </ul>
                </li>
                <!--<hr>-->
                <!--<li>-->
                <!--    <label style="padding-left: 15px;"><span>Communicate</span></label>-->
                <!--</li>-->
                <!--<li>-->
                <!--    <a href="https://stellarinfosys.com/contact-us" target="_blank">-->
                <!--        <i class="material-icons">call</i>-->
                <!--        <span>Contact Us</span>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li>-->
                <!--    <a href="https://stellarinfosys.com/about-us" target="_blank">-->
                <!--        <i class="material-icons">info</i>-->
                <!--        <span>About Us</span>-->
                <!--    </a>-->
                <!--</li>-->
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <!--<div class="legal">-->
        <!--    <div class="copyright">-->
        <!--        &copy;2018 - <?php echo date("Y"); ?> <a href="https://stellarinfosys.com/">Stellar Infosys</a>-->
        <!--    </div>-->
        <!--    <div class="version">-->
        <!--        <b>Version: </b> 2.1.0-->
        <!--    </div>-->
        <!--</div>-->
        <!-- #Footer -->
    </aside>

    <!-- #END# Right Sidebar -->
</section>