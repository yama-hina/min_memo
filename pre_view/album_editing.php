<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">

    <style>
        .sreg {
            text-align: right;
            margin-right: 1rem;
        }
    </style>


    <title>アルバム編集</title>
</head>

<body>
    <div id="flipbook">

    </div>

    <div class="option_area">
        <!-- イベント画像 -->
        <div class="img_area">
            <?php
            foreach ($data as $value) {
                echo "<img class='img_stack' src='../group/" . $group_id . "/event_img/" . $value['event_id'] . "/group" . $group_id . "_" . $value['id'] . "." . $value['extension'] . "' alt=''>";
            }
            ?>
        </div>
    </div>

    <!-- イベント画像 -->
    <div class="img_area" style="display:none">
        <?php
        foreach ($data as $value) {
            echo "<img class='img_stack' src='../group/" . $group_id . "/event_img/" . $value['event_id'] . "/group" . $group_id . "_" . $value['id'] . "." . $value['extension'] . "' alt=''>";
        }
        ?>
    </div>


    <!-- ページ用背景画像 -->
    <div class="img_background_area" style="display:none">
        <img class="img_background_stack" src="../img/album/cover/hai1.png" width="150px" height="auto" alt="">
    </div>

    <!-- スタンプ -->
    <div id="stamp_in" class='img_stacks stump_area' style="display:none">
        <div class="display_img"><img class="img_stack" src="../img/stamp/1369.gif"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/1387.gif"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/2243.gif"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/sun.gif"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/laughing.gif"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/balloon.gif"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23591185.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23593232.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23593273.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23563400.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/285.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/1411.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/1745.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/10068.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/14262.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23511.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23751.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/331433.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23574262.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23580917.png"></div>
        <div class="display_img"><img class="img_stack" src="../img/stamp/23598727.png"></div>
    </div>

    <!-- 文字画像 -->
    <div class="text_area" style="display:none">
    </div>

    <div class="option_button">
        <button class="btn_img">画像</button>
        <button class="btn_background">背景画像</button>
        <button class="btn_stamp">スタンプ</button>
        <button class="btn_text">文字</button>
    </div>

    <p>
        <button class="btn album_ediding_end">編集完了</button>
    </p>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="//daybrush.com/selecto/release/latest/dist/selecto.min.js"></script>
    <script src="//daybrush.com/moveable/release/latest/dist/moveable.min.js"></script>
    <script src="../js/turn.js"></script>
    <script type="text/javascript">
        let js_php_g = <?php echo $json_group_id; ?>;
        let js_php_a = <?php echo $json_album_id; ?>;
        var js_php = [
            <?php foreach ($ids as $key => $value) { ?>
                <?php if ($key == 0) { ?>
                    <?php echo $value; ?>
                <?php } else { ?>
                    <?php echo ',' . $value; ?>
                <?php } ?>
            <?php }  ?>
        ];
    </script>
    <script src="../js/album_editing.js"></script>


</body>

</html>