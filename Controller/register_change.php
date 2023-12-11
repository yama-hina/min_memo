<?php
//更新　川嶋
//version 1.0

// // テスト用クッキー
// setcookie('id' , '1' , time()+60*60*24);

require_once '../../config.php';
require_once '../function/function.php';

// ログイン済みの時
if(isset($_COOKIE["user_id"])){
    $id = $_COOKIE["user_id"];

    // ログインユーザー情報取得
    $sql = "SELECT name , icon , birthday
            FROM member
            WHERE id LIKE '". $id ."'";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $user = sql_search($link , $sql);

    mysqli_close($link);
    // ユーザー情報を変数に入れる
    $back_name = $user[0]['name'];
    if($user[0]["birthday"] != ""){
        $birthday = $user[0]["birthday"];
    }
    if($user[0]['icon'] != ''){
        $icon = "../user/" . $id . "/user_icon/" . $user[0]['icon'];
    }


    // ボタンを押した時
    if(isset($_POST['state'])){

        // 名前入力チェック
            $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);
            if($link != false){
                $sql = "SELECT * FROM member WHERE name = '" . $_POST["name"] . "'";
                $val = sql_search($link , $sql);
            }
            if($_POST["name"] != ""){
                if(60 < mb_strlen($_POST["name"])){
                    $error["name"] = '氏名は６０文字以内です';
                }
                
                if(!empty($val)){
                    $error["name"] = "この名前は既に使用されています";
                }
            }
            // if(mb_strlen($_POST['password']) < 8 || ctype_upper($_POST['password']) || ctype_lower($_POST['password'])){
            //     $error['pass'] = '大文字小文字を含む8桁以上のパスワードを入力してください';
            // }

        if(empty($error)){
            if(!empty($_POST["name"])){
                $sql = "UPDATE member
                SET name = '". $_POST["name"] ."'
                WHERE id = ". $id ."";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            }
            if(!empty($_POST["password"])){
                $sql = "UPDATE member
                SET password = '". $_POST["password"] ."'
                WHERE id = ". $id ."";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            }
            if(!empty($_POST["date"])){
                $sql = "UPDATE member
                SET birthday = '". $_POST["date"] ."'
                WHERE id = ". $id ."";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
            }
            
            if(isset($_FILES['img'])){
                $upload_file = $_FILES['img'];
                if($upload_file['size'] != 0){
                    $img_size = getimagesize($_FILES['img']['tmp_name']);
                    $size = ratio_img($img_size[0] , $img_size[1] , 300 , 300);
                    $extension = getExtension($_FILES['img']['name']);
                    $icon = $id. "." .$extension;
                    $file_pass = "../user/". $id ."/user_icon/".$icon;
                    compression_img($_FILES['img']['tmp_name'] , $file_pass , $extension , $size[0] , $size[1] , $img_size[0] , $img_size[1]);
                    $sql = "UPDATE member
                        SET icon = '". $icon ."'
                        WHERE id = ". $id ."";
                    insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
                    
                }
            }
            header('location:./mypage.php');
            exit;
        }
    }
}
else{
    header('location:./OP.php');
}


require_once "../view/register_change.php";
?>