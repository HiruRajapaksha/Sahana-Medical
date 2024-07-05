<?php
session_start();

session_destroy();

header("Location: ../Admin/employee/emp_login.php");
exit();
?>
