<?php
require_once "../../config.php";
require_once "../function/function.php";
session_start();
if(isset($_COOKIE["user_id"])){
    $id = $_COOKIE["user_id"];
    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 
    $sql = "SELECT * FROM `join`";
    $join = sql_search($link , $sql);
    foreach($join as $val){
        $member = explode("," , $val["member_id"]);
        foreach($member as $value){
            if($value == $id){//自分が参加してるとき
                $event[] = $val["event_id"];//イベントのIDをリスト化
            }
        }
    }
    if(isset($event)){
        $currentDate = date('Y-m-d');
        foreach($event as $value){
            $sql = "SELECT * FROM `event` WHERE id =" . $value;
            $event_search = sql_search($link , $sql);
            if(isset($event_search)){
                if($currentDate <=  $event_search[0]["start_date"]){
                    $event_view[] = $event_search;
                }
                if(isset($event_view)){
                    var_dump($event_view);
                }   
            }
            }
        
    }

}

?>