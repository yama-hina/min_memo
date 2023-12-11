<?php
require_once '../function/function.php';
require_once '../../config.php';

session_start();
if(isset($_POST['flg'])){
  $sql = "SELECT id FROM album WHERE id = ".$_SESSION['album_id']."";
  $id = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
  $url = "../group/" . $_SESSION["group_id"] . "/album_json/" . $id[0]['id'] . ".json";
  file_put_contents($url, $_POST['data']);
  echo $id[0]['id'];
  exit;
}
$group_id = $_SESSION["group_id"];

// 配列を文字列に
$events_id = implode(',',$_POST['events_id']);

// 接続
$link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);

// INSERT
$sql = "INSERT INTO album (group_id,`delete`,events_id,title) VALUES (". $group_id .",0,'".$events_id."','".$_SESSION['title']."')";
mysqli_query($link , $sql);

$max_id = mysqli_insert_id($link);

mysqli_close($link);
//jsonとして出力

$json = $_POST["data"];

// 保存先＆保存名
$url="../group/" . $group_id . "/album_json/" . $max_id. ".json";

// 生成
file_put_contents($url, $json, LOCK_EX);

// ここから下の出力内容がJSONとしてダウンロードされる

echo $max_id;
exit;

?>

