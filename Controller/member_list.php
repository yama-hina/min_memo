<?php
//更新　田中
//version 1.0
require_once "../../config.php";
require_once "../function/function.php";

//メンバーをキックする処理
if(isset($_POST['kick'])){

    $member_id = $_POST['member_id'];
    $group_id = $_POST['group_id'];

    $link = sql_start(HOST , USER_ID , PASSWORD , DB_NAME);
    $sql1 = "DELETE FROM member WHERE id = " . $member_id ;
    $sql2 = "DELETE FROM belong WHERE member_id = " . $member_id . " AND group_id = " . $group_id;

    mysqli_query($link , $sql1);
    mysqli_query($link , $sql2);

    mysqli_close($link);
}

//見た通りのSQl
$sql = "SELECT me.id AS id , me.name AS name, me.icon AS icon_img , gr.id AS group_id 
        FROM member me 
        INNER JOIN belong be 
        ON me.id = be.member_id 
        INNER JOIN `group` gr 
        ON be.group_id = gr.id ";
$list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);




require_once "../view/member_list.php";
?>