<?php
//更新　川嶋
//version 1.0

// // テスト用クッキー
// setcookie('id' , '1' , time()+60*60*24);

// SESSIONテスト　
session_start();
$event_id = $_SESSION['event_id'];
$group_id = $_SESSION['group_id'];

require_once '../../config.php';
require_once '../function/function.php';

// ログイン済みの時
if(isset($_COOKIE["user_id"])){
    $id = $_COOKIE["user_id"];
    if(isset($_GET["back"])){
        header("location:event_detail.php");
        exit;
    }
    
    // イベント名のバリデーション
    if(isset($_POST['name'])){
        if($_POST['name'] != ''){
            if(mb_strlen($_POST['name']) > 20){
                $error['name'] = "イベント名は20文字以内です";
            }
        }
        else{
            $error['name'] = "イベント名を入力してください";
        }
    }
    // 日付のバリデーション
    if(isset($_POST["start_date"])){
        if($_POST['start_date'] > $_POST['end_date']){
            $error['date'] = "終わりの日付が始まりよりも前に設定されています";
        }
    }

    // メンバーのバリデーション
    if(isset($_POST['member'])){
        if(empty($_POST['member'])){
            $error['member'] = "メンバーを選択してください";
        }
    }

    if(isset($_POST["name"])){
        if(empty($error)){
            // イベント名の有無でデータベースに登録
            if($_POST['name'] != ''){
                    $name = $_POST['name'];
            
                    $sql_name = "UPDATE event
                                SET name = '". $name ."'
                                WHERE id = ". $event_id ."";
            
                    insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_name);  
            }
            // コメントの有無でデータベースに登録
            if(isset($_POST['comment'])){
                $comment = $_POST['comment'];
                $sql_com = "UPDATE event
                            SET comment = '". $comment ."'
                            WHERE id = ". $event_id ."";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_com);    
            }
    
            if(!empty($_POST['start_date'])){
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $sql_date = "UPDATE event
                            SET start_date = '". $start_date ."' , end_date = '" . $end_date . 
                            "' WHERE id = ". $event_id ."";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_date);    
            }
    
            if(isset($_FILES['img'])){
                if(!empty($_FILES['img'])){
                    if($_FILES['img']['size'][0] > 0){
                        
                        foreach($_FILES['img']['tmp_name'] as $key => $value){
                            $extension = getExtension($_FILES['img']['name'][$key]);
        
                            $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
                            mysqli_set_charset($link , 'utf8'); 
                
                            $sql_img = "INSERT INTO image(event_id , extension)
                                        VALUES (". $event_id ." , '". $extension ."')";
        
                            insert_n($link , $sql_img);
                
                            $img_id = mysqli_insert_id($link);
        
                            $img_size = getimagesize($_FILES['img']['tmp_name'][$key]);
                            $size = ratio_img($img_size[0] , $img_size[1] , 300 , 300);
                            $file_name = "group".$group_id. "_". $img_id ."." .$extension;
                            $file_pass = "../group/". $group_id ."/event_img/". $event_id ."/".$file_name;
                            compression_img($_FILES['img']['tmp_name'][$key] , $file_pass , $extension , $size[0] , $size[1] , $img_size[0] , $img_size[1]);
        
                            $sql_extension = "UPDATE image
                                            SET extension = '". $extension ."'
                                            WHERE id = ". $img_id ."";
        
                            insert_n($link , $sql_extension);
                        }
                    }
                }
                // メンバーの登録
                if(!empty($_POST['member'])){
                    $member = $_POST['member'];
                    $join_member = '';
                    foreach($member as $key => $value){
                        $members = h($member[$key]);
                        
                        $join_member .= $members.',';
                    }
                    $sql_member = "UPDATE `join`
                                   SET member_id = '". $join_member ."'
                                   WHERE event_id = ". $event_id ."";
                    insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_member);
                }
            }
            header("location:./event_detail.php");
            exit;
            } 
        }
    // イベント情報取得
    $sql_event = "SELECT e.name , e.start_date , e.comment , l.group_id
                  FROM event e
                  INNER JOIN list l
                  ON e.id = l.event_id
                  WHERE e.id = ". $event_id ."";

    $sql_img = "SELECT i.id , i.extension
                FROM event e
                INNER JOIN image i
                ON e.id = i.event_id
                WHERE e.id = ". $event_id ."";

    $sql_member = "SELECT member_id
                   FROM `join`
                   WHERE event_id = ". $event_id ."";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 

    $event = sql_search($link , $sql_event);

    $event_img = sql_search($link , $sql_img);
    $member = sql_search($link , $sql_member);

    $member_id = explode("," , $member[0]['member_id']);

    $sql = "SELECT m.id , m.name
            FROM member m
            INNER JOIN belong b
            ON m.id = b.member_id
            WHERE b.group_id = ". $group_id ."";

    $member_list = sql_search($link , $sql);

    // member ラジオボタン チェック作成
    foreach($member_list as $key => $row){
        foreach($member_id as $val){
            if($val == $row['id']){
                $member_list[$key]['check'] = 'checked';
                break;
            }
            else{
                $member_list[$key]['check'] = '';
            }
        }
    }
    // member ラジオボタン チェック作成ここまで
}
else{

    header('location:./OP.php');
    exit;
}
// img delete するとき
if(!empty($_GET['src'])){
        $sql_delete_img = "DELETE 
        FROM image
        WHERE id = ". $_GET["id"] . " AND event_id = " . $event_id;
        mysqli_query($link , $sql_delete_img);//database内のimg削除
        unlink($_GET["src"]);//指定ファイルの削除
        header('location:./event_change.php');
        exit();
}

require_once "../view/event_change.php";

?>