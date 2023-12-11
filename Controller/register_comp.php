<?php
//更新　籾木
//version 0.0
require_once "../../config.php";

session_start();
setcookie('user_id',$_SESSION['user_id'],time()+60*60*24);
if(isset($_POST["top"])){
    header("location:./top.php");
    exit();
}
require_once "../view/register_comp.php";
?>