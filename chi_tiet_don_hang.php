<?
error_reporting(0);
ob_start();
session_start();
 
    require_once('lib/wp-db.php');
    require_once('lib/functions.php');

    $maKH = $_SESSION['login'];
    $maDH = $_GET['maDH'];
    
 require_once('header.php');
 
?>

<div id="maincolumn">
	<div class="nopad">

		<table cellpadding="10" style="font-size: 13px;width: 100%;">
            
            <tr>
                <td class="title-page" colspan="2">Thông tin sản phẩm</td>
            </tr>
        
            <tr style="background-color:#577A0E;color: #fff;">
                <th>Tên sản phẩm</th>
                <th>Đơn Giá</th>
                <th>Số lượng</th>
            </tr>
        
            <?
            $donhang=$wpdb->get_results("SELECT * FROM dt_donhang dh, dt_chitietdonhang ctdh WHERE dh.maDH = ctdh.maDonHang AND dh.maDH='$maDH'");
            $stt=1;
            foreach($donhang as $dh){
                
            ?>
            <tr style="background-color:  <?=($stt%2==0)?'#EEEEEE':''?>;">
                <td><?= lay_ten_san_pham($dh->maSP)?></td>
                <td><?= number_format($dh->donGia)?> VNĐ</td>
                <td><?= $dh->soLuong?> </td>
            </tr>
            <?    
                $stt+=1;
            }
            ?>
        </table>
        <?
        $hoadon=$wpdb->get_row("SELECT * FROM dt_donhang WHERE maDH='$maDH'");
        $tongtien = (tong_tien_don_hang($hoadon->maDH))?tong_tien_don_hang($hoadon->maDH):0;
        ?>

        <table class="tt_hoadon" style="font-size: 13px;width: 100%;">
            <tr>
                <td class="title-page" colspan="2">Thông tin hóa đơn</td>
            </tr>
            <tr>
                <th>Khách hàng</th><td><?= lay_ten_khach_hang($hoadon->maKH)?></td>
            </tr>
            <tr>
                <th>Ngày đặt hàng</th><td><?= date('d-m-Y', strtotime($hoadon->ngayDatHang))?></td>
            </tr>
            <tr>
                <th>Trạng thái</th><td><?= ($hoadon->trangThai == 0)?'Chưa thanh toán':'Ðã thanh toán';?></td>
            </tr>
            <tr>
                <th>Tổng tiền</th><td><?= number_format($tongtien)?> VNÐ</td>
            </tr>
            <tr>
                <th>Hình thức thanh toán</th><td><?= $hoadon->hinhThucTT?> VNÐ</td>
            </tr>
        </table>
        
        <?
        $thanhtoan=$wpdb->get_results("SELECT * FROM dt_thanhtoan WHERE maHoaDon='$maDH'");
        foreach($thanhtoan as $tt){

                         
        ?>
        
        <table class="tt_hoadon form-thanhtoan" style="font-size: 13px;">
            <tr>
                <td class="title-page" colspan="2">
                    <?
                    if($tt->kieuKH == 0){
                        echo 'Địa chỉ thanh toán';
                    } else echo 'Địa chỉ nhận hàng';  
                    ?>
                </td>
            </tr>
            <tr>
                <th>Họ tên</th><td><?= $tt->tenKH?></td>
            </tr>
            <tr>
                <th>Địa chỉ</th><td><?= $tt->diaChi?></td>
            </tr>
            <tr>
                <th>Email</th><td><?= $tt->email?></td>
            </tr>
            <tr>
                <th>Điện thoại</th><td><?= $tt->dienThoai?></td>
            </tr>
        </table>
        
        <?}?>
        <div class="clr"></div>
        
    </div>
</div><!--end #maincolumn-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>