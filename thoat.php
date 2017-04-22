<?php

ob_start();
session_start();

unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['login']);


header("location: dang_nhap.php");


?>