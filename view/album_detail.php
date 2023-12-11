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
    <link rel="stylesheet" href="../css/load_album.css">
</head>

<body>
    <!-- ロード画面 -->
    <div class="bg">
        <div id="loader">
            <img src="../img/phone.png" alt="" class="rotate" width="80px" height="auto">
            <p class="rote">横画面でご覧ください！</p>
        </div>
    </div>

    <header>
        <a href="./album_list.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
        <div class="button_menu">
            <!-- アルバム削除ボタン -->
            <div class="longBtnDarkOrange">
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
    <div id="flipbook"></div>

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
                        <form action="./album_detail.php" method="post">
                            <button name="delete">削除する</button>
                        </form>
                    </div>
                    <div class="longBtnDarkOrange mdlBtn">
                        <button class='modalClose'>戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/turn.js"></script>
    <script type="text/javascript">
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
        let js_php_g = <?php echo $_SESSION['group_id']; ?>;
        let js_php_a = <?php echo $_SESSION['album_id']; ?>;
    </script>
    <script src="../js/album_detail.js"></script>
</body>

</html>