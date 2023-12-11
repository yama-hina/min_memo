<!-- 
    更新　遠山 ⇒　籾木
    version 2.0
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>TOP画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/group.css">


</head>

<body>
    <?php if (isset($empty)) { ?>
        <!-- グループがない場合 -->
        <p id="empty"><?php echo $empty; ?></p>
        <div id="non_group"></div>
    <?php } else { ?>
        <!-- <header>
            <a href="../Controller/group_list.php">
                <div class="Arrow-Left"></div>
            </a>


            <div id="title">
                <h2 id='group_name'></h2>
            </div>
        </header>
 -->
        <header>
            <div class="arrow">
                <!-- 戻る先のページがtop.phpに変更しています -->
                <a href="../Controller/top.php">
                    <img src="../pre_img/material/arrow.png" alt="戻るボタン">
                </a>
            </div>
            <div class="santen">
                <img src="../pre_img/material/santen.png" alt="三点リーダー">
            </div>
        </header>
        <?php if (!empty($list)) { ?>
            <?php foreach ($eventList as $val) { ?>
                <div><a href="./group.php?event_id=<?php echo $val['id']; ?>&group_id=<?php echo $_SESSION['group_id'] ?>">
                        <!-- <p><?php echo $val['id']; ?></p> 画像用のID-->
                        <p><?php echo $val['date']; ?></p>
                        <p><?php echo $val['name']; ?></p>
                        <p><?php echo $val['comment']; ?></p>
                        <p><?php echo $val['count'] != "" ? $val['count'] . "/" . $val['dateCount'] : ''; ?></p>
                    </a>
                </div>
            <?php } ?>

        <?php } ?>
    <?php } ?>
    <form action="../Controller/group.php" method="POST" id="form">
        <select name="date" id="date" onchange="submitForm()">
            <option>検索</option>
            <?php foreach ($select_date as $val) { ?>
                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
            <?php } ?>
        </select>
    </form>
    <!-- 新メニュー -->
    <div data-tg-tour="上のボタンでアルバム本棚に遷移、<br>下のボタンでイベント登録できます" id="bottom_menu">
        <a href="../Controller/album_list.php"><button class="button shelf"></button></a>
        <a href="../Controller/event_register.php"><button class="button event"></button></a>
    </div>
    <!-- 新メニュー終了 -->
    <!-- メニューボタン
            <nav class="menu">
                            <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open">
                            <label class="menu-open-button" for="menu-open">
                                <span class="lines line-1"></span>
                                <span class="lines line-2"></span>
                                <span class="lines line-3"></span>
                            </label>
                            
                            <a href="#" class="menu-item blue"> <i class="fa fa-anchor">イベント登録</i> </a>
                            <a href="../Controller/album_list" class="menu-item green"> <i class="fa fa-coffee">アルバム本棚</i> </a>
                            <!-- <a href="../Controller/mypage.php" class="menu-item red"> <i class="fa fa-heart"></i> </a> -->
    <!-- <a href="" class="menu-item purple"> <i class="fa fa-microphone"></i> </a> -->
    <!-- <a href="#" class="menu-item orange"> <i class="fa fa-star"></i> </a>
                            <a href="#" class="menu-item lightblue"> <i class="fa fa-diamond"></i> </a> -->
    <!-- </nav> -->
    <!-- <form action=""> -->

    </main>
    <script>
        let js_php = <?php echo $json_group_id; ?>;
    </script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/group.js"></script>

</body>

</html>