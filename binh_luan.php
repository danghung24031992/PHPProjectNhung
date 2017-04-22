<div id="binhluansp">
<?php

error_reporting(0);
ob_start();
session_start();


require_once('lib/wp-db.php');
require_once('lib/functions.php');

$msg = '';
if($_POST['noidung']){
    $maSP = $_POST['masp'];
    $noiDung = $_POST['noidung'];
    $maKH=$_POST['makh'];
    $ngayBinhLuan = date('Y-m-d h:i:s');
    
    $wpdb->query("INSERT dt_binhluan SET maSP='$maSP', noiDung='$noiDung', maKH='$maKH', ngayBinhLuan='$ngayBinhLuan'");
    if(!mysql_insert_id()) $msg = 'Chưa nhập nội dung!';
} 

?>
<h3>BÌNH LUẬN</h3>
<?php
$binhluan = $wpdb->get_results("SELECT * FROM dt_binhluan WHERE maSP='$id' ORDER BY ngayBinhLuan ASC");
if(count($binhluan)){
?>
<ul class="ds-binhluan">
    <?foreach($binhluan as $bl){?>
        <li>
            <div class="kh-info">
                <span class="kh"><?echo lay_ten_khach_hang($bl->maKH)?>:</span>
                <span class="bl-date"><?echo date('d m, Y', strtotime($bl->ngayBinhLuan))?></span>
            </div>
            <div class="bl-info"><?echo $bl->noiDung?></div>
            <div class="clr"></div>
        </li>
    <?}?>
</ul>
<?    
} else echo 'Chưa có bình luận nào!';

if($_SESSION['login']){
?>
<form name="binhluan" class="binhluan" method="POST">
    
    <h3>Viết bình luận cho sản phẩm</h3>
    <?if($msg){ ?>
        <div style="color: #ff0000;"><?echo $msg?></div>
    <? } ?>
    
    <label>Nội dung</label>
    <textarea name="noidung" rows="5" cols="60"></textarea><br />
    <input type="submit" value="GỬI" />
    
    <input type="hidden" name="makh" value="<?=$_SESSION['login']?>" />
    <input type="hidden" name="masp" value="<?=$id?>" />
</form>
<?} else echo '<h3 style="font-size: 14px;">Đăng nhập để bình luận sản phẩm</h3>';?>
</div>