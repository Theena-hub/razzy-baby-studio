<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class Rental
{
    function Add()
    {
        extract($_REQUEST);
        global $conn;

        // Check if both image and PDF uploads are successful
        if (
            isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK &&
            isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK
        ) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $pdf_tmp_name = $_FILES['pdf']['tmp_name'];
            $pdf_name = uniqid() . '.' . pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);

            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';
            // Choose a directory to store the uploaded PDFs
            $pdf_upload_directory = '../uploads/documents/';
            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;
            // Move the uploaded PDF to the chosen directory
            $pdf_target_path = $pdf_upload_directory . $pdf_name;

            // Check if both move_uploaded_file operations are successful
            if (move_uploaded_file($image_tmp_name, $target_path) && move_uploaded_file($pdf_tmp_name, $pdf_target_path)) {
                $query = "INSERT INTO tbl_rental (image, document) VALUES ('$image_name', '$pdf_name')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo 'Data Added Successfully!';
                } else {
                    echo 'Error:' . $mysqli->error;
                }
            } else {
                echo 'Error:' . $mysqli->error;
            }
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }

    function Fetch()
    {
        extract($_REQUEST);
        global $conn;

        $query = "SELECT * FROM tbl_rental WHERE id = '$id' AND status = 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
    function Update()
    {
        extract($_REQUEST);
        global $conn;

        // Check if both image and PDF uploads are successful
        if (
            (isset($_FILES['edit_image_name']) && $_FILES['edit_image_name']['error'] == UPLOAD_ERR_OK) && (isset($_FILES['edit_document_name']) && $_FILES['edit_document_name']['error'] == UPLOAD_ERR_OK)
        ) {
            $edit_image_tmp_name = $_FILES['edit_image_name']['tmp_name'];
            $edit_image_name = uniqid() . '.' . pathinfo($_FILES['edit_image_name']['name'], PATHINFO_EXTENSION);
            $edit_pdf_tmp_name = $_FILES['edit_document_name']['tmp_name'];
            $edit_pdf_name = uniqid() . '.' . pathinfo($_FILES['edit_document_name']['name'], PATHINFO_EXTENSION);
            // Choose a directory to store the uploaded images
            $upload_directory = '../uploads/';
            // Choose a directory to store the uploaded PDFs
            $pdf_upload_directory = '../uploads/documents/';
            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $edit_image_name;
            // Move the uploaded PDF to the chosen directory
            $pdf_target_path = $pdf_upload_directory . $edit_pdf_name;

            // Check if both move_uploaded_file operations are successful
            if (move_uploaded_file($edit_image_tmp_name, $target_path) && move_uploaded_file($edit_pdf_tmp_name, $pdf_target_path)) {
                $query = "UPDATE tbl_rental SET image = '$edit_image_name', document = '$edit_pdf_name' WHERE id = '$editId'";
            } else if (move_uploaded_file($edit_image_tmp_name, $target_path)) {
                echo $query = "UPDATE tbl_rental SET image = '$edit_image_name' WHERE id = '$editId'";
            } else if (move_uploaded_file($edit_pdf_tmp_name, $pdf_target_path)) {
                $query = "UPDATE tbl_rental SET document = '$edit_pdf_name' WHERE id = '$editId'";
            }
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

        $query = "UPDATE tbl_rental SET status = 0 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
}
$func_type = new Rental;
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