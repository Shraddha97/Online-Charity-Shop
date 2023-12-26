<?php
ob_start();
require_once 'DB.php';
$sql1 = "select id from gallery order by id desc limit 0,1";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
if ($row1 = mysqli_fetch_array($result1)) {
    $id = $row1 ['id'] + 1;
} else {
    $id = 1;
}


if (isset($_POST["gallery_submit"])) {
    // Get Image Dimension
    $fileinfo = getimagesize($_FILES["thumbnail"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (!file_exists($_FILES["thumbnail"]["tmp_name"])) {
        header("location:add_gallery_img?failed=Choose an image file to upload.");
    }    // Validate file input to check if is with valid extension
    else if (!in_array($file_extension, $allowed_image_extension)) {
        header("location:add_gallery_img?failed=Upload valid images. Only PNG and JPEG are allowed.");
    }    // Validate image file size
    else if (($_FILES["thumbnail"]["size"] > 100000)) {
        header("location:add_gallery_img?failed=Image size exceeds 100KB");
    }    // Validate image file dimension
    else if ($width > "400" || $height > "300" || $width < "399" || $height < "299") {
        header("location:add_gallery_img?failed=Image dimension should be 400X300");
    } else {
        $target_dir = "upload/gallery/thumbnail/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $target_dir_img = "upload/gallery/";
        $target_file_img = $target_dir_img . basename($_FILES["img"]["name"]);
        $imageFileType_img = strtolower(pathinfo($target_file_img, PATHINFO_EXTENSION));

        $new_gallery_thumb  = $target_dir . "gallery_thumb_" . $id . "." . $imageFileType;
        $new_gallery_img  = $target_dir_img . "gallery_img_" . $id . "." . $imageFileType;

        $sql = "INSERT INTO gallery VALUES ('$id','$new_gallery_thumb','$new_gallery_img')";
        // use exec() because no results are returned
        if (!mysqli_query($conn, $sql)) {
            header("location:add_gallery_img?failed=Something went wrong !");
            // . mysqli_error($conn)
        } else {
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $new_gallery_thumb);
            move_uploaded_file($_FILES["img"]["tmp_name"], $new_gallery_img);
            header("location:add_gallery_img?success=Gallery Image Uploaded Successfully");
        }
    }
}

