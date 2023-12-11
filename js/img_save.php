<?php

require_once "../function/function.php";
require_once "../../config.php";
session_start();
$t = 0;
$i = 0;
$targetDir = "../group/".$_SESSION["group_id"]."/bookmark_img/" . $_SESSION["event_id"] . "/"; // 保存先のフォルダパス
$files = scandir($targetDir);
if($files){    
    
    foreach ($files as $file) {
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $i = max($i, $fileName);
    }
    $i++;
}

$link = sql_start(HOST , USER_ID , PASSWORD , DB_NAME);
$sql = "SELECT * FROM bookmark WHERE group_id = " . $_SESSION["group_id"] . " AND event_id = " . $_SESSION["event_id"] . ";";
$search = sql_search($link , $sql);
if($search){    
        foreach ($_FILES['img']['tmp_name'] as $key => $tmpFilePath) {
            $uploadedFile = $_FILES['img']['name'][$key];
    
            $targetFilePath = $targetDir . $i . "." . pathinfo($uploadedFile, PATHINFO_EXTENSION);
            $json_pass[$t] = $i . "." . pathinfo($uploadedFile, PATHINFO_EXTENSION);
    
            if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
                // ファイルの移動に成功した場合の処理
                $i++;
                $t++;
                
            } else {
                // ファイルの移動に失敗した場合の処理
                echo 'Failed to upload the image: ' . $uploadedFile . '<br>';
            }
        }
        // インサートIDをjsonで返す
        $response = array('id' => $search[0]["id"] , "img" => $json_pass);
        echo json_encode($response);
}
else{
    $sql = "INSERT INTO bookmark (group_id, event_id , del) VALUES (" . $_SESSION["group_id"] . " , " . $_SESSION["event_id"] . " , 0)";
    if (mysqli_query($link, $sql)) {
        // 登録したデータのIDを取得
        $lastInsertID = mysqli_insert_id($link);
    
        foreach ($_FILES['img']['tmp_name'] as $key => $tmpFilePath) {
            $uploadedFile = $_FILES['img']['name'][$key];
    
            $targetFilePath = $targetDir . $i . "." . pathinfo($uploadedFile, PATHINFO_EXTENSION);
            $json_pass[$i] = $i . "." . pathinfo($uploadedFile, PATHINFO_EXTENSION);
    
            if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
                // ファイルの移動に成功した場合の処理
                $i++;
                
            } else {
                // ファイルの移動に失敗した場合の処理
                echo 'Failed to upload the image: ' . $uploadedFile . '<br>';
            }
        }
        // インサートIDをjsonで返す
        $response = array('id' => $lastInsertID , "img" => $json_pass);
        echo json_encode($response);
    } else {
        echo 'Failed to insert data into the database.';
    }
}


mysqli_close($link);
?>