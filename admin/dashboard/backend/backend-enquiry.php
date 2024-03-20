<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class Enquiry
{
    function Add()
    {
        extract($_REQUEST);
        global $conn;    
        // Use $_POST['serviceId'] to get the selected service ID
        $serviceId = mysqli_real_escape_string($conn, $_POST['serviceId']);
        // query
        $query = "INSERT INTO tbl_enquiry (name, mobile, service_id, message) VALUES ('$name','$mobile', '$serviceId','$message')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Your Enquiry Sended Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
    function Delete()
    {
        extract($_REQUEST);
        global $conn;
        $query = "UPDATE tbl_enquiry SET status = 0 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
}
$func_type = new Enquiry;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->Add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->Delete();
}
?>