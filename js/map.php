<?php

$data = $_POST['value'];


$response = array("name" => $data["name"] , "url" => "https://www.google.com/maps/search/?api=1&query=".$data["name"]);
echo json_encode($response , JSON_UNESCAPED_UNICODE);
?>