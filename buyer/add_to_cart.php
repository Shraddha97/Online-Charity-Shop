
<?php
ob_start();
require_once 'DB.php';

//to be used when you need the URL path:
$serverPath = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";

if (isset($_POST["submit"])) {
    $b_id = isset($_POST['b_id']) ? $_POST['b_id'] : '';
    $p_id = isset($_POST['p_id']) ? $_POST['p_id'] : '';
    $p_name = isset($_POST['p_name']) ? $_POST['p_name'] : '';
    $p_img = isset($_POST['p_img']) ? $_POST['p_img'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $p_size = isset($_POST['sc']) ? $_POST['sc'] : '';
    $p_qty = isset($_POST['p_qty']) ? $_POST['p_qty'] : '';
    if ($p_id !== "") {

        if (!mysqli_query($conn, $sql)) {
        ?>
        <script>window.location = "cart?b_id="+<?php echo $b_id?>;</script>
        <?php
    } else {
        ?>
        <script>window.location = "cart?b_id="+<?php echo $b_id?>;</script>
        <?php
    }
    }
}
if (isset($_POST["b_id"])) {
    $p_id = isset($_POST['p_id']) ? $_POST['p_id'] : '';
    $p_name = isset($_POST['p_name']) ? $_POST['p_name'] : '';
    $p_img = isset($_POST['p_img']) ? $_POST['p_img'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $b_id = isset($_POST['b_id']) ? $_POST['b_id'] : '';
    $p_size = isset($_POST['sc']) ? $_POST['sc'] : '';
    $p_qty = isset($_POST['p_qty']) ? $_POST['p_qty'] : '';
    if ($p_qty != 0) {
        $p_total_amt = $p_qty * $price;
    } else {
        $p_total_amt = 1 * $price;
    }

    $p_cart_p = 0;

//    $stmt=$conn->prepare("select p_id from cart where p_id=? and b_id=?")
//    $stmt->bind_param("s",$p_id);
//    $stmt->execute();
//    $res=$stmt->get_result();
//    $r=$res->fetch_assoc();
//    $code=$r['p_id'];

    $sql_cart_p = "SELECT COUNT(*) as product_id FROM cart where b_id='$b_id' and p_id='$p_id'";
    $result_cart_p = mysqli_query($conn, $sql_cart_p);
    while ($row_cart_p = mysqli_fetch_array($result_cart_p)) {
        $p_cart_p = $row_cart_p['product_id'];
        if ($p_cart_p < 1) {
            $sql = "INSERT INTO cart(b_id,p_id,p_name,p_price,p_img,quantity,size,total_amt) VALUES ('$b_id','$p_id','$p_name','$price','$p_img','$p_qty','$p_size','$p_total_amt')";
            if (!mysqli_query($conn, $sql)) {
                echo '<div id="snackbar">Error !</div>';
                //echo mysqli_error($conn);
            } else {
                echo '<div id="snackbar">Product added to your cart</div>';
            }
        } else {
            echo '<div id="snackbar">Already added to your cart !</div>';
        }
    }
    ?>

    <script>
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");
        // Add the "show" class to DIV
        x.className = "show_result";
        // After 3 seconds, remove the show class from DIV
        setTimeout(function () {
            x.className = x.className.replace("show_result", "");
        }, 3000);
    </script>
    <?php

}


if (isset($_GET["cartItem"]) && isset($_GET["cartItem"]) == 'cart_item') {
    $buyer_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
    $sql_c = "SELECT * FROM cart where b_id=$buyer_id";
    if ($result_c = mysqli_query($conn, $sql_c)) {
        $rowcount_c = mysqli_num_rows($result_c);
        echo $rowcount_c;
        mysqli_free_result($result_c);
    }
}
if (isset($_POST["qty"])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $qty = isset($_POST['qty']) ? $_POST['qty'] : '';
    $p_price = isset($_POST['p_price']) ? $_POST['p_price'] : '';
    $t_amt = $qty * $p_price;
    $update_sql = "update cart set quantity='$qty',total_amt='$t_amt' WHERE id='$id'";
    mysqli_query($conn, $update_sql);
}

if (isset($_POST["size"])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    if ($size !== "") {
        $update_sql_size = "update cart set size='$size' WHERE id='$id'";
        mysqli_query($conn, $update_sql_size);
    }
}
if (isset($_GET["c_id"]) && isset($_GET["c_id"]) == 'c_id') {
    $c_id = isset($_GET['c_id']) ? $_GET['c_id'] : '';
    $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
    $query = "DELETE from cart WHERE id='$c_id'";

    if (!mysqli_query($conn, $query)) {
        ?>
        <script>window.location = "cart?b_id="+<?php echo $b_id?>;</script>
        <?php
    } else {
        ?>
        <script>window.location = "cart?b_id="+<?php echo $b_id?>;</script>
        <?php
    }

}