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
                header("location:my_orders.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
        <style>
            .orders_div h5,.orders_div h6{
                margin-bottom: 1rem;
            }
            .orders_div .card {
                border: 1px solid #f5a619;
                padding:10px 10px 10px 0px;
                box-shadow: 0 1px 12px 2px #dbdbdb;
                transition-duration: 0.2s;
                transition-delay: 0.1s;
            }
            .orders_div .card {
                margin-bottom: 10px;
            }
            .orders_div a:hover .card {
                transform: scale(1.03);
                transition-duration: 0.2s;
                transition-delay: 0.1s;
                box-shadow: 0 1px 12px 2px #f5a619;
            }
            .orders_div img{
                width: 100px;
            }
            @media(max-width: 480px){
                .orders_div img{
                    margin-bottom: 20px;
                }
                .orders_div h5, .orders_div p, .orders_div h6{
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <!-- Header section end -->

        <section class="section-sm">
            <div class="container">
                <div class="section-title text-uppercase">
                    <h2>My Orders</h2>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <div class="orders_div col-md-10 offset-md-1">
                        <?php
                        require_once ('DB.php');
                        $sql = "SELECT * FROM order_details where b_id=$b_id order by id desc";
                        $result = mysqli_query($conn, $sql);
                        // output data of each row
                        while ($row = mysqli_fetch_array($result)) {
                            $o_id = $row["id"];
                            if($row['payment_id']!==""){
                            $order_p_id_array = $row ['p_id'];
                            $order_p_id_list = explode('^', $order_p_id_array);

                            $order_p_img_array = $row ['p_img'];
                            $order_p_img_list = explode('^', $order_p_img_array);

                            $order_p_name_array = $row ['p_name'];
                            $order_p_name_list = explode('^', $order_p_name_array);

                            $order_p_price_array = $row ['p_price'];
                            $order_p_price_list = explode('^', $order_p_price_array);

                            $order_p_size_array = $row ['size'];
                            $order_p_size_list = explode('^', $order_p_size_array);
                            
                            $order_p_qty_array = $row ['qty'];
                            $order_p_qty_list = explode('^', $order_p_qty_array);

                            for ($x = 0; $x < count($order_p_img_list); $x++) {
                                if ($order_p_name_list[$x] !== "") {
                                    ?>
                                    <a href="order_details?o_id=<?php echo $o_id ?>&p_name=<?php echo trim($order_p_name_list[$x]) ?>&p_id=<?php echo trim($order_p_id_list[$x]) ?>&b_id=<?php echo $b_id ?>">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-2 text-center">
                                                    <img src="../<?php echo trim($order_p_img_list[$x]) ?>" alt="">
                                                </div>
                                                <div class="col-md-4">
                                                    <h5><?php echo $order_p_name_list[$x] ?></h5>
                                                    <p>Size: <?php echo $order_p_size_list[$x] ?></p>
                                                    <p>Quanity: <?php echo $order_p_qty_list[$x] ?></p>
                                                </div>
                                                <div class="col-md-2">
                                                    <h5 class="order_price"><i class="mdi mdi-currency-gbp"></i>
                                                        <?php
                                                        $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $order_p_price_list[$x]);
                                                        echo trim($product_price);
                                                        ?>
                                                    </h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="delivery_status_txt">Delivery expected within 7 days.</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                            }
                            }
                        }
                        ?>
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