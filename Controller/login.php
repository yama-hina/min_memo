<?php
//更新　川嶋
//version 0.0

require_once '../../config.php';
require_once '../function/function.php';


// id,passwordチェック
if(isset($_POST['state']) && $_POST['state'] == 'insert'){

    // ログインID
    if(!empty($_POST['name'])){

       $name = h($_POST['name']);
       $back_name = $_POST['name'];
    }
    else{

       $error['name'] = '名前が未入力です';
       $back_error = 'ログインに失敗しました。<br>ID、パスワードをもう一度ご確認ください。';
    }

    // パスワード
    if(!empty($_POST['password'])){

       $password = h($_POST['password']);
       $back_error = 'ログインに失敗しました。<br>ID、パスワードをもう一度ご確認ください。';
    }
    else{
       $error['pass'] = 'パスワードが未入力です';
       $back_error = 'ログインに失敗しました。<br>ID、パスワードをもう一度ご確認ください。';
    }


    // id,passwordが両方入力されていたとき
    if(empty($error)){

        $sql = "SELECT id , name , password
                FROM member
                WHERE name LIKE '". $name ."'
                AND password LIKE '". $password ."'
                AND withdrawal = 0";

        $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
        mysqli_set_charset($link , 'utf8'); 

        // DBチェック
        $check = sql_search($link , $sql);

        mysqli_close($link);


        if($check){

            // id,passwordが正しい時
            setcookie('user_id' , $check[0]['id'] , time()+60*60*24);
            header('location:./top.php');
            exit;
        }
        else{

            // id,passwordが正しくない時
            $error['pass'] = 'もう一度パスワードを入力してください';
            $back_error = 'ログインに失敗しました。<br>ID、パスワードをもう一度ご確認ください。';
        }
    }
}



require_once "../view/login.php";
?>