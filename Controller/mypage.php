<?php
//更新　川嶋
//version 1.0

// // テスト用クッキー
// setcookie('id' , '1' , time()+60*60*24);

require_once '../../config.php';
require_once '../function/function.php';

// ログイン済みの時
if(isset($_COOKIE["user_id"])){
    $id = $_COOKIE['user_id'];


    //変更の処理達
    //名前の変更を押したら
    if(isset($_POST['state_name']) && $_POST['state_name'] == 'name'){

        // 名前入力チェック
        if(!empty($_POST['name'])){
            if(mb_strlen($_POST['name']) < 20){
                $name = h($_POST['name']);
                $back_name = h($_POST['name']);
            }
            else{
                $error['name'] = '氏名は20文字以内です';
            }
        }
        else{
            $error['name'] = '氏名が未入力です';
        }

        if(empty($error)){
            $sql = "UPDATE member
                    SET name = '". $name ."'
                    WHERE id = ". $id ."";
            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            header('location:./mypage.php');
            exit;
        }
    }

    //パスワードの変更を押したら
    if(isset($_POST['state_pass'])){
        // パスワード入力チェック
        if(!empty($_POST['password'])){
            $password = h($_POST['password']);
        }
        else{
            $error['pass'] = 'パスワードが未入力です';
        }

        if(empty($error)){
            $sql = "UPDATE member
                    SET password = '". $password ."'
                    WHERE id = ". $id ."";
            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);

            header('location:./mypage.php');
            exit;
        }
    }

    //画像の変更を押したら
    if(isset($_POST['state_file']) && $_POST['state_file'] == 'icon'){

        $chack4 = false;
        // 画像処理
        if(isset($_FILES['img'])){
            $upload_file = $_FILES['img'];

            if($upload_file['size'] != 0){
                $img_size = getimagesize($_FILES['img']['tmp_name']);
                $size = ratio_img($img_size[0] , $img_size[1] , 300 , 300);
                $extension = getExtension($_FILES['img']['name']);
                $icon = $id. "." .$extension;
                $file_pass = "../user/". $id ."/user_icon/".$icon;
                compression_img($_FILES['img']['tmp_name'] , $file_pass , $extension , $size[0] , $size[1] , $img_size[0] , $img_size[1]);
                $chack4 = true;
            }
        }
        
        if($chack4){
            $sql = "UPDATE member
                    SET icon = '". $icon ."'
                    WHERE id = ". $id ."";
            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            header('location:./mypage.php');
            exit;
        }
    }

    if(isset($_POST['state_birth']) && $_POST['state_birth'] == 'birth'){
        $sql = "UPDATE member
                SET birthday = '". $_POST['birthday'] ."'
                WHERE id = ". $id ."";
        insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
        header('location:./mypage.php');
        exit;
    }


    // 情報取得
    $sql = "SELECT name , password ,birthday , icon
            FROM member
            WHERE id LIKE ". $_COOKIE["user_id"] ."";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $list = sql_search($link , $sql);

    mysqli_close($link);

    // ユーザー情報を変数に入れる
    $name = $list[0]['name'];
    $password = $list[0]['password'];

    if($list[0]['birthday'] != ''){
        $birthday = $list[0]['birthday'];
    }
    else{
        $birthday = '未設定';
    }

    //アイコンが設定されているときは、設定されている画像を表示。
    if($list[0]['icon'] != ''){
        $icon = '../user/' . $_COOKIE["user_id"] . '/user_icon/' . $list[0]['icon'];
        $class = 'userImg';
    }
    //アイコンが設定されていないとき、デフォルト画像を表示。
    else{
        $icon = '../img/material/mypage.png';
        $class = 'default';
    }



    // ログアウトボタンを押した時
    if(isset($_POST['logout']) && $_POST['logout'] == 'logout'){
        setcookie('user_id' , '' , time() - 100000);
        header('location:./OP.php');
        exit;
    }
    elseif(isset($_POST['logout']) && $_POST['logout'] == 'withdrawal'){
        header('location:./withdrawal.php');
        exit;
    }

}
else{
    header('location:./OP.php');
    exit;
}

require_once "../view/mypage.php";
?>