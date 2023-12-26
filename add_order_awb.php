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
                                    Add Order Tracking Information
                                </h2>
                            </div>
                            <div class="body">
                                <form action="insert_tracking_details" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $o_id = isset($_GET['ot_id']) ? $_GET['ot_id'] : ''; ?>" name="o_id"/>
                                    <input type="hidden" value="<?php echo $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : ''; ?>" name="b_id"/>
                                    <input type="hidden" value="<?php echo $order_status = isset($_GET['order_status']) ? $_GET['order_status'] : ''; ?>" name="order_status"/>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="thumbnail">Tracking Url</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="url" class="form-control" name="tracking_url" placeholder="eg: https://www.domain.com/tracking" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="img">Enter AWB Number</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="awb_no" placeholder="eg: 79034111122" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <input class="btn btn-block bg-purple waves-effect" type="submit" value="Accept Order" name="tracking_submit">
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
