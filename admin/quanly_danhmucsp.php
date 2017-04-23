<? 
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');
?>

<?
    ($_GET['id'])?$iddm=$_GET['id']:$iddm='';
    ($_GET['ac'])?$ac=$_GET['ac']:$ac='';
    $mssg='';
    $msg=array(1=>'Message: Thêm danh mục thành công',
                2=>'Error: Thêm danh mục không thành công',
                3=>'Error: Chưa nhập dữ liệu',
                4=>'Cập nhật danh mục thành công',
                5=>'Xóa danh mục thành công'
               );
    if($ac=='new'){
        if($_POST){
            $tendanhmuc=$_POST['tenDM'];

            if($tendanhmuc!='')
                (them_danh_muc($tendanhmuc)>0)?$mssg=$msg[1]:$mssg=$msg[2];
            else $mssg=$msg[3];
        }
    }else
    if($ac=='edit' && $iddm!=''){
        if($_POST){
            $tendanhmuc=$_POST['tenDM'];

            if($tendanhmuc!=''){
                cap_nhat_danh_muc($iddm,$tendanhmuc);
                $mssg=$msg[4];
            }else $mssg=$msg[3];
            
        }
    }else
    if($ac=='del' && $iddm!=''){
        xoa_danh_muc($iddm);
        $mssg=$msg[5];
        $ac='';
    }
   

?>


<div id="content">
    <div class="main-page">
	<div id="manager" >
        <div class="h1">QUẢN LÝ DANH MỤC SẢN PHẨM </div>
        <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
		<div class="create-cat">
            <div class="content-manag">
                <div class="create-new"><a href="quanly_danhmucsp.php?ac=new">Tạo mới danh mục sản phẩm</a></div>
                <div class="msg"><?=$mssg?></div>
                <form name="create_cat" method="POST" id="create-cat" action="quanly_danhmucsp.php?ac=new" style="display:<?=($ac=='new')?'block':'none'?>">
                    <label>Tên danh mục <font class="validate">*</font></label>
                    <input type="text" name="tenDM" class="txtbox-1" /> <br />
                    
                    <input type="submit" value="Thêm danh mục" class="btn_submit" />
                </form>
                
                <form name="edit-cat" method="POST" id="edit-cat" style="display:<?=($ac=='edit')?'block':'none'?>">
                    <?
                        $r=$wpdb->get_row("SELECT * FROM dt_danhmucsp WHERE maDanhMuc=$iddm");
                    ?>
                    <label>Tên danh mục <font class="validate">*</font></label>
                    <input type="text" name="tenDM" class="txtbox-1" value="<?=$r->tenDanhMuc?>" /> <br />
                    
                    <input type="submit" value="Sửa danh mục" class="btn_submit" />
                </form>
                
                
            </div>
            
            <div class="manager-box">
                <table>
                    <tr><td class="count-table">Có tổng cộng <font color="#B00000"><?=count_danh_muc_sp()?></font> DANH MỤC SẢN PHẨM</td></tr>
                </table>
                <table cellpadding="0" cellspacing="0" border="0" width="76%" class="manager-info">
                    <tr>
                        <th>TT</th>
                        <th>Tên danh mục</th>
                        <th>Sửa</th>
                        <th>Xóa</th>                        
                    </tr>
                    <?
                    $row=$wpdb->get_results("SELECT * FROM dt_danhmucsp");
                    $count=0;
                    foreach($row as $r){
                        $count+=1;
                    ?>
                    <tr style="background-color:  <?=($count%2==0)?'#EEEEEE':''?>;">
                        <td class="manager-id-field"><?=$count?></td>
                        <td><?=$r->tenDanhMuc?></td>
                        
                        <td class="manager-edit-field"><a href="quanly_danhmucsp.php?ac=edit&id=<?=$r->maDanhMuc?>"><img src="images/edit.png" /></a></td>
                        <td class="manager-edit-field"><a href="quanly_danhmucsp.php?ac=del&id=<?=$r->maDanhMuc?>" class="manag-del"><img src="images/delete.png" /></a></td>
                    </tr>
                    <?}?>
                </table>
            </div>
                
        </div><!--end .create-cat-->
        
    
    
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>