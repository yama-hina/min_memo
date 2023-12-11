<?php
//更新　原
//修正　田中
//version 1.0
require_once '../../config.php';
require_once '../function/function.php';
session_start();
//招待を受けてからデータベースに登録するためのファイル、viewはなし。
if(!empty($_POST['group_id'])){
    $sql = "INSERT INTO member (name,password,withdrawal) 
    VALUES ('ゲストさん','". rand(1000,9999) . "',0)";
    $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);
    mysqli_query($link , $sql);
    // id取得
    $id = mysqli_insert_id($link);
    $_SESSION['pre_id'] = $id; 
    $_SESSION['group_id'] = 1;
    mysqli_close($link);
    $sql = "INSERT INTO `belong` (`member_id`, `group_id`) VALUES ('" . $id . "','1')";
    insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
    header("location:../Controller/group.php");
    exit;
}


header("location:OP.php");
exit;

?>
