<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>グループ削除完了</title>
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
            <a href="./group_list.php">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a> 
        </div>
    </header>
    <main>
        <h1>グループを削除しました</h1>
        <p>
            グループの情報は<br>
            すべて削除されました
        </p>
        <div class="longBtnDarkOrange">
            <form action="./event_delete_complete.php" method="POST" enctype="multipart/form-data">
                <div class="buttonCenter"><button id="button" class="button"type="submit" name="back" value="back">TOPページへ戻る</button></div>
            </form>
        </div>
    </main>
</body>

</html>