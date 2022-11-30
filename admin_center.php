<?php
include_once "./db/pdo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>學生管理中心</title>
</head>
<body>
    <?php
    include "./layout/header.php";
    include "./layout/status.php";
    $do = $_GET['do']??'news';
    $file = "./back/{$do}.php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./back/news.php";
    }
    ?>

</body>
</html>