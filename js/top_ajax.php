<?php
//更新　籾木
//version 1 .0

require_once '../../config.php';
require_once '../function/function.php';

if(isset($_POST['load'])){  
    // ロード終了時
    $list = [];
    // イベント登録時は追加月を表示
    session_start();
    if(isset($_SESSION['date'])){
        $date = $_SESSION['date'];
        unset($_SESSION['date']);
        unset($_SESSION['event_id']);
    }else{
        $date = date('Y-m');
    }
    $list['date'] = $date;
    
    // 年・月の調整
    $date_list[0] = substr($date,0,4);
    $date_list[1] = substr($date,5,2);
    $date = $date_list[0].'-'.$date_list[1];
    if($date_list[1] == '01'){
        $date_1 = ($date_list[0] - 1).'-12';
        $date_2 = $date_list[0].'-02'; 
    }elseif($date_list[1] == '12'){
        $date_1 = $date_list[0].'-11';
        $date_2 = ($date_list[1] + 1).'-01';
    }elseif($date_list[1] == 11){
        $date_1 = $date_list[0].($date_list[1]-1);
        $date_2 = $date_list[0].($date_list[1]+1);
    }elseif($date_list[1] == 10 || $date_list[1] == 9){
        $date_1 = $date_list[0].'-0'.($date_list[1]-1);
        $date_2 = $date_list[0].($date_list[1]+1);
    }else{
        $date_1 = $date_list[0].'-0'.($date_list[1]-1);
        $date_2 = $date_list[0].'-0'.($date_list[1]+1);
    }
    
    // 誕生日用
    $bir_date = explode('-',$date);
    $bir_date1 = explode('-',$date_1);
    $bir_date2 = explode('-',$date_2);
    // $bir_date = strval($bir_date);
    // $bir_date1 = strval($bir_date1);
    // $bir_date2 = strval($bir_date2);

    // グループid
    $group_id = $_POST['load'];
    
}elseif(isset($_POST['group']) && isset($_POST['year'])){

    // $_POST['year']:「年-月」
    $date = $_POST['year'];
    
    // 年
    $date_list[0] = substr($date,0,4);
    // 月
    $date_list[1] = substr($date,5,2);

    if($date_list[1] == '01'){
        $date_1 = ($date_list[0] - 1).'-12';
    }elseif($date_list[1] != '12' && $date_list[1] != '11'){
        $date_1 = $date_list[0].'-0'.($date_list[1]-1);
    }else{
        $date_1 = $date_list[0].'-'.($date_list[1]-1);
    }

    if($date_list[1] == '12'){
        $date_2 = ($date_list[0] + 1).'-01';
    }elseif($date_list[1] != '11' && $date_list[1] != '10' && $date_list[1] != '9'){
        $date_2 = $date_list[0].'-0'.($date_list[1]+1);
    }else{
        $date_2 = $date_list[0].'-'.($date_list[1]+1);
    }
    $list = [];
    $list['date'] = $date;
    $group_id = $_POST['group'];

    $bir_date = explode('-',$date);
    $bir_date1 = explode('-',$date_1);
    $bir_date2 = explode('-',$date_2);
}elseif(isset($_POST['group']) && isset($_POST['year2'])){
    $date = $_POST['year2'];
    // 年
    $date_list[0] = substr($date,0,4);
    // 月
    $date_list[1] = substr($date,5,2);

    $date_1 = $date_list[0].'-11';
    $date_2 = ((int)$date_list[0]+1).'-01';

    $list = [];
    $list['date'] = $date;
    // DB接続
    $link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);

    // 誕生日用
    $bir_date = explode('-',$date);
    $bir_date1 = explode('-',$date_1);
    $bir_date2 = explode('-',$date_2);

    $group_id = $_POST['group'];
}elseif(isset($_POST['event_id'])){
    // イベント登録ボタンを押したとき

    session_start();
    $_SESSION['group_id'] = $_POST['event_id'];
    exit();
}elseif(isset($_POST['g_name'])){
    session_start();
    $_SESSION['group_id'] = $_POST['g_name'];
    exit();
}

// DB接続
$link = sql_start(HOST,USER_ID,PASSWORD,DB_NAME);

// グループ名
$list['g_name'] = [];
$sql = "SELECT * FROM `group` WHERE id = '".$group_id."'";
$result = mysqli_query($link , $sql);
$list['g_name'] = mysqli_fetch_assoc($result)['name'];

// page1
$list['page1'] = [];
$sql = "SELECT * FROM event e INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = '".$group_id."' AND e.date LIKE '".$date_1."%'  ORDER BY e.date";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_assoc($result)){
    $list['page1'][] = $row;
}

// page2
$list['page2'] = [];
$sql = "SELECT * FROM event e INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = '".$group_id."' AND e.date LIKE '".$date."%'  ORDER BY e.date";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_assoc($result)){
    $list['page2'][] = $row;
}

// page3
$list['page3'] = [];
$sql = "SELECT * FROM event e INNER JOIN list l ON e.id = l.event_id WHERE l.group_id = '".$group_id."' AND e.date LIKE '".$date_2."%'  ORDER BY e.date";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_assoc($result)){
    $list['page3'][] = $row;
}

// page1の誕生日
$list['page1_date'] = [];
$sql = "SELECT * FROM member m INNER JOIN belong b ON m.id = b.member_id WHERE b.group_id = '".$group_id."' AND m.birthday LIKE '%-".$bir_date1[1]."-%' ORDER BY m.birthday";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_assoc($result)){
    $list['page1_date'][] = $row;
}

// page2の誕生日
$list['page2_date'] = [];
$sql = "SELECT * FROM member m INNER JOIN belong b ON m.id = b.member_id WHERE b.group_id = '".$group_id."' AND m.birthday LIKE '%-".$bir_date[1]."-%' ORDER BY m.birthday";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_assoc($result)){
    $list['page2_date'][] = $row;
}

// page3の誕生日
$list['page3_date'] = [];
$sql = "SELECT * FROM member m INNER JOIN belong b ON m.id = b.member_id WHERE b.group_id = '".$group_id."' AND m.birthday LIKE '%-".$bir_date2[1]."-%' ORDER BY m.birthday";
$result = mysqli_query($link , $sql);
while($row = mysqli_fetch_assoc($result)){
    $list['page3_date'][] = $row;
}

mysqli_close($link);

// page1_ext
$list['page1_ext'] = [];
for($i=0;$i<COUNT($list['page1']);$i++){
    $sql = "SELECT * FROM event e INNER JOIN image i ON e.id = i.event_id INNER JOIN list l ON e.id = l.event_id WHERE i.event_id = '".$list['page1'][$i]['id']."'";
    $list['page1_ext'][] = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
}

// page2_ext
$list['page2_ext'] = [];
for($i=0;$i<COUNT($list['page2']);$i++){
    $sql = "SELECT * FROM event e INNER JOIN image i ON e.id = i.event_id INNER JOIN list l ON e.id = l.event_id WHERE i.event_id = '".$list['page2'][$i]['id']."'";
    $list['page2_ext'][] = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
}

// page3_ext
$list['page3_ext'] = [];
for($i=0;$i<COUNT($list['page3']);$i++){
    $sql = "SELECT * FROM event e INNER JOIN image i ON e.id = i.event_id INNER JOIN list l ON e.id = l.event_id WHERE i.event_id = '".$list['page3'][$i]['id']."'";
    $list['page3_ext'][] = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
}

//jsonとして出力
header('Content-type: application/json');
echo json_encode($list,JSON_UNESCAPED_UNICODE);

?>

