<?php
$folderPath = '../img/bookmark/';
var_dump($_POST["value"]);
if(isset($_POST["value"][0]["img"])){
    $json = $_POST["value"][0]["img"];
    foreach($json as $val){
        $imageFile = $folderPath . $val;
        if (file_exists($imageFile)) {
            unlink($imageFile);  // 画像を削除
        }
    }
}
?>