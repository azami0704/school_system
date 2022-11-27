<?php
include "../db/pdo.php";

if(!isset($_POST['acc'])){
    header("location:../index.php?do=reg&status=reg_fail");
}

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$email = $_POST['email'];
$name = $_POST['name'];

$sql ="INSERT INTO `users`( `account`, `password`, `email`, `name`) VALUES ('$acc','$pw','$email','$name')";
$accCheck = $pdo->query("SELECT COUNT(*) FROM `users` WHERE `account`='$acc'")->fetchColumn();
if($accCheck==0){
    $res = $pdo->exec($sql);
    $status=$res==1?'reg_success':'reg_fail';
}else{
    $status = 'reg_fail';
}
header("location:../index.php?do=login&status=$status")
?>