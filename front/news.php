<div class="container news">
    <h1 class="news-title">最新消息</h1>
    <ul class="news-list">
        <li class='news-list-item title'>
            <div class="text">標題</div>
            <div class="click">人氣</div>
            <div class="sub-info">更新時間</div>
        </li>
        <?php
        $sql = "SELECT `id`, `subject`, `content`, `category`, `readed`, `top`, `created_at`, `updated_at` FROM `news`";
        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row){
            echo "<li class='news-list-item'>";
            echo "<div class='category'>";
            echo $row['category'];
            echo "</div>";
            echo "<a href='?do=news_detail&id={$row['id']}'class='text'>";
            echo $row['subject'];
            echo "</a>";
            echo "<div class='click'>";
            echo $row['readed'];
            echo "</div>";
            echo "<div class='sub-info'>";
            echo $row['created_at'];
            echo "</div>";
            echo "</li>";
        }
        ?>
        
    </ul>
</div>