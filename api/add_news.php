<?php
include "../db/pdo.php";


$subject = $_POST['subject'];
$content = $_POST['content'];
$top = $_POST['top'];
$category = $_POST['category'];
$sql = "INSERT INTO `news`(`subject`, `content`, `category`,`top`) 
VALUES ('$subject','$content','$category','$top')";

echo $sql;
$res=$pdo->exec($sql);

if($res){
    $status = 'add_news_success';
}else{
    $status = 'add_news_fail';
}
header("location:../admin_center.php?do=news&status={$status}");
?>