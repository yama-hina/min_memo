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
    <title>イベント変更画面</title>
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

    <p class="message">変更内容を入力してください</p>

    <!-- 予め登録されている内容は表示しておくようにする -->

    <!-- お名前 -->
    <div class="textBox">
        <small>*必須</small>
        <input type="text" autocomplete="off" placeholder="イベント名" name="event" 　value="">
        <p class="error">こちらはエラーです</p>
    </div>

    <!-- イベント日 -->
    <small>*必須</small>
    <!-- 開始 -->
    <div class="textBox">
        <input type="text" autocomplete="off" placeholder="開始日" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
    </div>
    <!-- 終了 -->
    <div class="textBox">
        <input type="text" autocomplete="off" placeholder="終了日" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
    </div>

    <!-- メンバーを選択 -->
    <div class="searchFlex">
        <div class="shortBtnThinOrange">
            <button>全員選択</button>
        </div>
        <input class="search" type="text" autocomplete="off" placeholder="メンバー検索">
    </div>
    <!-- ここ仕組み分からんかったら山本に聞いてください!!!!! -->
    <div class="checkBoxes">
        <input id="box1" type="checkbox" value="">
        <label for="box1" class="label">名前あああああああああああ</label>

        <input id="box2" type="checkbox" value="">
        <label for="box2" class="label">名前あああああああああああああああああああああああ</label>

        <input id="box3" type="checkbox" value="">
        <label for="box3" class="label">名前あああああああああああ</label>
    </div>

    <!-- コメント -->
    <textarea name="" placeholder="コメントを入力してください" rows="5"></textarea>

    <!-- 画像登録 -->
    <div class="shortBtnThinOrange">
        <button>画像登録</button>
    </div>
    <!-- 本来のインプットは隠す -->
    <input type="file" id="fileUpload" name="img[]" multiple="multiple" accept="image/*">
    <div id="preview">
        <p>写真のプレビューが表示されます</p>
    </div><!-- 画像登録系終了 -->


    <div class="longBtnDarkOrange">
        <button>変更</button>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script>
        // 画像を選択ボタンをクリックしたら写真選択画面が立ち上がる
        document.getElementsByClassName("shortBtnThinOrange")[1].addEventListener("click", () => {
            document.querySelector("input[type='file']").click();
        });
        //画像を選択したらプレビューが表示される
        $(function() {
            $('#fileUpload').change(function() {
                if (!this.files.length) {
                    return;
                }
                $('#preview').text(''); // previewの中身をリセット
                $('#preview').append('<ul></ul>');
                var $files = $(this).prop('files');
                var len = $files.length;
                for (var i = 0; i < len; i++) {
                    var file = $files[i];
                    var fr = new FileReader();
                    fr.onload = function(e) {
                        var src = e.target.result;
                        var img = `<li><div class="cross"><img src="../pre_img/material/cross.png" alt=""></div><img src="${src}"></li>`;
                        $('#preview>ul').append(img);
                    }
                    fr.readAsDataURL(file);
                }
            });
        });
    </script>

</body>

</html>