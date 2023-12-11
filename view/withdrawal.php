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
    <title>退会確認画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/withdrawal_edelete.css">
</head>

<body>
    <header>
        <a href="./mypage.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
        <!-- <div class="santen">
            <img src="../pre_img/material/santen.png" alt="三点リーダー">
        </div> -->
    </header>
    <main>
        <h1>退会しますか？</h1>
        <p>退会の後、本サービスへの登録情報はすべて削除されてしまいます。</p>
        <form action="./withdrawal.php">
        <div class="longBtnRed">
            <button type="submit" name="with" value="withdrawal">退会する</button>
        </div>
        </form>
    </main>
</body>

</html>