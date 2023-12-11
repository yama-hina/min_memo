<?php
//更新　川嶋
//version 1.0


// テスト用クッキー
// setcookie('id' , '1' , time()+60*60*24);


// $group_id = 1;
session_start();

require_once '../../config.php';
require_once '../function/function.php';

// ログイン済みの時
if(isset($_COOKIE["user_id"])){
    if(isset($_POST['button']) && $_POST['button'] == 'change'){
        header("location:./group_change.php");
        exit;
    }

    if(isset($_POST['button']) && $_POST['button'] == 'delete'){
        $_SESSION['group_name'] = $group_name;
        $_SESSION['group_img'] = $img_src;
        header('location:./group_delete.php');
        exit;
    }elseif(isset($_POST['button']) && $_POST['button'] == 'withdrawal'){
        $_SESSION['group_name'] = $group_name;
        $_SESSION['group_img'] = $img_src;
        header('location:./group_withdrawal.php');
        exit;
    }elseif(isset($_POST['button']) && $_POST['button'] == 'change'){
        $_SESSION['group_name'] = $group_name;
        $_SESSION['group_img'] = $img_src;
        header('location:./group_.php');
        exit;
    }

    $group_id = $_SESSION['group_id'];

    // グループメンバー取得
    $sql = "SELECT m.id , m.name , m.icon
            FROM member m
            INNER JOIN belong b
            ON m.id = b.member_id
            WHERE b.group_id = ". $group_id;

    $sql_group = "SELECT name , icon
                  FROM `group`
                  WHERE id = ". $group_id ."";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $member_list = sql_search($link , $sql);
    $group_name = sql_search($link , $sql_group);


    mysqli_close($link);

    foreach($member_list as $key => $val){
        if($val['icon'] == ''){
            $member_src[] = '../img/material/mypage.png';
        }else{
            $member_src[] = "../user/" . $member_list[$key]['id'] . "/user_icon/" . $member_list[$key]['icon'];
        }
    }

    //アイコンが無かったらデフォルト画像を表示
    if($group_name[0]['icon'] == ''){
        $img_src = '../img/material/group.png';
        $class = 'default';
    }
    //アイコンがあったらアイコンを表示
    else{
        $img_src = '../group/' . $group_id . '/group_icon/' . $group_name[0]['icon'];
        $class = 'userImg';
    }


    //招待コード取得
    $sql  = "SELECT invitation FROM `group` WHERE id = " . $group_id;
    $group = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);

}
else{
    header('location:./OP.php');
    exit;
}    


require_once "../view/group_detail.php";
?>