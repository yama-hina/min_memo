<!-- 
    更新　田中
    version 1.0
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
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>

<table>
    <?php foreach($list as $val){ ?>
        <tr>
            <td><?php echo $val['name'];?></td>
            <td><?php echo $val['icon_img'];?></td>
            <form action="../Controller/member_list.php" method="POST">
            <input type="hidden" name="member_id" value="<?php echo $val["id"];?>">
            <input type="hidden" name="group_id" value="<?php echo $val["group_id"];?>">
                <td><button name="kick" value="kick">キック</button></td>
            </form>
        </tr>
    <?php } ?>
</table>
<script src="../js/pinchout.js"></script>

</body>
</html>