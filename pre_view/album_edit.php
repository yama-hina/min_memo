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
</head>

<body>
    <header>
        <div class="arrow">
            <img src="../pre_img/material/arrow.png" alt="戻るボタン">
        </div>
        <div class="santen">
        </div>
    </header>
    <main>
        <h1>アルバムの初期設定を<br>入力してください。</h1>
        <!-- アルバム名 -->
        <div class="textBox">
            <small>*必須</small>
            <input type="text" autocomplete="off" placeholder="アルバム名" name="event" 　value="">
            <p class="error">こちらはエラーです</p>
        </div>
        <!-- ページ数 -->
        <div class="viewform">
            <select name="page" id="">
                <option value="" selected hidden>ページ数を選択してください</option>
                <option value="">2</option>
                <option value="">4</option>
                <option value="">6</option>
                <option value="">8</option>
                <option value="">10</option>
                <option value="">12</option>
                <option value="">14</option>
                <option value="">16</option>
                <option value="">18</option>
                <option value="">20</option>
                <option value="">22</option>
                <option value="">24</option>
            </select>
            <p class="error">こちらはエラーです</p>
        </div>


        <p class="eventChoice">イベントを選択してください</p>
        <!-- 期間選択フォーム -->
        <div class="viewform year">
            <select name="year" id="year">
                <option value="" selected hidden>期間検索</option>
                <option value="">全期間</option>
                <?php foreach ($select_value as $key => $val) { ?>
                    <option value="<?php echo $val; ?>"><?php echo $select_date[$key]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="titleSearch">
            <input id="title_serch" type="text" placeholder="タイトル検索">
            <div class="shortBtnThinOrange">
                <button id="title_serch_button">検索</button>
            </div>
        </div>

        <!-- 期間選択フォーム終了 -->


        <!-- イベント選択部 -->
        <div id="eventContena">
            <!-- イベントの1セル -->
            <div class="event">
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
            </div>
            <!-- イベントの1セル終了 -->
            <!-- イベントの1セル(背景) -->
            <div class="event background">
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
            </div>
            <!-- イベントの1セル(背景)終了 -->
            <!-- イベントの1セル -->
            <div class="event">
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
            </div>
            <!-- イベントの1セル終了 -->
            <!-- イベントの1セル(背景) -->
            <div class="event background">

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
            </div>
            <!-- イベントの1セル(背景)終了 -->
            <!-- イベントの1セル -->
            <div class="event">
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
            </div>
            <!-- イベントの1セル終了 -->
            <!-- イベントの1セル(背景) -->
            <div class="event background">
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
            </div>
            <!-- イベントの1セル(背景)終了 -->
            <!-- イベントの1セル -->
            <div class="event">
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
            </div>
            <!-- イベントの1セル終了 -->
            <!-- イベントの1セル(背景) -->
            <div class="event background">
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
            </div>
            <!-- イベントの1セル(背景)終了 -->
            <!-- イベントの1セル -->
            <div class="event">
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
            </div>
            <!-- イベントの1セル終了 -->
            <!-- イベントの1セル(背景) -->
            <div class="event background">
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
            </div>
            <!-- イベントの1セル(背景)終了 -->

        </div>
        <!-- イベント選択部終了 -->
        <div class="eventError">
            <p class="error">こちらはエラーです</p>
        </div>

        <div class="longBtnDarkOrange">
            <button>作成</button>
        </div>
    </main>

</body>

</html>