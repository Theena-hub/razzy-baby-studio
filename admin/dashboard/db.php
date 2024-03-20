<?php
    error_reporting(0);
    session_start();
    $conn = mysqli_connect("localhost", "u977418768_babystudio", "q]#K44QF[7", "u977418768_babystudio");
    // $conn = mysqli_connect("localhost", "root", "", "studio");
    date_default_timezone_set("Asia/Kolkata");
    if (!$conn) {
        echo "not connected database";
    }
?>