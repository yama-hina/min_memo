<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>しおり</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/bookmark.css">
</head>

<body>
    <header>
        <div class="arrow">
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
    </header>
    <main>
        <!-- しおり表示部 -->
        <div id="bookmarkPreview">
            <!-- まだしおり内容が登録されていないときに表示する部分 -->
            <!-- <p>しおりに予定を追加してみよう！</p> -->
            <!-- まだしおり内容が登録されていないときに表示する部分終了 -->

            <!-- しおりが登録されているときに表示する部分 -->
            <table>
                <!-- しおりに登録された内容を、このtr,tdに反映 -->
                <tr>
                    <th class="time">時間</th>
                    <th class="contents">内容</th>
                </tr>
                <tr>
                    <!-- 時間 -->
                    <td>08:48</td>
                    <!-- 内容 -->
                    <td>
                        <p>東京駅到着</p>
                        <p>コンビニで飲み物を買う</p>
                    </td>
                </tr>
                <tr>
                    <!-- 時間 -->
                    <td>13:56</td>
                    <!-- 内容 -->
                    <td>
                        <p>ディズニーランド到着！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！</p>
                        <p>コンビニで飲み物を買う</p>
                        <p><img src="../pre_img/ななち.jpg" alt=""></p>
                        <p><img src="../pre_img/thumb_90.jpg" alt=""></p>
                        <a href="https://www.tokyodisneyresort.jp/tdl/">公式サイトaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a>
                    </td>
                </tr>

            </table>
            <!-- しおりが登録されているときに表示する部分 -->
        </div>
        <!-- しおり表示部終了 -->


\

        <!-- しおり入力部 -->
        <div id="bookmarkInput">
            <h1>
                しおりに表示する内容を<br>
                入力してください
            </h1>
            <div id="dateFlex">
                <div class="dateMini">
                    <small>*必須</small>
                    <input type="text" autocomplete="off" placeholder="日付" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
                </div>
                <div class="dateMini">
                    <small>*必須</small>
                    <input type="text" autocomplete="off" placeholder="時刻" name="date" onfocus="(this.type='time')" onblur="(this.type='text')" pattern="\d{4}-\d{2}-\d{2}">
                </div>
            </div>

            <!-- コメント -->
            <small>*必須</small>
            <textarea name="" placeholder="コメントを入力してください" rows="5"></textarea>

            <div class="textBox">
                <input type="text" autocomplete="off" placeholder="URL" name="event" value="">
            </div>


            <div class="shortBtnThinOrange">
                <button>画像登録</button>
            </div>
            <!-- 本来のインプットは隠す -->
            <input type="file" id="fileUpload" name="img[]" multiple="multiple" accept="image/*">
            <div id="preview">
                <p>写真のプレビューが表示されます</p>
            </div>


            <div class="longBtnDarkOrange place">
                <button>場所登録</button>
            </div>


            <div class="longBtnDarkOrange">
                <button>イベントを編集する</button>
            </div>

        </div><!-- bookmarkInput -->
        <!-- しおり入力部終了 -->
    </main>
<script>
    // 画像を選択ボタンをクリックしたら写真選択画面が立ち上がる
    document.getElementsByClassName("shortBtnThinOrange")[1].addEventListener("click", () => {
        document.querySelector("input[type='file']").click();
    });
    //画像を選択したらプレビューが表示される
    $(function () {
        $('#fileUpload').change(function () {
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
                fr.onload = function (e) {
                    var src = e.target.result;
                    var img = `<li><img src="${src}"></li>`;
                    $('#preview>ul').append(img);
                }
                fr.readAsDataURL(file);
            }
        });
    });
</script>
</body>

</html>