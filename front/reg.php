
<div class="container info login">
<h1>教師註冊</h1>
<form action="./api/reg_teacher.php" method="post" class="login-table">
<table>
    <tr>
        <td>
        <label for="acc">帳號 :</label><input type="text" name="acc" id="acc" placeholder="請輸入帳號">
        </td>
    </tr>
    <tr>
        <td>
        <label for="pw">密碼 :</label><input type="password" name="pw" id="pw" placeholder="請輸入密碼">
        </td>
    </tr>
    <tr>
        <td>
        <label for="pwconfirm">確認密碼 :</label><input type="password" id="pwconfirm" placeholder="再次輸入密碼">
        </td>
    </tr>
    <tr>
        <td>
        <label for="email">電子信箱 :</label><input type="email" name="email" id="email" placeholder="請輸入電子信箱">
        </td>
    </tr>
    <tr>
        <td>
        <label for="name">姓名 :</label><input type="text" name="name" id="name" placeholder="請輸入姓名">
        </td>
    </tr>
    <tr>
        <td>
        <input type="submit" value="註冊" class="btn btn-attention">
        <input type="reset" value="重填" class="btn btn-main">
        </td>
    </tr>
</table>
</form>
</div>