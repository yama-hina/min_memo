<?php

require_once '../../config.php';
require_once '../function/function.php';

header("Content-Type: application/json; charset=UTF-8");
$search = h($_GET['code']);

$result = false;

$sql = "SELECT g.id , g.name , g.icon , g.invitation
        FROM `group` g
        WHERE g.invitation = '". $search ."'";

$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8'); 

$result = sql_search($link , $sql);


if($result){
    if($result[0]["icon"] != ""){
        $result[0]["icon"] = "../group/" . $result[0]["id"] . "/group_icon/" . $result[0]["icon"];
        $search_result = $result[0];
        echo json_encode($search_result);
        exit;
    }
    else{
        $result[0]["icon"] = "../img/material/mypage.png";
        $search_result = $result[0];
        echo json_encode($search_result);
        exit;
    }
}
else{
    exit;
}

?>