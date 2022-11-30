<div class="container news">
<h1 class="news-title">新聞管理</h1>
<form action="./api/add_news.php" method="post" class="news-form">
<div class="form-group">
    <label for="title" class="title">主題</label>
    <input type="text" id="title" name="subject">
</div>
<div class="form-group">
    <div class="title">置頂</div>
    <label for="true"><input type="radio" name="top" value="1" id='true'>是</label>
    <label for="false"><input type="radio" name="top" value="0" id='false' checked>否</label>
</div>
<div class="form-group">
    <label for="content" class="title">內容</label>
    <textarea name="content" id="content" rows="15"></textarea>
</div>
<div class="form-group">
    <label for="title" class="title">類別</label>
    <input type="text" id="title" name="category">
</div>
<div class="date">
    <?php
    echo date("Y-m-d H:i:s");
    ?>
</div>
<div class="form-btn">
            <input type="submit" value="確認新增" class="btn btn-attention">
            <input type="reset" value="清除重填" class="btn btn-main">
        </div>
</form>
</div>