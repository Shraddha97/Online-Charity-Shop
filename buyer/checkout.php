<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headerlink.php';
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id= $_SESSION['buyer_session'];
            if($buyer_id !== $b_id){
                header("location:checkout.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
    </head>
    <body>
        <!-- Header section end -->
        <?php
        include 'header.php';
        ?>
        <section class="section-sm">
            <div class="container">
                <?php
        $success = isset($_GET['success']) ? $_GET['success'] : '';
        $failed = isset($_GET['failed']) ? $_GET['failed'] : '';
        if ($success != NULL) {
            ?>
            <div class="alert alert-success text-left"><strong><i class="fa fa-check"></i> Success !</strong>  <?php echo $success ?> </div>
            <?php
        }
        if ($failed != NULL) {
            ?>
            <div class="alert alert-danger text-left"><strong><i class="fa fa-warning"></i> Error !</strong>  <?php echo $failed ?> </div>
            <?php
        }
        ?>
                <div class="section-title text-uppercase">
                    <h2>Checkout</h2>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <?php
                        echo $failed;
                        require_once ('DB.php');
                        $sql_count = "SELECT COUNT(*) as buyer_id FROM buyer_details where b_id=$b_id";
                        $result_count = mysqli_query($conn, $sql_count);
                        while ($row_count = mysqli_fetch_array($result_count)) {
                            $p_count = $row_count['buyer_id'];
                        }
                        if ($p_count < 1) {
                            ?>
                            <form class="contact-form" action="insert_order?b_id=<?php echo $b_id ?>" method="post" enctype="multipart/form-data">
                                <div class="cf-title">Contact Information</div>
                                <div class="row address-inputs">
                                    <?php
                                    $cart_total_price = 0;
                                    $sql_cart = "SELECT * FROM cart where b_id=$b_id";
                                    $result_cart = mysqli_query($conn, $sql_cart);
                                    // set array
                                    $array_pid = array();
                                    $array_pname = array();
                                    $array_price = array();
                                    $array_qty = array();
                                    $array_size = array();
                                    // output data of each row
                                    while ($row_cart = mysqli_fetch_array($result_cart)) {
                                        $array_pid[] = $row_cart['p_id'];
                                        $array_pname[] = $row_cart['p_name'];
                                        $array_price[] = $row_cart['p_price'];
                                        $array_img[] = $row_cart['p_img'];
                                        $array_qty[] = $row_cart['quantity'];
                                        $array_size[] = $row_cart['size'];
                                        $cart_total_price += $row_cart ['total_amt'];
                                    }
                                    ?>
                                    <input type="hidden" name="b_id" value="<?php echo $b_id ?>"/>
                                    <input type="hidden" name="p_id" value="
                                    <?php
                                    foreach ($array_pid as $cart_pid) {
                                        echo "$cart_pid" . "^";
                                    }
                                    ?>" />
                                    <input type="hidden" name="p_name" value="
                                    <?php
                                    foreach ($array_pname as $cart_pname) {
                                        echo "$cart_pname" . "^";
                                    }
                                    ?>" />                                
                                    <input type="hidden" name="p_price" value="
                                    <?php
                                    foreach ($array_price as $cart_price) {
                                        echo "$cart_price" . "^";
                                    }
                                    ?>" />
                                    <input type="hidden" name="p_img" value="
                                    <?php
                                    foreach ($array_img as $cart_img) {
                                        echo "$cart_img" . "^";
                                    }
                                    ?>" />
                                    <input type="hidden" name="qty" value="
                                    <?php
                                    foreach ($array_qty as $cart_qty) {
                                        echo "$cart_qty" . "^";
                                    }
                                    ?>" />
                                    <input type="hidden" name="size" value="
                                    <?php
                                    foreach ($array_size as $cart_size) {
                                        echo "$cart_size" . "^";
                                    }
                                    ?>" />
                                    <input type="hidden" name="total_amt" value="<?php echo $cart_total_price ?>" />
                                    <div class="col-md-6">
                                        <input type="text" placeholder="First Name *" name="checkout_fname" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Last Name *" name="checkout_lname" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" placeholder="Phone Number *" name="checkout_phone" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" placeholder="Alternate Phone Number" name="checkout_phone_a">
                                    </div>
                                    <?php
                                    $sql_buyer_email = "SELECT * FROM buyer_register where b_id='$b_id'";
                                    $result_buyer_email = mysqli_query($conn, $sql_buyer_email);
                                    // output data of each row
                                    while ($row_buyer_email = mysqli_fetch_array($result_buyer_email)) {
                                        ?>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="Email Address" name="checkout_email" value="<?php echo $row_buyer_email['b_email']; ?>" required="" disabled="">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="cf-title">Shipping Address</div>
                                <div class="row address-inputs">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Address Line 1" name="checkout_address1" required="">
                                        <input type="text" placeholder="Address Line 2" name="checkout_address2">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" placeholder="Zip code" name="checkout_zip" required="">
                                    </div>
                                    <div class="col-md-6">                                  
                                        <input type="text" placeholder="City" name="checkout_city" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="checkout_state" id="checkout_state" required="">
                                            <option value="">State</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Ladakh">Ladakh</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>                                
                                    <div class="col-md-6">
                                        <select name="checkout_country">
                                            <option value="India" selected="">India</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="site-btn submit-order-btn">Place Order</button>
                            </form>
                            <?php
                        } else {
                            ?>
                            <?php
                            $sql_shipping_details = "SELECT * FROM buyer_details where b_id=$b_id";
                            $result_shipping_details = mysqli_query($conn, $sql_shipping_details);
                            while ($row_shipping_details = mysqli_fetch_array($result_shipping_details)) {
                                ?>
                                <form class="contact-form" action="insert_order?b_id=<?php echo $b_id ?>" method="post" enctype="multipart/form-data">
                                    <div class="cf-title">Contact Information</div>
                                    <div class="row address-inputs">
                                        <?php
                                        $cart_total_price = 0;
                                        $sql_cart = "SELECT * FROM cart where b_id=$b_id";
                                        $result_cart = mysqli_query($conn, $sql_cart);
                                        // set array
                                        $array_pid = array();
                                        $array_pname = array();
                                        $array_price = array();
                                        $array_qty = array();
                                        $array_size = array();
                                        // output data of each row
                                        while ($row_cart = mysqli_fetch_array($result_cart)) {
                                            $array_pid[] = $row_cart['p_id'];
                                            $array_pname[] = $row_cart['p_name'];
                                            $array_price[] = $row_cart['p_price'];
                                            $array_img[] = $row_cart['p_img'];
                                            $array_qty[] = $row_cart['quantity'];
                                            $array_size[] = $row_cart['size'];
                                            $cart_total_price += $row_cart ['total_amt'];
                                        }
                                        ?>
                                        <input type="hidden" name="b_id" value="<?php echo $b_id ?>"/>
                                        <input type="hidden" name="p_id" value="
                                        <?php
                                        foreach ($array_pid as $cart_pid) {
                                            echo "$cart_pid" . "^";
                                        }
                                        ?>" />
                                        <input type="hidden" name="p_name" value="
                                        <?php
                                        foreach ($array_pname as $cart_pname) {
                                            echo "$cart_pname" . "^";
                                        }
                                        ?>" />                                
                                        <input type="hidden" name="p_price" value="
                                        <?php
                                        foreach ($array_price as $cart_price) {
                                            echo "$cart_price" . "^";
                                        }
                                        ?>" />
                                        <input type="hidden" name="p_img" value="
                                        <?php
                                        foreach ($array_img as $cart_img) {
                                            echo "$cart_img" . "^";
                                        }
                                        ?>" />
                                        <input type="hidden" name="qty" value="
                                        <?php
                                        foreach ($array_qty as $cart_qty) {
                                            echo "$cart_qty" . "^";
                                        }
                                        ?>" />
                                        <input type="hidden" name="size" value="
                                        <?php
                                        foreach ($array_size as $cart_size) {
                                            echo "$cart_size" . "^";
                                        }
                                        ?>" />
                                        <input type="hidden" name="total_amt" value=" <?php echo $cart_total_price ?>" />
                                        
                                        <div class="col-md-6">
                                            <input type="text" placeholder="First Name *" value="<?php echo $row_shipping_details["b_fname"]; ?>" name="checkout_fname" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Last Name *" value="<?php echo $row_shipping_details["b_lname"]; ?>" name="checkout_lname" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="Phone Number *" value="<?php echo $row_shipping_details["b_phone"]; ?>" name="checkout_phone" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="Alternate Phone Number" value="<?php echo $row_shipping_details["b_aphone"]; ?>" name="checkout_phone_a">
                                        </div>
                                        <?php
                                        $sql_buyer_email = "SELECT * FROM buyer_register where b_id='$b_id'";
                                        $result_buyer_email = mysqli_query($conn, $sql_buyer_email);
                                        // output data of each row
                                        while ($row_buyer_email = mysqli_fetch_array($result_buyer_email)) {
                                            ?>
                                            <div class="col-md-12">
                                                <input type="hidden" name="checkout_email" value="<?php echo $row_buyer_email['b_email']; ?>" />
                                                <input type="email" placeholder="Email Address" value="<?php echo $row_buyer_email['b_email']; ?>" required="" disabled="">
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="cf-title">Shipping Address</div>
                                    <div class="row address-inputs">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Address Line 1" name="checkout_address1" value="<?php echo $row_shipping_details["address_line_1"]; ?>" required="">
                                            <input type="text" placeholder="Address Line 2" name="checkout_address2" value="<?php echo $row_shipping_details["address_line_2"]; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" placeholder="Zip code" name="checkout_zip" required="" value="<?php echo $row_shipping_details["pincode"]; ?>">
                                        </div>
                                        <div class="col-md-6">                                  
                                            <input type="text" placeholder="City" name="checkout_city" required="" value="<?php echo $row_shipping_details["city"]; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <select name="checkout_state" id="checkout_state" required="">
                                                <option value="">State</option>
                                                <option <?php if ($row_shipping_details['state'] === "Andaman and Nicobar Islands") { ?> selected=""  <?php } ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                <option <?php if ($row_shipping_details['state'] === "Andhra Pradesh") { ?> selected=""  <?php } ?> value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Arunachal Pradesh") { ?> selected=""  <?php } ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Assam") { ?> selected=""  <?php } ?> value="Assam">Assam</option>
                                                <option <?php if ($row_shipping_details['state'] === "Bihar") { ?> selected=""  <?php } ?> value="Bihar">Bihar</option>
                                                <option <?php if ($row_shipping_details['state'] === "Chandigarh") { ?> selected=""  <?php } ?> value="Chandigarh">Chandigarh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Chattisgarh") { ?> selected=""  <?php } ?> value="Chattisgarh">Chhattisgarh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Dadra and Nagar Haveli") { ?> selected=""  <?php } ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                <option <?php if ($row_shipping_details['state'] === "Daman and Diu") { ?> selected=""  <?php } ?> value="Daman and Diu">Daman and Diu</option>
                                                <option <?php if ($row_shipping_details['state'] === "Delhi") { ?> selected=""  <?php } ?> value="Delhi">Delhi</option>
                                                <option <?php if ($row_shipping_details['state'] === "Goa") { ?> selected=""  <?php } ?> value="Goa">Goa</option>
                                                <option <?php if ($row_shipping_details['state'] === "Gujarat") { ?> selected=""  <?php } ?> value="Gujarat">Gujarat</option>
                                                <option <?php if ($row_shipping_details['state'] === "Haryana") { ?> selected=""  <?php } ?> value="Haryana">Haryana</option>
                                                <option <?php if ($row_shipping_details['state'] === "Himachal Pradesh") { ?> selected=""  <?php } ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Jammu and Kashmir") { ?> selected=""  <?php } ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option <?php if ($row_shipping_details['state'] === "Jharkhand") { ?> selected=""  <?php } ?> value="Jharkhand">Jharkhand</option>
                                                <option <?php if ($row_shipping_details['state'] === "Karnataka") { ?> selected=""  <?php } ?> value="Karnataka">Karnataka</option>
                                                <option <?php if ($row_shipping_details['state'] === "Kerala") { ?> selected=""  <?php } ?> value="Kerala">Kerala</option>
                                                <option <?php if ($row_shipping_details['state'] === "Ladakh") { ?> selected=""  <?php } ?> value="Ladakh">Ladakh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Lakshadweep") { ?> selected=""  <?php } ?> value="Lakshadweep">Lakshadweep</option>
                                                <option <?php if ($row_shipping_details['state'] === "Madhya Pradesh") { ?> selected=""  <?php } ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Maharashtra") { ?> selected=""  <?php } ?> value="Maharashtra">Maharashtra</option>
                                                <option <?php if ($row_shipping_details['state'] === "Manipur") { ?> selected=""  <?php } ?> value="Manipur">Manipur</option>
                                                <option <?php if ($row_shipping_details['state'] === "Meghalaya") { ?> selected=""  <?php } ?> value="Meghalaya">Meghalaya</option>
                                                <option <?php if ($row_shipping_details['state'] === "Mizoram") { ?> selected=""  <?php } ?> value="Mizoram">Mizoram</option>
                                                <option <?php if ($row_shipping_details['state'] === "Nagaland") { ?> selected=""  <?php } ?> value="Nagaland">Nagaland</option>
                                                <option <?php if ($row_shipping_details['state'] === "Odisha") { ?> selected=""  <?php } ?> value="Odisha">Odisha</option>
                                                <option <?php if ($row_shipping_details['state'] === "Puducherry") { ?> selected=""  <?php } ?> value="Puducherry">Puducherry</option>
                                                <option <?php if ($row_shipping_details['state'] === "Punjab") { ?> selected=""  <?php } ?> value="Punjab">Punjab</option>
                                                <option <?php if ($row_shipping_details['state'] === "Rajasthan") { ?> selected=""  <?php } ?> value="Rajasthan">Rajasthan</option>
                                                <option <?php if ($row_shipping_details['state'] === "Sikkim") { ?> selected=""  <?php } ?> value="Sikkim">Sikkim</option>
                                                <option <?php if ($row_shipping_details['state'] === "Tamil Nadu") { ?> selected=""  <?php } ?> value="Tamil Nadu">Tamil Nadu</option>
                                                <option <?php if ($row_shipping_details['state'] === "Telangana") { ?> selected=""  <?php } ?> value="Telangana">Telangana</option>
                                                <option <?php if ($row_shipping_details['state'] === "Tripura") { ?> selected=""  <?php } ?> value="Tripura">Tripura</option>
                                                <option <?php if ($row_shipping_details['state'] === "Uttar Pradesh") { ?> selected=""  <?php } ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option <?php if ($row_shipping_details['state'] === "Uttarakhand") { ?> selected=""  <?php } ?> value="Uttarakhand">Uttarakhand</option>
                                                <option <?php if ($row_shipping_details['state'] === "West Bengal") { ?> selected=""  <?php } ?> value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>                                
                                        <div class="col-md-6">
                                            <select name="checkout_country">
                                                <option value="India" selected="">India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="site-btn submit-order-btn">Place Order</button>
                                </form>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2">
                        <div class="checkout-cart">
                            <h3>Your Cart</h3>
                            <ul class="product-list">
                                <?php
                                require_once ('DB.php');
                                $grand_price = 0;
                                $sql = "SELECT * FROM cart where b_id=$b_id";
                                $result = mysqli_query($conn, $sql);
                                // output data of each row
                                while ($row = mysqli_fetch_array($result)) {
                                    $p_id = $row ['p_id'];
                                    $id = $row ['id'];
                                    $size=$row['size'];
                                    ?>
                                    <li>
                                        <div class="pl-thumb"><img src="../<?php echo $row['p_img']; ?>" alt=""></div>
                                        <h6><?php echo $row['p_name']; ?></h6>
                                        <p>
                                            <strong>
                                                Size: 
                                            </strong>
                                            <?php
                                                echo $size;
                                                ?>
                                        </p>
                                        <?php
                                        if($size===""){
                                            ?>
        <script>window.location = "cart?failed=Please select the product size&b_id="+<?php echo $b_id?>;</script>
        <?php
                                        }else{
                                        
                                        }
                                    ?>
                                        <p><i class="fa fa-gbp"></i>&nbsp;
                                            <?php
                                            $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['p_price']);
                                            echo trim($product_price);
                                            ?>
                                        </p>
                                    </li>
                                    <?php
                                    $grand_price += $row ['total_amt'];
                                }
                                ?>
                            </ul>
                            <ul class="price-list">
                                <li>Total
                                    <span><i class="fa fa-gbp"></i>
                                        <?php
                                        $grand_total = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $grand_price);
                                        echo trim($grand_total);
                                        ?>
                                    </span>
                                </li>
                                <li>Delivery Charges <span>FREE</span></li>
                                <li class="total">Grand Total
                                    <span><i class="fa fa-gbp"></i>
                                        <?php
                                        echo trim($grand_total);
                                        ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>
        <!-- Footer section end -->
    </body>
    <?php
    include 'footerlink.php';
    ?>
</html>