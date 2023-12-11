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
    <title>マイページ</title>
    <!-- googleフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/mypage.css">

</head>

<body>
    <header>
        <a href="./top.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
    </header>

    <div class="icon_big">
        <img src="<?php echo $icon; ?>" alt="">
    </div>

    <h1 class="name"><?php echo $name; ?></h1>

    <p class="birthDay">生年月日：<?php echo $birthday; ?></p>

    <div class="longBtnDarkOrange">
        <a href="../Controller/register_change.php"><button>会員情報を変更する</button></a>
    </div>
    <form action="./mypage.php" method="POST">
        <p><button class="change_page" type="submit" name="logout" value="logout" class="button">ログアウト</button></p>
        <p><button class="change_page" type="submit" name="logout" value="withdrawal" class="button">退会する</button></p>
    </form>
</body>

</html>