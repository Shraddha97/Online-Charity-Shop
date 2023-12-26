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
                header("location:cart.php?b_id=$buyer_id");
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
        <section class="cart-section spad">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <h3>Your Cart</h3>
                            <?php
                            require_once ('DB.php');
                            $sql_cart_p = "SELECT COUNT(*) buyer_id FROM cart where b_id='$b_id'";
                            $result_cart_p = mysqli_query($conn, $sql_cart_p);
                            while ($row_cart_p = mysqli_fetch_array($result_cart_p)) {
                                $buyer_cart = $row_cart_p['buyer_id'];
                                if ($buyer_cart < 1) {
                                    ?>
                                    <div id="col-main" class="col-md-24 cart-page content">
                                        <p class="cart empty">Your shopping cart is empty.</p>
                                        <a href="home?b_id=<?php echo $b_id ?>" class="site-btn sb-dark">Continue shopping</a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="cart-table-warp" style="overflow: auto !important;">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-th">Items</th>
                                                    <th class="quy-th">Quantity</th>
                                                    <th class="size-th">Size</th>
                                                    <th class="total-th">Subtotal</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $grand_price = 0;
                                                $sql = "SELECT * FROM cart where b_id=$b_id";
                                                $result = mysqli_query($conn, $sql);
                                                // output data of each row
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $p_id = $row ['p_id'];
                                                    $id = $row ['id'];
                                                    $product_size_cart = $row['size'];
                                                    ?>
                                                    <tr>
                                                        <td class="product-col">
                                                            <img src="../<?php echo $row['p_img']; ?>" alt="">
                                                            <div class="pc-title">
                                                                <h4><?php echo $row['p_name']; ?></h4>
                                                                <input type="hidden" class="id" value="<?php echo $id; ?>" />
                                                                <input type="hidden" class="pid" value="<?php echo $p_id; ?>" />
                                                                <input type="hidden" class="p_price" value="<?php echo $row['p_price']; ?>" />
                                                                <p>
                                                                    <i class="fa fa-gbp"></i>&nbsp;
                                                                    <?php
                                                                    $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row['p_price']);
                                                                    echo trim($product_price);
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="quy-col">
                                                            <div class="quantity">
                                                                <select class="form-control itemQty" name="product_qty">
                                                                    <option value="1" <?php if ($row['quantity'] === "1") { ?> selected=""  <?php } ?>>1</option>
                                                                    <option value="2" <?php if ($row['quantity'] === "2") { ?> selected=""  <?php } ?>>2</option>
                                                                    <option value="3" <?php if ($row['quantity'] === "3") { ?> selected=""  <?php } ?>>3</option>
                                                                    <option value="4" <?php if ($row['quantity'] === "4") { ?> selected=""  <?php } ?>>4</option>
                                                                    <option value="5" <?php if ($row['quantity'] === "5") { ?> selected=""  <?php } ?>>5</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="size-col">
                                                            <select class="form-control itemSize">
                                                                <option value="" <?php if ($row['size'] === "") { ?> selected=""  <?php } ?>>Select</option>
                                                                <?php
                                                                $sql_size = "SELECT * FROM products where p_id=$p_id";
                                                                $result_size = mysqli_query($conn, $sql_size);
                                                                // output data of each row
                                                                while ($row_size = mysqli_fetch_array($result_size)) {
                                                                    $size_array = $row_size ['size'];
                                                                    $size_list = explode('^', $size_array);
                                                                    ?>

                                                                    <?php
                                                                    if (in_array("XS", $size_list)) {
                                                                        ?>
                                                                        <option value="XS" <?php if ($row['size'] === "XS") { ?> selected=""  <?php } ?>>XS</option>
                                                                        <?php
                                                                    }if (in_array("S", $size_list)) {
                                                                        ?>
                                                                        <option value="S" <?php if ($row['size'] === "S") { ?> selected=""  <?php } ?>>S</option>
                                                                        <?php
                                                                    }if (in_array("M", $size_list)) {
                                                                        ?>
                                                                        <option value="M" <?php if ($row['size'] === "M") { ?> selected=""  <?php } ?>>M</option>
                                                                        <?php
                                                                    }if (in_array("L", $size_list)) {
                                                                        ?>
                                                                        <option value="L" <?php if ($row['size'] === "L") { ?> selected=""  <?php } ?>>L</option>
                                                                        <?php
                                                                    }if (in_array("XL", $size_list)) {
                                                                        ?>
                                                                        <option value="XL" <?php if ($row['size'] === "XL") { ?> selected=""  <?php } ?>>XL</option>
                                                                        <?php
                                                                    }if (in_array("XXL", $size_list)) {
                                                                        ?>
                                                                        <option value="XXL" <?php if ($row['size'] === "XXL") { ?> selected=""  <?php } ?>>XXL</option>
                                                                        <?php
                                                                    }if (in_array("Free", $size_list)) {
                                                                        ?>
                                                                        <option value="Free" <?php if ($row['size'] === "Free") { ?> selected=""  <?php } ?>>Free</option>
                                                                        <?php
                                                                    }
                                                                
                                                                }
                                                                ?>
                                                            </select>
                                                            
                                                        </td>
                                                        <td class="total-col">
                                                            <h4><i class="fa fa-gbp"></i>
                                                                <?php
                                                                $total_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row ['total_amt']);
                                                                echo trim($total_price);
                                                                ?>
                                                            </h4>
                                                        </td>
                                                        <td class="remove-col">
                                                            <a href="add_to_cart?c_id=<?php echo $id; ?>&b_id=<?php echo $row['b_id']; ?>"><i class="mdi mdi-cart-remove"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $grand_price += $row ['total_amt'];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="total-cost">
                                        <h6>Total Amount
                                            <span><i class="fa fa-gbp"></i>
                                                <?php
                                                $grand_total = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $grand_price);
                                                echo trim($grand_total);
                                                ?>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 offset-lg-9 card-right mt-4">
                                <!--                        <form class="promo-code-form">
                                                            <input type="text" placeholder="Enter promo code">
                                                            <button>Submit</button>
                                                        </form>-->
                                <?php
                                if ($grand_price > 1) {
                                    ?>
                                    <a href = "checkout?b_id=<?php echo $b_id ?>" class = "site-btn">Proceed to checkout</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="javascript:void(0);" onclick="alert('Add product to cart');" class="site-btn" dis>Proceed to checkout</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
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
    <script type="text/javascript">

        $(document).ready(function () {
            $(".itemQty").on('change', function () {
                var $el = $(this).closest('tr');
                var id = $el.find(".id").val();
                var p_price = $el.find(".p_price").val();
                var qty = $el.find(".itemQty").val();

                $.ajax({
                    url: "add_to_cart.php",
                    method: 'POST',
                    cache: false,
                    data: {qty: qty, id: id, p_price: p_price},
                    success: function (response) {
                        console.log(response);
                        window.location.reload(false);
                    }
                });

            });

            $(".itemSize").on('change', function () {
                var $el = $(this).closest('tr');
                var id = $el.find(".id").val();
                var size = $el.find(".itemSize").val();

                $.ajax({
                    url: "add_to_cart.php",
                    method: 'POST',
                    cache: false,
                    data: {size: size, id: id},
                    success: function (response) {
                        console.log(response);
                        window.location.reload(false);
                    }
                });

            });

            load_cart_item_number();

            function load_cart_item_number() {
                var b_id = $(".b_id").val();
                $.ajax({
                    url: "add_to_cart.php",
                    method: 'GET',
                    data: {cartItem: "cart_item", b_id: b_id},
                    success: function (response) {
                        $(".cart_number").html(response);
                    }
                });
            }
        });

        // Get the snackbar DIV
        var x = document.getElementById("snackbar");
        // Add the "show" class to DIV
        x.className = "show_result";
        // After 3 seconds, remove the show class from DIV
        setTimeout(function () {
            x.className = x.className.replace("show_result", "");
        }, 3000);
    </script>
</html>