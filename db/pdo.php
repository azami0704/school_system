<?php
session_start();
date_default_timezone_set("Asia/Taipei");
$db = "mysql:local=localhost;charset=utf8;dbname=school";
$pdo =new PDO($db,'root','');
?>