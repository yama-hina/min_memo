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
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/header.css">
    <!-- header用css -->
    <link rel="stylesheet" href="../css/register.css">
    <!-- 専用css -->
    <link rel="stylesheet" href="../css/Information_change.css">
</head>
<body>
    <!-- 上部 -->
    <header>
        <a href="./mypage.php">
            <div class="Arrow-Left"></div>
        </a>
        <span id="headerText">会員情報変更</span>
    </header>



    <main>

        <div id="attention">
            <p>お客様の情報を変更してください</p>
        </div>

        <!-- 氏名 -->
        <form action="./Information_change.php" method="POST"　enctype="multipart/form-data">
            <div class="cp_iptxt">
                <input type="text" id="name" autocomplete="off" placeholder="お名前" name="name" value="<?php echo isset($back_name)?$back_name:''; ?>">
                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                <!-- 入力エラー文表示 -->
                    <p class="error"><?php echo $error['name']??''; ?></p>
            </div>

            <!-- 送信ボタン -->
            <p class="buttonBlock"><button type="submit" name="state" value="name" class="button">お名前を変更</button></p>
        </form>

        <!-- パスワード -->
        <form action="./Information_change.php" method="POST"　enctype="multipart/form-data">
            <div class="cp_iptxt">
                <input type="password" id="passClick" placeholder="パスワード" name="password" autocomplete="off" value="">
                <p id="passEye"><img id="eyeImg" src="../img/material/eye-slash.svg" alt=""></p>
                <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                <!-- 入力エラー文表示 -->
                    <p class="error"><?php echo $error['pass']??''; ?></p>
            </div>

            <!-- 送信ボタン -->
            <p class="buttonBlock"><button type="submit" name="state" value="pass" class="button">パスワードを変更</button></p>
        </form>

        <!-- アイコン -->
        <form action="./Information_change.php" method="POST"　enctype="multipart/form-data">
            <div id="fileSelect">
                <p id="icon">アイコンを選択してください</p>
                <div id="fileFlex">
                    <label for="file_upload">
                        <span class="filelabel" title="ファイルを選択">
                            <img src="../img/material/camera-orange-rev.png" width="32" height="26" alt="＋画像">
                            <p>選択</p>
                        </span>
                        <!-- ▽本来の選択フォームは隠す -->
                        <input type="file" id="file_upload" name="img" autocomplete="off"  accept="image/*">
                    </label>
                    <div id="preview"></div>
                </div>
            </div>

            <!-- 送信ボタン -->
            <p class="buttonBlock"><button type="submit" name="state" value="icon" class="button">アイコンを変更</button></p>
        </form>
    </main>
    <script src="../js/pinchout.js"></script>

</body>
</html>