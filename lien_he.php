<? 
    error_reporting(0);
    ob_start();
    session_start();

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 
 
if($_POST){
    $sub=$_POST['subject'];
    $content=$_POST['content'];
    $email=$_POST['email'];
    $dienthoai=$_POST['phone'];
    $r=$wpdb->query("INSERT INTO dt_lienhe SET tieuDe='$sub', email='$email', phone='$dienthoai', noiDung='$content'");
    
    if(mysql_insert_id()>0)
        $msg="Bạn đã gửi thành công";
    else $msg="Bạn đã gủi không thành công";
}
 

?>

<script language="javascript">
	$().ready(function() {
			$("#lien_he").validate({
				rules: {
					subject: {
						required: true
					},
					email: {
						required: true,
                        email: true
					},
                    phone: {
                        number: true,
                    },
					content: {
						required: true
					}
				},
				messages: {
					subject: {
						required: "Vui lòng nhập chủ đề"
					},
					email: "Vui lòng nhập email",
                    phone: "Vui lòng nhập  kiểu số ",
                    content: {
						required: "Vui lòng nhập nội dung"
					}
				}
			});
		});	
</script>

<div id="maincolumn-page">
	<div class="nopad">
        <div class="lien-he">
            <form method="POST" name="lien_he" id="lien_he">
                <div class="err-lienhe"><?=$msg?></div>
                <table cellpadding="0" cellspacing="6" border="0" class="tbl-lien-he">
                    <tr>
                        <td><label>Chủ đề</label></td>
                        <td><input type="text" name="subject" /></td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" /></td>
                    </tr>
                    <tr>
                        <td><label>Số điện thoại</label></td>
                        <td><input type="text" name="phone" /></td>
                    </tr>
                    <tr>
                        <td><label>Nội dung</label></td>
                        <td><textarea name="content" rows="7" cols="50"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="image" src="images/gui.png" /></td>
                    </tr>
                </table>

            </form>
        </div>
        
    </div>
</div><!--end #maincolumn-page-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>
