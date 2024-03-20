<?php 
    include('db.php');
    $_SESSION['userId'];
    unset($_SESSION['userId']);
    unset($_SESSION['userMail']);
    session_destroy();
    header('location:login.php');
?>