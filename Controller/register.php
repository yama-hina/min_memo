<?php
//更新　籾木
//version 1.2
require_once '../../config.php';
require_once '../function/function.php';

session_start();
// 同期通信
if(isset($_SESSION["name"])){
    $name = $_SESSION["name"];
    unset($name);
}
if(isset($_POST["name"])){
    $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);
    if($link != false){
        $sql = "SELECT * FROM member WHERE name = '" . $_POST["name"] . "'";
        $val = sql_search($link , $sql);
    }
    if($_POST["name"] == ""){
        $err_msg["name"] = "お名前が入力されていません";
    }
    elseif($val){
        $err_msg["name"] = "この名前は既に使用されています";
    }

    if($_POST["password"] == ""){
        $err_msg["password"] = "パスワードが入力されていません";
    }
    elseif(16 < strlen($_POST["password"])){
        $err_msg["password"] = "パスワードは16文字以内にしてください";
    }
    if(!isset($err_msg)){
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["password"] = $_POST["password"];
        if($_FILES['img']['error'] === UPLOAD_ERR_OK){
            $tmpFilePath = $_FILES["img"]["tmp_name"];
            $path = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
            $destinationPath = "../img/tmp/" . rand(1 , 100) . rand(1 ,100) . rand(1 , 100) . "." . $path;
            move_uploaded_file($tmpFilePath, $destinationPath);
            $_SESSION["img"] = $destinationPath;
        }
        if(isset($_POST['date'])){
            $_SESSION["birthday"] = $_POST["date"];
        }
        header("location:./register_confirmation.php");
        exit;
    }
}
require_once "../view/register.php";

?>