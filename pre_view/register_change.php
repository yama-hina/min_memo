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
    <title>会員情報変更</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <p class="message">会員情報を変更できます</p>

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

    <!-- 生年月日 -->
    <div class="textBox">
        <input type="text" autocomplete="off" placeholder="生年月日" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
    </div>

    <!-- アイコンを選択 -->
    <div class="shortBtnThinOrange">
        <button>画像登録</button>
    </div>
    <div class="icon_big">
        <img src="../pre_img/ななち.jpg" alt="">
    </div>

    <div class="longBtnDarkOrange">
        <button>確認</button>
    </div>

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