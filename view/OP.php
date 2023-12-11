<!-- 
    更新　田中
    version 0.0
 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>オープニング画面</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- pwa -->
    <link rel="manifest" href="../pwa/manifest.json">
    <script>
        if('serviceWorker' in navigator){
	        navigator.serviceWorker.register('/serviceworker.js').then(function(){
		        console.log("Service Worker is registered!!");
	        });
    }
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pre_css/destyle.css">
    <link rel="stylesheet" href="../pre_css/common.css">
    <link rel="stylesheet" href="../pre_css/OP.css">
</head>

<body>
    <div id="logo">
        <img src="../pre_img/material/logo.png" alt="">
    </div>
    <!-- 波紋アニメーション -->
    <div id="container">
        <p class="orange">Tap to start</p>
        <div class="ripples">
            <div></div>
        </div>
    </div>
    <!-- 波紋アニメーション終了 -->

    <script src="../js/OP.js"></script>
</body>

</html>