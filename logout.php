<?php
include 'database.php';

unset($_SESSION['IS_LOGINUSER']);
unset($_SESSION['IS_LOGINADMIN']);

header('location: login.php');
die();

?>
