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
        <a href="./mypage.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
    </header>

    <p class="message">会員情報を変更できます</p>

    <!-- お名前 -->
    <form action="./register_change.php" method="POST" enctype="multipart/form-data">
        <div class="textBox">
            <small>*必須</small>
            <input type="text" autocomplete="off" placeholder="お名前" name="name">
            <p class="error"><?php echo isset($error["name"]) ? $error["name"] : "" ?></p>
        </div>
        <!-- パスワード -->
        <div class="textBox">
            <small>*必須</small>
            <div class="password">
                <input id="passBox" type="password" autocomplete="off" placeholder="パスワード" name="password" value="">
                <i class="fa-solid fa-eye-slash"></i>
            </div><!-- password -->
            <p class="error"><?php echo isset($error["pass"]) ? $error["pass"] : "" ?></p>
        </div>

        <!-- 生年月日 -->
        <!-- <div class="textBox">
            <input type="text" autocomplete="off" placeholder="生年月日" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
        </div> -->
        <div class="date">
            <input type="date" autocomplete="off" name="date" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo isset($_POST["date"]) ? $_POST["date"] : ""; ?>">
            <p class="placeholder">生年月日</p>
        </div><!-- date -->


        <!-- アイコンを選択 -->
        <div class="shortBtnThinOrange">
            <button type="button">画像登録</button>
        </div>
        <input type="file" id="file_upload" name="img" autocomplete="off" accept="image/*">
        <div class="icon_big" id="prev">
            <img src="<?php echo $icon ?>" alt="">
        </div>

        <div class="longBtnDarkOrange">
            <button type="submit" name="state">確認</button>
        </div>
    </form>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        //画像の選択時の画像の差し替え
        $('#file_upload').change(function() {
            if (!this.files.length) {
                return;
            }
            $('#prev').text('');

            var $files = $(this).prop('files');
            var len = $files.length;
            for (var i = 0; i < len; i++) {
                var file = $files[i];
                var fr = new FileReader();

                fr.onload = function(e) {
                    var src = e.target.result;
                    var img = '<img src="' + src + '">';
                    $('#prev').append(img);
                }

                fr.readAsDataURL(file);
            }

            // $('#preview').css({
            //     'display':'flex',
            // });

        });

        //type['date']のプレースホルダみたいなやつ
        if ($('input[type="date"]').val() == '') { // 日付入っていないとき
            let ignoreBlurAfterChange = false;
            $('input[type="date"]').on('change', function() {
                console.log('changeイベント発生');
                $('.placeholder').css('display', 'none'); // 日付入力後は消す
                ignoreBlurAfterChange = true; // changeイベント発火後にフラグをtrueに設定
            });
            $('input[type="date"]').on('blur', function() {
                if (ignoreBlurAfterChange) {
                    // changeイベント発火後はblurイベントを無視する
                    console.log('blurイベント無視');
                    ignoreBlurAfterChange = false; // フラグをfalseに戻す
                    return;
                }
                console.log('blurイベント発生');
                $('.placeholder').css('display', 'block');
            });
            $('.placeholder').click(function(e) {
                $(this).css('display', 'none');
                $('input[type="date"]').focus();
            });

            $('input[type="date"]').focus(function(e) {
                $('.placeholder').css('display', 'none');
            });
        } else { // 日付が入っていたとき
            $('.placeholder').css('display', 'none');
        }

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
        // ファイル選択ボタンを発火する
        const file_upload = $('#file_upload');
        $('.shortBtnThinOrange').click(function(e) {
            file_upload.click();
        });
    </script>
</body>

</html>