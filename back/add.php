<div class="container info">
<h1>新增學生</h1>
<form action="./api/add_student.php" method="post" class="info-table">
    <table>
    <tr>
        <?php
        $school_num = $pdo->query("SELECT max(`school_num`) FROM `students`")->fetchColumn()+1;
        ?>
        <td>學號 :</td>
        <td><input type="text" name='school_num' value=<?=$school_num?> readonly></td>
    </tr>
    <tr>
        <!-- name -->
        <td>姓名 :</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <!-- birthday -->
        <td>證號 :</td>
        <td><input type="text" name="uni_id"></td>
    </tr>
    <tr>
        <!-- birthday -->
        <td>生日 :</td>
        <td><input type="date" name="birthday"></td>
    </tr>
    <tr>
        <!-- parents -->
        <td>家長姓名 :</td>
        <td><input type="text" name="parents"></td>
    </tr>
    <tr>
        <!-- addr -->
        <td>地址 :</td>
        <td><input type="text" name="addr"></td>
    </tr>
    <tr>
        <!-- tel -->
        <td>電話 :</td>
        <td><input type="text" name="tel"></td>
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
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
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
                echo "<option value='{$row['id']}'>{$row['畢業國中']}</option>";
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
                echo "<option value='{$row['code']}'>{$row['status']}</option>";
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
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                echo "<option value='{$row['code']}'>{$row['name']}</option>";
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="確認新增" class="btn btn-attention">
            <input type="reset" value="清除填寫" class="btn btn-main">
        </td>
    </tr>
    </table>
</form>
</div>