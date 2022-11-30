
<?php
$sql = "SELECT `id`, `subject`, `content`, `category`, `readed`, `top`, `created_at`, `updated_at` FROM `news` WHERE `id`='{$_GET['id']}'";
$rows=$pdo->query($sql)->fetch();


?>
<div class="container news">
<h1 class="news-title">新聞編輯</h1>
<form action="./api/del_news.php" method="post" class="news-form">
<input type="hidden" name="id" value=<?=$rows['id']?>>
<div class="form-group">
    <label for="title" class="title">主題</label>
    <div><?=$rows['subject']?></div>
</div>
<div class="form-group">
    <label for="content" class="title">內容</label>
    <div><?=$rows['content']?></div>
</div>
<div class="form-group">
    <label for="title" class="title">類別</label>
    <div><?=$rows['category']?></div>
</div>

<div class="date">
    <?php
    echo date("Y-m-d H:i:s");
    ?>
</div>
<div class="form-btn">
            <input type="submit" value="確認刪除" class="btn btn-attention">
            <a href='./admin_center.php?do=news' class="btn btn-main">取消刪除</a>
        </div>
</form>
</div>