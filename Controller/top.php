<?php
//更新　川嶋
//version 1.0


// // テスト用クッキー
// setcookie('id' , '1' , time()+60*60*24);



require_once '../../config.php';
require_once '../function/function.php';
session_start();
// ログイン済みの時
if(isset($_COOKIE["user_id"])){
    if(isset($_POST["group"])){
        header("location:group_register.php");
        exit;
    }

    //通知削除
    if(isset($_POST['delete'])){

        $delList = $_POST['delete'];
        foreach($delList as $val){
            $sql = "DELETE FROM notification WHERE id = " . $val;
            insert(HOST , USER_ID , PASSWORD , DB_NAME, $sql);
        }
    }

    $member_id = $_COOKIE['user_id'];
    $notification = [];
    $sql = "SELECT * FROM notification WHERE member_id = " . $member_id;
    $notification = @select(HOST,USER_ID,PASSWORD, DB_NAME , $sql);

    if(empty($notification)){
        $notification[0]['not'] = "通知はありません";
    }

    //グループ画面に遷移する処理
    if(isset($_GET['group_id'])){
        $_SESSION['group_id'] = $_GET['group_id'];
        header("location:group.php");
        exit;
    }

    $id = $_COOKIE["user_id"];

    $sql = "SELECT g.id , g.name , g.icon
            FROM `group` g
            INNER JOIN belong b
            ON g.id = b.group_id
            WHERE b.member_id = ". $id ."";

    $sql_member = "SELECT icon
                    FROM member
                    WHERE id = ". $id ."";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $group_list = sql_search($link , $sql);
    $member_icon = sql_search($link , $sql_member);

    //アイコンが存在しているとき
    if($member_icon[0]['icon']){
        $img = "../user/". $id ."/user_icon/".$member_icon[0]['icon'];
        $class = 'userImg';
    }
    //アイコンがデフォルトの時
    else{
        $img = "../img/material/mypage.png";
        $class = 'default';
    }

    $sql = "SELECT * FROM `join`";
    $join = sql_search($link , $sql);
    if($join){
        foreach($join as $val){
            $member = explode("," , $val["member_id"]);
            foreach($member as $value){
                if($value == $id){//自分が参加してるとき
                    $event_look[] = $val["event_id"];//イベントのIDをリスト化
                }
            }
        }
    }
    if(isset($event_look)){
        $currentDate = date('Y-m-d');
        foreach($event_look as $value){
        $sql = "SELECT * FROM event e
                INNER JOIN list l
                ON e.id = l.event_id 
                AND e.withdrawal = 0 AND l.event_id = $value
                ORDER BY e.start_date ASC";//withdrawal削除フラグの判定
            $event_search = sql_search($link , $sql);
            if($event_search){
                if($currentDate <=  $event_search[0]["start_date"]){
                    $list[] = $event_search[0];
                } 
            }
        }
        if(!empty($list)){
            foreach($list as $val){

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
                if($val['end_date'] != $val['start_date']){ //複数日のイベント
                    $dayCount = 0;
                    for($i=date('Ymd', strtotime($val['start_date'])); $i<=date('Ymd', strtotime($val['end_date'])); $i++) {
                    $dayCount++; //何日目かの判定

                    ///イベントの日数を取得
                    $count = 0;
                    for($j=date('Ymd', strtotime($val['start_date'])); $j<=date('Ymd', strtotime($val['end_date'])); $j++){
                        $year = substr($j, 0,4);
                        $month = substr($j, 4,2);
                        $day = substr($j, 6,2);
                        $count++;
                    }
                    $year = substr($i, 0,4);
                    $month = substr($i, 4,2);
                    $day = substr($i, 6,2);
                    if(checkdate ( $month , $day , $year ))
                        $event['id'] = $val['id'];
                        $event['name'] = $val['name'];
                        $event['comment'] = $val['comment'];
                        $event['date'] = date('Y-m-d', strtotime($i));
                        $event['count'] = $dayCount;
                        $event['dateCount'] = $count;
                        $eventList[] = $event;
                    }
                } else { //1日だけのイベント
                    $event['id'] = $val['id'];
                    $event['name'] = $val['name'];
                    $event['comment'] = $val['comment'];
                    $event['date'] = $val['start_date'];
                    $event['count'] = "";
                    $event['dateCount'] = "";
                    $eventList[] = $event;
                }
            }
            foreach($eventList as $val){
                $exp = explode("-" , $val["date"]);
                $select_date[] = $exp[0] . "-" . $exp[1];
            }
            $select_date = array_unique($select_date);
            if(isset($_POST['date'])){
                $today_exp = explode("-" , $_POST['date']);
                foreach($eventList as $val){
                    $date = explode("-" , $val["date"]);
                    if($date[0] == $today_exp[0]){
                        if($date[1] == $today_exp[1]){
                            $event_cut[] = $val;
                        }
                    }
                }         
                $eventList = $event_cut;
            }
        }
        }
    
}
else{
    header('location:./OP.php');
    exit;
}
    
require_once "../view/top.php";
    

?>