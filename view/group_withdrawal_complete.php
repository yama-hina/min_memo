<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>グループ脱退完了画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/delete_complete.css">
</head>

<body>
    <header>
        <div class="arrow">
           <form action="./group_list.php" method="POST" enctype="multipart/form-data">
                <div class="buttonCenter"><button id="button" class="button" type="submit" name="button" value="back"><img src="../pre_img/material/arrow.png" alt="戻るボタン"></button></div>
            </form>
        </div>
    </header>
    <main>
        <h1>グループを脱退しました</h1>
        <p>
            もう一度グループに入るには<br>
            招待を受ける必要があります
        </p>
        <div class="longBtnDarkOrange">
            <form action="./group_withdrawal_complete.php" method="POST" enctype="multipart/form-data">
                <div class="buttonCenter"><button id="button" class="button"type="submit" name="back" value="back">TOPページへ戻る</button></div>
            </form>
        </div>
    </main>
</body>


</html>