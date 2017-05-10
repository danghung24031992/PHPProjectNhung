<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');

($_GET['madh']!="")?$madh=$_GET['madh']:$madh=0;

if($_GET['ac']=="tt"){
    $madh=$_GET['madh'];
    $wpdb->query("UPDATE dt_donhang SET trangThai=1 WHERE maDH=$madh");
    //Update lai so luong
    $r = $wpdb->get_row("SELECT * FROM dt_chitietdonhang WHERE maDonHang='$madh'");
    if ($r) {
        $wpdb->query("UPDATE dt_sanpham SET soLuong = soLuong - $r->soLuong WHERE maSP='$r->maSP'");
    }
}

?>

<div id="content">
    <div class="main-page">
    	<div id="manager" >
            <div class="h1">QUẢN LÝ ĐƠN HÀNG </div>
            <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
            <div class="manager-oder">
                 <table cellpadding="0" cellspacing="0" border="0" class="tbl-quanly-dathang">
                    <tr><td style="border: none; color: #07074F; font-weight: bold;text-transform: uppercase;">Thông tin đặt hàng</td></tr>
                    <?
                    $tt=$wpdb->get_row("SELECT tenKH, diaChi , email , dienThoai FROM dt_thanhtoan as kh, dt_donhang as dh WHERE kh.email=dh.maKH AND dh.MaDH=$madh");
                    ?>
                    <tr>
                        <td class="lbl-dathang">Tên khách hàng</td>
                        <td><?=$tt->tenKH?></td>
                    </tr>
                    <tr>
                        <td class="lbl-dathang">Địa chỉ</td>
                        <td><?=$tt->diaChi?></td>
                    </tr>
                    <tr>
                        <td class="lbl-dathang">Số điện thoại</td>
                        <td><?=$tt->dienThoai?></td>
                    </tr>
                    <tr>
                        <td class="lbl-dathang">Địa chỉ Email</td>
                        <td><?=$tt->email?></td>
                    </tr>
                    <tr>
                        <td class="lbl-dathang">Tổng sản phẩm</td>
                        <td><?=tong_san_pham_don_hang($madh)?></td>
                    </tr>
                    <tr>
                        <td class="lbl-dathang">Tổng tiền ĐH</td>
                        <td><?=number_format(tong_tien_don_hang($madh))?> VNĐ</td>
                    </tr>
                    <tr>
                        <td class="lbl-dathang">Thanh toán</td>
                        <td class="is-thanh-toan"><?=(da_thanh_toan($madh)==true)?"Đã thanh toán":"<a href='quanly_chitietdonhang.php?ac=tt&madh=$madh' class='thanh-toan-dh'>Thanh toán</a>"?></td>
                    </tr>
                 </table>
                 
                 <table cellpadding="0" cellspacing="0" border="0" class="manager-info">
                    <tr><td style="border: none; color: #07074F; font-weight: bold;text-transform: uppercase;">Thông tin sản phẩm</td></tr>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?
                    $rs=$wpdb->get_results("SELECT sp.maSP, sp.tenSanPham, ctdh.donGia, ctdh.soLuong FROM dt_sanpham as sp, dt_chitietdonhang as ctdh WHERE sp.maSP=ctdh.maSP AND ctdh.maDonHang=$madh");
                    foreach($rs as $r){
                        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$r->maSP");
                    ?>
                    <tr>
                        <td style="text-align: center;"><img src="../sanpham/<?=$img->anh?>" width="" height="80px" /></td>
                        <td><?=$r->tenSanPham?></td>
                        <td><?=$r->donGia?> VNĐ</td>
                        <td style="text-align: center"><?=$r->soLuong?></td>
                        <td><?=number_format($r->soLuong*$r->donGia)?> VNĐ</td>
                    </tr>
                    <?}?>
                 </table>
                          
            </div>
    
    
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>
