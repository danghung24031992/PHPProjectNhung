
<?
error_reporting(0);
ob_start();
session_start();
 
    require_once('lib/wp-db.php');
    require_once('lib/functions.php');

    $maKH = $_SESSION['login'];
 require_once('header.php');
 
?>

<div id="maincolumn">
	<div class="nopad">
		<table cellpadding="10" style="font-size: 13px;width: 100%;">
            <tr style="background-color:#577A0E;color: #fff;">
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
            </tr>
        
        <?
        $donhang=$wpdb->get_results("SELECT * FROM dt_donhang dh WHERE dh.maKH='$maKH'");
        $stt=1;
        foreach($donhang as $dh){
            $tongtien = (tong_tien_don_hang($dh->maDH))?tong_tien_don_hang($dh->maDH):0;
        ?>
        <tr style="background-color:  <?=($stt%2==0)?'#EEEEEE':''?>;">
            <td><a href="chi_tiet_don_hang.php?maDH=<?= $dh->maDH?>" style="color: black"><?= $dh->maDH?></a></td>
            <td><?= lay_ten_khach_hang($dh->maKH)?></td>
            <td><?= date('d-m-Y', strtotime($dh->ngayDatHang))?></td>
            <td><?= ($dh->trangThai == 0)?'Chưa thanh toán':'Đã thanh toán';?></td>
            <td><?= number_format($tongtien)?> VNĐ</td>
        </tr>
        <?    
            $stt+=1;
        }
        ?>
        </table>
    
    </div>
</div><!--end #maincolumn-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>