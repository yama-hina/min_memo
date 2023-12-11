<!-- 
    更新　川嶋
    version 1.0
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>グループ詳細</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/group_detail.css">
</head>

<body>
    <header>
        <div class="arrow">
            <a href="./group.php">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a>
        </div>
    </header>

    <div id="groupFlex">
        <p class="icon"><img class="<?php echo $class; ?>" src="<?php echo $img_src; ?>" alt=""></p>
        <div>
            <p><?php echo $group_name[0]['name']; ?></p>
            <p>招待コード：<?php echo $group[0]['invitation']; ?></p>
        </div>
    </div>

    <article>
        <h2>メンバー</h2>
        <ul>
            <?php foreach ($member_list as $key => $value) : ?>
                <li>
                    <p class="icon_mini"><img class="userImg" src="<?php echo $member_src[$key]; ?>" alt=""></p>
                    <p><?php echo $member_list[$key]['name']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </article>

    <form action="./group_detail.php" method="POST" enctype="multipart/form-data">
        <div class="longBtnDarkOrange">
            <button id="button" type="submit" name="button" value="change">グループ情報を変更する</button>
        </div>

        <p><button id="button" class="change_page" type="submit" name="button" value="withdrawal">グループから脱退する</button></p>
        <p><button id="button" class="change_page" type="submit" name="button" value="delete">グループを削除する</button></p>
    </form>


</body>

</html>