<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class Event
{
    function Add()
    {
        extract($_REQUEST);
        global $conn;

        // Check if both image and PDF uploads are successful
        if (isset($_FILES['image']) && $_FILES['image']) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            
            $image_name = uniqid() . '.' . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
            
            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';

            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;

            // Check if both move_uploaded_file operations are successful
            if (move_uploaded_file($image_tmp_name, $target_path)) {
                $query = "INSERT INTO tbl_event (image) VALUES ('$image_name')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo 'Data Added Successfully!';
                } else {
                    echo 'Error:' . $mysqli->error;
                }
            } else {
                echo 'Failed to move one or both files';
            }
        } else {
            echo 'Image or PDF upload failed';
        }
    }
    function Fetch()
    {
        extract($_REQUEST);
        global $conn;

        $query = "SELECT * FROM tbl_event WHERE id = '$id' AND status = 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Rental record not found']);
        }
    }
    function Update()
    {
        extract($_REQUEST);
        global $conn;

        if (isset($_FILES['editimage']) && $_FILES['editimage']) {
            // Image upload logic
            $image_tmp_name = $_FILES['editimage']['tmp_name'];
            $image_name = uniqid() . '.' . pathinfo($_FILES['editimage']['name'],PATHINFO_EXTENSION);
            
            $upload_directory = '../uploads/';
            $target_path = $upload_directory . $image_name;

            // Move the uploaded image to the chosen directory
            if (move_uploaded_file($image_tmp_name, $target_path)) {
                // Update the record with the new image
                $query = "UPDATE tbl_event SET image='$image_name' WHERE id='$editId'";
                // Perform the database update
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo 'Data Updated Successfully!';
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

        $query = "UPDATE tbl_event SET status = 0 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
}
$func_type = new Event;
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