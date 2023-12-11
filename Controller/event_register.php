<?php
//更新　川嶋 →　田中
//version 2.0

require_once '../../config.php';
require_once '../function/function.php';

// SESSIONテスト　
session_start();
$group_id = $_SESSION['group_id'];

// ログイン済みの時
if(isset($_COOKIE["user_id"])){

    $id = $_COOKIE["user_id"];
    // グループメンバー取得
    $sql = "SELECT m.id , m.name
            FROM member m
            INNER JOIN belong b
            ON m.id = b.member_id
            WHERE b.group_id = ". $group_id ."";

    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8'); 
    $member_list = sql_search($link , $sql);
    mysqli_close($link);
    if(isset($_POST['state']) && $_POST['state'] == 'insert'){

        // イベント名確認
        if(!empty($_POST['event'])){
            $event = h($_POST['event']);
        }
        else{     
            $error['event'] = "イベント名が未入力です";
        }

        if(empty($_POST['start_date'])){
            $error['start_date'] = "日付が選択されていません";
        }

        if($_POST['start_date'] > $_POST['end_date']){
            $error['end_date'] = "終わりの日付が始まりよりも前に設定されています";
        }

        // コメント確認
        if(!empty($_POST['comment'])){
            $comment = h($_POST['comment']);
        }


        if(!empty($_POST['member'])){
            $member = $_POST['member'];
        }
        else{
            $error['member'] = "メンバーが選択されていません";
        }

        if(empty($error)){
            // $_SESSION['date'] = $_POST['date']; これ何？
            if(isset($comment)){
                $sql_ev = "INSERT INTO event(name, start_date, end_date, comment, withdrawal) 
                VALUES ('". $event ."' , '". $_POST['start_date'] ."' , '" . $_POST['end_date'] . "','". $comment ."', 0);"; // 削除フラグ追加
            }else{
                $sql_ev = "INSERT INTO event(name , start_date, end_date, comment, withdrawal)
                VALUES ('". $event ."' , '". $_POST['start_date'] ."','". $_POST['end_date']. "','', 0)"; // 削除フラグ追加
            }

            $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
            mysqli_set_charset($link , 'utf8'); 

            insert_n($link , $sql_ev);

            $event_id = mysqli_insert_id($link);

            $sql_li = "INSERT INTO list(group_id , 	event_id)
                        VALUES (". $group_id ." , ". $event_id .")";

            insert_n($link , $sql_li);

            @mkdir("../group/". $group_id ."/event_img/". $event_id ."");
            @mkdir("../group/". $group_id ."/bookmark_img/". $event_id ."");
            


            // 画像処理
            if(isset($_FILES['img'])){

                if($_FILES['img']['size'][0] != 0){
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

            //通知登録
            $sql = "SELECT * FROM belong WHERE group_id = " . $group_id;
            $list = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
            $sql = "SELECT name FROM `group` WHERE id = "  . $list[0]["group_id"];
            $group_name = select(HOST,USER_ID,PASSWORD,DB_NAME,$sql);

            foreach($list as $val){

                $sql = "INSERT INTO notification(member_id,comment,watch) VALUES(" . $val["member_id"]. " , '" . $group_name[0]["name"] . "にイベントが追加されました'," . 0 . ")";
                insert(HOST,USER_ID,PASSWORD,DB_NAME,$sql);
            }
            if(isset($member)){
                $join_member = '';
                $cnt = count($member);
                foreach($member as $key => $value){
                    if($cnt == $key + 1){

                        $join_member .= $member[$key];
                    }
                    else{

                    $join_member .= $member[$key].',';
                    }
                }
                
                $sql_member = "INSERT INTO `join`(event_id , member_id)
                                VALUES (". $event_id ." , '". $join_member ."')";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_member);
            }
            header('location:./group.php');
            exit();
        }    
    }
}
else{
    header('location:./OP.php');
    exit();
}







require_once "../view/event_register.php";
?>

