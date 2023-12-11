<?php
//更新　籾木
//version 1.0
require_once '../../config.php';
require_once '../function/function.php';

if(isset($_COOKIE['user_id'])){
    // dbSELECT
    $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);
    $sql = "UPDATE member SET withdrawal = 1 WHERE id = '".$_COOKIE['user_id']."'";
    $result = mysqli_query($link,$sql);
    mysqli_close($link);

    setcookie('user_id','',time() - 100);
}else{
    header('location:./OP.php');
    exit();
}
require_once "../view/withdrawal_comp.php";

?>