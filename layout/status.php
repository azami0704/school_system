<?php

if(isset($_GET['status'])){
    $status = $_GET['status'];
    switch ($status){
        case 'edit_success':
            echo "<p class='msg msg-success'>學號:{$_GET['who']}資料編輯成功</p>";
        break;
        case 'edit_fail':
            echo "<p class='msg msg-fail'>學號:{$_GET['who']}編輯失敗</p>";
        break;
        case 'add_success':
            echo "<p class='msg msg-success'>學號:{$_GET['who']}新增成功</p>";
        break;
        case 'add_fail':
            echo "<p class='msg msg-fail'>學號:{$_GET['who']}新增失敗</p>";
        break;
        case 'del_success':
            echo "<p class='msg msg-success'>學號:{$_GET['who']}刪除成功</p>";
        break;
        case 'del_fail':
            echo "<p class='msg msg-fail'>學號:{$_GET['who']}刪除失敗</p>";
        break;
        case 'logout_success':
            echo "<p class='msg msg-success'>登出成功</p>";
        break;
        case 'reg_success':
            echo "<p class='msg msg-success'>註冊成功，請重新登入</p>";
        break;
        case 'reg_fail':
            echo "<p class='msg msg-fail'>註冊資料有誤</p>";
        break;
        case 'login_success':
            echo "<p class='msg msg-success'>登入成功</p>";
        break;
        case 'auth_error':
            echo "<p class='msg msg-fail'>權限有誤，請先登入</p>";
        break;
    }
}

?>