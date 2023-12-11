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
            <a href="./group.php?back=go">
                <img src="../pre_img/material/arrow.png" alt="戻るボタン">
            </a>
        </div>
        <div class="icon_mini">
            <a href="./group.php?detail=go">
                <img src="<?php echo $img; ?>" alt="">
            </a>
        </div>
    </header>

    <!-- イベント未登録のときに表示する部分、イベントがある場合は非表示 -->
    <!-- <div id="noEvent">
        <h2>イベントを登録してみましょう！</h2>
    </div> -->
    <!-- イベント未登録のときに表示する部分終了 -->
    <!-- グループ名 -->
    <h1><?php echo $group["name"]; ?></h1>

    <!-- 日付選択フォーム -->
    <form action="../Controller/group.php" method="POST" id="form">
        <div class="viewform">
            <select name="date" id="date" onchange="submitForm()">
                <option value="" selected hidden>期間を選択してください</option>
                <?php foreach ($select_date as $val) { ?>
                    <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                <?php } ?>
            </select>
        </div>
    </form>
    <!-- <form action="" id="dateSelect"> -->
    <!-- 年月セレクトボックス、実際に登録されているイベントの年月日を参照し上限下限を決めループする -->
    <!-- <div class="viewform">
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
    </form> -->
    <div id="eventContena" class = "<?php echo $_SESSION['group_id'] ?>"  data-json='<?php echo $jsonArray; ?>'>
        <!-- この中でイベントをループさせる -->
        <?php $count = 0; if (!empty($list)) { ?>
            <?php $i = 0;?>
            <?php foreach ($eventList as $val) { ?>
                <a href="./group.php?event_id=<?php echo $val['id']; ?>&group_id=<?php echo $_SESSION['group_id'] ?>">
                    <div id = "<?php echo $val['id']; ?>" class="<?php if($images[$count]['judge']){ echo "event background"; }else{echo "event";} ?>">
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
                            
                            <form action="./group.php" method="POST">
                            <input type="hidden" value="<?php echo $val['id']; ?>" name="event_id">
                            <input type="hidden" value="<?php echo $_SESSION['group_id'] ?>" name="group_id">
                            <?php echo isset($bookmark[$i])?'
                            <div class="bmLink shortBtnThinOrange">
                                <button type="submit" name="bookmark" value="go">しおりページへ</button>
                            </div>':""?>
                            </form>
                        </div>
                        <!-- 期間内の日付、(例：2/3日目) -->
                        <div class="duration">
                            <h2><?php echo $val['count'] != "" ? $val['count'] . "/" . $val['dateCount'] . "日目" : ''; ?></h2>
                        </div>
                    </div>
                
                </a>
                <!-- <p><?php echo $val['id']; ?></p> 画像用のID-->
                <?php $i++;?>
            <?php $count++;} ?>
        <?php } ?>
    </div>
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
<script>
    // AjaxでJSONデータを取得してグローバル変数に格納する関数
    function getJsonData() {
        var jsonData = document.getElementById('eventContena').getAttribute('data-json');
        return JSON.parse(jsonData);
    }

    // 初回ページロード時にグローバル変数にJSONデータをセット
    var jsArray = getJsonData();
</script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/group.js"></script>
</body>

</html>