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
    <title>グループ変更</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/text_form.css">
</head>

<body>
    <header>
        <a href="./group_change.php?back=go">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
    </header>

    <p class="message">グループ情報を変更してください</p>

    <!-- お名前 -->
    <form action="./group_change.php" method="POST" enctype="multipart/form-data">
        <div class="textBox">
            <small>*必須</small>
            <input type="text" autocomplete="off" placeholder="お名前" name="name" value="<?php echo isset($group["name"]) ? $group["name"] : "" ?>">
            <p class="error"><?php echo isset($error["name"]) ? $error["name"] : "" ?></p>
        </div>

        <!-- アイコンを選択 -->
        <div class="shortBtnThinOrange">
            <button type="button">アイコン選択</button>
        </div>
        <input type="file" id="file_upload" name="img" autocomplete="off" accept="image/*">
        <div class="icon_big" id="prev">
            <img src="<?php echo $img;?>" alt="">
        </div>

        <div class="longBtnDarkOrange">
            <button type="submit">確認</button>
        </div>
    </form>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        // ファイル選択ボタンを発火する
        const file_upload = $('#file_upload');
        $('.shortBtnThinOrange').click(function(e) {
            file_upload.click();
        });
    </script>
    <script src="../js/event_register.js"></script>
</body>

</html>