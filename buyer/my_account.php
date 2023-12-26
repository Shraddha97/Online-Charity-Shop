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
                header("location:my_account.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <section class="section-sm">
            <div class="container">
                <div class="section-title text-uppercase">
                    <h2>My Account</h2>
                    <span class="decor"></span>
                </div>
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
                <?php
                require_once ('DB.php');
                        $sql_count = "SELECT COUNT(*) as buyer_id FROM buyer_details where b_id=$b_id";
                        $result_count = mysqli_query($conn, $sql_count);
                        while ($row_count = mysqli_fetch_array($result_count)) {
                            $p_count = $row_count['buyer_id'];
                        }
                       if ($p_count < 1) {
                           ?>
                        <form class="contact-form" action="update_buyer_details.php" method="post" enctype="multipart/form-data">
                        <div class="cf-title">Personal Information <span><a id="personal_info_edit" class="" onclick="personal_info_edit();" href="javascript:void(0);">Edit <i class="fa fa-edit"></i></a><a id="personal_info_edit_cancel" class="hidden" onclick="personal_info_cancel();" href="javascript:void(0);">Cancel</a></span></div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="b_id" name="b_id" value="<?php echo $b_id ?>" />
                                <input type="text" placeholder="First Name *" value="" name="checkout_fname" id="checkout_fname" required="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Last Name *" value="" name="checkout_lname" id="checkout_lname" required="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="number" placeholder="Phone Number *" value="" name="checkout_phone" id="checkout_phone" required="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="number" placeholder="Alternate Phone Number" value="" name="checkout_phone_a" id="checkout_phone_a" disabled="">
                            </div>
                            <div class="col-md-2 offset-md-10 card-right">
                                <button class="site-btn submit-order-btn hidden" id="personal_btn" name="personal_btn" type="submit">Save</button>
                            </div>
                        </div>
                        <div class="cf-title">Manage Address <span><a id="address_info_edit" class="" onclick="manage_add_edit();" href="javascript:void(0);">Edit <i class="fa fa-edit"></i></a><a id="address_info_edit_cancel" class="hidden" onclick="manage_add_cancel();" href="javascript:void(0);">Cancel</a></span></div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Address Line 1" name="checkout_address1" id="checkout_address1" value="" required="" disabled="">
                                <input type="text" placeholder="Address Line 2" name="checkout_address2" id="checkout_address2" value="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Zip code" name="checkout_zip" id="checkout_zip" required="" value="" disabled="">
                            </div>
                            <div class="col-md-6">                                  
                                <input type="text" placeholder="City" name="checkout_city" id="checkout_city" required="" value="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <select name="checkout_state" id="checkout_state" required="" disabled="">
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
                                <select name="checkout_country" disabled="">
                                    <option value="India" selected="">India</option>
                                </select>
                            </div>
                            <div class="col-md-2 offset-md-10 card-right">
                                <button class="site-btn submit-order-btn hidden" id="address_btn" name="address_btn" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                <?php
                        } else {
                            
                $sql_shipping_details = "SELECT * FROM buyer_details where b_id=$b_id";
                $result_shipping_details = mysqli_query($conn, $sql_shipping_details);
                while ($row_shipping_details = mysqli_fetch_array($result_shipping_details)) {
                    ?>
                    <form class="contact-form" action="update_buyer_details.php" method="post" enctype="multipart/form-data">
                        <div class="cf-title">Personal Information <span><a id="personal_info_edit" class="" onclick="personal_info_edit();" href="javascript:void(0);">Edit <i class="fa fa-edit"></i></a><a id="personal_info_edit_cancel" class="hidden" onclick="personal_info_cancel();" href="javascript:void(0);">Cancel</a></span></div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="b_id" name="b_id" value="<?php echo $b_id ?>" />
                                <input type="text" placeholder="First Name *" value="<?php echo $row_shipping_details["b_fname"]; ?>" name="checkout_fname" id="checkout_fname" required="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Last Name *" value="<?php echo $row_shipping_details["b_lname"]; ?>" name="checkout_lname" id="checkout_lname" required="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="number" placeholder="Phone Number *" value="<?php echo $row_shipping_details["b_phone"]; ?>" name="checkout_phone" id="checkout_phone" required="" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="number" placeholder="Alternate Phone Number" value="<?php echo $row_shipping_details["b_aphone"]; ?>" name="checkout_phone_a" id="checkout_phone_a" disabled="">
                            </div>
                            <div class="col-md-2 offset-md-10 card-right">
                                <button class="site-btn submit-order-btn hidden" id="personal_btn" name="personal_btn" type="submit">Save</button>
                            </div>
                        </div>
                        <div class="cf-title">Manage Address <span><a id="address_info_edit" class="" onclick="manage_add_edit();" href="javascript:void(0);">Edit <i class="fa fa-edit"></i></a><a id="address_info_edit_cancel" class="hidden" onclick="manage_add_cancel();" href="javascript:void(0);">Cancel</a></span></div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="Address Line 1" name="checkout_address1" id="checkout_address1" value="<?php echo $row_shipping_details["address_line_1"]; ?>" required="" disabled="">
                                <input type="text" placeholder="Address Line 2" name="checkout_address2" id="checkout_address2" value="<?php echo $row_shipping_details["address_line_2"]; ?>" disabled="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Zip code" name="checkout_zip" id="checkout_zip" required="" value="<?php echo $row_shipping_details["pincode"]; ?>" disabled="">
                            </div>
                            <div class="col-md-6">                                  
                                <input type="text" placeholder="City" name="checkout_city" id="checkout_city" required="" value="<?php echo $row_shipping_details["city"]; ?>" disabled="">
                            </div>
                            <div class="col-md-6">
                                <select name="checkout_state" id="checkout_state" required="" disabled="">
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
                                <select name="checkout_country" disabled="">
                                    <option value="India" selected="">India</option>
                                </select>
                            </div>
                            <div class="col-md-2 offset-md-10 card-right">
                                <button class="site-btn submit-order-btn hidden" id="address_btn" name="address_btn" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                }
                ?>
            </div>
        </section>
        <!-- Header section end -->
        <?php
        include 'footer.php';
        ?>
        <!-- Footer section end -->
    </body>
    <?php
    include 'footerlink.php';
    ?>
    <script>
        function personal_info_edit() {
            document.getElementById("checkout_fname").removeAttribute("disabled");
            document.getElementById("checkout_lname").removeAttribute("disabled");
            document.getElementById("checkout_phone").removeAttribute("disabled");
            document.getElementById("checkout_phone_a").removeAttribute("disabled");
            $("#personal_info_edit").addClass('hidden');
            $("#personal_btn").removeClass('hidden');
            $("#personal_info_edit_cancel").removeClass('hidden');
        }
        function personal_info_cancel() {
            document.getElementById("checkout_fname").setAttribute("disabled", "");
            document.getElementById("checkout_lname").setAttribute("disabled", "");
            document.getElementById("checkout_phone").setAttribute("disabled", "");
            document.getElementById("checkout_phone_a").setAttribute("disabled", "");
            $("#personal_info_edit").removeClass('hidden');
            $("#personal_btn").addClass('hidden');
            $("#personal_info_edit_cancel").addClass('hidden');
        }

        function manage_add_edit() {
            document.getElementById("checkout_address1").removeAttribute("disabled");
            document.getElementById("checkout_address2").removeAttribute("disabled");
            document.getElementById("checkout_zip").removeAttribute("disabled");
            document.getElementById("checkout_city").removeAttribute("disabled");
            document.getElementById("checkout_state").removeAttribute("disabled");
            $("#address_info_edit").addClass('hidden');
            $("#address_btn").removeClass('hidden');
            $("#address_info_edit_cancel").removeClass('hidden');
        }
        function manage_add_cancel() {
            document.getElementById("checkout_address1").setAttribute("disabled", "");
            document.getElementById("checkout_address2").setAttribute("disabled", "");
            document.getElementById("checkout_zip").setAttribute("disabled", "");
            document.getElementById("checkout_city").setAttribute("disabled", "");
            document.getElementById("checkout_state").setAttribute("disabled", "");
            $("#address_info_edit").removeClass('hidden');
            $("#address_btn").addClass('hidden');
            $("#address_info_edit_cancel").addClass('hidden');
        }
    </script>
</html>