<?php
//更新　田中
//version 1.0
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
}

if(isset($_POST['start'])){

    if(isset($_COOKIE['id'])){

        header("location:group.php");
        exit;
    }
    else{
        if($_POST['start'] == 'register'){
            header("location:register.php");
            exit;
        }elseif($_POST['start'] == 'login'){
            header("location:login.php");
            exit;            
        }
    }
}


require_once "./view/OP.php";

?>