<?php
session_start();

$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: http://localhost/terput2/admin/login.php");