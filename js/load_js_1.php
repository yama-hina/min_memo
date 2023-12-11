<?php
    $url = "../group/".$_POST['group_load']."/album_json/".$_POST['album_load'].".json";
    $json = file_get_contents($url);
    $json = mb_convert_encoding($json,'UTF8','ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    echo $json;
    exit;
?>

