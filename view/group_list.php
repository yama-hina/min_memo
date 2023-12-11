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
    <title>グループ一覧</title>
    <!-- フォント関連 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- 自作css関連 -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/button.css">
    <!-- <link rel="stylesheet" href="../css/header.css"> -->
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/group_list.css">
    <link rel="stylesheet" href="https://unpkg.com/@sjmc11/tourguidejs/dist/css/tour.min.css">
    <link rel="stylesheet" href="../css/chutorial_btn.css">
</head>
<body>
    <!-- 上部ナビ -->
    <header>
        <a href="./group.php" id="search"></a>
​
        <!-- 検索 -->
        <div id="search-wrap">
            <form role="search" id="form" action="" method="POST" enctype="multipart/form-data">
                <input data-tg-tour="ここに招待コードを打つとグループに加入できます" type="text" id="search-text" name="group_search" autocomplete="off">
                <input id="sbtn" type="submit" />
            </form>
        </div>
​
        <!-- <span id="headerText">グループ</span> -->
​
        <!-- 通知モーダル用のボタン -->
        <button id="modalOpen" class="modalButton">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z"/></svg>
        </button>
​
        <!-- マイページ -->
        <a href="./mypage.php" id="mypage">
            <img src="<?php echo $img; ?>" alt="" srcset="" class="<?php echo $class; ?>">
        </a>
    </header>
​
    <main>
​
​
    <!-- 通知のiframe -->
    <div id="easyModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modalClose">×</span>
            </div>
            <iframe src="./notification.php" width="" height="" scrolling="auto"></iframe>
        </div>
    </div>
​
​

    <!-- グループ作成ボタン -->
    <a data-tg-tour="このボタンでグループが作成できます" href="./group_register.php" id="groupRegister"><button class="button"></button></a>
​
​
    <?php if($group_list): ?>
        <table>
            <?php foreach($group_list as $val): ?>
                <tr>
                    <th>
                        <span>
                            <img src="../group/<?php echo $val['id']??''; ?>/group_icon/<?php echo $val['icon']??''; ?>" alt="" onerror="this.src='../img/material/group.png'" class='<?php echo $val['icon']? "userImg":"default"; ?>'>
                        </span>
                    </th>
                    <td>
                        <a href="../Controller/group_list.php?group_id=<?php echo $val['id'];?>"><?php echo $val['name']; ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>まだグループに所属していません</p>
    <?php endif; ?>
​
    <div id="search_result"></div>
        <!-- ​   チュートリアルボタン    -->
​       <p id="chutorial_btn"><button class="button"></button></p>

    </main>
​
​
​
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/modal.js"></script>
<script src="../js/group_list.js"></script>
<script src="../js/pinchout.js"></script>
<script src="../js/search.js"></script>
<script src="https://unpkg.com/@sjmc11/tourguidejs/dist/tour.js"></script>
<script src="../js/chutorial.js"></script>
</body>
</html>