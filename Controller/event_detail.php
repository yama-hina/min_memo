<?php
//更新　田中
//version 0.0

session_start();
$event_id = $_SESSION['event_id'];
$group_id = $_SESSION['group_id'];

require_once '../../config.php';
require_once '../function/function.php';

// ログイン済みの時
if (isset($_COOKIE["user_id"])) {
    $id = $_COOKIE["user_id"];

    // イベント削除ボタンが押された時
    if (isset($_POST['de']) && $_POST['de'] == 'delete') {
        header('location:./event_delete.php');
        exit();
    }
    if (isset($_POST['change']) && $_POST['change'] == 'change') {
        header('location:./event_change.php');
        exit();
    }
    if (isset($_POST['move']) && $_POST['move'] == 'move') {
        header('location:./bookmark.php');
        exit();
    }

    // イベント情報取得
    $sql_event = "SELECT e.name , e.start_date , e.end_date , e.comment , l.group_id
                FROM event e
                INNER JOIN list l
                ON e.id = l.event_id
                WHERE e.id = " . $event_id . "";

    $sql_img = "SELECT i.id , i.extension
                FROM event e
                INNER JOIN image i
                ON e.id = i.event_id
                WHERE e.id = " . $event_id . "";

    $sql_member = "SELECT member_id
                FROM `join`
                WHERE event_id = " . $event_id . "";

    $link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
    mysqli_set_charset($link, 'utf8');

    $event = sql_search($link, $sql_event);

    $event_img = sql_search($link, $sql_img);
    $member = sql_search($link, $sql_member);

    $member_id = explode(",", $member[0]['member_id']);

    $sql = "SELECT m.id , m.name , m.icon
            FROM member m
            INNER JOIN belong b
            ON m.id = b.member_id
            WHERE b.group_id = " . $group_id . "";

    $member_list = sql_search($link, $sql);
} else {
    header('location:./OP.php');
    exit;
}

require_once "../view/event_detail.php";
