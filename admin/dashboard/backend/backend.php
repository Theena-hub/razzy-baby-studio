<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");

class Backend{
    function login(){
        extract($_REQUEST);        
        global $conn;
        $sql="SELECT id,name FROM tbl_admin WHERE mail='$email' AND  password='$pwd'";
        $res=$conn->query($sql);   
        $row = mysqli_fetch_array($res);
        if(mysqli_num_rows($res)>0){
            session_start();
            $_SESSION['userId']=$row['id'];
            $_SESSION['userName']=$row['name'];
            // $_SESSION['userLevel']=$row['user_level'];
            echo 'Success';
        }
        else{
            echo 'Fail';
        }
    }
    function logout(){
        unset($_SESSION["userId"]);
        unset($_SESSION["userName"]);
        unset($_SESSION["userLevel"]);
        session_destroy ();
        echo 'Success';
    }
}
$func_type = new Backend;
if($_REQUEST['req_type']=='Login'){   
    $func_type->login();
}
else if($_REQUEST['req_type']=='Logout'){   
    $func_type->logout();
}

?>