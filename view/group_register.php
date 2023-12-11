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
    <title>グループ登録</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/text_form.css">
</head>

<body>
    <header>
        <div class="arrow">
            <a href="./top.php">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a>
        </div>
    </header>

    <p class="message">グループ情報を入力してください</p>

    <form action="./group_register.php" method="POST" enctype="multipart/form-data">
        <!-- お名前 -->
        <div class="textBox">
            <small>*必須</small>
            <input type="text" id="name" autocomplete="off" placeholder="お名前" name="name" value="<?php echo isset($back_name) ? $back_name : ''; ?>">
            <p class="error"><?php echo $error['name'] ?? ''; ?></p>
        </div>

        <!-- アイコンを選択 -->
        <div id="fileSelect" class="shortBtnThinOrange">
            <button type="button">画像登録</button>
        </div>
        <input type="file" name="img" id="file_upload" autocomplete="off" accept="image/*" style="display: none;">

        <div class="icon_big" id="prev"></div>




        <div class="longBtnDarkOrange">
            <button type="submit" class="button" name="state" value="insert">確認</button>
        </div>

    </form>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/event_register.js"></script>
    <script src="../js/pinchout.js"></script>
    <script src="../js/register.js"></script>
    <script>
        // ファイル選択ボタンを発火する
        const file_upload = $('#file_upload');
        $('.shortBtnThinOrange').click(function(e) {
            file_upload.click();
        });
    </script>
</body>

</html>