<?php
    session_start();
    $group_id = $_SESSION['group_id'];

    require_once '../../config.php';
    require_once '../function/function.php';

    // ログイン済みの時
    if(isset($_COOKIE["user_id"])){

        if(isset($_POST['back']) && $_POST['back'] == 'back'){
        
            header('location:./group.php');
            exit();
        }
    }

    require_once "../view/event_delete_complete.php";
?>