<?php
require_once "../function/function.php";
require_once "../../config.php";

session_start();
$sql = "select * from event e INNER JOIN image i ON e.id = i.event_id INNER JOIN list l ON e.id = l.event_id WHERE e.start_date LIKE '" . $_POST['year'] . "%' AND e.name LIKE '%" . $_POST['title'] . "%' AND l.group_id = " . $_SESSION['group_id'] . " GROUP BY e.id ORDER BY e.start_date DESC;";
$data = select(HOST, USER_ID, PASSWORD, DB_NAME, $sql);
$data = json_encode($data);
echo $data;
