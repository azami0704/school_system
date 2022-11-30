<?php
include "../db/pdo.php";

$id = $_POST['id'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$readed = $_POST['readed'];
$top = $_POST['top'];
$category = $_POST['category'];
$sql = "UPDATE `news` SET `subject`='$subject',`content`='$content',`category`='$category',`readed`='$readed',`top`='$top' WHERE `id`= '$id'";

echo $sql;
$res=$pdo->exec($sql);

if($res){
    $status = 'edit_news_success';
}else{
    $status = 'edit_news_fail';
}
header("location:../admin_center.php?do=news&status={$status}");
?>