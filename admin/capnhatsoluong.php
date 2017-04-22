<?php
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    $user = $_SESSION['admin'];
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');
?>



<div id="content">
    <div class="main-page">
    	<div id="manager" >
            <div class="h1">QUẢN LÝ SL  </div>
           
    		<div class="create-cat">
                <div class="content-manag">
                    <div class="msg"><?=$mssg?></div>
                    <div id="manager-sp">
                    <form name="create_sp" enctype="multipart/form-data" method="POST" id="create-sp" action="quanly_sanpham.php?ac=new" style="display:<?=($ac=='new')?'block':'none'?>">
                        <label>Tên sản phẩm <font class="validate">*</font></label>
                        <input type="text" name="tensp" class="txtbox-1" style="width: 250px" /><div class="clr"></div>
                        <label>Số lượng</label>
                        <input type="text" name="soluong" style="width: 173px;" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>