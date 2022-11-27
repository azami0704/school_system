<?php
include "../db/pdo.php";

unset($_SESSION['login']);
header("location:../index.php?status=logout_success");

?>