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
</head>

<body>
    <header>
        <div class="arrow">
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
        <div class="longBtnDarkOrange add_album">
            <button>編集完了</button>
        </div>
    </header>


    <div class="container">
        <!-- アルバム本体 -->
        <div id="flipbook">
            <!-- 表紙 -->
            <div class="hll" style="background-color: bisque;">
                <div class="wall" style="display: none;"></div>
                <div class="title">
                    <h3 class="title_text">タイトル</h3>
                </div>
                <div class="background_img element$-1"></div>
            </div>

            <div class="hll" style="background-color: bisque;">
                <div class="wall"></div>
                <div class="container" data-croffle-ref="element$0"></div>
                <div class="background_img element$0"></div>
            </div>
            <div class="hll" style="background-color: bisque;">
                <div class="wall"></div>
                <div class="container" data-croffle-ref="element$1"></div>
                <div class="background_img element$1"></div>
            </div>
            <div class="hll" style="background-color: bisque;">
                <div class="wall"></div>
                <div class="container" data-croffle-ref="element$2"></div>
                <div class="background_img element$2"></div>
            </div>
            <div class="hll" style="background-color: bisque;">
                <div class="wall"></div>
                <div class="container" data-croffle-ref="element$3"></div>
                <div class="background_img element$3"></div>
            </div>
            <!-- 裏表紙 -->
            <div class="hll" style="background-color: bisque;">
                <div class="wall"></div>
                <div class="behind"></div>
                <div class="background_img element$4"></div>
            </div>
        </div>

        <!-- 画像一覧エリア -->
        <div id="allImgArea">
            <!-- 画像表示領域 -->
            <div id="vPreview">
                <ul class="img_area">
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                    <li><img class='img_stack' src="../pre_img/ななち.jpg" alt=""></li>
                </ul>

                <!-- ページ用背景画像 -->
                <ul class="img_background_area" style="display:none">
                    <li><img class="img_background_stack" src="../img/album/cover/hai1.png" width="150px" height="auto" alt=""></li>
                </ul>

                <!-- スタンプ -->
                <ul class='stump_area' style="display:none">
                    <li class="display_img"><img class="img_stack" src="../img/stamp/1369.gif"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/1387.gif"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/2243.gif"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/sun.gif"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/laughing.gif"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/balloon.gif"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23591185.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23593232.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23593273.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23563400.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/285.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/1411.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/1745.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/10068.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/14262.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23511.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23751.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/331433.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23574262.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23580917.png"></li>
                    <li class="display_img"><img class="img_stack" src="../img/stamp/23598727.png"></li>
                </ul>

                <!-- 文字画像 -->
                <ul class="text_area" style="display:none">
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
        var eId = [1];

        let tPage = 4;
    </script>
    <script src="../js/album_editor.js"></script>
    <!-- 縦画面時にアラートを出すJS -->
    <script src="../js/display.js"></script>
</body>

</html>