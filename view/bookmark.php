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
    <link rel="stylesheet" type="text/css" href="../css/style_googlemaps.css" />
    <link rel="stylesheet" type="text/css" href="../css/map.css" />
    <!-- <link rel="stylesheet" type="text/css" href="../css/map_modal.css"> -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>

<body>
    <header>
        <a href="./event_detail.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
    </header>
    <main>
        <!-- しおり表示部 -->
        <div id="bookmarkPreview">
            <!-- まだしおり内容が登録されていないときに表示する部分 -->
            <!-- <p>しおりに予定を追加してみよう！</p> -->
            <!-- まだしおり内容が登録されていないときに表示する部分終了 -->

            <!-- しおりが登録されているときに表示する部分 -->
            <table id="table">
                <!-- しおりに登録された内容を、このtr,tdに反映 -->

            </table>
            <!-- しおりが登録されているときに表示する部分 -->
        </div>
        <!-- しおり表示部終了 -->



        <!-- しおり入力部 -->
        <div id="bookmarkInput">
            <h1>
                しおりに表示する内容を<br>
                入力してください
            </h1>
            <form id="bookmark" enctype="multipart/form-data">
                <div id="dateFlex">
                    <div class="dateMini">
                        <small>*必須</small>
                        <select name="day" id="day">
                            <option selected>日付を選択してください</option>
                            <?php foreach ($date_range as $val) { ?>
                                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="dateMini">
                        <small>*必須</small>
                        <select id="hour">
                            <option selected>時</option>
                            <?php for ($i = 0; $i <= 23; $i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?>時</option>
                            <?php } ?>
                            </select>
                        <select id="minute">
                            <option selected>分</option>
                            <?php for ($j = 0; $j <= 59; $j++) { ?>
                                <option value="<?php echo $j; ?>"><?php echo $j; ?>分</option>
                            <?php } ?>
                        </select>
                        <!-- <input type="text" id="time" placeholder="時刻" onfocus="(this.type='time')" onblur="(this.type='text')"> -->
                    </div>
                </div>

                <!-- コメント -->
                <small>*必須</small>
                <textarea id="comment" placeholder="コメントを入力してください" rows="5"></textarea>

                <div class="textBox">
                    <input type="text" autocomplete="off" placeholder="URL" name="url" id="url">
                </div>


                <div class="shortBtnThinOrange">
                    <button type="button">画像登録</button>
                </div>
                <!-- 本来のインプットは隠す -->
                <!-- <input type="file" id="img" name="img[]" multiple="multiple" accept="image/*"> -->
                <input type="file" name="img[]" id="fileUpload" autocomplete="off" accept="image/*" multiple>
                <!-- <div id="imagePreview"></div> -->
                <div id="preview">
                    <p>写真のプレビューが表示されます</p>
                </div>

                <input id="pac-input" class="controls" type="text" placeholder="場所情報を入力してください" />
                <div class="longBtnDarkOrange place">
                    <button type="button" class="modalOpen">場所登録</button>
                    <!-- 仮でモーダルを開くための書いてる -->
                    <!-- モーダルの黒い部分 -->
                    <div class="modalBg"></div>
                    <!-- モーダルメインコンテンツ -->
                    <div class="modalMain">
                        <!-- モーダルのオレンジのヘッダー -->
                        <div class="modalHeader">
                            <p class='modalClose'>×</p>
                        </div>
                        <!-- モーダルメインコンテンツ -->
                        <div class="modalBody">
                            <!-- マップ部分 -->
                            <div id="map"></div>
                        </div>
                    </div>
                </div>


                <div class="longBtnDarkOrange">
                    <button type="submit">追加する</button>
                </div>
            </form>
        </div><!-- bookmarkInput -->
        <!-- しおり入力部終了 -->

    </main>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bookmark.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUTukbyGgMY-KLE9YQXu-bG2cLyP23nBY&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        // 場所登録のsubmit無効化
        const input = document.getElementById('pac-input');

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Enterキーのデフォルト動作を無効化
            }
        });

    </script>
    <script>
        // モーダルの表示非表示
        $('.modalOpen').click(function(e) {
            $('.modalBg').fadeIn();
            $('.modalMain').fadeIn();
            setTimeout(function() {
                $('#pac-input').fadeIn();
            }, 500);
        });
        $('.modalClose').click(function(e) {
            $('.modalBg').css('display', 'none');
            $('.modalMain').css('display', 'none');
            $('#pac-input').css('display', 'none');
        });
        $('.modalBg').click(function(e) {
            $('.modalBg').css('display', 'none');
            $('.modalMain').css('display', 'none');
            $('#pac-input').css('display', 'none');
        });
    </script>
    <script>
        // 画像を選択ボタンをクリックしたら写真選択画面が立ち上がる
        $(".shortBtnThinOrange")[0].addEventListener("click", () => {
            document.querySelector("input[type='file']").click();
        });
        // 画像を選択したらプレビューが表示される
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
    </script>
</body>

</html>