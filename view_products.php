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
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Products
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Thumbnail</th>
                                                <th>Product_Title</th>
                                                <!--Fabric prev-->
                                                <th>Product_Description</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                <th>Product_Category</th>
                                                <th>Product_Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once ('DB.php');
                                            $sql = "SELECT * FROM products";
                                            $result = mysqli_query($conn, $sql);
                                            // output data of each row
                                            while ($row = mysqli_fetch_array($result)) {
                                                $p_id = $row ['p_id'];
                                                ?>
                                                <tr>
                                                    <?php
                                                    $sql_thumb = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                                    $result_thumb = mysqli_query($conn, $sql_thumb);
                                                    // output data of each row
                                                    while ($row_thumb = mysqli_fetch_array($result_thumb)) {
                                                        ?>
                                                        <td><img style="width: 100px" src="<?php echo $row_thumb ['thumbnail']; ?>"/></td>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td><?php echo $row ['p_name']; ?></td>
                                                    <td><?php echo $row ['fabric']; ?></td>
                                                    <td><?php echo $row ['brand_name']; ?></td>
                                                    <td><?php echo $row ['price']; ?></td>
                                                    <td><?php echo $row ['product_category']; ?></td>
                                                    <td><?php echo $row ['product_type']; ?></td>
                                                    <td style="vertical-align: middle">
                                                        <a class="btn bg-pink btn-circle waves-effect waves-circle waves-float" href="update_product?p_id=<?php echo $row ["p_id"]; ?>" title="Update Product">
                                                            <i class="material-icons">edit</i>
                                                        </a><br/><br/>
                                                        <a class="btn bg-purple btn-circle waves-effect waves-circle waves-float" href="view_product_details?p_id=<?php echo $row ["p_id"]; ?>" title="Delete Product">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
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
            </div>
        </section>
        <?php
        include 'admin_footer.php';
        ?>
    </body>
</html>