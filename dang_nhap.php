<? 
    error_reporting(0);
    ob_start();
    session_start();

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 
 
if($_POST){
    $uid=$_POST['email'];
    $pass=$_POST['pass'];
    /*if(dang_nhap($uid, $pass)==true){
        if(isset($_SESSION['admin']))
            header("location: admin/index.php");
        else header("location: index.php");
    }
    else $msg="Tài khoản không chính xác. Vui lòng đăng nhập lại";
    */
    $role=dang_nhap($uid, $pass);
    if($role != -1){
        
        $_SESSION['login']=$uid;
        
        if($role==1){
            $_SESSION['admin']=$uid;
            header("location: admin/index.php");    
        }
        
        else if($role==0){
            $_SESSION['user']=$uid;
            header("location: index.php");
        }
        
    } else $msg="Tài khoản không chính xác. Vui lòng đăng nhập lại";
    
          
}
 
 
 
?>
<script language="javascript">
	$().ready(function() {
			$("#dang_nhap").validate({
				rules: {
					email: {
						required: true
					},
					pass: {
						required: true
					}
				},
				messages: {
					email: {
						required: "Vui lòng nhập Email"
					},
					pass: {
						required: "Vui lòng nhập mật khẩu"
					}
				}
			});
		});	
</script>

<div id="maincolumn-page" style="float: none;width: auto;">
	<div class="nopad" style="margin-top: 80px">
        <div class="login-form">
            <form method="POST" name="dang_nhap" id="dang_nhap">
                <div class="login-title">ĐĂNG NHẬP</div>
                <div class="err-log"><?=$msg?></div>
                <label>Email</label>
                <input type="text" name="email" /><div class="clear"></div>
                <label>Mật khẩu</label>
                <input type="password" name="pass" /><div class="clear"></div>
                <input type="image" src="images/dang_nhap.png" />
                <div class="clear"></div>
            </form>
        </div>
        
    </div>
</div><!--end #maincolumn-page-->

<? //require_once('sidebar-right.php')?>

<?require_once('footer.php')?>
