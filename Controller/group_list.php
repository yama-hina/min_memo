<?php
//更新　川嶋
//version 1.0


// // テスト用クッキー
// setcookie('id' , '1' , time()+60*60*24);



require_once '../../config.php';
require_once '../function/function.php';

// ログイン済みの時
if(isset($_COOKIE["user_id"])){

    //グループ画面に遷移する処理
    if(isset($_GET['group_id'])){
        session_start();
        $_SESSION['group_id'] = $_GET['group_id'];
        header("location:group.php");
        exit;
    }

    $id = $_COOKIE["user_id"];

    $sql = "SELECT g.id , g.name , g.icon
            FROM `group` g
            INNER JOIN belong b
            ON g.id = b.group_id
            WHERE b.member_id = ". $id ."";

    $sql_member = "SELECT icon
                    FROM member
                    WHERE id = ". $id ."";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $group_list = sql_search($link , $sql);
    $member_icon = sql_search($link , $sql_member);

    //アイコンが存在しているとき
    if($member_icon[0]['icon']){
        $img = "../user/". $id ."/user_icon/".$member_icon[0]['icon'];
        $class = 'userImg';
    }
    //アイコンがデフォルトの時
    else{
        $img = "../img/material/mypage.png";
        $class = 'default';
    }

    
}
else{
    header('location:./OP.php');
    exit;
}
    
require_once "../view/group_list.php";
    

?>