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
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/album_editor.css">
    <link rel="stylesheet" href="../pre_css/album_detail.css">
</head>

<body>
    <header>
        <div class="arrow">
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
        <div class="button_menu">
            <!-- アルバム削除ボタン -->
            <div class="longBtnDarkOrange">
                <!-- モーダルの発火ボタン -->
                <button id="modalOpen" class="modalButton">削除</button>
            </div>
            <!-- アルバム編集ボタン -->
            <div class="longBtnDarkOrange edit">
                <!-- CSSの関係で一旦ボタンタグに変更しました、aタグに戻したいときは遠山に連絡してください。 -->
                <!-- <a href="./album_detail.php?editor" class="button">編集</a> -->
                <button class="button">編集</button>
            </div>
        </div>

    </header>
    <!-- ボタン -->

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

    <!-- 削除用モーダルの部分 -->
    <div class="longBtnDarkOrange place">
        <!-- モーダルの黒い部分 -->
        <div class="modalBg"></div>
        <!-- モーダルメインコンテンツ -->
        <div class="modalMain">
            <!-- モーダルのオレンジのヘッダー -->
            <div class="modalHeader">
                <p class='modalClose'>×</p>
            </div>
            <!-- モーダルメインコンテンツ -->
            <div class="modalBody">
                <div class="modalContents">
                    <h2>アルバムを削除しますか？</h2>
                    <div class="longBtnDarkOrange mdlBtn">
                        <button>削除する</button>
                    </div>
                    <div class="longBtnDarkOrange mdlBtn">
                        <button class='modalClose'>戻る</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="//daybrush.com/selecto/release/latest/dist/selecto.min.js"></script>
    <script src="//daybrush.com/moveable/release/latest/dist/moveable.min.js"></script>
    <script src="../js/turn.js"></script>
    <script>
        // モーダルの表示非表示
        $('#modalOpen').click(function(e) {
            $('.modalBg').fadeIn();
            $('.modalMain').fadeIn();
        });
        $('.modalClose').click(function(e) {
            $('.modalBg').css('display', 'none');
            $('.modalMain').css('display', 'none');
        });
        $('.modalBg').click(function(e) {
            $('.modalBg').css('display', 'none');
            $('.modalMain').css('display', 'none');
        });
    </script>

    <script type="text/javascript">
        var eId = [1];

        let tPage = 4;
    </script>
    <script src="../js/album_editor.js"></script>

    <script src="../js/display.js"></script>
</body>

</html>