<?php

    session_start();
    $group_id = $_SESSION['group_id'];
    $group_name = $_SESSION['group_name'];
    $img_src = $_SESSION['group_img'];


    require_once '../../config.php';
    require_once '../function/function.php';

    // ログイン済みの時
    if (isset($_COOKIE["user_id"])) {

        // ボタンが押された時
        if (isset($_POST['de']) && $_POST['de'] == 'delete') {

            $group_id = $_SESSION['group_id'];

            $sql = "DELETE FROM belong WHERE member_id = ". $_COOKIE["user_id"] ." AND group_id = ". $group_id .";";

            insert(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
            header('location:./group_withdrawal_complete.php');
            exit();
        }

    }

    require_once "../view/group_withdrawal.php";
