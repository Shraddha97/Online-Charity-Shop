<?php
ob_start();
require_once 'DB.php';
$sql1 = "select id from products order by id desc limit 0,1";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
if ($row1 = mysqli_fetch_array($result1)) {
    $id = $row1 ['id'] + 1;
} else {
    $id = 1;
}

$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
$fabric = mysqli_real_escape_string($conn, $_POST['fabric']);
$brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$p_category = mysqli_real_escape_string($conn, $_POST['p_category']);
$sub_category = mysqli_real_escape_string($conn, $_POST['p_sub']);
$p_type = mysqli_real_escape_string($conn, $_POST['p_type']);
$p_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);
//checkbbox
$size = implode("^", $_POST["size"]);

if (isset($_POST["product_submit"])) {
    $sql = "INSERT INTO products VALUES ('$id','$p_id','$p_name','$fabric','$brand_name','$size', '$price','$p_category','$sub_category','$p_type','$p_keywords')";
    if (!mysqli_query($conn, $sql)) {
        header("location:add_product?failed=Something went wrong !" . mysqli_error($conn));
        //echo mysqli_error($conn);
    } else {
        header("location:add_product_img?p_id=$p_id&success=Product Details Uploaded Successfully !");
    }
}


if (isset($_POST["product_img_submit"])) {
    $sql_img_id = "select id from product_img order by id desc limit 0,1";
    $result_img_id = mysqli_query($conn, $sql_img_id);
// output data of each row
    if ($row_img_id = mysqli_fetch_array($result_img_id)) {
        $img_t_id = $row_img_id ['id'] + 1;
    } else {
        $img_t_id = 1;
    }

    // Get Image Dimension
    $fileinfo = getimagesize($_FILES["p_thumb"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["p_thumb"]["name"], PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (!file_exists($_FILES["p_thumb"]["tmp_name"])) {
        header("location:add_product_img?p_id=$p_id&failed=Choose an image file to upload.");
    }    // Validate file input to check if is with valid extension
    else if (!in_array($file_extension, $allowed_image_extension)) {
        header("location:add_product_img?p_id=$p_id&failed=Upload valid images. Only PNG and JPEG are allowed.");
    }    // Validate image file size
    else if (($_FILES["p_thumb"]["size"] > 1000000)) {
        header("location:add_product_img?p_id=$p_id&failed=Thumbnail size exceeds 1MB");
    }    // Validate image file dimension
    else if ($width > "400" || $height > "620" || $width < "399" || $height < "619") {
        header("location:add_product_img?p_id=$p_id&failed=Thumbnail dimension should be 400X620");
    } else {
        $target_dir = "upload/product_img/thumbnail/";
        $target_file = $target_dir . basename($_FILES["p_thumb"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $target_dir_img = "upload/product_img/";
        $target_file_img = $target_dir_img . basename($_FILES["p_img"]["name"]);
        $imageFileType_img = strtolower(pathinfo($target_file_img, PATHINFO_EXTENSION));

//        if ($digit_no !== "") {
//            $add_digit = $digit + 1;
//        } else {
//            $add_digit = 1;
//        }

        $new_project_thumb = $target_dir . $p_id . "_project_thumb_" . $img_t_id . "." . $imageFileType;
        $new_project_img = $target_dir_img . $p_id . "_project_img_" . $img_t_id . "." . $imageFileType_img;

        $sql = "INSERT INTO product_img VALUES ('$img_t_id','$p_id','$new_project_thumb','$new_project_img')";
        // use exec() because no results are returned
        if (!mysqli_query($conn, $sql)) {
            header("location:add_product_img?p_id=$p_id&failed=Something went wrong !". mysqli_error($conn));
            // . mysqli_error($conn)
        } else {
            move_uploaded_file($_FILES["p_thumb"]["tmp_name"], $new_project_thumb);
            move_uploaded_file($_FILES["p_img"]["tmp_name"], $new_project_img);
            header("location:add_product_img?p_id=$p_id&success=Product Image Uploaded Successfully");
        }
    }
}
