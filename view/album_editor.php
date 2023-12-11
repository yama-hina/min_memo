<!-- 
    更新　籾木
    version 0.0
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="mobile-web-app-capable" content="yes">
    <title>アルバム作成</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/album_editor.css">
    <!-- ロード用css -->
    <link rel="stylesheet" href="../css/load_album.css">
</head>

<body>
    <!-- ロード画面ここまで -->
    <header>
        <a href="./album_edit.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
        <div class="longBtnDarkOrange add_album">
            <button class="add_album_btn">編集完了</button>
        </div>
    </header>

    <div class="container">
        <!-- アルバム本体 -->
        <div id="flipbook">
            <!-- 表紙 -->
            <div class="hll" style="background-color: bisque;">
                <div class="wall" style="display: none;"></div>
                <div class="title">
                    <h3 class="title_text"><?php echo $_POST['title']; ?></h3>
                </div>
                <div class="background_img element$-1"></div>
            </div>

            <?php for ($i = 0; $i < $page - 2; $i++) { ?>
                <div class="hll" style="background-color: bisque;">
                    <div class="wall"></div>
                    <div class="container" data-croffle-ref="element$<?php echo $i; ?>"></div>
                    <div class="background_img element$<?php echo $i; ?>"></div>
                </div>
            <?php } ?>

            <!-- 裏表紙 -->
            <div class="hll" style="background-color: bisque;">
                <div class="wall"></div>
                <div class="behind"></div>
                <div class="background_img element$<?php echo $page - 2; ?>"></div>
            </div>
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
        var eId = [
            <?php foreach ($ids as $key => $value) { ?>
                <?php if ($key == 0) { ?>
                    <?php echo $value; ?>
                <?php } else { ?>
                    <?php echo ',' . $value; ?>
                <?php } ?>
            <?php }  ?>
        ];

        let tPage = <?php echo $page; ?>;
    </script>
    <script src="../js/album_editor.js"></script>
    <!-- 縦画面時にアラートを出すJS -->
    <script src="../js/display.js"></script>
</body>

</html>