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
    $sql = "SELECT name , icon
            FROM member
            WHERE id LIKE '". $id ."'";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $user = sql_search($link , $sql);

    mysqli_close($link);

    // ユーザー情報を変数に入れる
    $back_name = $user[0]['name'];

    if($user[0]['icon'] != ''){
        $icon = $user[0]['icon'];
    }


    // ボタンを押した時
    if(isset($_POST['state']) && $_POST['state'] == 'name'){

        // 名前入力チェック
        if(!empty($_POST['name'])){
            if(mb_strlen($_POST['name']) < 60){
                $name = h($_POST['name']);
                $back_name = h($_POST['name']);
            }
            else{
                $error['name'] = '氏名は６０文字以内です';
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

        }
    }

        // メール入力チェック
        // if(!empty($_POST['mail'])){
        //     if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){

        //         // 重複チェック
        //         $sql = "SELECT COUNT(*) FROM member WHERE mail = '".$_POST['mail']."'";
        //         $count = select(HOST,USER_ID,PASSWORD,DB_NAME, $sql);
        //         if($count[0]['COUNT(*)'] != 0){
        //             if($back_mail == $_POST['mail']){
        //                 $mail = $_POST['mail'];
        //                 $back_mail = $_POST['mail'];
        //                 $chack2 = true;         
        //             }
        //             else{
        //                 $mail_error = '既に登録されたメールアドレスです';
        //                 $chack2 = false;
        //             }    
        //         }
        //         else{
        //             $mail_error = '既に登録されたメールアドレスです';
        //             $chack2 = false;
        //         }
        //     }
        //     else{
        //         $mail_error = '正しいメールアドレスを入力してください';
        //         $chack2 = false;
        //     }
        // }
        // else{
        //     $mail_error = 'メールアドレスが未入力です';
        //     $chack2 = false;
        // }

    if(isset($_POST['state']) && $_POST['state'] == 'pass'){

        // パスワード入力チェック
        if(!empty($_POST['password'])){
            if(mb_strlen($_POST['password']) < 8 || ctype_upper($_POST['password']) || ctype_lower($_POST['password'])){
                $error['pass'] = '大文字小文字を含む8桁以上のパスワードを入力してください';
            }
            else{
                $password = h($_POST['password']);
            }
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

        }
    }

    if(isset($_POST['state']) && $_POST['state'] == 'icon'){

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

        }
    }
}

else{
    header('location:./OP.php');
}


require_once "../view/Information_change.php";
?>