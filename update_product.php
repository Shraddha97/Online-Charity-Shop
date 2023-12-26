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
                margin-bottom: 0;
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
                <div>
                    <?php
                    $p_id = isset($_GET['p_id']) ? $_GET['p_id'] : '';
                    require_once ('DB.php');
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


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
                                            $img_id = $row_img["id"];
                                            ?>
                                            <div class="col-md-3" style="border: 1px solid rgba(204, 204, 204, 0.35);padding: 10px;text-align: -webkit-center">
                                                <img src="<?php echo $row_img["image"]; ?>" class="img-responsive"/>                                                    
                                                <div class="col-md-12 text-center" style="margin-top: 20px;">
                                                    <a class="btn bg-purple btn-circle waves-effect waves-circle waves-float" href="javascript:void(0);" data-toggle="modal" data-target="#product_img_update_<?php echo $row_img["id"]; ?>">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Update Image Modal -->
                                            <div class="modal fade" id="product_img_update_<?php echo $row_img["id"]; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="defaultModalLabel">Update Product Image</h4>
                                                        </div>
                                                        <form action="updating_product?p_id=<?php echo $p_id ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label>Product Image</label>
                                                                                <input type="hidden" name="img_id" value="<?php echo $img_id ?>"/>
                                                                                <input type="file" name="p_img" id="p_img" class="form-control" required="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-link waves-effect" name="update_product_img">UPLOAD</button>
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <h2>
                                    Product Thumbnail Image
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <?php
                                        $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id'";
                                        $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                        // output data of each row
                                        while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                            $img_id = $row_thumb_img['id'];
                                            ?>
                                            <div class="col-md-3" style="border: 1px solid rgba(204, 204, 204, 0.35);padding: 10px;text-align: -webkit-center">
                                                <img src="<?php echo $row_thumb_img["thumbnail"]; ?>" class="img-responsive"/>                                                    
                                                <div class="col-md-12 text-center" style="margin-top: 20px;">
                                                    <a class="btn bg-purple btn-circle waves-effect waves-circle waves-float" href="javascript:void(0);" data-toggle="modal" data-target="#product_thumb_update_<?php echo $row_thumb_img["id"]; ?>">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Update Thumbnail Image Modal -->
                                            <div class="modal fade" id="product_thumb_update_<?php echo $row_thumb_img["id"]; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="defaultModalLabel">Update Product Thumbnail Image</h4>
                                                        </div>
                                                        <form action="updating_product?p_id=<?php echo $p_id ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label>Project Thumbnail Image</label>
                                                                                <input type="hidden" name="img_id" value="<?php echo $img_id ?>"/>
                                                                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" required="">
                                                                            </div>
                                                                            <p class="note">Image Size should be less than <strong>100KB</strong></p>
                                                                            <p class="note">Image Dimension <strong>400X620</strong> (in pixels)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-link waves-effect" name="update_thumb_img">UPLOAD</button>
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <h2>
                                    Product Information
                                </h2>
                            </div>
                            <div class="body">
                                <?php
                                $sql_p = "SELECT * FROM products where p_id='$p_id'";
                                $result_p = mysqli_query($conn, $sql_p);
                                // output data of each row
                                while ($row_p = mysqli_fetch_array($result_p)) {
                                    ?>
                                    <form action="updating_product?p_id=<?php echo $p_id ?>" method="post" enctype="multipart/form-data">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <label for="p_name">Product Title</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="p_name" placeholder="" value="<?php echo $row_p['p_name']; ?>" required="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="fabric">Product Fabric</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="fabric" placeholder="" value="<?php echo $row_p['fabric']; ?>" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="brand_name">Product Brand</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="brand_name" placeholder="" value="<?php echo $row_p['brand_name']; ?>" required="">
                                                        </div>
                                                    </div>
                                                </div>                                            
                                                <div class="col-md-4">
                                                    <label for="price">Product Price</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="price" placeholder="" value="<?php echo $row_p['price']; ?>" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Product Size</label><br/><br/>
                                                    <div class="demo-checkbox">
                                                        <?php
                                                        $size_array = $row_p ['size'];
                                                        $size_list = explode('^', $size_array);
                                                        ?>
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="size[]" <?php if (in_array("XS", $size_list)) { ?> checked="checked" <?php } ?> value="XS" id="XS" class="chk-col-purple" />
                                                            <label for="XS">X-Small</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="size[]" <?php if (in_array("S", $size_list)) { ?> checked="checked" <?php } ?> value="S" id="S" class="chk-col-purple" />
                                                            <label for="S">Small</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="size[]" <?php if (in_array("M", $size_list)) { ?> checked="checked" <?php } ?> value="M" id="M" class="chk-col-purple" />
                                                            <label for="M">Medium</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="size[]" <?php if (in_array("L", $size_list)) { ?> checked="checked" <?php } ?> value="L" id="L" class="chk-col-purple" />
                                                            <label for="L">Large</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="size[]" <?php if (in_array("XL", $size_list)) { ?> checked="checked" <?php } ?> value="XL" id="XL" class="chk-col-purple" />
                                                            <label for="XL">X-Large</label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="size[]" <?php if (in_array("XXL", $size_list)) { ?> checked="checked" <?php } ?> value="XXL" id="XXL" class="chk-col-purple" />
                                                            <label for="XXL">XX-Large</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="product_keywords">Product Keywords</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea class="form-control" name="product_keywords" required=""><?php echo $row_p['keywords']; ?></textarea>
                                                        </div>
                                                        <p class="note">Seperate keyword using <strong>^</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-xs-12 col-md-3 col-lg-3">
                                                <input class="btn btn-block bg-purple waves-effect" type="submit" value="Update Information" name="update_product_info">
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                                ?>
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
    <script>
        $("#check_all").click(function () {
            $(".chk-col-purple").prop('checked', $(this).prop('checked'));
        });

        var content;
        $('.txt-count').on('keyup', function () {
            // count words
            var words = $(this).val().length;
            // limit message
            if (words >= 61) {
                $(this).val(content);
                $('#myWordCount').text("0 Character left");
                alert('Number of characters should be less than 60');
            } else if (words === 59) {
                $('#myWordCount').text("1 Character left");
            } else {
                $('#myWordCount').text((60 - words) + " Characters Left");
                content = $(this).val();
            }
        });
    </script>
</html>
