<?php
ob_start();
require_once 'DB.php';
$p_id = isset($_GET['p_id']) ? $_GET['p_id'] : '';

$sql_img = "SELECT * FROM product_img WHERE p_id=$p_id";
$result_img = mysqli_query($conn, $sql_img);
// output data of each row
while ($row_img = mysqli_fetch_array($result_img)) {
    $p_img_thumb = $row_img ['thumbnail'];
    $p_img = $row_img ['image'];
    unlink($p_img_thumb);
    unlink($p_img);
}
        
$query_product = "DELETE from products WHERE p_id=$p_id";
mysqli_query($conn, $query_product);

$query_img = "DELETE from product_img WHERE p_id=$p_id";
mysqli_query($conn, $query_img);

if (!mysqli_query($conn, $query_product) && !mysqli_query($conn, $query_img)) {
    header("location:view_product_details?failed=Error! Try Again&p_id=$p_id");
} else {
    header("location:view_products?success=Product deleted successfully");
}


