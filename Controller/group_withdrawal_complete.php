<?php

require_once '../../config.php';
require_once '../function/function.php';

if(isset($_COOKIE["user_id"])){

    if(isset($_POST['back']) && $_POST['back'] == 'back'){

        header('location:./group_list.php');
        exit;
    }
}
require_once "./view/group_withdrawal_complete.php";

?>

