<?php

session_start();

setcookie('uname', '', time() - 3600, '/');
setcookie('pwd', '', time() - 3600, '/');

session_unset();
session_destroy();

header("Location: login.html");
exit();
?>
