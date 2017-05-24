<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    //if(($_SESSION['user']=="") && ($_SESSION['admin']==""))
        //header("location: dang_nhap.php");
    
    if(isset($_SESSION['user']))
        $cusID=$_SESSION['user'];
    else if(isset($_SESSION['admin'])) $cusID=$_SESSION['admin'];

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 
 $c=0;
 
 if($_POST){
    if(kiem_tra_so_luong_gio_hang()==1){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $add = $_POST['add'];
        $phone = $_POST['phone'];
        $kieuKH = ($_POST['chk_same'])?$_POST['chk_same']:0;
        
        $name1 = $_POST['name1'];
        $email1 = $_POST['email1'];
        $add1 = $_POST['add1'];
        $phone1 = $_POST['phone1'];
        
        $hinhthuc_tt = $_POST['hinhthuc_tt'];
        

        $date=date('Y-m-d');
        $makh=$email;//$_SESSION['user'];
        
        if(count($_SESSION['shoppingcart'])){
            $r=$wpdb->query("INSERT INTO dt_donhang SET maKH='$makh', ngayDatHang='$date', trangThai=0, hinhThucTT='$hinhthuc_tt'");
            
            if($r){
                $maDH=mysql_insert_id();
                foreach($_SESSION['shoppingcart'] as $v){
                    $masp=$v[0];
                    $dongia=lay_don_gia($masp);
                    $soluong=$v[1];
                    $sql="INSERT INTO dt_chitietdonhang SET maDonHang='$maDH', maSP=$masp, donGia=$dongia, soLuong=$soluong";
                    $c+=$wpdb->query($sql);
                    //Update lai so luong
                    // $wpdb->query("UPDATE dt_sanpham SET soLuong=soLuong-$soluong WHERE maSP='$masp'");
                }
                $wpdb->query("INSERT INTO dt_thanhtoan SET tenKH='$name', diaChi='$add', email='$email', dienThoai='$phone', maHoaDon='$maDH', kieuKH='0'");   
                $wpdb->query("INSERT INTO dt_thanhtoan SET tenKH='$name1', diaChi='$add1', email='$email1', dienThoai='$phone1', maHoaDon='$maDH', kieuKH='1'");
            }
        }
     }//end kiem_tra_so_luong_gio_hang
 }
  
 if($c>0){
    $succ=1;
    //Send mail to custommer
    /*
    $to      = '$_SESSION[user]';
    $subject = 'Thế giới điện thoại(Thông tin mua hàng)';
    $message="<table>";
    foreach($_SESSION['shoppingcart'] as $v)
        $message.=chi_tiet_gio_hang_1($v[0],$v[1]);
    $message="</table>";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


    mail($to, $subject, $message, $headers);
    */
    //end send mail
    
    
 }
 
 
?>


<div id="maincolumn-page">
	<div class="nopad">
        <?
        if(kiem_tra_so_luong_gio_hang()==1){
        ?>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="display:<?=($c>0)?'block':'none'?>">
            <tr>
                <td class="success-shopping">
                    <p class="title-success-shopping">BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG</p>
                    <p class="info-success-shopping" style="font-size: 16px">Cảm ơn bạn đã đặt mua hàng của chúng tôi.</p> Thông tin đặt hàng đã được gửi qua mail của bạn.
                     Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để thực hiện mua bán.
                     <br/><p class="info-success-shopping-alert">Miễn phí vận chuyển nội thành Hà Nội và với đơn hàng trên 50.000.000 vnđ được miễn phí vận chuyển bán kính 100km</p></p>
                </td>
            </tr>
        </table>
		<form name="shoppingcart_detail" method="POST">
            <table cellpadding="5" cellspacing="1" border="0" class="tbl-shoppingcart-detail" width="700px">
                <tr class="title-checkout"><td colspan="4" style="background-color: #21b91e">THÔNG TIN MUA HÀNG</td></tr>
                <tr class="shoppingcart-detail-title">
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
                <?
                if(count($_SESSION['shoppingcart']))
                    foreach($_SESSION['shoppingcart'] as $v)
                        chi_tiet_gio_hang_1($v[0],$v[1]);
                ?>
                <tr class="total-money-shopping">
                    <td colspan="2" style="text-align: right">Tổng tiền giỏ hàng:</td>
                    <td colspan="2"><?=number_format(tong_tien_gio_hang())?> VNĐ</td>
                </tr>
            </table>
        </form>
        <form name="checkout" id="checkout" method="post">
            <table cellpadding="5" cellspacing="1" class="checkout shipping-info" id="shipping" width="700px">
                <tr class="title-checkout"><td colspan="2">Thông tin thanh toán</td></tr>
                <!-- <?
                //$r=$wpdb->get_row("SELECT tenKH, gioiTinh, email, diaChi, dienThoai FROM dt_khachhang WHERE email='$cusID'");
                
                ?> -->
                <tr class="checkout-info">
                    <td class="checkout-label">Họ tên</td>
                    <td><input type="text" name="shipp-name" id="shippName" value="<?=$name?>" readonly="true" /></td>
                </tr>
                <tr class="checkout-info">
                    <td class="checkout-label">Địa chỉ</td>
                    <td><input type="text" name="shipp-add" id="shippAdd" value="<?=$add?>" readonly="true" /></td>
                </tr>
               
                <tr class="checkout-info">
                    <td class="checkout-label">Email</td>
                    <td><input type="text" name="shipp-email" id="shippEmail" value="<?=$email?>" readonly="true" /></td>
                </tr>
                <tr class="checkout-info">
                    <td class="checkout-label">Điện thoại</td>
                    <td><input type="text" name="shipp-phone" id="shippPhone" value="<?=$phone?>" readonly="true" /></td>
                </tr>
            </table>
            
            
        </form>
        <?
        }else {
        ?>
        <div class="msg-dat-hang">GIỎ HÀNG CỦA BẠN KHÔNG CÓ SẢN PHẨM NÀO</div>
        <?}?>
    </div>
</div><!--end #maincolumn-page-->
<? require_once('sidebar-right.php')?>

<?require_once('footer.php')?>
<?
    if($succ==1){
        unset($_SESSION['shoppingcart']);
    }
?>