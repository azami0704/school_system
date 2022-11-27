<!-- 共用header -->
<header>
    <?php
    if(isset($_SESSION['login'])){
        echo "<h1>學生管理系統</h1>";
    }else{
        echo "<h1>後台管理系統</h1>";
    }
    ?>
    <nav class="menu">
    <?php
    if(isset($_SESSION['login'])){
        echo "<a href='?do=front_main'>前台</a>";
        echo "<a href='admin_center.php'>管理後臺</a>";
        echo "<a href='?do=add'>新增學生</a>";
        echo "<a href='./api/logout.php'>登出</a>";
    }else{
        echo "<a href='index.php'>回首頁</a>";
        echo "<a href='?do=reg'>教師註冊</a>";
        echo "<a href='?do=login'>教師登入</a>";
    }
    ?>
    </nav>
</header>
