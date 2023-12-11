<!-- 
    更新　川嶋
    version 0.0
-->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>ログイン</title>
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
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
    </header>

    <p class="message">会員情報を入力してください</p>

    <!-- お名前 -->
    <div class="textBox">
        <small>*必須</small>
        <input type="text" autocomplete="off" placeholder="お名前" name="event" 　value="">
        <p class="error">こちらはエラーです</p>
    </div>
    <!-- パスワード -->
    <div class="textBox">
        <small>*必須</small>
        <div class="password">
            <input id="passBox" type="password" autocomplete="off" placeholder="パスワード" name="event" value="">
            <i class="fa-solid fa-eye-slash"></i>
        </div><!-- password -->
        <p class="error">エラー</p>
    </div>


    <div class="longBtnDarkOrange">
        <button>確認</button>
    </div>

    <p><a class="change_page" href="">新規会員登録はこちら</a></p>

    <script>
        // パスワードの目パチパチ(jQueryなし)
        let eye = document.getElementsByTagName('i')[0];
        let passBox = document.getElementById('passBox');
        eye.addEventListener('click', function() {
            if (eye.className == 'fa-solid fa-eye-slash') {
                eye.className = 'fa-solid fa-eye';
                passBox.type = 'text';
            } else {
                eye.className = 'fa-solid fa-eye-slash';
                passBox.type = 'password';
            }
        });
    </script>
</body>

</html>