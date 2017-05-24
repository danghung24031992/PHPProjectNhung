<? 
    error_reporting(0);
    ob_start();
    session_start();

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');

 ($_GET['ac'])?$ac=$_GET['ac']:$ac="";
 
if($_POST){
    $hoten=$_POST['name'];
    $gioitinh=$_POST['sex'];
    /*$cmnd=$_POST['cmnd'];*/
    $email=$_POST['email'];
    $matkhau=$_POST['pass'];
    $diachi=$_POST['add'];
    $dienthoai=$_POST['phone'];
    
    if($ac=="new"){
        if(tao_moi_khach_hang($hoten, $gioitinh, $email, $matkhau, $diachi, $dienthoai)>0)
        {
            MailToRegister($email);
            $msg="Tạo mới khách hàng thành công";
        }
        else $msg="Tạo mới khách hàng không thành công";
    }
	
    else if($ac="edit"){
        if(cap_nhat_khach_hang($hoten, $gioitinh, $email, $matkhau, $diachi, $dienthoai)>0){
            $msg="Cập nhật khách hàng thành công";
            if($_SESSION['user']!=$email) $_SESSION['user']=$email;
        }
        else $msg="Cập nhật khách hàng không thành công";
    }
    
}
?>
<script language="javascript">
	$().ready(function() {
			$("#register_customer").validate({
				rules: {
					name: {
						required: true
					},
		
					email: {
						required: true,
						email: true
					},
					pass: {
						required: true
					},
					phone: {
						number: true
					},
					add: {
						required: true
					}
                    
				},
				messages: {
					name: {
						required: "Vui lòng nhập họ tên"
					},
					email: "Vui lòng nhập Email",
					pass: {
						required: "Vui lòng nhập mật khẩu"
					},
                    phone: "Vui lòng nhập kiểu số",
                    add: {
						required: "Vui lòng nhập địa chỉ"
					}
				}
			});
		});	
</script>

<div id="maincolumn-page">
	<div class="nopad">
        <form name="register_customer" id="register_customer" method="POST" action="dang_ki.php?ac=new" style="display:<?=($ac=='edit')?'none':'block'?>">
            <table cellpadding="5" cellspacing="1" border="0" class="register-customer">
                <tr><td colspan="2" class="title-page">Đăng kí thành viên</td></tr>
                <tr><td colspan="2" class="msg"><?=$msg?></td></tr>
                <tr>
                    <td class="lbl-register-customer">Họ tên</td>
                    <td><input type="text" name="name" /></td>
                </tr>                
                <tr>
                    <td class="lbl-register-customer">Giới tính</td>
                    <td>
                        <select name="sex">
                            <option value="">---Chọn---</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </td>
                </tr>
               <!--  <tr>
                    <td class="lbl-register-customer">Chứng minh nhân dân</td>
                    <td><input type="text" name="cmnd" /></td>
                </tr> -->
                <tr>
                    <td class="lbl-register-customer">Email</td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Mật khẩu</td>
                    <td><input type="password" name="pass" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Điện thoại</td>
                    <td><input type="text" name="phone" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Địa chỉ</td>
                    <td><textarea rows="4" cols="40" name="add"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="image" src="images/dang_ki.png" />
                        <input type="reset" value="reset" />
                    </td>
                </tr>
            </table>
            
        </form>
        
        <form name="edit_register_customer" method="POST" action="dang_ki.php?ac=edit" style="display:<?=($ac=='edit')?'block':'none'?>">
            <table cellpadding="5" cellspacing="1" border="0" class="register-customer">
                <tr><td colspan="2" class="title-page">Cập nhật thông tin</td></tr>
                <?
                    if(isset($_SESSION['user'])){
                        $upd=$wpdb->get_row("SELECT * FROM dt_khachhang WHERE email='$_SESSION[user]'")
                    
                ?>
                <tr><td colspan="2" class="msg"><?=$msg?></td></tr>
                <tr>
                    <td class="lbl-register-customer">Họ tên</td>
                    <td><input type="text" name="name" value="<?=$upd->tenKH?>" /></td>
                </tr>                
                <tr>
                    <td class="lbl-register-customer">Giới tính</td>
                    <td>
                        <select name="sex">
                            <option value="">---Chọn---</option>
                            <option value="0" <?=($upd->gioiTinh==0)?"selected='selected'":''?>>Nam</option>
                            <option value="1" <?=($upd->gioiTinh==1)?"selected='selected'":''?>>Nữ</option>
                        </select>
                    </td>
                </tr>
<!--                 <tr>
                    <td class="lbl-register-customer">Chứng minh nhân dân</td>
                    <td><input type="text" name="cmnd" value="<?=$upd->cmnd?>" /></td>
                </tr>
 -->                <tr>
                    <td class="lbl-register-customer">Email</td>
                    <td><input type="text" name="email" value="<?=$upd->email?>" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Mật khẩu</td>
                    <td><input type="password" name="pass" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Điện thoại</td>
                    <td><input type="text" name="phone" value="<?=$upd->dienThoai?>" /></td>
                </tr>
                <tr>
                    <td class="lbl-register-customer">Địa chỉ</td>
                    <td><textarea rows="4" cols="40" name="add"><?=$upd->diaChi?></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="image" src="images/cap_nhat.png" />
                        <input type="reset" value="reset" />
                    </td>
                </tr>
                <?}?>
            </table>
            
        </form>
        
    </div>
</div><!--end #maincolumn-page-->

<?require_once('footer.php')?>
