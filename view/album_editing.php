<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アルバム編集</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/album_editing.css">
</head>

<body>
    <header>
        <a href="./album_detail.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
        <div class="longBtnDarkOrange album_ediding_end">
            <button>編集完了</button>
        </div>
    </header>

    <div class="container">
        <!-- アルバム本体 -->
        <div id="flipbook">
        </div>

        <!-- 画像一覧エリア -->
        <div id="allImgArea">
            <!-- 画像表示領域 -->
            <div id="vPreview">
                <ul class="img_area">
                    <?php
                    foreach ($data as $value) {
                        echo "<li><img class='img_stack' src='../group/" . $group_id . "/event_img/" . $value['event_id'] . "/group" . $group_id . "_" . $value['id'] . "." . $value['extension'] . "' alt=''></li>";
                    }
                    ?>
                </ul>

                <!-- ページ用背景画像 -->
                <ul class="img_background_area" style="display:none">
                    <li><img class="img_background_stack" src="../img/album/cover/hai1.png" width="150px" height="auto" alt=""></li>
                    <li><img class="img_background_stack" src="../img/album/cover/sea.png" width="150px" height="auto" alt=""></li>
                    <li><img class="img_background_stack" src="../img/album/cover/sea2.png" width="150px" height="auto" alt=""></li>
                    <li><img class="img_background_stack" src="../img/album/cover/sea3.png" width="150px" height="auto" alt=""></li>
                    <li><img class="img_background_stack" src="../img/album/cover/sky.png" width="150px" height="auto" alt=""></li>
                    <li><img class="img_background_stack" src="../img/album/cover/sky2.png" width="150px" height="auto" alt=""></li>
                </ul>

                <!-- スタンプ -->
                <ul class='stump_area' style="display:none">
                    <?php
                        $dir = "../img/stamp/"; 
                        $extensions = ['jpg', 'png', 'gif'];
                        foreach ($extensions as $ext) {
                            $filelist = glob($dir . '*.' . $ext);
                            foreach ($filelist as $file) {
                                if (is_file($file)) {
                                    echo "<li class='display_img'><img class='img_stack' src='$file'></li>";
                                }
                            }
                        }
                    ?>
                </ul>

                <!-- 文字画像 -->
                <ul class="text_area" style="display:none">
                    <?php
                        $dir = "../img/text/"; 
                        $extensions = ['jpg', 'png', 'gif'];
                        foreach ($extensions as $ext) {
                            $filelist = glob($dir . '*.' . $ext);
                            foreach ($filelist as $file) {
                                if (is_file($file)) {
                                    echo "<li class='display_img'><img class='img_stack' src='$file'></li>";
                                }
                            }
                        }
                    ?>
                </ul>
            </div>

            <!-- ボタン関連 -->
            <div class="option_button">
                <button class="circleBtn btn_img"><img src="../pre_img/material/img.png" alt=""></button>
                <button class="circleBtn btn_stamp"><img src="../pre_img/material/stamp.png" alt=""></button>
                <button class="circleBtn btn_text"><img src="../pre_img/material/char.png" alt=""></button>
                <button class="circleBtn btn_background"><img src="../pre_img/material/book.png" alt=""></button>
            </div>
        </div>
        <!-- 画像一覧エリア終了 -->
    </div>
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
    <!-- 縦画面時にアラートを出すJS -->
    <script src="../js/display.js"></script>
</body>

</html>