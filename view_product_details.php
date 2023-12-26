<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>
            .note{
                color: red;
                font-size: 13px;
                text-align: right;
                padding: 5px;
            }
            .note strong{
                font-size: 16px;
            }
        </style>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        $p_id = isset($_GET['p_id']) ? $_GET['p_id'] : '';
                        ?>
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Product Details
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Product_Name</th>
                                                <th>Height</th>
                                                <th>Width</th>
                                                <th>Length</th>
                                                <th>Purity</th>
                                                <th>Product_Category</th>
                                                <th>Product_Type</th>
                                                <th>Product_Metal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once ('DB.php');
                                            $sql = "SELECT * FROM products where p_id=$p_id";
                                            $result = mysqli_query($conn, $sql);
                                            // output data of each row
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row ['p_name']; ?></td>
                                                    <td><?php echo $row ['height']; ?></td>
                                                    <td><?php echo $row ['width']; ?></td>
                                                    <td><?php echo $row ['length']; ?></td>
                                                    <td><?php echo $row ['purity']; ?></td>
                                                    <td><?php echo $row ['p_category']; ?></td>
                                                    <td><?php echo $row ['p_type']; ?></td>
                                                    <td>
                                                        <ul style="list-style-type: none;padding-left: 0px;padding-bottom: 20px;">
                                                            <?php
                                                            $metal_array = $row ['metal'];
                                                            $metal_list = explode('^', $metal_array);
                                                            for ($x = 0; $x < count($metal_list); $x++) {
                                                                $elements_var = $metal_list[$x];
                                                                ?>
                                                                <li><?php echo $elements_var ?></li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
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

                        <div class="card">
                            <div class="header">
                                <h2>
                                    Product Image
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <?php
                                        $sql_img = "SELECT * FROM product_img where p_id='$p_id'";
                                        $result_img = mysqli_query($conn, $sql_img);
                                        // output data of each row
                                        while ($row_img = mysqli_fetch_array($result_img)) {
                                            ?>
                                            <div class="col-md-3" style="text-align: -webkit-center">
                                                <img src="<?php echo $row_img["thumbnail"]; ?>" class="img-responsive text-center"/>
                                                <div style="margin-top: 30px">
                                                    <a class="btn bg-purple btn-circle waves-effect waves-circle waves-float" href="delete_product_img?id=<?php echo $row_img ["id"]; ?>&p_id=<?php echo $p_id ?>" title="Delete Project Image">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <a href="delete_product?p_id=<?php echo $p_id ?>" class="btn btn-block bg-pink waves-effect">Delete Complete Product</a>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <a href="view_products" class="btn btn-block bg-pink waves-effect">Cancel</a>
                                    </div>
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
