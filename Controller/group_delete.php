<?php
//更新　田中
//version 0.0
require_once '../../config.php';
require_once '../function/function.php';



if(isset($_COOKIE["user_id"])){
    
    session_start();
    $group_id = $_SESSION['group_id'];
    $group_name = $_SESSION['group_name'];
    $img_src = $_SESSION['group_img'];

    if(isset($_POST['de']) && $_POST['de'] == 'delete'){
        $sql_delete = "DELETE FROM `group` WHERE id = ". $group_id ."";
        insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_delete);

        header('location:./group_delete_complete.php');
        exit;
    }


}
require_once "../view/group_delete.php";
?>