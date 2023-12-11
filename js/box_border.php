<?php
session_start();
$_SESSION['title'] = $_POST['load'];
exit();
?>