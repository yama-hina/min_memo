<?php
require_once "../../config.php";
require_once "../function/function.php";
session_start();
$link = sql_start(HOST , USER_ID , PASSWORD , DB_NAME);
$sql = "SELECT * FROM bookmark WHERE group_id = " . $_SESSION["group_id"] . " AND event_id = " . $_SESSION["event_id"] . ";";
$result = sql_search($link , $sql);
// JSONデータを受け取る
$jsonData = file_get_contents('php://input');
if($jsonData){
    // JSONデータをデコードする
    $data = json_decode($jsonData, true);

    // 保存先のフォルダとファイル名を指定
    $folder = '../group/' . $_SESSION["group_id"] . "/bookmark_json/"; // フォルダのパス
    $filename = $_SESSION["event_id"] . '.json'; // ファイル名

    // JSONデータをファイルに保存
    if (file_put_contents($folder . '/' . $filename, $jsonData) !== false) {
    // 保存が成功した場合の処理
    echo 'JSON data saved successfully.';
    } else {
    // 保存が失敗した場合の処理
    echo 'Failed to save JSON data.';
    }
}
else{
    echo "not found";
}

?>