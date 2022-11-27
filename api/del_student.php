<?php
include "../db/pdo.php";
//如果沒有都入就踢回首頁
if(!isset($_SESSION['login'])){
    header("location:../index.php?status=auth_error");
}
$id = $_POST['id'];
$school_num =  $_POST['school_num'];

$sql = "DELETE FROM `students` WHERE `students`.`id` = '$id'";
$sqlClassStudent = "DELETE FROM `class_student` WHERE `school_num` = '$school_num'";
print_r($sql);
$confirmStudents = $pdo->query("SELECT COUNT(*) FROM `students` WHERE `id` = '$id'")->fetchColumn();
$confirmClassStudents = $pdo->query("SELECT COUNT(*) FROM `class_student` WHERE `school_num` = '$school_num'")->fetchColumn();

//如果有兩張資料表都有查到就送出刪除
if($confirmStudents==1&&$confirmClassStudents==1){
    $res = $pdo->exec($sql);
    $resClass = $pdo->exec($sqlClassStudent);
    if($res&&$resClass){
        $status = 'del_success';
    }else{
        $status = 'del_fail';
    }
}else{
    $status = 'del_fail';
}

header("location:../admin_center.php?do=main&who=$school_num&status=$status");