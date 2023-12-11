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
    <title>会員登録確認画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/register_confirmation.css">
</head>

<body>
    <header>
        <a href="../Controller/register_confirmation.php?res=back">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
        <!-- <div class="santen">
            <img src="../pre_img/material/santen.png" alt="三点リーダー">
        </div> -->
    </header>

    <h1>この内容で会員登録しますか？</h1>

    <!-- 登録内容を表示 -->
    <div class="registerContents">
        <p>お名前：<?php echo $_SESSION["name"];?></p>
        <p>パスワード：<?php echo $password;?></p>
        <p>生年月日：<?php echo $_SESSION["birthday"] != "" ?$birthday[0] . "年" . $birthday[1] . "月" . $birthday[2] . "日":"未登録";?></p>
        <div class="icon_big">
            <img src="<?php echo $_SESSION["img"] != "" ?$_SESSION["img"]:""; ?>" alt="">
        </div>
    </div>
    <!-- 登録内容表示部終了 -->


    <div class="longBtnDarkOrange">
        <form action="../Controller/register_confirmation.php"><button name="id" value="insert">登録</button></form>
    </div>

</body>

</html>