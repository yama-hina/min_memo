<?php
//更新　原
//修正　田中
//version 2.0
require_once '../../config.php';
require_once '../function/function.php';
session_start();

if(!empty($_GET['group_id'])){
    //ハッシュ化しているグループIDを探す
    $sql = "SELECT id, invitation FROM `group`";
    $list = [];
    $list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
    foreach($list as $val){
        if($val['invitation'] == $_GET['group_id']){ 
            $group_id = $val['id'];
            $_SESSION["group_id"] = $group_id; 
        }
    }
    if(isset($group_id)){
        //通知登録
        $sql = "SELECT * FROM belong WHERE group_id = " . $group_id;
        $list = []; //初期化
        $list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);//通知を送るグループメンバーを取得

        $sql = "SELECT name FROM member WHERE id = " . $_COOKIE['user_id'];
        $user_name = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);//追加されるアカウントの名前取得

        $sql = "SELECT name FROM `group` WHERE id = " . $group_id;
        $group_name = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);//追加するグループ名取得
        
        foreach($list as $val){//ループでグループに参加している全員に通知を追加する
            
            $sql = "INSERT INTO notification(member_id,comment,watch) 
                    VALUES(" . $val["member_id"]. " , '" . $group_name[0]['name'] . "に" . $user_name[0]['name']. "さんが参加しました'," . 0 . ")";
            insert(HOST,USER_ID,PASSWORD,DB_NAME,$sql); //通知登録
        }
        
        //グループに追加
        $sql = "INSERT INTO `belong` (`member_id`, `group_id`) VALUES (" . $_COOKIE['user_id'] . "," . $group_id . ")";
        insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
    }   
    else{
        header("location:group.php");
        exit;
    }      
}

header("location:group.php");
exit;



?>
