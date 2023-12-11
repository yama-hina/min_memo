<?php
require_once '../../config.php';
require_once '../function/function.php';
session_start();
$group_id = $_SESSION['group_id'];
$sql = "SELECT events_id FROM album WHERE id = ".$_SESSION['album_id']."";
$result = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
$ids = explode(',',$result[0]['events_id']);
$sql = "SELECT i.id , i.extension , e.id AS 'event_id' FROM image i INNER JOIN event e ON i.event_id = e.id INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = ".$_SESSION['group_id']." AND i.event_id IN (".$result[0]['events_id'].")";
$data = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);

$json_group_id = $_SESSION['group_id'];
$json_album_id = $_SESSION['album_id'];
require_once '../view/album_editing.php';
?>