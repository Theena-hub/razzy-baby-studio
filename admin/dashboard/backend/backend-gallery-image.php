<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class GalleryImage
{
    function Add()
    {
        extract($_REQUEST);
        global $conn;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name = uniqid() . '.' . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';
            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;
            if (move_uploaded_file($image_tmp_name, $target_path)) {
                $query = "INSERT INTO tbl_gallery_images (service_id,image) VALUES ('$serviceId','$image_name')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo 'Data Added Successfully!';
                } else {
                    echo 'Error:' . $mysqli->error;
                }
            }
        }
    }
   
    function Delete()
    {
        extract($_REQUEST);
        global $conn;

        $query = "UPDATE tbl_gallery_images SET status = 0 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
}
$func_type = new GalleryImage;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->Add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->Delete();
}
?>