<?php
ob_start();
require_once 'DB.php';
$sql1 = "select id from order_details order by id desc limit 0,1";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
if ($row1 = mysqli_fetch_array($result1)) {
    $id = $row1 ['id'] + 1;
} else {
    $id = 1;
}
// error_log(print_r($_POST, true));
$b_id = mysqli_real_escape_string($conn, $_POST['b_id']);
date_default_timezone_set('Asia/Kolkata');
$order_date = mysqli_real_escape_string($conn, date("D, dS M 'y"));
$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
$p_price = mysqli_real_escape_string($conn, $_POST['p_price']);
$p_img = mysqli_real_escape_string($conn, $_POST['p_img']);
$qty = mysqli_real_escape_string($conn, $_POST['qty']);
$size = mysqli_real_escape_string($conn, $_POST['size']);
$total_amt = mysqli_real_escape_string($conn, $_POST['total_amt']);


$checkout_fname = mysqli_real_escape_string($conn, $_POST['checkout_fname']);
$checkout_lname = mysqli_real_escape_string($conn, $_POST['checkout_lname']);
$checkout_phone = mysqli_real_escape_string($conn, $_POST['checkout_phone']);
$checkout_phone_a = mysqli_real_escape_string($conn, $_POST['checkout_phone_a']);
$checkout_email = mysqli_real_escape_string($conn, $_POST['checkout_email']);
$checkout_address1 = mysqli_real_escape_string($conn, $_POST['checkout_address1']);
$checkout_address2 = mysqli_real_escape_string($conn, $_POST['checkout_address2']);
$checkout_city = mysqli_real_escape_string($conn, $_POST['checkout_city']);
$checkout_zip = mysqli_real_escape_string($conn, $_POST['checkout_zip']);
$checkout_state = mysqli_real_escape_string($conn, $_POST['checkout_state']);
$checkout_country = mysqli_real_escape_string($conn, $_POST['checkout_country']);
$order_status = "Pending";


$sql_count = "SELECT COUNT(*) as buyer_id FROM buyer_details where b_id=$b_id";
$result_count = mysqli_query($conn, $sql_count);
while ($row_count = mysqli_fetch_array($result_count)) {
    $buyer_count = $row_count['buyer_id'];
}
if ($buyer_count < 1) {
    $sql_buyer_details = "INSERT INTO buyer_details(b_id, b_fname, b_lname, b_phone, b_aphone, address_line_1, address_line_2, city, pincode, state, country) VALUES ('$b_id','$checkout_fname','$checkout_lname','$checkout_phone','$checkout_phone_a','$checkout_address1','$checkout_address2','$checkout_city','$checkout_zip','$checkout_state','$checkout_country')";
} else {
    $sql_buyer_details = "update buyer_details set b_phone='$checkout_phone',b_aphone='$checkout_phone_a',b_fname='$checkout_fname',b_lname='$checkout_lname',address_line_1='$checkout_address1',address_line_2='$checkout_address2',city='$checkout_city',pincode='$checkout_zip',state='$checkout_state' WHERE b_id='$b_id'";
}

$sql_order_details = "INSERT INTO order_details(b_id, order_date, p_id, p_name, p_price, p_img, qty, size, total_amt, b_fname, b_lname, b_phone, b_aphone, b_email, address_line1, address_line2, city, pincode, state, country, order_status) VALUES ('$b_id','$order_date','$p_id','$p_name','$p_price','$p_img','$qty','$size','$total_amt','$checkout_fname','$checkout_lname','$checkout_phone','$checkout_phone_a','$checkout_email','$checkout_address1','$checkout_address2','$checkout_city','$checkout_zip','$checkout_state','$checkout_country','$order_status')";
$random_url = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 1000000);
$sql_cart_delete = "DELETE from cart WHERE b_id='$b_id'";
if (!mysqli_query($conn, $sql_buyer_details)) {
    header("location:checkout?failed=Something went wrong buyer !&b_id=$b_id");
} else {
    if (!mysqli_query($conn, $sql_order_details)) {
        header("location:checkout?failed=Something went wrong details!&b_id=$b_id");
    } else {
        if (!mysqli_query($conn, $sql_cart_delete)) {
            header("location:checkout?failed=Something went wrong delete!&b_id=$b_id");
        } else {
            header("location:make_payment?$random_url$random_url&ot_id=$id&b_id=$b_id&$random_url$random_url");
        }
    }
}