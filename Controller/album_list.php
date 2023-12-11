<?php
//更新　籾木
//version 1.0

require_once '../function/function.php';
require_once '../../config.php';
$list = [];
session_start();
if ($_COOKIE['user_id']) {
  // グループIDがなかったら
  if (!isset($_SESSION['group_id'])) {
    header('location:./group_list.php');
    exit();
  }
  // タイトルがあるなら
  if (isset($_SESSION['title'])) {
    unset($_SESSION['title']);
  }

  // アルバム閲覧遷移
  if (isset($_GET['id'])) {
    session_start();
    $_SESSION['album_id'] = $_GET['id'];
    header('location:./album_detail.php');
    exit();
  }

  $sql = "SELECT * FROM event e INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = " . $_SESSION['group_id'] . " AND e.withdrawal = 0";
  $result = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
  if(empty($result)){
    $err['event'] = '先にイベントを登録してね！';
  }else{
    $sql = "SELECT * FROM album WHERE group_id = " . $_SESSION['group_id'] . " AND `delete` = 0";
    $result = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    if(empty($result)){
      $err['event'] = 'アルバムを作ってみよう！';
    }
  }

  // アルバム作成遷移
  if (isset($_POST['state'])) {
    $sql = "SELECT * FROM event e INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = " . $_SESSION['group_id'] . "";
    $result = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
    if (empty($result)) {
      $err['event'] = '先にイベントを登録してね！';
    } else {
      header('location:./album_edit.php');
      exit();
    }
  }

  // アルバムIDを消す
  if (isset($_SESSION['album_id'])) {
    unset($_SESSION['album_id']);
  }

  // SESSIONで受け取るグループID  
  $group_id = $_SESSION['group_id'];
  $json_group_id = json_encode($_SESSION['group_id']);
  // グループ名の取得
  $sql = "SELECT * FROM `group` WHERE id = '" . $group_id . "' LIMIT 1";
  $group = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
  if (10 <= mb_strlen($group[0]['name'])) {
    $group_name = mb_substr($group[0]['name'], 0, 9) . '...';
    // アルバムタップ時(詳細画面に遷移)
  } else {
    $group_name = mb_substr($group[0]['name'], 0, 9);
  }
} else {
  header('location:./OP.php');
  exit();
}


require_once "../view/album_list.php";
