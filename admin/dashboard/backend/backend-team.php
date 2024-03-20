<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class Team
{
    function Add()
    {
        extract($_REQUEST);
        global $conn;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';
            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;
            if (move_uploaded_file($image_tmp_name, $target_path)) {
                $query = "INSERT INTO tbl_team (name,designation,image) VALUES ('".addslashes($name)."','".addslashes($designation)."','$image_name')";
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

        $query = "SELECT * FROM tbl_team WHERE id = '$id'";
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

        if (isset($_FILES['editimage']) && $_FILES['editimage']['error'] == UPLOAD_ERR_OK) {
            // Image upload logic
            $image_tmp_name = $_FILES['editimage']['tmp_name'];
            $image_name = uniqid() . '.' . pathinfo($_FILES['editimage']['name'], PATHINFO_EXTENSION);
            $upload_directory = '../uploads/';
            $target_path = $upload_directory . $image_name;

            // Move the uploaded image to the chosen directory
            if (move_uploaded_file($image_tmp_name, $target_path)) {
                // Update the record with the new image
                $query = "UPDATE tbl_team SET name='".addslashes($edit_name)."', designation='".addslashes($edit_designation)."', image='$image_name' WHERE id='$editId'";
            }
        } else {
            // No new image uploaded, update without changing the image
            $query = "UPDATE tbl_team SET name='".addslashes($edit_name)."', designation='".addslashes($edit_designation)."' WHERE id='$editId'";
        }

        // Perform the database update
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

        $query = "UPDATE tbl_team SET status = 0 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
    function Description_Update()
    {
        extract($_REQUEST);
        global $conn;
        $sql = "UPDATE tbl_team_description SET description='".addslashes($description)."' WHERE id=1 ";
        $res = $conn->query($sql);
    }
}
$func_type = new Team;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->Add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->Delete();
} else if ($_REQUEST['req_type'] == 'fetch') {
    $func_type->Fetch();
} else if ($_REQUEST['req_type'] == 'update') {
    $func_type->Update();
} else if ($_REQUEST['req_type'] == 'description_update') {
    $func_type->Description_Update();
}
?>