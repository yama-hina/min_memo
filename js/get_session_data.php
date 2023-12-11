<?php
session_start();

// セッションデータの取得
$sessionData1 = $_SESSION['group_id'];
$sessionData2 = $_SESSION['event_id'];

// セッションデータを配列にまとめる
$sessionData = array(
  'group_id' => $sessionData1,
  'event_id' => $sessionData2
);

// セッションデータをJSON形式で出力
header('Content-Type: application/json');
echo json_encode($sessionData);
?>