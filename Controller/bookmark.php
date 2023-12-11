<?php
require_once "../../config.php";
require_once "../function/function.php";
session_start();

// ログイン済みの時
if(isset($_COOKIE['user_id'])){
    $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);
    $sql = "SELECT * FROM event e
            INNER JOIN list l
            ON e.id = l.event_id
            WHERE l.group_id = " . $_SESSION['group_id'] . " AND l.event_id = " . $_SESSION["event_id"];
    $result = mysqli_query($link , $sql);
    while($row = mysqli_fetch_assoc($result)){
        $list[] = $row;
    }
    // DBから始まりと終わりの日付を取得して期間内のすべての日付を配列に保存する処理
    $start_date = $list[0]["start_date"];
    $end_date = $list[0]["end_date"];
    $date_range = [];
    $current_date = $start_date;

    while ($current_date <= $end_date) {
        $date_range[] = $current_date;//期間の配列
        $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
    }
}else{
    header("location:OP.php");
}
require_once "../view/bookmark.php";

?>