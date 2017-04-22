<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');

    $qid=$_GET['qid'];
    
    if($_POST){
        $answer=$_POST['answer'];
        $sub=$_POST['subject'];
        if($wpdb->query("UPDATE dt_lienhe SET traLoi='$answer' WHERE id=$qid"))
            $msg="Đã trả lời";
        else $msg="Trả lời không thành công";
                
    }

?>

<div id="content">
    <div class="main-page">
	    <div id="manager" >
            <div class="h1">QUẢN LÝ TRẢ LỜI CÂU HỎI LIÊN HỆ </div>
            <?
            
            $r=$wpdb->get_row("SELECT * FROM dt_lienhe WHERE id=$qid");
            ?>
            <form method="POST" name="traloi">
            <table cellpadding="0" cellspacing="6" border="0" class="tbl-lien-he">
                <tr><td class="err-lienhe"><?=$msg?></td></tr>
                <tr>
                    <td><label>Chủ đề</label></td>
                    <td><input type="text" name="subject" value="<?=$r->tieuDe?>" readonly="true" /></td>
                </tr>
                <tr>
                    <td><label>Email </label></td>
                    <td><input type="text" name="email" value="<?=$r->email?>" readonly="true" /></td>
                </tr>
                <tr>
                    <td><label>Nội dung</label></td>
                    <td><textarea name="content" rows="7" cols="50" readonly="true"><?=$r->noiDung?></textarea></td>
                </tr>
                <tr>
                    <td>Trả lời</td>
                    <td><textarea name="answer" rows="7" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="image" src="images/tra_loi.png" /></td>
                </tr>
            </table>
            </form>
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>