<?php
//更新　籾木
//version 1.1

require_once '../../config.php';
require_once '../function/function.php';
// 退会する時
if(isset($_COOKIE['user_id'])){

    if(isset($_GET['with'])){

        header('location:./withdrawal_comp.php');
        exit();
    }

}
else{
    
    header('location:./OP.php');
    exit();
}
require_once "../view/withdrawal.php";

?>