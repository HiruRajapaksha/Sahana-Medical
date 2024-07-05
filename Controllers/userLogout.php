<?php
session_start();

session_destroy();

header("Location: ../User/Login.php");
exit();
?>
