<?php
if(isset($_GET['id'])){
    $sql = "SELECT * FROM `students` WHERE `id`='{$_GET['id']}'";
}else{
    header("location:index.php?status=edit_error");
}
$student = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC)

?>
<div class="container info">
<h1>編輯學生</h1>
<form action="./api/edit_student.php" method="post" class="info-table">
    <table>
    <input type="hidden" name='id' value=<?=$_GET['id']?>>
    <tr>
        <td>學號 :</td>
        <td style="font-weight:700;"><input type="hidden" name='school_num' value=<?=$student['school_num']?>><?=$student['school_num']?></td>
    </tr>
    <tr>
        <!-- name -->
        <td>姓名 :</td>
        <td><input type="text" name="name" value=<?=$student['name']?>></td>
    </tr>
    <tr>
        <!-- birthday -->
        <td>生日 :</td>
        <td><input type="text" name="birthday" value=<?=$student['birthday']?>></td>
    </tr>
    <tr>
        <!-- parents -->
        <td>家長姓名 :</td>
        <td><input type="text" name="parents" value=<?=$student['parents']?>></td>
    </tr>
    <tr>
        <!-- addr -->
        <td>地址 :</td>
        <td><input type="text" name="addr" value=<?=$student['addr']?>></td>
    </tr>
    <tr>
        <!-- tel -->
        <td>電話 :</td>
        <td><input type="text" name="tel" value=<?=$student['tel']?>></td>
    </tr>
    <tr>
        <!-- dept -->
        <td>科別 :</td>
        <td>
            <select name="dept" id="">
            <?php
            $sql="SELECT `id`,`name` FROM `dept`";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                if($row['id']==$student['dept']){
                    echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                }else{
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <!-- graduate_at -->
        <td>畢業國中 :</td>
        <td>
        <select name="graduate_at">
            <?php
            $sql="SELECT `id`,CONCAT(`graduate_school`.`county`,`graduate_school`.`name`) AS '畢業國中' FROM `graduate_school`";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                if($row['id']==$student['graduate_at']){
                    echo "<option value='{$row['id']}' selected>{$row['畢業國中']}</option>";
                }else{
                    echo "<option value='{$row['id']}'>{$row['畢業國中']}</option>";
                }
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <!-- status_code -->
        <td>畢業狀態 :</td>
        <td>
            <select name="status_code">
            <?php
            $sql="SELECT `code`,`status` FROM `status`";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                if($row['code']==$student['status_code']){
                    echo "<option value='{$row['code']}' selected>{$row['status']}</option>";
                }else{
                    echo "<option value='{$row['code']}'>{$row['status']}</option>";
                }
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <!-- class_code -->
        <td>班級 :</td>
        <td>
        <select name="class_code">
            <?php
            $sql="SELECT `code`,`name` FROM `classes`";
            $sqlClass = "SELECT `class_code` FROM `class_student`,`students` WHERE `class_student`.`school_num`={$student['school_num']}";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            $class = $pdo->query($sqlClass)->fetchColumn();
            echo $class;
            foreach($rows as $row){
                if($row['code']==$class){
                    echo "<option value='{$row['code']}' selected>{$row['name']}</option>";
                }else{
                    echo "<option value='{$row['code']}'>{$row['name']}</option>";
                }
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="確認修改" class="btn btn-attention">
            <input type="reset" value="重新填寫" class="btn btn-main">
        </td>
    </tr>
    </table>
</form>
</div>