<?php
include "../db/pdo.php";
//如果沒有登入就踢回首頁
if(!isset($_SESSION['login'])){
    header("location:../index.php?status=auth_error");
}
//資料設定
$id = $_POST['id'];
$name = $_POST['name'];
$school_num =  $_POST['school_num'];
$birthday = $_POST['birthday'];
$parents =  $_POST['parents'];
$addr =  $_POST['addr'];
$tel =  $_POST['tel'];
$dept =  $_POST['dept'];
$graduate_at =  $_POST['graduate_at'];
$status_code =  $_POST['status_code'];
$class_code =  $_POST['class_code'];

$sql = "UPDATE `students` SET `name`='$name',`birthday`='$birthday',`addr`='$addr',`parents`='$parents',`tel`='$tel',`dept`='$dept',`graduate_at`='$graduate_at',`status_code`='$status_code' WHERE `id`='$id'";
$sqlClassConfirm = "SELECT `class_code` FROM `class_student` WHERE `school_num` = '$school_num'" ;
$classes = $pdo->query($sqlClassConfirm)->fetchColumn();
$sqlClassStudent = "UPDATE `class_student` SET `class_code`='$class_code' WHERE `school_num` = '$school_num'";
//如果班級沒改就送students那張就好
if($classes==$class_code){
    $res = $pdo->exec($sql);
    if($res){
        $status = 'edit_success';
    }else{
        $status = 'edit_fail';
    }
}else{
    //如果兩張都有改再一起送
    $res = $pdo->exec($sql);
    $resClass = $pdo->exec($sqlClassStudent);
    if($res&&$resClass){
        $status = 'edit_success';
    }else{
        $status = 'edit_fail';
    }
}
header("location:../admin_center.php?do=main&who=$school_num&status=$status");