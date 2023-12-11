<!-- 
    更新　西谷⇒籾木
    version 1.0
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>アルバム作成</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/album_edit.css">
    <link rel="stylesheet" href="../css/load_album.css">
</head>

<body>
    <!-- ロード画面 -->
    <div id="load"></div>

    <header>
        <a href="./album_list.php">
            <div class="arrow">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </div>
        </a>
        <div class="santen">
        </div>
    </header>
    <main>
        <!-- ロード画面 -->
        <div id="load"></div>

        <form action="./album_editor.php" method="POST">
            <h1>アルバムの初期設定を<br>入力してください。</h1>
            <!-- アルバム名 -->
            <div class="textBox">
                <small>*必須</small>
                <input type="text" autocomplete="off" placeholder="アルバム名" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
                <p class="error title_error"></p>
            </div>
            <!-- ページ数 -->
            <div class="viewform">
                <small>*必須</small>
                <select name="page" id="">
                    <option value="" selected hidden>ページ数を選択してください</option>
                    <?php for ($i = 4; $i <= 26; $i += 2) { ?>
                        <option value="<?php echo $i; ?>" <?php echo isset($_POST['page']) && $_POST['page'] == $i ? 'selected' : '' ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <p class="error page_error"></p>
            </div>

            <!-- 変更点、イベント選択の文言追加 -->
            <p class="eventChoice">イベントを選択してください</p>

            <!-- 変更点、viewform,yearのクラスのdivで囲みました -->
            <div class="viewform year">
                <select name="year" id="year">
                    <option value="" selected hidden>期間検索</option>
                    <option value="">全期間</option>
                    <?php foreach ($select_value as $key => $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $select_date[$key]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- 変更点、pタグ→div class="titleSearch"に変更 -->
            <div class="titleSearch">
                <input id="title_serch" type="text" placeholder="タイトル検索">
                <!-- 変更点、ボタンをdivタグで囲んだ -->
                <div class="shortBtnThinOrange">
                    <button id="title_serch_button">検索</button>
                </div>
            </div>
            <!-- イベント選択部 -->
            <small>*必須</small>
            <div id="eventContena">
                <!-- イベント表示ループ -->
                <?php foreach ($data as $key => $value) { ?>
                    <div class="event" style="background-image:url('../group/<?php echo $value['group_id']; ?>/event_img/<?php echo $value['event_id']; ?>/group<?php echo $value['group_id']; ?>_<?php echo $value['id']; ?>.<?php echo $value['extension']; ?>')">
                        <input type="checkbox" name="events[]" value="<?php echo $value["event_id"]; ?>" id="box<?php echo $key; ?>" style="display: none;">
                        <label id="<?php echo ($value["event_id"]) ?>" class="img_stack" for="box<?php echo $key; ?>">
                            <!-- イベント名、コメント表示部 -->
                            <div class="eventContents">
                                <div class="eventName">
                                    <h2><?php echo $value['name']; ?></h2>
                                </div>
                                <div class="eventComment">
                                    <p class="comment"><?php echo $value['comment'] == ''? 'コメントはありません':$value['comment']?></p>
                                </div>
                            </div>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <!-- イベント選択部終了 -->
            <div class="eventError">
                <p class="event_error error"></p>
            </div>

            <div class="longBtnDarkOrange">
                <button type="submit" name="btn" class="button" value="add">作成</button>
            </div>
        </form>
    </main>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/pinchout.js"></script>
    <script src="../js/album_edit.js"></script>
</body>

</html>