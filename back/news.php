<div class="container news">
    <h1 class="news-title">新聞管理</h1>
    <a href="?do=add_news" class="btn btn-main">新增消息</a>
    <ul class="news-list">
    <li class='news-list-item title'>
            <div class="text">標題</div>
            <div class="click">人氣</div>
            <div class="sub-info">更新時間</div>
            <div class="btn-box">操作</div>
        </li>
        <?php
        $sql = "SELECT  `id`,`subject`, `content`, `category`, `readed`, `top`, `created_at`, `updated_at` FROM `news`";
        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            echo "<li class='news-list-item'>";
            if($row['top']){
                echo "<div class='tag'>置頂</div>";
            }
            echo "<div class='text'>";
            echo $row['subject'];
            echo "</div>";
            echo "<div class='click'>";
            echo $row['readed'];
            echo "</div>";
            echo "<div class='sub-info'>";
            echo "最後日期:".$row['updated_at'];
            echo "</div>";
            echo "<div class='btn-box'>";
            echo "<a href='?do=edit_news&id={$row['id']}' class='btn btn-main'>編輯</a>";
            echo "<a href='api/del_news.php?id={$row['id']}' class='btn btn-attention'>刪除</a>";
            echo "</div>";
            echo "</li>";
        }
        ?>
        
    </ul>
</div>