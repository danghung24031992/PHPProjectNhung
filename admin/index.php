 <? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');
?>
        
        <div id="content">
            <div class="main-page">
                <div class="box-admin" style="width: 350px;">
                    <div class="title-box-admin" >Thống kê </div>
                    <div class="main-box-admin">
                        <div class="thong-ke" style="font-size: 20px; margin-top: 10px">
							<table cellpadding="3" cellspacing="0" border="0">

								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_khach_hang()?>
									</td>
									<td>Khách hàng</td>
								</tr>
								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_loaiSP()?>
									</td>
									<td>Loại Sản Phẩm</td>
								</tr>
								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_danh_muc_sp()?>
									</td>
									<td>Danh mục sản phẩm</td>
								</tr>
								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_san_pham()?>
									</td>
									<td>Sản phẩm</td>
								</tr>
								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_don_hang()?>
									</td>
									<td>Đơn hàng</td>
								</tr>
								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_don_hang_chua_thanh_toan()?>
									</td>
									<td>Đơn đặt hàng chưa thanh toán</td>
								</tr>
								<tr>
									<td>
									<font color="FF00CC" size="4px"><?=count_don_hang_da_thanh_toan()?>
									</td>
									<td>Đơn hàng đã thanh toán</td>
								</tr>
							</table>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="box-admin" style="width: 480px; height: 500px" >
                    <div class="title-box-admin">Đơn hàng mới đặt</div>
                    <div class="main-box-admin">
                        <div class="thong-ke">
                            <table cellpadding="5" cellspacing="0" border="0">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thanh toán</th>
									
                                </tr>
                                <?=don_hang_moi_dat()?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div><!--end #content
        
<?require_once('footer.php')?> -->