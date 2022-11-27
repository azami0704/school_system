<?php
if(isset($_GET['id'])){
    $sql = "SELECT * FROM `students` WHERE `id`='{$_GET['id']}'";
}else{
    header("location:index.php?status=del_error");
}
$student = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC)

?>
<div class="container info">
<h1>編輯學生</h1>
<form action="./api/del_student.php" method="post" class="info-table">
    <table>
    <input type="hidden" name='id' value=<?=$_GET['id']?>>
    <tr>
        <td>學號 :</td>
        <td style="font-weight:700;"><input type="hidden" name='school_num' value=<?=$student['school_num']?>><?=$student['school_num']?></td>
    </tr>
    <tr>
        <!-- name -->
        <td>姓名 :</td>
        <td><input type="hidden" name="name" value=<?=$student['name']?>><?=$student['name']?></td>
    </tr>
    <tr>
        <!-- birthday -->
        <td>生日 :</td>
        <td><input type="hidden" name="birthday" value=<?=$student['birthday']?>><?=$student['birthday']?></td>
    </tr>
    <tr>
        <!-- parents -->
        <td>家長姓名 :</td>
        <td><input type="hidden" name="parents" value=<?=$student['parents']?>><?=$student['parents']?></td>
    </tr>
    <tr>
        <!-- addr -->
        <td>地址 :</td>
        <td><input type="hidden" name="addr" value=<?=$student['addr']?>><?=$student['addr']?></td>
    </tr>
    <tr>
        <!-- tel -->
        <td>電話 :</td>
        <td><input type="hidden" name="tel" value=<?=$student['tel']?>><?=$student['tel']?></td>
    </tr>
    <tr>
        <!-- dept -->
        <td>科別 :</td>
            <?php
            $sql="SELECT `dept`.`name` AS 'name' FROM `dept`,`students` WHERE`dept`.`id` = '{$student['dept']}'";
            $dept = $pdo->query($sql)->fetchColumn();
            ?>
        <td>
            <input type="hidden" name="dept" value=<?=$student['dept']?>><?=$dept?>
        </td>
    </tr>
    <tr>
        <!-- graduate_at -->
        <td>畢業國中 :</td>
        <td>
            <?php
            $sql="SELECT CONCAT(`county`,`name`)AS'name' FROM `graduate_school` WHERE `id`= '{$student['graduate_at']}'";
            $graduate = $pdo->query($sql)->fetchColumn();
            ?>
        <input type="hidden" name="graduate_at" value=<?=$student['graduate_at']?>><?=$graduate?>
        </td>
    </tr>
    <tr>
        <!-- class_code -->
        <td>班級 :</td>
        <td>
            <?php
            $sql = "SELECT `classes`.`name` AS 'name' FROM `class_student`,`classes`WHERE `class_student`.`class_code`=`classes`.`code` AND `class_student`.`school_num` = '{$student['school_num']}'";
            $className = $pdo->query($sql)->fetchColumn();
            ?>
            <input type="hidden" name="class_code" value=<?=$student['graduate_at']?>><?=$className?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="確認刪除" class="btn btn-attention">
            <input type="reset" value="取消刪除" class="btn btn-main">
        </td>
    </tr>
    </table>
</form>
</div>