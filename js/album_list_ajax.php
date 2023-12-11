<?php
require_once '../function/function.php';
require_once '../../config.php';
if(isset($_POST['load'])){
    // アルバムの取得
    $sql = "SELECT * FROM album where group_id = '".$_POST['load']."' AND `delete` = 0 ORDER BY id desc";
    $list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
    //jsonとして出力
    header('Content-type: application/json');
    echo json_encode($list,JSON_UNESCAPED_UNICODE);
}
?>