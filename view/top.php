<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>TOPページ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/top.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/group_input.css">
</head>

<body>
    <header>
        <div class="arrow">
            <div id="search-wrap">
                <form role="search" id="form" action="" method="POST" enctype="multipart/form-data">
                    <input data-tg-tour="ここに招待コードを打つとグループに加入できます" type="text" id="search-text" name="group_search" autocomplete="off">
                    <input id="sbtn" type="submit" />
                </form>
            </div>
        </div>

        <div class="right">
            <!-- 通知ボタン -->
            <div id="modalOpen" class="modalButton bell">
                <img src="../pre_img/material/bell.png" alt="">
            </div>

            <!-- マイページボタン,マイページへのリンクお願いします -->
            <div class="icon_mini bell">
                <a href="./mypage.php"><img src="<?php echo $img ?>" alt=""></a>
            </div>
        </div>

    </header>
    <main>
        <!-- 通知のiframe -->
        <div id="easyModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modalClose">×</span>
                </div>
                <form action="./top.php" method="POST">
                    <!-- チェックボックス -->
                    <div id="notice">
                        <?php foreach ($notification as $key => $val) { ?>
                            <p class="check"><?php echo isset($val['comment']) ? "<label class='checkBox'>" . $val['comment'] . " <input type='checkbox' name='delete[]' value='" . $val['id'] . "'></label>" : $val['not']; ?></p>
                        <?php } ?>
                    </div>
                    <!-- 削除ボタン -->
                    <?php echo !isset($notification[0]['not']) ? "<div class='longBtnDarkOrange deletebutton'><button>削除</button></div>" : ""; ?>
                </form>
            </div>
        </div>
        <!-- グループに未所属のときに表示する部分、所属している場合は非表示 -->
        <!--  -->
        <!-- 予定とグループを切り替える部分、グループ未所属の場合はこのdivを非表示 -->
        <div class="tabs">
            <!-- 予定タブ選択部 -->
            <input id="schedule" type="radio" name="tab_item" checked>
            <label class="tab_item" for="schedule">予定</label>
            <!-- 予定タブ選択部終了 -->

            <!-- グループタブ選択部 -->
            <input id="group" type="radio" name="tab_item">
            <label class="tab_item" for="group">グループ</label>
            <!-- グループタブ選択部終了 -->

            <!-- 予定タブコンテンツ表示部 -->
            <div class="tab_content" id="schedule_content">
                <div id="eventContena" class="<?php echo $_SESSION['group_id'] ?>" data-json='<?php echo $jsonArray; ?>'>
                    <!-- この中でイベントをループさせる -->
                    <!-- イベントの1セル -->
                    <?php if (!empty($list)) { ?>
                        <?php foreach ($eventList as $key => $val) { ?>
                            <a href="./group.php?event_id=<?php echo $val['id']; ?>&group_id=<?php echo $_SESSION['group_id'] ?>">
                                <div id="<?php echo $val['id']; ?>" class="<?php if ($images[$key]['judge']) {
                                                                                echo "event background";
                                                                            } else {
                                                                                echo "event";
                                                                            } ?>">
                                    <!-- <div class="event"> -->
                                    <!-- 日付表示部 -->
                                    <div class="day">
                                        <!-- 日付 -->
                                        <p><?php echo date("d", strtotime($val['date'])); ?></p>
                                    </div>
                                    <!-- イベント名、コメント表示部 -->
                                    <div class="eventContents">
                                        <div class="eventName">
                                            <h2><?php echo $val['name']; ?></h2>
                                        </div>
                                        <div class="eventComment">
                                            <p class="comment">
                                                <?php echo $val['comment']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- 期間内の日付、(例：2/3日目) -->
                                    <div class="duration">
                                        <h2><?php echo $val['count'] != "" ? $val['count'] . "/" . $val['dateCount'] . "日目" : ''; ?></h2>
                                    </div>
                                </div>
                                <div>
                            </a>
                            <!-- <p><?php echo $val['id']; ?></p> 画像用のID-->
                </div>
            <?php } ?>

        <?php } ?>
            </div>
        </div>
        <!-- 予定タブコンテンツ表示部終了 -->

        <!-- グループタブコンテンツ表示部 -->
        <div class="tab_content" id="group_content">
            <!-- 1グループの表示領域、ここを増やしていく -->
            <?php if ($group_list) : ?>
                <?php foreach ($group_list as $val) : ?>
                    <a href="../Controller/group_list.php?group_id=<?php echo $val['id']; ?>">
                        <div class="groupItems">
                            <!-- グループアイコン -->
                            <div class="icon_mini">
                                <img src="../group/<?php echo $val['id'] ?? ''; ?>/group_icon/<?php echo $val['icon'] ?? ''; ?>" alt="" onerror="this.src='../img/material/group.png'" class='<?php echo $val['icon'] ? "userImg" : "default"; ?>'>
                            </div>
                            <!-- グループ名 -->
                            <div class="groupName">
                                <h2><?php echo $val['name']; ?></h2>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <div id="noGroup">
                    <h2>グループを新たに作成するか<br>招待を受けてください。</h2>
                </div>
            <?php endif; ?>
        </div>
        <!-- グループタブコンテンツ表示部終了 -->
        </div>
        <!-- グループ作成ボタン -->
        <form action="./top.php" method="POST">
            <button type="" class="circleBtn rightBottom" name="group" value="make">
                <img src="../pre_img/material/plus.png" alt="プラスマーク">
            </button>
        </form>
        <div id="search_result"></div>
    </main>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/list_select.js"></script>
    <script src="../js/modal.js"></script>
    <script>
        // AjaxでJSONデータを取得してグローバル変数に格納する関数
        function getJsonData() {
            var jsonData = document.getElementById('eventContena').getAttribute('data-json');
            return JSON.parse(jsonData);
        }

        // 初回ページロード時にグローバル変数にJSONデータをセット
        var jsArray = getJsonData();
    </script>
    <script src="../js/group.js"></script>
    <script src="../js/search.js"></script>
</body>

</html>