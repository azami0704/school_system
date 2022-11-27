
<div class="container info login">
<h1>教師登入</h1>
<form action="./api/login.php" method="post" class="login-table">
<table>
<?php
$lockTime = 10;
if(isset($_SESSION['login_try'])){
    $tryCount = $_SESSION['login_try'];
    if($tryCount<=3){
        echo "登入錯誤{$tryCount}次，錯誤超過三次將鎖定{$lockTime}分鐘";
        ?>
    <tr>
        <td>
        <label for="acc">帳號 :</label><input type="text" name="acc" id="acc" placeholder="請輸入帳號" required>
        </td>
    </tr>
    <tr>
        <td>
        <label for="pw">密碼 :</label><input type="text" name="pw" id="pw" placeholder="請輸入密碼" required>
        </td>
    </tr>
    <tr>
        <td>
        <input type="submit" value="登入" class="btn btn-attention">
        <input type="reset" value="重填" class="btn btn-main">
        </td>
    </tr>
<?php
    }else if(!isset($_SESSION['last_try_time'])){
        $_SESSION['last_try_time']=strtotime("+{$lockTime} seconds");
        $time = date("Y-m-d H:i:s",($_SESSION['last_try_time']));
        echo "登入錯誤{$tryCount}次，請於{$time}後再嘗試登入";
    }else if($_SESSION['last_try_time']<strtotime('now')){
        unset($_SESSION['last_try_time']);
        unset($_SESSION['login_try']);
        header('location:index.php?do=login');
    }else{
        $time = date("Y-m-d H:i:s",($_SESSION['last_try_time']));
        echo "帳號已鎖定，請於{$time}後再嘗試登入";
    }
}else{
?>
    <tr>
        <td>
        <label for="acc">帳號 :</label><input type="text" name="acc" id="acc" placeholder="請輸入帳號" required>
        </td>
    </tr>
    <tr>
        <td>
        <label for="pw">密碼 :</label><input type="text" name="pw" id="pw" placeholder="請輸入密碼" required>
        </td>
    </tr>
    <tr>
        <td>
        <input type="submit" value="登入" class="btn btn-attention">
        <input type="reset" value="重填" class="btn btn-main">
        </td>
    </tr>
<?php
}
?>

</table>
</form>
</div>