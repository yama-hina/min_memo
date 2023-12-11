<?php
//作成　田中

require_once "../../config.php";
require_once "../function/function.php";


//テーブルを一括削除
if(isset($_POST['delete'])){

    $sql = [];
    $sql[] = 'DROP TABLE IF EXISTS `album` ';
    $sql[] = 'DROP TABLE IF EXISTS `belong`';
    $sql[] = 'DROP TABLE IF EXISTS `event`';
    $sql[] = 'DROP TABLE IF EXISTS `group` ';
    $sql[] = 'DROP TABLE IF EXISTS `image` ';
    $sql[] = 'DROP TABLE IF EXISTS `join` ';
    $sql[] = 'DROP TABLE IF EXISTS `list` ';
    $sql[] = 'DROP TABLE IF EXISTS `member` ';
    $sql[] = 'DROP TABLE IF EXISTS `notification` ';

    $sql[] = "CREATE TABLE `album` (
            `id` int(11) NOT NULL,
            `group_id` int(11) NOT NULL,
            `delete` int(11) NOT NULL
            )";

    $sql[] = "CREATE TABLE `belong` (
            `member_id` int(11) NOT NULL,
            `group_id` int(11) NOT NULL) ";

    $sql[] = "CREATE TABLE `event` (
            `id` int(11) NOT NULL,
            `name` varchar(100) NOT NULL,
            `date` date NOT NULL,
            `comment` varchar(1000) NOT NULL) ";

    $sql[] = "CREATE TABLE `group` (
            `id` int(11) NOT NULL,
            `name` varchar(100) NOT NULL,
            `icon` varchar(100) DEFAULT NULL,
            `invitation` varchar(6) NOT NULL)";

    $sql[] = "CREATE TABLE `image` (
            `id` int(11) NOT NULL,
            `event_id` int(11) NOT NULL,
            `extension` varchar(5) NOT NULL)";

    $sql[] = "CREATE TABLE `join` (
            `event_id` int(11) NOT NULL,
            `member_id` text(4000) NOT NULL) ";

    $sql[] = "CREATE TABLE `list` (
            `group_id` int(11) NOT NULL,
            `event_id` int(11) NOT NULL)";

    $sql[] = "CREATE TABLE `member` (
            `id` int(8) NOT NULL,
            `name` varchar(20) NOT NULL,
            `birthday` date DEFAULT NULL,
            `password` varchar(30) NOT NULL,
            `icon` varchar(100) DEFAULT NULL,
            `search_img` varchar(100) DEFAULT NULL,
            `withdrawal` char(1) NOT NULL) ";

    $sql[] = "CREATE TABLE `notification` (
            `id` int(11) NOT NULL,
            `member_id` int(11) NOT NULL,
            `comment` varchar(100) NOT NULL,
            `watch` varchar(1) NOT NULL) ";

    $sql[] = "ALTER TABLE `album`
                ADD PRIMARY KEY (`id`,`group_id`);";
    $sql[] = "ALTER TABLE `belong`
                ADD PRIMARY KEY (`member_id` , `group_id`);";
    $sql[] = "ALTER TABLE `event`
                ADD PRIMARY KEY (`id`);";
    $sql[] = "ALTER TABLE `group`
                ADD PRIMARY KEY (`id`);";
    $sql[] = "ALTER TABLE `image`
                ADD PRIMARY KEY (`id`);";
    $sql[] = "ALTER TABLE `join`
                ADD PRIMARY KEY (`event_id`);";
    $sql[] = "ALTER TABLE `list`
                ADD PRIMARY KEY (`group_id`,`event_id`);";
    $sql[] = "ALTER TABLE `member`
                ADD PRIMARY KEY (`id`);";
    $sql[] = "ALTER TABLE `notification`
                ADD PRIMARY KEY (`id`);";

    $sql[] = "ALTER TABLE `album`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
    $sql[] = "ALTER TABLE `event`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
    $sql[] = "ALTER TABLE `group`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
    $sql[] = "ALTER TABLE `image`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
    $sql[] = "ALTER TABLE `member`
                MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;";
    $sql[] = "ALTER TABLE `notification`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

    $sql[] = "INSERT INTO `group`(name,invitation)
            VALUES ('HAL大阪',111111)";

    $sql[] = "INSERT INTO event(name , date, comment)
            VALUES ('HAL EVENT WEEK' ,'". date('Y-m-d')."','WEW!!!!!')";

    $sql[] = "INSERT INTO list(group_id , event_id)
            VALUES (1,1)";

    foreach($sql as $val){

        insert(HOST,USER_ID,PASSWORD,DB_NAME,$val);
    }


}



?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            color: red;
        }
        button{
            width: 300px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>プレゼン用デモデータ作成、削除プログラム</h1>
    <h2>ボタンを押したらDBの中身消えるから気をつけて</h2>
    <form action="pre.php" method="post">
        <button name="delete">実行</button>
    </form>
</body>
</html>