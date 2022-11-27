<?php
include "../db/pdo.php";
//沒登入就踢回首頁
if(!isset($_SESSION['login'])){
    header("location:../index.php?status=auth_error");
}
$name = $_POST['name'];
$school_num =  $_POST['school_num'];
$birthday = $_POST['birthday'];
$uni_id = $_POST['uni_id'];
$parents =  $_POST['parents'];
$addr =  $_POST['addr'];
$tel =  $_POST['tel'];
$dept =  $_POST['dept'];
$graduate_at =  $_POST['graduate_at'];
$status_code =  $_POST['status_code'];
$class_code =  $_POST['class_code'];
$seat_num = $pdo->query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code` = '$class_code'")->fetchColumn()+1;
$year = '2000';

$sql = "INSERT INTO `students`( `school_num`, `name`, `birthday`, `uni_id`, `addr`, `parents`, `tel`, `dept`, `graduate_at`, `status_code`) 
VALUES ('$school_num','$name','$birthday','$uni_id','$addr','$parents','$tel','$dept','$graduate_at','$status_code')";
$sqlClassStudent = "INSERT INTO `class_student`(`school_num`, `class_code`, `seat_num`, `year`) VALUES ('$school_num','$class_code','$seat_num','$year')";

$res = $pdo->exec($sql);
$resClass = $pdo->exec($sqlClassStudent);

if($res&&$resClass){
    $status = 'add_success';
}else{
    $status = 'add_fail';
}

header("location:../admin_center.php?do=main&who=$school_num&status=$status");