<?php

error_reporting(0);

require_once('../lib/wp-db.php');
require_once('../lib/functions.php');


($_GET['madm'])?$madm=$_GET['madm']:$madm="";

bang_gia_danh_muc_sp($madm);

?>