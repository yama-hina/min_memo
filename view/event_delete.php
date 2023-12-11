<!-- 
    更新　籾木
    version 1.1
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>イベント削除画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/withdrawal_edelete.css">
</head>

<body>
    <header>
        <div class="arrow">
            <a href="./event_detail.php">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a>  
        </div>
    </header>
    <main>
        <h1>イベントを削除しますか？</h1>
        <p>イベントの削除後、復元は出来ません。</p>
        <div class="longBtnRed">
            <form action="./event_delete.php" method="POST" enctype="multipart/form-data">
                <div class="buttonCenter"><button id="button" class="button"type="submit" name="delete" value="delete">イベントを削除する</button></div>
            </form>
        </div>
    </main>
</body>

</html>