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
    ($_GET['id'])?$idloai=$_GET['id']:$idloai='';
    ($_GET['ac'])?$ac=$_GET['ac']:$ac='';
    $mssg='';
    $msg=array(1=>'Message: Thêm loại sản phẩm thành công',
                2=>'Error: Thêm loại sản phẩm không thành công',
                3=>'Error: Chưa nhập dữ liệu',
                4=>'Cập nhật loại sản phẩm thành công',
                5=>'Xóa loại sản phẩm thành công'
               );
    if($ac=='new'){
        if($_POST){
            $loaisp=$_POST['loaiSP'];
            if($loaisp!='')
                (them_loaiSP($loaisp)>0)?$mssg=$msg[1]:$mssg=$msg[2];
            else $mssg=$msg[3];
        }
    }else
    if($ac=='edit' && $idloai!=''){
        if($_POST){
            $loaisp=$_POST['loaiSP'];
            if($loaisp!=''){
                cap_nhat_loaiSP($idloai,$loaisp);
                $mssg=$msg[4];
            }else $mssg=$msg[3];
            
        }
    }else
    if($ac=='del' && $idloai!=''){
        xoa_loaiSP($idloai);
        $mssg=$msg[5];
        $ac='';
    }
   

?>


<div id="content">
    <div class="main-page">
	<div id="manager" >
        <div class="h1">QUẢN LÝ LOẠI SẢN PHẨM </div>
        <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
		<div class="create-cat">
            <div class="content-manag">
                <div class="create-new"><a href="quanly_loaisp.php?ac=new"> + Tạo mới loại sản phẩm</a></div>
                <div class="msg"><?=$mssg?></div>
                
                <form name="create_cat" method="POST" id="create-cat" action="quanly_loaisp.php?ac=new" style="display:<?=($ac=='new')?'block':'none'?>">
                    <label>Loại sản phẩm <font class="validate">*</font></label>
                    <input type="text" name="loaiSP" class="txtbox-1" />
                
                    <input type="submit" value="Thêm" class="btn_submit" />
                </form>
                
                <form name="edit-cat" method="POST" id="edit-cat" style="display:<?=($ac=='edit')?'block':'none'?>">
                    <?
                        $r=$wpdb->get_row("SELECT * FROM dt_loaisanpham WHERE maLoaiSP='$idloai'");
                    ?>
                    <label>Loại sản phẩm <font class="validate">*</font></label>
                    <input type="text" name="loaiSP" class="txtbox-1" value="<?=$r->tenLoaiSP?>" />
                
                    <input type="submit" value="Sửa" class="btn_submit" />
                </form>
                
                
            </div>
            
            <div class="manager-box">
                <table>
                    <tr><td class="count-table" style="font-size: 16px;">CÓ  <font color="#B00000"><?=count_loaiSP()?></font> LOẠI SẢN PHẨM</td></tr>
                </table>
                <table cellpadding="0" cellspacing="0" border="0" width="76%" class="manager-info" style="margin: auto;">
                    <tr>
                        <th>TT</th>
                        <th>Loại sản phẩm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>                        
                    </tr>
                    <?
                    $row=$wpdb->get_results("SELECT * FROM dt_loaisanpham");
                    $count=0;
                    foreach($row as $r){
                        $count+=1;
                    ?>
                    <tr style="background-color:  <?=($count%2==0)?'#EEEEEE':''?>;">
                        <td class="manager-id-field"><?=$count?></td>
                        <td><?=$r->tenLoaiSP?></td>
                        <td class="manager-edit-field"><a href="quanly_loaisp.php?ac=edit&id=<?=$r->maLoaiSP?>"><img src="images/edit.png" /></a></td>
                        <td class="manager-edit-field"><a href="quanly_loaisp.php?ac=del&id=<?=$r->maLoaiSP?>" class="manag-del"><img src="images/delete.png" /></a></td>
                    </tr>
                    <?}?>
                </table>
            </div>
                
        </div><!--end .create-cat-->
        
    
    
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>