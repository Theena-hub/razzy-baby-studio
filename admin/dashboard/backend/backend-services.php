<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class Services
{
    function Add()
    {
        extract($_REQUEST);
        global $conn;
        if (
            (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) &&
            (isset($_FILES['image2']) && $_FILES['image2']['error'] == UPLOAD_ERR_OK)
        ) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_tmp_name2 = $_FILES['image2']['tmp_name'];
            
            
            $image_name = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $image_name2 = uniqid() . '.' . pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
            
            // $image_name = $_FILES['image']['name'];
            // $image_name2 = $_FILES['image2']['name'];
            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';
            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;
            $target_path2 = $upload_directory . $image_name2;
            if (move_uploaded_file($image_tmp_name, $target_path) && move_uploaded_file($image_tmp_name2, $target_path2)) {
                $query = "INSERT INTO tbl_service (name,description,image,image_two) VALUES ('".addslashes($name)."','".addslashes($description)."','$image_name','$image_name2')";
                
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo 'Data Added Successfully!';
                } else {
                    echo 'Error:' . $mysqli->error;
                }
            }
        }
    }
    function Fetch()
    {
        extract($_REQUEST);
        global $conn;

        $query = "SELECT * FROM tbl_service WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $data = mysqli_fetch_assoc($result);
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn), 'query' => $query]);
        }
    }
    function Update()
    {
        extract($_REQUEST);
        global $conn;
        if (
            (isset($_FILES['editimage']) && $_FILES['editimage']['error'] == UPLOAD_ERR_OK) &&
            (isset($_FILES['editimage2']) && $_FILES['editimage2']['error'] == UPLOAD_ERR_OK)
        ) {
            $image_tmp_name = $_FILES['editimage']['tmp_name'];
            $image_tmp_name2 = $_FILES['editimage2']['tmp_name'];
            $image_name = uniqid() . '.' . pathinfo($_FILES['editimage']['name'], PATHINFO_EXTENSION);
            $image_name2 = uniqid() . '.' . pathinfo($_FILES['editimage2']['name'], PATHINFO_EXTENSION);
            
            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';
            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;
            $target_path2 = $upload_directory . $image_name2;
            if (move_uploaded_file($image_tmp_name, $target_path) && move_uploaded_file($image_tmp_name2, $target_path2)) {
                echo $query = "UPDATE tbl_service SET name='".addslashes($editname)."', description='".addslashes($editdescription)."', image='$image_name', image_two='$image_name2' WHERE id='$editId'";
            }
            else if (move_uploaded_file($image_tmp_name, $target_path)) {
                echo $query = "UPDATE tbl_service SET name='".addslashes($editname)."', description='".addslashes($editdescription)."', image='$image_name' WHERE id='$editId'";
            }
            else if (move_uploaded_file($image_tmp_name2, $target_path2)) {
                echo $query = "UPDATE tbl_service SET name='".addslashes($editname)."', description='".addslashes($editdescription)."', image_two='$image_name2' WHERE id='$editId'";
            }
        } else {
            // No new image uploaded, update without changing the image
            echo $query = "UPDATE tbl_service SET name='".addslashes($editname)."', description='".addslashes($editdescription)."' WHERE id='$editId'";
        }
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Updated Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
    function Delete()
    {
        extract($_REQUEST);
        global $conn;

        $query = "UPDATE tbl_service SET status = 0 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
}
$func_type = new Services;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->Add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->Delete();
} else if ($_REQUEST['req_type'] == 'fetch') {
    $func_type->Fetch();
} else if ($_REQUEST['req_type'] == 'update') {
    $func_type->Update();
}
?>