<?php
include "../db/pdo.php";


$acc = $_POST['acc'];
$pw = $_POST['pw'];


$sql ="SELECT `account`, `password` FROM `users` WHERE `account` = '$acc'";
$check = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
print_r($check);
if($check['account']==$acc&&$check['password']==$pw){
    $_SESSION['login']=$acc;
    header("location:../admin_center.php?status=login_success");
}else{
    if(!isset($_SESSION['login_try'])){
        $_SESSION['login_try']=1;
    }else{
        $_SESSION['login_try']++;
    }
    header("location:../index.php?do=login");
}
// header("location:../admin_center.php?status=$status")
?>