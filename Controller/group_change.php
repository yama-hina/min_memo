<?php
    require_once "../function/function.php";
    require_once "../../config.php";
    session_start();

    if(isset($_COOKIE["user_id"])){
        $link = sql_start(HOST, USER_ID, PASSWORD, DB_NAME);
        mysqli_set_charset($link , 'utf8');
        $sql = "SELECT * FROM `group` WHERE id = " . $_SESSION["group_id"];
        $result = mysqli_query($link, $sql);
        $group = mysqli_fetch_assoc($result);
        if(isset($group["icon"])){
            $img = "../group/" . $_SESSION["group_id"] . "/group_icon/" . $group["icon"]; 
        }else{
            $img = "../img/material/group.png";
        }

        if(isset($_GET["back"])){
            header("location:group_detail.php");
            exit;
        }
        if(isset($_POST["name"])){
            if($_POST["name"] == ""){
                $error["name"] = "空欄は使用できません";
            }
            
            if(empty($error)){
                $sql_name = "UPDATE `group`
                                   SET name = '". $_POST["name"] ."'
                                   WHERE id = ". $_SESSION["group_id"] ."";
                insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_name);

                if(isset($_FILES['img'])){
                    if(!empty($_FILES['img'])){
                        if($_FILES['img']['size'] > 0){
                            echo "ok";
                            if($group["icon"] != ""){
                                unlink($img);
                            }
                            $extension = getExtension($_FILES['img']['name']);
                            $sql_img = "UPDATE `group`
                                   SET icon = 'group_" . $group["id"] . "." . $extension ."'
                                   WHERE id = ". $_SESSION["group_id"] ."";
                            insert(HOST , USER_ID , PASSWORD , DB_NAME , $sql_img);
                            $targetFile = "../group/" . $_SESSION["group_id"] . "/group_icon/group_" . $_SESSION["group_id"] . "." . $extension; 
                            move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);       
                        }
                    }
                }
                header("location:./group.php");
                exit;
            }
        }
    }
    else{
        header("location:./OP.php");
        exit;
    }
    require_once "../view/group_change.php";
?>