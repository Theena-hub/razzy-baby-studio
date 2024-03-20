<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../db.php");
class Settings
{
    function Update()
    {
        extract($_REQUEST);
        global $conn;
    }
   
}
$func_type = new Settings;
if ($_REQUEST['req_type'] == 'update') {
    $func_type->Update();
}
?>