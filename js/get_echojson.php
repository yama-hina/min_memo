<?php

require_once "../../config.php";
require_once "../function/function.php";
session_start();
$link = sql_start(HOST , USER_ID , PASSWORD , DB_NAME);
$sql = "SELECT * FROM bookmark WHERE group_id = " . $_SESSION["group_id"] . " AND event_id = " . $_SESSION["event_id"] . ";";
$result = sql_search($link , $sql);
if($result){
    // JSONファイルのパス
    $jsonFilePath = "../group/" . $_SESSION["group_id"] . "/bookmark_json/" . $_SESSION["event_id"] . ".json";

    // JSONファイルを読み込む
    $jsonData = file_get_contents($jsonFilePath);

    // JSONデータを出力
    echo $jsonData;
}

?>