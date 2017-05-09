<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');

    if($_GET['ac']=="del"){
        $qid=$_GET['qid'];
        $wpdb->query("DELETE FROM dt_khachhang WHERE email='$qid'");
    }

?>

<div id="content">
    <div class="main-page">
	    <div id="manager" >
            <div class="h1">QUẢN LÝ KHÁCH HÀNG </div>
            <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="manager-info" style="margin: auto;">
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Xóa</th>
                </tr>
                <?
                $c=1;
                $rs=$wpdb->get_results("SELECT tenKH, gioiTinh,email, diaChi, dienThoai FROM dt_khachhang WHERE quyenTruyCap = 0 ORDER BY tenKH ASC");
                foreach($rs as $r){
                ?>
                <tr>
                    <td style="text-align: center"><?=$c?></td>
                    <td><?=$r->tenKH?></td>
                    <td><?=$r->gioiTinh?></td>
                    <td><?=$r->email?></td>
                    <td><?=$r->diaChi?></td>
                    <td><?=$r->dienThoai?></td>
                    <td><a href="quanly_khachhang.php?ac=del&qid=<?=$r->email?>"><img src="images/delete.png" /></a></td>
                </tr>
                <?
                $c+=1;
                }?>
            </table>
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>