<?php
ob_start();
require_once 'DB.php';
$sql1 = "select t_id from order_tracking order by t_id desc limit 0,1";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
if ($row1 = mysqli_fetch_array($result1)) {
    $t_id = $row1 ['t_id'] + 1;
} else {
    $t_id = 1;
}
$o_id = mysqli_real_escape_string($conn, $_POST['o_id']);
$order_status = mysqli_real_escape_string($conn, $_POST['order_status']);
$b_id = mysqli_real_escape_string($conn, $_POST['b_id']);
$tracking_url = mysqli_real_escape_string($conn, $_POST['tracking_url']);
$awb_no = mysqli_real_escape_string($conn, $_POST['awb_no']);

if (isset($_POST["tracking_submit"])) {
    $sql = "INSERT INTO order_tracking(t_id, o_id, b_id, tracking_url, awb_no) VALUES ('$t_id','$o_id','$b_id','$tracking_url','$awb_no')";
    $query = "update order_details set order_status='$order_status' WHERE id='$o_id'";

    if (!mysqli_query($conn, $sql)) {
        header("location:add_order_awb?failed=Something went wrong!");
        //echo mysqli_error($conn);
    } else {
        if (!mysqli_query($conn, $query)) {
            header("location:add_order_awb?failed=Something went wrong!");
        } else {
            header("location:view_pending_orders?success=Order Tracking Details Added Successfully!");
        }
    }
}