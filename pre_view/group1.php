<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>イベント一覧画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/group.css">
</head>

<body>
    <header>
        <div class="arrow">
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
        <div class="icon_mini">
            <img src="../pre_img/ななち.jpg" alt="">
        </div>
    </header>

    <!-- イベント未登録のときに表示する部分、イベントがある場合は非表示 -->
    <!-- <div id="noEvent">
        <h2>イベントを登録してみましょう！</h2>
    </div> -->
    <!-- イベント未登録のときに表示する部分終了 -->
    <!-- グループ名 -->
    <h1>追憶の探究者</h1>

    <!-- 日付選択フォーム -->
    <form action="" id="dateSelect">
        <!-- 年月セレクトボックス、実際に登録されているイベントの年月日を参照し上限下限を決めループする -->
        <div class="viewform">
            <select name="year" id="">
                <option value="" selected hidden>期間を選択してください</option>
                <option value="">2023年12月</option>
                <option value="">2023年11月</option>
                <option value="">2023年10月</option>
                <option value="">2023年9月</option>
                <option value="">2023年8月</option>
                <option value="">2023年7月</option>
                <option value="">2023年6月</option>
                <option value="">2023年5月</option>
                <option value="">2023年4月</option>
                <option value="">2023年3月</option>
                <option value="">2023年2月</option>
                <option value="">2023年1月</option>
            </select>
        </div>

        <div class="shortBtnThinOrange">
            <button>表示</button>
        </div>
    </form>
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
        <!-- イベントの1セル(背景付き、クラスに「background」、背景画像はCSSのbackground-imageで付けているので、イベントに登録されている1枚目の画像のURLにJSを使って変更する) -->
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
        <!-- イベントの1セル(しおりがあるイベントの場合、クラスに「bookMark」) -->
        <div class="event background bookMark">
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
            <!-- しおりへのリンク表示 -->
            <div class="bmLink shortBtnThinOrange">
                <button>しおりページへ</button>
            </div>
        </div>

        <!-- イベントの1セル(背景)終了 -->

    </div>
    <!-- 日付選択フォーム終了 -->

    <!-- アルバム本棚画面へのボタン -->
    <button type="file" class="circleBtn rightBottom shelf">
        <a href="../Controller/album_list.php"><img src="../pre_img/material/shelf.png" alt="プラスマーク"></a>
    </button>

    <!-- イベント作成画面へのボタン -->
    <button type="file" class="circleBtn rightBottom">
        <a href="../Controller/event_register.php"><img src="../pre_img/material/plus.png" alt="プラスマーク"></a>
    </button>
</body>

</html>