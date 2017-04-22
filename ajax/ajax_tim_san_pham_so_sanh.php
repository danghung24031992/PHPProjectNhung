<?php
error_reporting(0);
ob_start();
session_start();

require_once('../lib/wp-db.php');
require_once('../lib/functions.php');

$loaiID=$_GET['loai'];
$catID=$_GET['catid'];
$price=$_GET['price'];



san_pham_so_sanh($loaiID,$catID,$price);

?>