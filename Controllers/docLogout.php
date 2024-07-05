<?php
session_start();

session_destroy();

header("Location: ../Admin/doc/doc_login.php");
exit();
?>
