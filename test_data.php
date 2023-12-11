<?php

require_once "../config.php";
require_once "./function/function.php";

if(isset($_GET['m_insert'])){

    for($i=0;$i < 100;$i++){
        $sql = "INSERT INTO member (name,password,withdrawal) 
        VALUES ('".rand(1000,9999)."','".rand(1000,9999)."',0)";
        insert(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
    }    
    echo "メンバー登録完了";

    $list = select(HOST,USER_ID,PASSWORD,DB_NAME,"SELECT * FROM member");
}

if(isset($_GET['g_insert'])){    

    for($i=1;$i <= 100; $i++){
        $sql = "INSERT INTO `belong` (`member_id`, `group_id`) VALUES (" . $i . "," .  1 . ")";
        insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
    }
    echo "グループ追加完了";
    $list = select(HOST,USER_ID,PASSWORD,DB_NAME,"SELECT * FROM belong");
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>データベースの中身を削除してから使用してください</h1>
    <p>グループID1番に100件のユーザを登録する</p>
    <form action="test_data.php">
    <button name="m_insert">メンバー登録</button><br><br>
    <p>グループID1番に100件のユーザを追加する</p>
    <button type="text" name="g_insert">グループ追加</button>

    <p>登録後はログインしてグループを作成してください</p>
    <pre>
        <?php
        if(isset($list)){
            var_dump($list);
        }?>
    </pre>
</form>
</body>
</html>