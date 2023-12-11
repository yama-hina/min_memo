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
</head>

<body>
    <header>
        <div class="arrow">
            <!-- <img src="../pre_img/material/arrow.png" alt="戻るボタン"> -->
        </div>

        <div class="right">
            <!-- 通知ボタン -->
            <div class="bell">
                <a href=""><img src="../pre_img/material/bell.png" alt=""></a>
            </div>

            <!-- マイページボタン,マイページへのリンクお願いします -->
            <div class="icon_mini bell">
                <a href=""><img src="../pre_img/ななち.jpg" alt=""></a>
            </div>
        </div>

    </header>
    <main>
        <!-- グループに未所属のときに表示する部分、所属している場合は非表示 -->
        <!-- <div id="noGroup">
            <h2>グループを新たに作成するか<br>招待を受けてください。</h2>
        </div> -->
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
                <div id="eventContena">
                    <!-- この中でイベントをループさせる -->
                    <!-- イベントの1セル -->
                    <div class="event">
                        <!-- 日付表示部 -->
                        <div class="day">
                            <!-- 日付 -->
                            <p>12</p>
                        </div>
                        <!-- イベント名、コメント表示部 -->
                        <div class="eventContents">
                            <div class="eventName">
                                <h2>U22のイベント11111111111111111111</h2>
                            </div>
                            <div class="eventComment">
                                <p class="comment">
                                    今日は晴天です。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ
                                </p>
                            </div>
                        </div>
                        <!-- 期間内の日付、(例：2/3日目) -->
                        <div class="duration">
                            <h2>2/3日目</h2>
                        </div>
                    </div>
                    <!-- イベントの1セル終了 -->
                    <!-- イベントの1セル(背景) -->
                    <div class="event background">
                        <!-- 日付表示部 -->
                        <div class="day">
                            <!-- 日付 -->
                            <p>12</p>
                        </div>
                        <!-- イベント名、コメント表示部 -->
                        <div class="eventContents">
                            <div class="eventName">
                                <h2>U22のイベント11111111111111111111</h2>
                            </div>
                            <div class="eventComment">
                                <p class="comment">
                                    今日は晴天です。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ
                                </p>
                            </div>
                        </div>
                        <!-- 期間内の日付、(例：2/3日目) -->
                        <div class="duration">
                            <h2>2/3日目</h2>
                        </div>
                    </div>
                    <!-- イベントの1セル(背景)終了 -->
                </div>
            </div>
            <!-- 予定タブコンテンツ表示部終了 -->

            <!-- グループタブコンテンツ表示部 -->
            <div class="tab_content" id="group_content">
                <!-- 1グループの表示領域、ここを増やしていく -->
                <div class="groupItems">
                    <!-- グループアイコン -->
                    <div class="icon_mini">
                        <img src="../pre_img/ななち.jpg" alt="">
                    </div>
                    <!-- グループ名 -->
                    <div class="groupName">
                        <h2>グループ145551111111111111111111111</h2>
                    </div>
                </div>
                <!-- 1グループの表示領域終了 -->
                <!-- 1グループの表示領域、ここを増やしていく -->
                <div class="groupItems">
                    <!-- グループアイコン -->
                    <div class="icon_mini">
                        <img src="../pre_img/ななち.jpg" alt="">
                    </div>
                    <!-- グループ名 -->
                    <div class="groupName">
                        <h2>グループ145551111111111111111111111</h2>
                    </div>
                </div>
                <!-- 1グループの表示領域終了 -->
                <!-- 1グループの表示領域、ここを増やしていく -->
                <div class="groupItems">
                    <!-- グループアイコン -->
                    <div class="icon_mini">
                        <img src="../pre_img/ななち.jpg" alt="">
                    </div>
                    <!-- グループ名 -->
                    <div class="groupName">
                        <h2>グループ145551111111111111111111111</h2>
                    </div>
                </div>
                <!-- 1グループの表示領域終了 -->
                <!-- 1グループの表示領域、ここを増やしていく -->
                <div class="groupItems">
                    <!-- グループアイコン -->
                    <div class="icon_mini">
                        <img src="../pre_img/ななち.jpg" alt="">
                    </div>
                    <!-- グループ名 -->
                    <div class="groupName">
                        <h2>グループ145551111111111111111111111</h2>
                    </div>
                </div>
                <!-- 1グループの表示領域終了 -->
            </div>
            <!-- グループタブコンテンツ表示部終了 -->
        </div>
        <!-- グループ作成ボタン -->
        <button type="file" class="circleBtn rightBottom">
            <img src="../pre_img/material/plus.png" alt="プラスマーク">
        </button>
    </main>
</body>

</html>