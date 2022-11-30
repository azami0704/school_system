<?php
include_once "./db/pdo.php";
//登入狀態下直接到非會員首頁有bug,加判斷登入狀態下去會員的前台頁面
// if(isset($_SESSION['login'])){
//     header("location:admin_center.php?do=front_main");
// }
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
    $file = "./front/{$do}.php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./front/news.php";
    }
    ?>

</body>
</html>