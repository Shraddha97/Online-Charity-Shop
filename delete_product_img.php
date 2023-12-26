<?php
ob_start();
require_once 'DB.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$p_id = isset($_GET['p_id']) ? $_GET['p_id'] : '';

$sql_p_img = "SELECT * FROM product_img WHERE id='$id'";
$result_p_img = mysqli_query($conn, $sql_p_img);
// output data of each row
while ($row_p_img = mysqli_fetch_array($result_p_img)) {
    $p_img_thumb = $row_p_img ['thumbnail'];
    $p_img = $row_p_img ['image'];
    unlink($p_img_thumb);
    unlink($p_img);
}

$query_p_img = "DELETE from product_img WHERE id='$id'";

if (!mysqli_query($conn, $query_p_img)) {
    header("location:view_product_details?failed=Error! Try Again&p_id=$p_id");
} else {
    header("location:view_product_details?success=Product image deleted successfully&p_id=$p_id");
}