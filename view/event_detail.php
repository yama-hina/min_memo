<!-- 
    更新　田中
    version 0.0
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>イベント詳細ページ</title>
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

    <section>
        <h1><?php echo $event[0]['name']; ?></h1>
        <h2><?php echo date('Y年m月d日', strtotime($event[0]['start_date'])); ?>～<?php echo date('Y年m月d日', strtotime($event[0]['end_date'])); ?></h2>
        <p><?php echo $event[0]['comment']; ?></p>
    </section>

    <div class="longBtnDarkOrange">
        <form action="./event_detail.php" method="POST" enctype="multipart/form-data">
            <div class="buttonCenter"><button id="button" class="button" type="submit" name="move" value="move">しおりへ移動</button></div>
        </form>
    </div>

    <article>
        <h2>メンバー</h2>
        <ul>
            <?php foreach ($member_list as $key => $value) : ?>
                <?php foreach ($member_id as $key2 => $value2) : ?>
                    <?php if ($member_id[$key2] == $member_list[$key]["id"]) : ?>
                        <?php if(isset($member_list[$key]["icon"])){$img = "../user/" . $member_list[$key]['id'] .  "/user_icon/" . $member_list[$key]['icon'];}else{$img = "../img/material/mypage.png";} ?>
                        <li>
                            <p class="icon_mini"><img src="<?php echo $img;?>" alt=""></p>
                            <p><?php echo $member_list[$key]['name']; ?></p>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </article>

    <div id="vPreview">
        <ul>
            <?php if ($event_img != "") : ?>
                <!-- 登録画像 -->
                <?php foreach ($event_img as $key => $value) : ?>
                        <!-- サムネ写真 -->
                        <li><img src="../group/<?php echo $event[0]['group_id']; ?>/event_img/<?php echo $event_id; ?>/<?php echo "group" . $event[0]['group_id'] . "_" . $event_img[$key]['id'] . "." . $event_img[$key]['extension']; ?>" alt=""></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

    <div class="longBtnDarkOrange">
        <form action="./event_detail.php" method="POST" enctype="multipart/form-data">
            <div class="buttonCenter"><button id="button" class="button" type="submit" name="change" value="change">イベントを編集する</button></div>
        </form>
    </div>
    <div class="longBtnRed">
        <form action="./event_detail.php" method="POST" enctype="multipart/form-data">
            <div class="buttonCenter"><button id="button" class="button" type="submit" name="de" value="delete">イベントを削除する</button></div>
        </form>
    </div>

</body>

</html>