<!-- 
    更新　原
    version 1.1
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>アルバム本棚</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/album_list.css">
</head>

<body>
    <header>
        <div class="arrow">
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
    </header>

    <main>
        <!-- エラーメッセージ -->
        <p id="err_event"><?php echo isset($err['event']) ? $err['event'] : ''; ?></p>

        <!-- 本棚本体 -->
        <div id="contena"></div>

        <!-- 作成ボタン -->
        <form action="./album_list.php" method="POST">
            <div data-tg-tour="このボタンを押すとアルバム作成に移ります">
                <button class="circleBtn rightBottom" type="submit" name="state" value="album_register"> <img src="../pre_img/material/plus.png" alt="プラスマーク">
                </button>
            </div>
        </form>
    </main>
</body>

</html>