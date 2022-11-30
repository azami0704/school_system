<?php
$id=$_GET['id'];


$sql = "SELECT * FROM `news` WHERE `id`='$id'";
$news = $pdo ->query($sql)->fetch();

?>

<div class="container news-content">
<div class="tag"><?=$news['category']?></div>
<h1 class="news-title"><?=$news['subject']?></h1>
<div class="news-data">
    <div class="update-date">
    發布時間<time><?=$news['updated_at']?></time>
    </div>
</div>
<p class="news-content"><?=nl2br($news['content'])?></p>
</div>