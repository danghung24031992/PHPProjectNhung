<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');

    if($_GET['ac']=="del"){
        $qid=$_GET['qid'];
        $wpdb->query("DELETE FROM dt_lienhe WHERE id=$qid");
    }

?>

<div id="content">
    <div class="main-page">
	    <div id="manager" >
            <div class="h1">QUẢN LÝ CÂU HỎI LIÊN HỆ </div>
            <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="manager-info">
                <tr>
                    <th>Thứ tự</th>
                    <th>Chủ đề</th>
                    <th>Nội dung</th>
                    <th> Số điện thoại</th>
                    <th> Email</th>
                    <th>Trả lời</th>
                    <th>Xóa</th>
                </tr>
                <?
                $c=1;
                $rs=$wpdb->get_results("SELECT * FROM dt_lienhe");
                foreach($rs as $r){
                ?>
                <tr>
                    <td style="text-align: center"><?=$c?></td>
                    <td><?=$r->phone?></td>
                    <td><?=$r->tieuDe?></td>
                    <td><?=$r->noiDung?></td>
                    <td><?=$r->email?></td>
                    <td><a href="quanly_traloi.php?qid=<?=$r->id?>">Trả lời</a></td>
                    <td><a href="quanly_lienhe.php?ac=del&qid=<?=$r->id?>"><img src="images/delete.png" /></a></td>
                </tr>
                <?
                $c+=1;
                }?>
            </table>
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>