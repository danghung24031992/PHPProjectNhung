<? 
    error_reporting(0);
    ob_start();
    session_start();
    

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');
 
 if(kiem_tra_dang_nhap()==false) header("location: dang_nhap.php");

 if($_POST){
    $masp_het_hang = cap_nhat_gio_hang($_POST['qty']);
    //print_r($masp_het_hang);
    
    
    
 }
 
 require_once('header.php');
 //require_once('sidebar-left.php');
 
 ($_GET['ac'])?$ac=$_GET['ac']:$ac="";
 if($ac=="del"){
    $pid=$_GET['pid'];
    if($pid!="")
        xoa_phan_tu_gio_hang($pid);
        header("location: chi_tiet_gio_hang.php");
 }
 $user_id = $_SESSION['user'];
 $user = $wpdb->get_row("SELECT * FROM dt_khachhang WHERE email='$user_id'");

 
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.chk_same').click(function(){
            if($(this).is(':checked')){
                
                var name = $('.name').attr('value');
                var email = $('.email').attr('value');
                var phone = $('.phone').attr('value');
                var add = $('.add').val();
                //alert($('.name').val());
                
                
                $('.name1').val(name);
                $('.email1').val(email);
                $('.phone1').val(phone);
                $('.add1').val(add);
                
                $('#dc_nhan input, #dc_nhan textarea').each(function(){
                     $(this).attr('readonly', true);
                });
                
            } else {
                $('#dc_nhan input, #dc_nhan textarea').each(function(){
                     $(this).val('');
                     $(this).attr('readonly', false);
                });
            }
        });
        
        $("#cart_customer").validate({
			rules: {
				name: {
					required: true
				},
                name1: {
					required: true
				},
				phone: {
				    required: true,
					number: true
				},
                phone1: {
				    required: true,
					number: true
				},
				add: {
					required: true
				},
                add1: {
					required: true
				}
                
			},
			messages: {
				name: {
					required: "Vui lòng nhập họ tên"
				},
                name1: {
					required: "Vui lòng nhập họ tên"
				},
                phone: {
                    required: "Vui lòng nhập số điện thoại",
                    number: "Vui lòng nhập kiểu số"
                },
                phone1: {
                    required: "Vui lòng nhập số điện thoại",
                    number: "Vui lòng nhập kiểu số"
                },
                add: {
					required: "Vui lòng nhập địa chỉ"
				},
                add1: {
					required: "Vui lòng nhập địa chỉ"
				}
			}
		});
        
        
        
    });
    
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<div id="maincolumn-page">
	<div class="nopad">
        <?php 
        if(isset($masp_het_hang)){
            if(count($masp_het_hang)){    
        ?>
    		<div class="cart-msg">
                <?php 
                foreach($masp_het_hang as $mhh){
                    echo '<p><b>- '.lay_ten_san_pham($mhh).'</b> không còn đủ số lượng đặt mua</p>';
                }
                ?>
            </div>
        <?
            }
        }
        ?>
        <form name="shoppingcart_detail" id="shoppingcart_detail" method="POST" action="">
            <table cellpadding="5" cellspacing="1" border="0" class="tbl-shoppingcart-detail">
                <tr class="shoppingcart-detail-title">
                    <th>Hình ảnh </th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>&nbsp;</th>
                </tr>
                <?
                if(count($_SESSION['shoppingcart']))
                    foreach($_SESSION['shoppingcart'] as $v)
                        chi_tiet_gio_hang($v[0],$v[1]);
                ?>
                <tr class="total-money-shopping">
                    <td colspan="4" style="text-align: right">Tổng tiền giỏ hàng:</td>
                    <td colspan="2"><?=number_format(tong_tien_gio_hang())?> VNĐ</td>
                </tr>
                
                <tr class="shoppingcart-detail-info">
                    <td colspan="6" style="text-align: right"><input type="image" name="capnhat" value="capnhat" src="images/cap_nhat_gio_hang.png" /></td>
                </tr>
            </table>
        </form>
        
        <form name="cart_customer" id="cart_customer" method="POST" action="dat_hang.php" ><!--dat_hang.php-->
            <table cellpadding="5" cellspacing="1" border="0" class="form-thanhtoan dc_thanhtoan" id="dc_thanhtoan">
                <tr><td colspan="2" class="title-page">Địa chỉ thanh toán</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td class="lbl-register-customer">Họ tên<font color="#ff0000">*</font></td>
                    <td><input type="text" name="name" class="name" value="<?= $user->tenKH?>" /></td>
                </tr>                
                <tr>
                    <td class="lbl-register-customer">Email</td>
                    <td><input type="text" name="email" class="email" value="<?= $user->email?>" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Điện thoại<font color="#ff0000">*</font></td>
                    <td><input type="text" name="phone" class="phone" value="<?= $user->dienThoai?>" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Địa chỉ<font color="#ff0000">*</font></td>
                    <td><textarea rows="4" cols="24" name="add" class="add"><?= $user->diaChi?></textarea></td>
                </tr>
            </table>
            
            <table cellpadding="5" cellspacing="1" border="0" class="form-thanhtoan dc_nhan" id="dc_nhan">
                <tr><td colspan="2" class="title-page">Địa chỉ giao hàng</td></tr>
                <tr><td colspan="2"><label><input type="checkbox" class="chk_same" value="1" name="chk_same" /><small style="font-size: 12px;padding-left: 9px;">Trùng với địa chỉ thanh toán</small></label></td></tr> <!-- //small thu nhỏ cỡ chữ -->
                <tr>
                    <td class="lbl-register-customer">Họ tên<font color="#ff0000">*</font></td>
                    <td><input type="text" name="name1" class="name1" /></td>
                </tr>                
                <tr>
                    <td class="lbl-register-customer">Email</td>
                    <td><input type="text" name="email1" class="email1" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Điện thoại<font color="#ff0000">*</font></td>
                    <td><input type="text" name="phone1" class="phone1" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Địa chỉ<font color="#ff0000">*</font></td>
                    <td><textarea rows="4" cols="24" name="add1" class="add1"></textarea></td>
                </tr> <!-- testarea tạo nhiều dòng -->
            </table>
            
            <div class="clr"></div>
            
            <table style="font-size: 13px;">
                <tr><td class="title-page">Hình thức thanh toán</td></tr>
                <tr>
                    <td style="padding: 4px 0;">
                        <label><input type="radio" name="hinhthuc_tt" value="Chuyển khoản qua Ngân hàng hoặc ATM" /> Chuyển khoản qua Ngân hàng hoặc ATM</label>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 4px 0;">
                        <label><input type="radio" name="hinhthuc_tt" value="Thanh toán trực tuyến" /> Thanh toán trực tuyến ( Ngân lượng, Visa Card, Master Card, Paypal,...)</label>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 4px 0;">
                        <label><input type="radio" name="hinhthuc_tt" value="Thanh toán bằng tiền mặt" checked="" /> Thanh toán bằng tiền mặt</label>
                    </td>
                </tr>
            </table>
            
            <table style="margin-top: 32px;">
                <!--<tr><td><a href="dat_hang.php"><img src="images/dat_hang.png" style="border: none; width: 110px; height: 24px" /></a></td></tr>-->
                <tr><td><input type="image" name="submit_customer" src="images/dat_hang.png" style="border: none; width: 110px; height: 24px" onclick=" return checkSubmitOrder();" /></td></tr>
            </table>
        
        </form>
    </div>
</div><!--end #maincolumn-page-->
<script>
    function checkSubmitOrder(){
                <?
        if(!count($_SESSION['shoppingcart'])){
                    ?>
                    alert("Bạn chưa mua sản phẩm nào.")
                    return false;
                }
                <?
            }else {
                ?>
                    return true;
                <?}
                ?>
</script>
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>