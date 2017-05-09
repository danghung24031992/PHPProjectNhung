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
       { echo '<script>alert("Thư của bạn đã được gửi."); window.location="index.php";</script>';}
    else {
        echo '<script>alert("Thư của bạn chưa được gửi."); window.location="Contact.php";</script>';
    }
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
    <div class="title-page-item">LIÊN HỆ </div>
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
                        <td><textarea name="content" rows="7" cols="65"></textarea>  </td>

                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="image" src="images/gui.png" /></td>
                    </tr>
                </table>

            </form>
            <div class="">
                                    <a href="" style="margin-left: 50px">
                                        <iframe width="600" height="280" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=%207%2F12%2F131%20Phan%20%C4%90%C3%ACnh%20Gi%C3%B3t&key=AIzaSyDhppSdhKVHpN4pH-yYcYmsO8QB1QWVyR4" allowfullscreen> </iframe>
                                    </a>
                                </div>

        </div>
        
    </div>
</div><!--end #maincolumn-page-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>
