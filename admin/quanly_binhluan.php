<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');

    if($_GET['ac']=="del"){
        $id=$_GET['id'];
        $wpdb->query("DELETE FROM dt_binhluan WHERE id=$id");
    }

?>

<div id="content">
    <div class="main-page">
	    <div id="manager" >
            <div class="h1">QUẢN LÝ BÌNH LUẬN SẢN PHẨM </div>
             <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="manager-info" style="width: 100%;">
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên sản phẩm</th>
                    <th>Nội dung bình luận</th>
                    <th>Xóa</th>
                </tr>
                <?
                $c=1;
                $rs=$wpdb->get_results("SELECT * FROM dt_binhluan");
                foreach($rs as $r){
                ?>
                <tr>
                    <td style="text-align: center"><?=$c?></td>
                    <td><?=lay_ten_san_pham($r->maSP)?></td>
                    <td><?=$r->noiDung?></td>
                    <td style="text-align: center;"><a href="quanly_binhluan.php?ac=del&id=<?=$r->id?>"><img src="images/delete.png" /></a></td>
                </tr>
                <?
                $c+=1;
                }?>
            </table>
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>