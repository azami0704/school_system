
<?php
$sql = "SELECT `id`, `subject`, `content`, `category`, `readed`, `top`, `created_at`, `updated_at` FROM `news` WHERE `id`='{$_GET['id']}'";
$rows=$pdo->query($sql)->fetch();


?>
<div class="container news">
<h1 class="news-title">新聞編輯</h1>
<form action="./api/edit_news.php" method="post" class="news-form">
<input type="hidden" name="id" value=<?=$rows['id']?>>
<div class="form-group">
    <label for="title" class="title">主題</label>
    <input type="text" id="title" name="subject" value=<?=$rows['subject']?>>
</div>
<div class="form-group">
    <div class="title">置頂</div>
    <?php
    ?>
    <label for="true"><input type="radio" name="top" value="1" id='true'<?=($rows['top']==1)?'checked':''?>>是</label>
    <label for="false"><input type="radio" name="top" value="0" id='false' <?=($rows['top']==0)?'checked':''?>>否</label>
    <label for="readed" class="readed">觀看數<input type="number" name="readed" id="readed" value=<?=$rows['readed']?>></label>
</div>
<div class="form-group">
    <label for="content" class="title">內容</label>
    <textarea name="content" id="content" rows="15"><?=$rows['content']?></textarea>
</div>
<div class="form-group">
    <label for="title" class="title">類別</label>
    <input type="text" id="title" name="category" value=<?=$rows['category']?>>
</div>

<div class="date">
    <?php
    echo date("Y-m-d H:i:s");
    ?>
</div>
<div class="form-btn">
            <input type="submit" value="確認修改" class="btn btn-attention">
            <input type="reset" value="重置修改" class="btn btn-main">
        </div>
</form>
</div>