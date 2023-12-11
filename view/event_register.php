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
    <title>イベント登録</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/text_form.css">
    <link rel="stylesheet" href="../css/load_reg.css">
</head>

<body>
<div id="wrap">
    <header>
        <div class="arrow">
            <a href="./group.php">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a>
        </div>
    </header>
    <p class="message">イベント内容を入力してください</p>
    <form action="./event_register.php" method="POST" enctype="multipart/form-data">
        <!-- お名前 -->
        <div class="textBox">
            <small>*必須</small>
            <input type="text" autocomplete="off" placeholder="イベント名" name="event" value="<?php echo isset($event) ? $event : ''; ?>">
            <p class="error"><?php echo $error['event'] ?? ''; ?></p>
        </div>

        <!-- イベント日 -->
        <small>*必須</small>
        <div class="date">
            <input type="date" id="start_date" autocomplete="off" name="start_date" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo isset($_POST["date"]) ? $_POST["date"] : ""; ?>"  onchange="copyDateValue()">
            <p class="placeholder">開始日</p>
            <p class="error"><?php echo $error['start_date'] ?? ''; ?></p>
        </div><!-- date -->
        <div class="date">
            <input type="date" id="finish_date" autocomplete="off" name="end_date" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo isset($_POST["date"]) ? $_POST["date"] : ""; ?>">
            <p class="placeholder">終了日</p>
            <p class="error"><?php echo $error['end_date'] ?? ''; ?></p>
        </div><!-- date -->
        <!-- 開始 -->
        <!-- <div class="textBox">
            <input type="text" name="start_date" id="start_date" autocomplete="off" placeholder="開始日" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}" onchange="copyDateValue()">
            <p class="error"><?php echo $error['start_date'] ?? ''; ?></p>
        </div> -->
        <!-- 終了 -->
        <!-- <div class="textBox">
            <input type="text" name="end_date" id="finish_date" autocomplete="off" placeholder="終了日" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
            <p class="error"><?php echo $error['end_date'] ?? ''; ?></p>
        </div> -->

        <!-- メンバーを選択 -->
        <div class="searchFlex">
            <!-- 全員選択ボタンのタグを変更したのでバグが出る可能性あり -->
            <!-- <div class="shortBtnThinOrange">
                <label id="label_button" class="button">
                    <input id="checkAll" class="checks" type="checkbox" name="lang" value="checkall">
                    <span class="name">全員選択</span>
                </label>
            </div> -->
            <div class="shortBtnThinOrange">
                <button id="checkAll" type="button">全員選択</button>
            </div>
            <!-- <input id="checkAll" class="checks" type="checkbox" name="lang" value="checkall"> -->

            <input class="search" type="text" autocomplete="off" placeholder="メンバー検索">
        </div>
        <!-- ここ仕組み分からんかったら山本に聞いてください!!!!! -->
        <div class="checkBoxes">
            <?php foreach ($member_list as $key => $row) : ?>
                <input type="checkbox" class="checks" name="member[]" value="<?php echo $member_list[$key]['id']; ?>" id="box<?php echo $key; ?>">
                <label for="box<?php echo $key; ?>" class="label"><?php echo $member_list[$key]['name']; ?></label>
            <?php endforeach; ?>
        </div>
        <p class="error"><?php echo $error['member'] ?? ''; ?></p>


        <!-- コメント -->
        <textarea name="comment" placeholder="コメントを入力してください" rows="5"></textarea>

        <!-- 画像登録 -->
        <div class="shortBtnThinOrange">
            <button type="button">画像登録</button>
        </div>
        <!-- 本来のインプットは隠す -->
        <input type="file" id="fileUpload" name="img[]" multiple="multiple" accept="image/*">
        <div id="preview">
            <p>写真のプレビューが表示されます</p>
        </div><!-- 画像登録系終了 -->


        <div class="longBtnDarkOrange">
            <p><button class="button" type="submit" name="state" value="insert">確認</button></p>
        </div>

    </form>
    </div>
<!-- ロード画面 -->
<div id="load-bg">
            <div id="loader">
            <div class="loader">
                <div>
                    <ul>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                        <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                        <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                        <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                        <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                        <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    <li>
                        <svg fill="currentColor" viewBox="0 0 90 120">
                        <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                        </svg>
                    </li>
                    </ul>
                </div><span class="load_p">Loading</span></div>
            </div>
    <!-- ここまで ロード画面-->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/event_register.js"></script>
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
                        var img = `<li><img src="${src}"></li>`;
                        $('#preview>ul').append(img);
                    }
                    fr.readAsDataURL(file);
                }
            });
        });

        // ファイル選択ボタンを発火する
        const file_upload = $('#file_upload');
        $('.shortBtnThinOrange').click(function(e) {
            file_upload.click();
        });
    </script>
    <script src="../js/load_reg.js"></script>
</body>

</html>