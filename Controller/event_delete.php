<?php
    session_start();
    $event_id = $_SESSION['event_id'];
    $group_id = $_SESSION['group_id'];

    require_once '../../config.php';
    require_once '../function/function.php';

    // ログイン済みの時
    if(isset($_COOKIE["user_id"])){

        // イベント削除ボタンが押された時
        if(isset($_POST['delete']) && $_POST['delete'] == 'delete'){
        
            $sql = "UPDATE event SET withdrawal = 1 WHERE id = ". $event_id .";";

            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            $sql = "UPDATE bookmark SET del = 1 WHERE event_id = ". $event_id ." AND group_id = " . $group_id . ";";
            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            header('location:./event_delete_complete.php');
            exit();
        }
    }

    require_once "../view/event_delete.php";
?>