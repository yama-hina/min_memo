<?php
//更新　籾木
//version 1.0
require_once '../../config.php';
require_once '../function/function.php';

session_start();

if(!isset($_COOKIE['user_id'])){
    header('location:./OP.php');
    exit();  
}else{
    // アルバム編集
    if(isset($_GET['editor'])){
        header('location:./album_editing.php');
        exit();
    }
    // アルバム削除
    if(isset($_POST['delete'])){
        $sql = "UPDATE album SET `delete` = 1 WHERE id = ".$_SESSION['album_id']."";
        insert(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
        unset($_SESSION['album_id']);
        header('location:./album_list.php');
        exit();
    }
}

require_once '../view/album_detail.php';
?>