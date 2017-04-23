<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');

if(($_GET['ac']=="del") && ($_GET['madh']!="")){
    $madh=$_GET['madh'];
    xoa_don_hang($madh);
}
        

?>

<div id="content">
    <div class="main-page">
    	<div id="manager" >
            <div class="h1">QUẢN LÝ ĐƠN HÀNG </div>
            <div class="export">
                <button style="margin-left: 45px;margin-bottom: 20px;" type="button" class="btn btn-info">
                <a href="export/statistics_day.php" style="color: #fff;">Thống kê theo ngày</a>
                </button>
                <button style="margin-bottom: 20px;" type="button" class="btn btn-info">
                    <a href="export/statistics_month.php" style="color: #fff;">Thống kê theo tháng</a>
                </button>
                <button style="margin-bottom: 20px;" type="button" class="btn btn-info">
                    <a href="export/statictis_year.php" style="color: #fff;">Thống kê theo năm</a>
                </button>
            </div>
            <div class="manager-oder">
                <table cellpadding="0" cellspacing="0" border="0" class="manager-info" style="margin-top: 30px">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt hàng</th>
                        <th>Số sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Xóa</th>
                    </tr>
                    <?
                    $dh=$wpdb->get_results("SELECT maDH, maKH, ngayDatHang, trangThai  FROM dt_donhang");
                    foreach($dh as $d){
                        $madh=$d->maDH;
                        $makh=$d->maKH;
                        $ct=$wpdb->get_row("SELECT sum(soLuong) as soluong  FROM dt_chitietdonhang WHERE maDonHang=$madh");
                        
                    ?>
                    <tr>
                        <td style="text-align: center"><?=$d->maDH?></td>
                        <td><?=lay_ten_khach_hang($makh)?></td>
                        <td><?=lay_dien_thoai_khach_hang($makh)?></td>
                        <td><?=$d->ngayDatHang?></td>
                        <td style="text-align: center"><?=$ct->soluong?></td>
                        <td><?=number_format(tong_tien_don_hang($madh))?> VNĐ</td>
                        <td class="thanh-toan-link"><a href="quanly_chitietdonhang.php?madh=<?=$madh?>"><?=kiem_tra_thanh_toan($madh)?></a></td>
                        <td class="xoa-don-hang-link"><a href="quanly_donhang.php?ac=del&madh=<?=$madh?>">Xóa</a></td>
                    </tr>
                    <?
                    }
                    ?>
                </table>
                
            </div>
    
    
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>