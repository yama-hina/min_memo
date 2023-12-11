<?php

require_once "./config.php";
require_once "./memory/function/function.php";

date_default_timezone_set('Asia/Tokyo');
$date = date('md');//現在日取得

$sql = "SELECT id, birthday FROM member WHERE birthday IS NOT NULL";//誕生日を設定している会員を取得
$list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);


foreach($list as $val){

    $member_birth = str_replace('-', '', $val['birthday']);
    $member_birth = mb_substr($member_birth, -4);
    if($member_birth == $date){

        $member_list[] = $val['id'];
    }
}


//所属しているグループを取得
$sql = "SELECT * FROM belong";
$group_list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
foreach($member_list as $val){

    $sql = "SELECT name FROM member WHERE id = ". $val;
    $name = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql); //誕生日の会員の名前を取得


    $member_group = [];
    foreach($group_list as $key =>  $g_val){

        if($g_val['member_id'] == $val){

            $member_group[] = $g_val['group_id'];
        }
    }

    foreach($member_group as $mg_val){

        $group = [];
        $sql = "SELECT m.id , g.name
        FROM member m
        INNER JOIN belong b
        ON m.id = b.member_id
        INNER JOIN `group` g
        ON b.group_id =  g.id
        WHERE b.group_id = ". $mg_val . "
        AND NOT m.id = " . $val;
        $group = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
        foreach($group as $value){

                $sql = "INSERT INTO notification(member_id,comment,watch) VALUES(" . $value["id"]. " , '" . $value["name"] . "の" .$name[0]['name'] . "さんが誕生日です'," . 0 . ")";
                insert(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
        }
    }
}


?>
