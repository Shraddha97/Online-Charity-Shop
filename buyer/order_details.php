<!doctype html>
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <?php
        include 'headerlink.php';
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id= $_SESSION['buyer_session'];
            if($buyer_id !== $b_id){
                header("location:order_details.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
        <style>
            .back{
                margin-top: 30px;
                margin-bottom: 30px;
                display: block;
                font-weight: bold;
                color: transparent;
                -webkit-background-clip: text;
                background-image: linear-gradient(to bottom, #f5a619 25%, rgb(247, 78, 27) 100%);
            }
            .orders_details_div .card{
                margin-bottom: 10px;
            }
            .orders_details_div .card{
                border: 1px solid #f5a619;
                padding: 20px;
                box-shadow: 0 1px 12px 2px #f5a619;
                transition-duration: 0.2s;
                transition-delay: 0.1s;
            }
            .orders_details_div .card h4{
                text-transform: none;
                font-weight: bold;
                color: #333;
                font-size: 18px;
                margin-bottom: 1rem;
            }
            .orders_details_div .card h6{
                margin: 0;
                font-size: 16px;
                font-weight: bold;
                text-transform: none;                
                color: #333;
            }
            .orders_details_div .card .address_txt{
                margin: 0 0 10px;
                color: #333;
                font-size: 14px;
                font-weight: bold
            }
            .orders_details_div .card p{
                color: #555;
                font-size: 14px;
                display: inline-flex;
                margin: 0;
                margin-bottom: 10px !important;
            }
            .orders_details_div .card a:hover h4{
                color: #333;
            }
            .orders_details_div .card a:hover img{
                opacity: 0.8;
            }
            @media (max-width: 767px) {
                .orders_details_div img{
                    margin-bottom: 10px;
                    width: 200px
                }
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <?php
        $ot_id = isset($_GET['o_id']) ? $_GET['o_id'] : '';
        $o_pname = isset($_GET['p_name']) ? $_GET['p_name'] : '';
        include 'header.php';
        ?>
        <section class="section-sm">
            <div class="container">
                <div class="section-title text-uppercase">
                    <h2>Order Details</h2>
                    <span class="decor"></span>
                </div>

                <div class="orders_details_div">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="back" href="my_orders?b_id=<?php echo $b_id ?>"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        </div>
                    </div>
                    <div class="row">

                        <?php
                        require_once ('DB.php');
                        $sql = "SELECT * FROM order_details where b_id=$b_id and id=$ot_id";
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
                                if (trim($order_p_name_list[$x]) === "$o_pname") {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2 text-center">
                                                            <a href="product_details?p_id=<?php echo trim($order_p_id_list[$x]); ?>&b_id=<?php echo $b_id ?>">
                                                                <img src="../<?php echo trim($order_p_img_list[$x]) ?>" alt = "">
                                                            </a>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <a href="javascript:void(0);"><h4><?php echo $order_p_name_list[$x] ?></h4></a>
                                                            <p><strong>Size : &nbsp;</strong> <?php echo $order_p_size_list[$x] ?></p><br/>
                                                            <p><strong>Quantity : &nbsp;</strong> <?php echo $order_p_qty_list[$x] ?></p>
                                                            <h4><i class = "mdi mdi-currency-gbp"></i> 
                                                                <?php
                                                                $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $order_p_price_list[$x]);
                                                                echo trim($product_price);
                                                                ?>
                                                            </h4>
                                                        </div>
                                                        <div class ="col-md-6">
                                                            <h4>Delivery Address</h4>
                                                            <h6 class="delivery_status_txt"><?php echo $row ['b_fname'] ?>&nbsp;<?php echo $row ['b_lname'] ?></h6>
                                                            <p class="address_txt"><?php echo $row ['address_line1'] ?>,<?php echo $row ['address_line2'] ?>&nbsp;<?php echo $row ['city'] ?> - <?php echo $row ['pincode'] ?>, <?php echo $row ['state'] ?>, <?php echo $row ['country'] ?></p>
                                                            <h6 class="delivery_status_txt" style="padding: 0">Phone Number</h6>
                                                            <p class="address_txt">
                                                                <?php echo $row ['b_phone'] ?>; <?php echo $row ['b_aphone'] ?>
                                                            </p>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<input type="hidden" class="b_id" value="<?php echo $b_id ?>" />
<?php
include 'footer.php';
?>
</body>
<?php
include 'footerlink.php';
?>
</html>