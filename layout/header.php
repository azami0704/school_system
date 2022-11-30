<!-- 共用header -->
<header>
    <?php
    if(isset($_SESSION['login'])){
        echo "<h1>後台管理中心</h1>";
        echo "<span>目前登入身份 : {$_SESSION['login']}</span>";
    }else{
        echo "<h1>學生管理系統</h1>";
    }
    ?>
    <nav class="menu">
    <?php
    if(isset($_SESSION['login'])){
        echo "<a href='index.php?do=news'>最新消息</a>";
        echo "<a href='index.php?do=main'>學生列表</a>";
        echo "<a href='admin_center.php?do=news'>新聞管理</a>";
        echo "<a href='admin_center.php?do=main'>學生管理</a>";
        echo "<a href='admin_center.php?do=add'>新增學生</a>";
        echo "<a href='./api/logout.php'>登出</a>";
    }else{
        echo "<a href='?do=news'>最新消息</a>";
        echo "<a href='?do=main'>學生列表</a>";
        echo "<a href='?do=reg'>教師註冊</a>";
        echo "<a href='?do=login'>教師登入</a>";
    }
    ?>
    </nav>
</header>
