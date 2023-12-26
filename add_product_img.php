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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <?php
                            $success = isset($_GET['success']) ? $_GET['success'] : '';
                            $failed = isset($_GET['failed']) ? $_GET['failed'] : '';
                            if ($success != NULL) {
                                ?>
                                <div class="well" style="background-color:white;color:green;">
                                    <?php
                                    echo $success;
                                    ?>
                                </div>
                                <?php
                            }
                            if ($failed != NULL) {
                                ?>
                                <div class="well" style="background-color:white;color:red;">
                                    <?php
                                    echo $failed;
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Add Product Image
                                </h2>
                            </div>
                            <div class="body">
                                <!--                                <div class="row clearfix">
                                                                    <div class="col-md-12 instruction">
                                                                        <h5>Instructions: </h5>
                                                                        <ul>
                                                                            <li>Image Dimension should be 400X300 (in pixels)</li>
                                                                            <li>Use <strong>^</strong> icon to write in a point.</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>-->
                                <?php
                                require_once 'DB.php';
                                $sql1 = "select p_id from products order by p_id desc limit 0,1";
                                $result1 = mysqli_query($conn, $sql1);
                                // output data of each row
                                if ($row1 = mysqli_fetch_array($result1)) {
                                    $id = $row1 ['p_id'];
                                }
                                ?>
                                <form action="insert_product" method="post" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="p_id">Product Number</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="hidden" id="p_id" class="form-control" name="p_id" value="<?php echo $id; ?>">
                                                        <input type="text" class="form-control" value="<?php echo $id; ?>" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="p_thumb">Product Image Thumbnail</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="p_thumb" placeholder="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="p_img">Product Image</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="p_img" placeholder="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <input class="btn btn-block bg-pink waves-effect" type="submit" value="Upload Image" name="product_img_submit">
                                        </div>
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <a class="btn btn-block bg-purple waves-effect" href="add_product">Add New Product</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        <?php
        include 'admin_footer.php';
        ?>
    </body>
</html>
