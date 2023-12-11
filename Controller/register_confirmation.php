<?php
//更新　籾木
//version 1.0
require_once '../function/function.php';
require_once '../../config.php';

session_start();
// 登録ボタンを押した時
if(!isset($_SESSION["name"])){
    header("location:./OP.php");
    exit;
}
if(isset($_GET["res"])){
    if (file_exists($_SESSION["img"])) {
        unlink($_SESSION["img"]);
    }
    unset($_SESSION["img"]);
    unset($_SESSION["password"]);
    header("location:./register.php");
    exit;
}
if(isset($_GET['id'])){
    // sql文
    if($_SESSION['birthday'] != ''){
        $sql = "INSERT INTO member (name,birthday,password,withdrawal) 
        VALUES ('".$_SESSION['name']."','".$_SESSION['birthday']."','".$_SESSION['password']."',0)";
    }else{
        $sql = "INSERT INTO member (name,password,withdrawal) 
        VALUES ('".$_SESSION['name']."','".$_SESSION['password']."',0)";
    }
    // INSERTの実行
    $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);
    if($link != false){
        mysqli_query($link , $sql);
        // id取得
        $id = mysqli_insert_id($link);
        $_SESSION['user_id'] = $id;
        
        // user内にフォルダの作成
        $img_link = '../user/'.$id;
        @mkdir($img_link);
        @mkdir($img_link.'/search_img');
        @mkdir($img_link.'/user_icon');
        if(isset($_SESSION["img"])){
            $sourceFilePath = $_SESSION["img"];
            $destinationFolderPath = $img_link . "/user_icon/";
            $extension = pathinfo($sourceFilePath, PATHINFO_EXTENSION);
            $newFileName = $id . "." . $extension;
            $destinationFilePath = $destinationFolderPath . $newFileName;
            rename($sourceFilePath, $destinationFilePath);
            $sql = "UPDATE member SET icon = '" . $newFileName . "' WHERE id = " . $id;
            mysqli_query($link , $sql);
            mysqli_close($link);
        }
        unset($_SESSION["img"]);
        unset($_SESSION["name"]);
        unset($_SESSION["birthday"]);
        unset($_SESSION["password"]);
        header('location:./register_comp.php');
        exit();
    }
    else{
        echo "データベースが悪い";
    }

}else{
    // パスワードを*に置き換え
    $pass_length = strlen($_SESSION['password']);
    $password = '';
    for($i=0;$i< $pass_length;$i++){
        $password .= '*';
    }

    // 生年月日を置き換える
    if($_SESSION['birthday'] != ''){
        $bir = $_SESSION['birthday'];
        $birthday = explode('-',$bir);
    }
}
require_once "../view/register_confirmation.php";

?>