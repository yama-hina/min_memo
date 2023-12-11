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

    if(isset($_POST['state']) && $_POST['state'] == 'insert'){

        // グループ名入力チェック
        if(!empty($_POST['name'])){
            $string  = preg_replace("/( |　)/", "", $_POST['name'] );
            if(!empty($string)){
                $name = h($_POST['name']);
                $back_name = h($_POST['name']);
            }
            else{
                $error['name'] = '空欄は使用できません';    
            }
            
        }
        else{
            $error['name'] = 'グループ名が未入力です';
        }


        if(empty($error)){
    
            // 画像処理
            if(isset($_FILES['img'])){

                //招待コード生成
                $rand = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
                $sql = "SELECT invitation as 招待コード FROM `group`";

                $inv = [];
                $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
                if ($link != false){
                    mysqli_set_charset($link , 'utf8');
                    $result = mysqli_query($link , $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $inv[] = $row;
                    }
                    mysqli_close($link);
                }

                for($i = 0; $i < count($inv); $i++){
                    if($inv[$i]['招待コード'] == $rand){
                        $rand = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
                        $i = 0;
                    }
                }

                $sql = "INSERT INTO `group`(name,invitation)
                        VALUES ('". $name ."',". $rand.")";

                $link = sql_start(HOST , USER_ID , PASSWORD , DB_NAME);
                insert_n($link , $sql);

                $group_id = mysqli_insert_id($link);
        
                mysqli_close($link);

                mkdir("../group/". $group_id ."");
                mkdir("../group/". $group_id ."/event_img");
                mkdir("../group/". $group_id ."/group_icon");
                mkdir("../group/". $group_id ."/album_json");
                mkdir("../group/". $group_id ."/bookmark_json");
                mkdir("../group/". $group_id ."/bookmark_img");
    
                $upload_file = $_FILES['img'];

                if($upload_file['size'] != 0){
                    $img_size = getimagesize($_FILES['img']['tmp_name']);
                    $size = ratio_img($img_size[0] , $img_size[1] , 300 , 300);
                    $extension = getExtension($_FILES['img']['name']);
                    $icon = "group_".$group_id. "." .$extension;
                    $file_pass = "../group/". $group_id ."/group_icon/".$icon;
                    compression_img($_FILES['img']['tmp_name'] , $file_pass , $extension , $size[0] , $size[1] , $img_size[0] , $img_size[1]);
                
                    $sql_img = "UPDATE `group`
                                SET icon = '". $icon ."'
                                WHERE id = ". $group_id ."";

                    insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_img);
                }
            }

            $sql_in = "INSERT INTO belong(member_id , group_id)
                        VALUES (". $_COOKIE["user_id"] ." , ". $group_id .")";

            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_in);

            $_SESSION['group_id'] = $group_id;
            header('location:./group.php');
            exit;
        }
    }
}
else{
    header('location:./OP.php');
    exit;
}    



require_once "../view/group_register.php";
?>