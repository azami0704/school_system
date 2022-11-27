<div class="container">
    <?php
    //查詢班級切換
    if(isset($_GET['code']) && ($_GET['code'])!="null"){
        $code = "AND `class_code` = '{$_GET['code']}'";
        $codeForPage = "WHERE `class_code` = '{$_GET['code']}'";
        $codeForPageChange = "&code={$_GET['code']}";
    }else{
        $code = '';
        $codeForPage ='';
        $codeForPageChange ='';
    }
    //換頁用變數
    $pageSetting = $_GET['pageSet']??10;
    $PageRangeArr = [10,20,50,100];
    $pageRows = $pageSetting;
    if(isset($_GET['page'])){
        $pageActive=$_GET['page'];
        $pageStart = ($pageActive-1)*$pageRows;
        $pageEnd = $pageRows;
    }else{
        $pageActive=1;
        $pageStart=$pageActive-1;
        $pageEnd=$pageRows;
    }
    //全部資料
    $sql = "SELECT `students`.`id` AS 'id', `students`.`school_num` AS 'school_num', `students`.`name` AS 'name', `birthday`,  `addr`, `parents`, `tel`, `dept`.`name` AS '科別', CONCAT(`graduate_school`.`county`,`graduate_school`.`name`)AS '畢業國中',`class_code` FROM `students`,`graduate_school`,`class_student`,`dept` WHERE `students`.`graduate_at`=`graduate_school`.`id` AND `students`.`school_num`=`class_student`.`school_num` AND  `students`.`dept`=`dept`.`id` $code LIMIT $pageStart,$pageEnd";
    $sqlClassList = "SELECT`code`, `name`FROM `classes`";
    $sqlPage = "SELECT COUNT(*) FROM `class_student` $codeForPage";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $rowsClassList = $pdo->query($sqlClassList)->fetchAll(PDO::FETCH_ASSOC);
    $rowsPage = $pdo->query($sqlPage)->fetchColumn();
    //總頁數
    $Pages = ceil($rowsPage/$pageRows);
    ?>
        <?php
        //班級列表
        echo "<ul class='class-list'>";
        echo "<a href='?do=main' class='btn btn-main'>全部</a>";
        foreach($rowsClassList as $row){
            echo '<li>';
            echo "<a href='?code={$row['code']}' class='btn btn-main'>{$row['name']}</a>";
            echo '</li>';
        }
        echo '</ul>';
        //班級列表 END
        ?>
<section class="main">
    <table class="student-list">
        <thead>
            <tr>
                <th>學號</th>
                <th>姓名</th>
                <th>生日</th>
                <th>地址</th>
                <th>電話</th>
                <th>畢業國中</th>
                <th>年齡</th>
                <th>操作</th>
            </tr>
        </thead>
        <?php
        foreach($rows as $row){
            $age = floor((strtotime('now')-strtotime($row['birthday']))/(60*60*24*365));
            echo '<tr>';
            echo "<td>{$row['school_num']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['birthday']}</td>";
            echo "<td>{$row['addr']}</td>";
            echo "<td>{$row['tel']}</td>";
            echo "<td>{$row['畢業國中']}</td>";
            echo "<td>$age</td>";
            echo "<td class='list-tool'>";
            echo "<a href='?do=edit&id={$row['id']}' class='btn btn-main'>編輯</a>";
            echo "<a href='?do=del&id={$row['id']}' class='btn btn-attention'>刪除</a>";
            echo "</td>";
            echo '</tr>';
        }
        ?>
    </table>
    </section>
<div class="page-control">
    <div class="page-list">
            <?php
            echo "總共{$rowsPage}筆，";
            echo "每頁";
            echo "<select name='pageSet' id='pageSet'>";
            foreach ($PageRangeArr as $pageRows){
                if($pageRows==$pageSetting){
                    echo "<option value={$pageRows} selected>$pageRows</option>";
                }else{
                    echo "<option value={$pageRows}>$pageRows</option>";
                }
            }
            echo "</select>";
            echo "筆，";
            echo "共{$Pages}頁";
            ?>
            <script>
                //更改一頁的顯示數量
                const pageSet = document.getElementById('pageSet');
                pageSet.addEventListener('change',function(e){
                    //用URLSearchParams抓URL帶的參數
                    const params =new URLSearchParams(window.location.search);
                    let url = params.get('code');
                    let pageDo = params.get('do');
                    if(url||pageDo){
                        location.href=`?pageSet=${e.target.value}&code=${url}&do=${pageDo}`;
                    }else{
                        location.href=`?pageSet=${e.target.value}`;
                    }
                })
            </script>
    </div>
    <ul class="pagination">
            <?php
            //上一頁下一頁
            $prevPage = $pageActive-1;
            $nextPage = $pageActive+1;
            $preDisable = '';
            $nextDisable = '';
            //只有一頁
            if($pageActive==1 && $pageActive-$Pages==0){
                $nextPage = $Pages;
                $prevPage = $Pages;
                $nextDisable = "class='disable'";
                $preDisable = "class='disable'";
            }else if($pageActive==1){
                $prevPage = 1;
                $preDisable = "class='disable'";
            }else if($pageActive-$Pages==0){
                $nextPage = $Pages;
                $nextDisable = "class='disable'";
            }

            //一次顯示幾頁
            $pagiRange =10;
            if($Pages>$pagiRange){
                if($pageActive > 5 && $Pages-$pageActive>4){
                    $pagiStart=$pageActive-4;
                    $pagiFirstPage = "<li><a href='?pageSet={$pageSetting}&page=1'>1</a></li>...";
                    $pagiLastPage = "...<li><a href='?pageSet={$pageSetting}&page={$Pages}'>{$Pages}</a></li>";
                }else if($pageActive > 5){
                    $pagiStart=$Pages-($pagiRange-2);
                    $pagiFirstPage = "<li><a href='?pageSet={$pageSetting}&page=1'>1</a></li>...";
                    $pagiLastPage = '';
                }else{
                    $pagiStart=1;
                    $pagiFirstPage = "";
                    $pagiLastPage = "...<li><a href='?pageSet={$pageSetting}&page={$Pages}'>{$Pages}</a></li>";
                }
                $pageEnd = $pagiStart+($pagiRange-2);
            }else{
                $pagiStart=1;
                $pageEnd = $Pages;
                $pagiFirstPage = '';
                $pagiLastPage = '';
            }
            //頁數輸出
            echo "<li $preDisable><a href='?pageSet={$pageSetting}&page={$prevPage}{$codeForPageChange}'><</a></li>";
            echo $pagiFirstPage;
            for($i=$pagiStart;$i<=$pageEnd;$i++){
                if($i==$pageActive){
                    echo "<li class='active'><a href='?page={$i}{$codeForPageChange}'>{$i}</a></li>";
                }else{
                    echo "<li><a href='?pageSet={$pageSetting}&page={$i}{$codeForPageChange}'>{$i}</a></li>";
                }
            }
            echo $pagiLastPage;
            echo "<li $nextDisable><a href='?pageSet={$pageSetting}&page={$nextPage}{$codeForPageChange}'>></a></li>";
            //頁數輸出 END
            ?>
        </ul>
</div>