<?php
//更新　籾木
//version 0.0
require_once "../function/function.php";
require_once "../../config.php";

session_start();
// ログイン済みの時
if(isset($_COOKIE['user_id'])){
    $group_id = $_SESSION['group_id'];
    $page = $_POST["page"];
    $ids = $_POST['events'];
    
    $event_id = "";

    foreach($ids as $key => $value){
        $event_id = $event_id . $value .','; 
    }
    $event_id = substr($event_id, 0, -1);
    
    $sql = "SELECT i.id , i.extension , e.id AS 'event_id' FROM image i INNER JOIN event e ON i.event_id = e.id INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = $group_id AND i.event_id IN ($event_id);";
    $data = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
    $ids = explode(',',$event_id);
}else{
    header('location:./OP.php');
    exit();
}

require_once '../view/album_editor.php';
?>


