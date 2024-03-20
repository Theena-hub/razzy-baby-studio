<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("db.php");
class Feedback
{
    function add()
    {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "INSERT INTO tbl_feedback (department_from, department_to, message) VALUES ('$department_from', '$department_to','$message')";
        if (mysqli_query($conn, $query)) {
            echo "Feedback added successfully!";
        } else {
            echo "Error adding Feedback: " . mysqli_error($conn);
        }
    }
    function delete()
    {
        extract($_REQUEST);
        global $conn;
        // Ensure that feedbackId is set in $_REQUEST
        if (isset($feedbackId)) {
            $query = "UPDATE tbl_feedback SET status = 0 WHERE id = '$feedbackId'";
            if (mysqli_query($conn, $query)) {
                echo "Feedback Deleted Successfully!";
            } else {
                echo "Error Deleting Feedback: " . mysqli_error($conn);
                die(); // Add this line
            }
        } else {
            echo "FeedbackId is not set.";
        }
    }
}
$func_type = new Feedback;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->delete();
}
?>