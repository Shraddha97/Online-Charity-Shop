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
                <div class="block-header">
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

                    <!-- Active Order -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Active Orders Details
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Order Id</th>
                                                    <th>Order Date</th>
                                                    <th>Product Id</th>
                                                    <th>Buyer Id</th>
                                                    <th>Order Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once ('DB.php');
                                                $sql_active = "SELECT * FROM order_details where order_status='Accepted'";
                                                $result_active = mysqli_query($conn, $sql_active);
                                                // output data of each row
                                                while ($row_active = mysqli_fetch_array($result_active)) {
                                                    ?>                                                                                                      
                                                    <tr>
                                                        <td><?php echo $row_active ['order_id']; ?></td>
                                                        <td><?php echo $row_active ['order_date']; ?></td>
                                                        <td><?php echo $row_active ['p_id']; ?></td>
                                                        <td><?php echo $row_active ['b_id']; ?></td>
                                                        <td><?php echo $row_active ['order_status']; ?></td>
                                                        <td>
                                                            <a href="view_order.php?o_id=<?php echo $row_active ['id']; ?>"><i class="material-icons md-30">remove_red_eye</i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                    <!-- #END# Active Order Table -->
                </div>
            </div>
        </section>
        <?php
        include 'admin_footer.php';
        ?>
    </body>
</html>
