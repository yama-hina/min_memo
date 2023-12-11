<?php
    $link = sql_start(HOST, USER_ID, PASSWORD, DB_NAME);
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
                $images[] = $image;
            } else {
                $image['judge'] = false;
                $images[] = $image;
            }

        }
    }
    $jsonArray = json_encode($images);
    echo $jsonArray;
?>