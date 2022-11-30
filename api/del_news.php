<?php
include "../db/pdo.php";

$id = $_GET['id'];
$sql = "DELETE FROM `news` WHERE `id`= '$id'";

echo $sql;
$res=$pdo->exec($sql);

if($res){
    $status = 'del_news_success';
}else{
    $status = 'del_news_fail';
}
header("location:../admin_center.php?do=news&status={$status}");
?>