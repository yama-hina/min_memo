<?php
//更新　籾木
//version 1 .0

require_once "../../config.php";
require_once "../function/function.php";

session_start();

// ログイン済みの時
if (isset($_COOKIE['user_id'])) {
    if(isset($_POST["bookmark"])){
        $_SESSION["group_id"] = $_POST["group_id"];
        $_SESSION["event_id"] = $_POST["event_id"];
        header("location:./bookmark.php");
        exit;
    }
    if(isset($_GET["back"])){
        header("location:./top.php");
        exit;
    }
    if(isset($_GET["detail"])){
        header("location:group_detail.php");
        exit;
    }
    //ここから新規
    $link = sql_start(HOST, USER_ID, PASSWORD, DB_NAME);

    $sql = "SELECT * FROM `group` WHERE id = " . $_SESSION["group_id"];
    $result = mysqli_query($link, $sql);
    $group = mysqli_fetch_assoc($result);

    if(isset($group["icon"])){
        $img = "../group/" . $_SESSION["group_id"] . "/group_icon/" . $group["icon"]; 
    }else{
        $img = "../img/material/group.png";
    }

    $sql = "SELECT * FROM event e
                INNER JOIN list l
                ON e.id = l.event_id
                WHERE l.group_id = " . $_SESSION['group_id'] .
              " AND e.withdrawal = 0
                ORDER BY e.start_date ASC"; //withdrawal削除フラグの判定
    $result = mysqli_query($link, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }
    $images = [];
    if (!empty($list)) {
        foreach ($list as $val) {
            $sql = "SELECT * FROM image
                WHERE event_id = " . $val['id'];
            $result = mysqli_query($link, $sql);
            $list_image = mysqli_fetch_assoc($result);

            if ($list_image != NULL) {
                $image['judge'] = true;
                $image['id'] = $list_image['id'];
                $image['extension'] = $list_image['extension'];
                $image['event_id'] = $val['id'];
                $image['group_id'] = $_SESSION['group_id'];
                $images[] = $image;
            } else {
                $image['judge'] = false;
                $images[] = $image;
            }
            $jsonArray = json_encode($images);

            $event = [];
            if ($val['end_date'] != $val['start_date']) { //複数日のイベント
                $dayCount = 0;
                for ($i = date('Ymd', strtotime($val['start_date'])); $i <= date('Ymd', strtotime($val['end_date'])); $i++) {
                    $dayCount++; //何日目かの判定

                    ///イベントの日数を取得
                    $count = 0;
                    for ($j = date('Ymd', strtotime($val['start_date'])); $j <= date('Ymd', strtotime($val['end_date'])); $j++) {
                        $year = substr($j, 0, 4);
                        $month = substr($j, 4, 2);
                        $day = substr($j, 6, 2);
                        $count++;
                    }
                    $year = substr($i, 0, 4);
                    $month = substr($i, 4, 2);
                    $day = substr($i, 6, 2);
                    if (checkdate($month, $day, $year))
                        $sql = "SELECT * FROM bookmark WHERE group_id = " . $_SESSION["group_id"] . " AND event_id = " . $val['id'];
                        $result = mysqli_query($link, $sql);
                        $bookmark[] = mysqli_fetch_assoc($result);
                        $event['id'] = $val['id'];
                        $event['name'] = $val['name'];
                        $event['comment'] = $val['comment'];
                        $event['date'] = date('Y-m-d', strtotime($i));
                        $event['count'] = $dayCount;
                        $event['dateCount'] = $count;
                        $eventList[] = $event;
                    }
            } else { //1日だけのイベント
                $sql = "SELECT * FROM bookmark WHERE group_id = " . $_SESSION["group_id"] . " AND event_id = " . $val['id'];
                $result = mysqli_query($link, $sql);
                $bookmark[] = mysqli_fetch_assoc($result);
                $event['id'] = $val['id'];
                $event['name'] = $val['name'];
                $event['comment'] = $val['comment'];
                $event['date'] = $val['start_date'];
                $event['count'] = "";
                $event['dateCount'] = "";
                $eventList[] = $event;
            }
        }
        foreach ($eventList as $val) {
            $exp = explode("-", $val["date"]);
            $select_date[] = $exp[0] . "-" . $exp[1];
        }
        $select_date = array_unique($select_date);
        if (isset($_POST['date'])) {
            $today_exp = explode("-", $_POST['date']);
            foreach ($eventList as $val) {
                $date = explode("-", $val["date"]);
                if ($date[0] == $today_exp[0]) {
                    if ($date[1] == $today_exp[1]) {
                        $event_cut[] = $val;
                    }
                }
            }
            $eventList = $event_cut;
        }
    }
    // イベント詳細
    if (isset($_GET['event_id'])) {

        $_SESSION['event_id'] = $_GET['event_id'];
        $_SESSION['group_id'] = $_GET['group_id'];
        header('location:./event_detail.php');
        exit();
    }
    if (!$_SESSION['group_id']) {
        header('location:./top.php');
        exit();
    } else {
        $json_group_id = json_encode($_SESSION['group_id']);
        // $_SESSION = array();
        // session_destroy();
    }
    
} else {
    header('location:./OP.php');
    exit();
}
require_once "../view/group.php";
