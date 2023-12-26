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
                <?php
                $o_id = isset($_GET['o_id']) ? $_GET['o_id'] : '';
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
                <!-- Basic Examples -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Order Details
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <?php
                                    require_once ('DB.php');
                                    $sql = "SELECT * FROM order_details where id='$o_id'";
                                    $result = mysqli_query($conn, $sql);
                                    // output data of each row
                                    while ($row = mysqli_fetch_array($result)) {
                                        $o_id = $row["id"];
                                        $order_p_id_array = $row ['p_id'];
                                        $order_p_id_list = explode('^', $order_p_id_array);

                                        $order_p_img_array = $row ['p_img'];
                                        $order_p_img_list = explode('^', $order_p_img_array);

                                        $order_p_name_array = $row ['p_name'];
                                        $order_p_name_list = explode('^', $order_p_name_array);

                                        $order_p_price_array = $row ['p_price'];
                                        $order_p_price_list = explode('^', $order_p_price_array);

                                        $order_p_qty_array = $row ['qty'];
                                        $order_p_qty_list = explode('^', $order_p_qty_array);

                                        $order_p_size_array = $row ['size'];
                                        $order_p_size_list = explode('^', $order_p_size_array);
                                        for ($x = 0; $x < count($order_p_img_list); $x++) {
                                            if ($order_p_name_list[$x] !== "") {
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="row">                                                        
                                                        <div class="col-md-12">
                                                            <label for="pack_of">Product Image</label>
                                                            <div class="form-group">
                                                                <img style="width: 100px" src="<?php echo $order_p_img_list[$x] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="product_title">Product Name</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" value="<?php echo trim($order_p_name_list[$x]) ?>" name="product_title" disabled required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="discounted_price">Price</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" value="<?php echo trim($order_p_price_list[$x]) ?>" name="discounted_price" disabled required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="product_category">Quantity</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" value="<?php echo trim($order_p_qty_list[$x]) ?>" name="product_category" disabled required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="setwise_single">Size</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" value="<?php echo trim($order_p_size_list[$x]) ?>" name="setwise_single" disabled required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="col-md-12">
                                            <fieldset><legend>Shipping Details</legend>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="service_name">First Name</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['b_fname']; ?>" name="fname" disabled required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="service_name">Last Name</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['b_lname']; ?>" name="lname" disabled required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="service_name">Mobile Number</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['b_phone']; ?>" name="mobile" disabled required>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="col-md-3">
                                                        <label for="service_name">Alternate Mobile Number</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['b_aphone']; ?>" name="mobile" disabled required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="service_content">Shipping Address</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea style="resize: none" class="form-control" value="" name="address" disabled required><?php echo $row ['address_line1']; ?>, <?php echo $row ['address_line2']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="service_content">City</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['city']; ?>" name="p_city" disabled required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="service_content">Pincode</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['pincode']; ?>" name="p_pincode" disabled required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="service_content">State</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" value="<?php echo $row ['state']; ?>" name="p_state" disabled required>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="col-md-12">
                                                        <label for="service_content">Delivery Status: <span style="color: green"><?php echo $row ['order_status']; ?></span></label>
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xs-12">
                                                        <?php
                                                        if ($row ['order_status'] === 'Pending') {
                                                            ?>
                                                            <a class="btn btn-block bg-purple waves-effect" href="add_order_awb?ot_id=<?php echo $row ['id']; ?>&order_status=Accepted&b_id=<?php echo $row ['b_id']; ?>" type="button">Accept Order</a>
                                                            <?php
                                                        } else if ($row ['order_status'] === 'Accepted') {
                                                            ?>
                                                            
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Exportable Table -->
            </div>
        </section>
        <?php
        include 'admin_footer.php';
        ?>
    </body>
</html>