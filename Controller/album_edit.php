<?php
//更新　籾木
//version 0.0
require_once "../function/function.php";
require_once "../../config.php";

session_start();
// ログイン済みの時
if (isset($_COOKIE['user_id'])) {
    if (!isset($_SESSION['group_id'])) {
        header('location:./group_list.php');
        exit();
    } else {
        $sql = "select * from event e LEFT OUTER JOIN image i ON e.id = i.event_id INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = " . $_SESSION['group_id'] . " GROUP BY e.id ORDER BY e.start_date DESC"; // 削除フラグ判定追加

        $data = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
        foreach ($data as $value) {
            $exp = explode("-", $value["start_date"]);
            if (substr($exp[1], 0, 1) != '0') {
                $select_date[] = $exp[0] . "年" . $exp[1] . "月";
            } else {
                $select_date[] = $exp[0] . "年" . substr($exp[1], 1, 1) . "月";
            }
            $select_value[] = $exp[0] . "-" . $exp[1];
        }

        $select_value = array_unique($select_value);
        $select_date = array_unique($select_date);
    }
} else {
    header('location:./OP.php');
    exit();
}

require_once "../view/album_edit.php";
