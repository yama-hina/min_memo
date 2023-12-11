<!-- 
    更新　籾木
    version 0.0
 -->
 <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/album_shadow.css">
    <link rel="stylesheet" href="../css/album_brow.css">
    <link rel="stylesheet" type="text/css" href="../css/album_all.css">
</head>
<body>
    <div id="flipbook"></div>
    <script>
        let js_php_g = <?php echo $json_group_id; ?>;
        let js_php_a = <?php echo $json_album_id; ?>;
    </script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/album_brow.js"></script>
    <script src="../js/turn.js"></script>

    <script src="../js/pinchout.js"></script>
</body>
</html>