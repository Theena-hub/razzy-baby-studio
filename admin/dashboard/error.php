<?php
    if($_SESSION['userId'] == ''){
        header('location:login.php');
    }
?>