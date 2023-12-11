<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>グループ脱退画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/confirmation.css">
</head>

<body>
    <header>
        <div class="arrow">
            <a href="./group_detail.php">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a> 
        </div>
    </header>
    <main>
        <h1>グループを脱退しますか？</h1>
        <h2><?php echo $group_name; ?></h2>
        <div class="icon_big">
            <img src="<?php echo $img_src; ?>" alt="">
        </div>
        <p>脱退の後、もう一度グループに入るには招待を受ける必要があります。</p>
        <div class="longBtnRed">
            <form action="./group_withdrawal.php" method="POST" enctype="multipart/form-data">
                <div class="buttonCenter"><button id="button" class="button"type="submit" name="de" value="delete">グループを脱退する</button></div>
            </form>
        </div>
    </main>
</body>

</html>