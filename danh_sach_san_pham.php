<?
 error_reporting(0);
 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');


($_GET['ac'])?$ac=$_GET['ac']:$ac='';
($_GET['loai'])?$loai=$_GET['loai']:$loai='';

?>
<div id="maincolumn">
	<div class="nopad">
		<div class="list-product">
        <?php if($ac != 'tim_kiem'){?>
            <div id="search-all">
                <?php
                $hsx = ($_GET['hang'])?$_GET['hang']:'';
                $tg = ($_GET['tugia'])?$_GET['tugia']:'';
                $dg = ($_GET['dengia'])?$_GET['dengia']:'';
                
                ?>
                <form name="timkiemtongquat" method="GET" id="timkiemtongquat" action="danh_sach_san_pham.php">
                    <label>Hãng sản xuất</label>
                    <select name="hang"><?lay_danh_muc_theo_loai($loai, $hsx)?></select>
                    
                    <label>Từ giá</label>
                    <select name="tugia">
                        <option value="">---Từ giá---</option>
                        <option value="1000000"<?=($tg == 1000000)?' selected':''?>>1 Triệu</option>
                        <option value="2000000"<?=($tg == 2000000)?' selected':''?>>2 Triệu</option>
                        <option value="3000000"<?=($tg == 3000000)?' selected':''?>>3 Triệu</option>
                        <option value="4000000"<?=($tg == 4000000)?' selected':''?>>4 Triệu</option>
                        <option value="5000000"<?=($tg == 5000000)?' selected':''?>>5 Triệu</option>
                        <option value="6000000"<?=($tg == 6000000)?' selected':''?>>6 Triệu</option>
                        <option value="7000000"<?=($tg == 7000000)?' selected':''?>>7 Triệu</option>
                        <option value="8000000"<?=($tg == 8000000)?' selected':''?>>8 Triệu</option>
                        <option value="9000000"<?=($tg == 9000000)?' selected':''?>>9 Triệu</option>
                        <option value="10000000"<?=($tg == 10000000)?' selected':''?>>10 Triệu</option>
                    </select>
                    
                    <label>Đến giá</label>
                    <select name="dengia">
                        <option value="">---Đến giá---</option>
                        <option value="1000000"<?=($dg == 1000000)?' selected':''?>>1 Triệu</option>
                        <option value="2000000"<?=($dg == 2000000)?' selected':''?>>2 Triệu</option>
                        <option value="3000000"<?=($dg == 3000000)?' selected':''?>>3 Triệu</option>
                        <option value="4000000"<?=($dg == 4000000)?' selected':''?>>4 Triệu</option>
                        <option value="5000000"<?=($dg == 5000000)?' selected':''?>>5 Triệu</option>
                        <option value="6000000"<?=($dg == 6000000)?' selected':''?>>6 Triệu</option>
                        <option value="7000000"<?=($dg == 7000000)?' selected':''?>>7 Triệu</option>
                        <option value="8000000"<?=($dg == 8000000)?' selected':''?>>8 Triệu</option>
                        <option value="9000000"<?=($dg == 9000000)?' selected':''?>>9 Triệu</option>
                        <option value="10000000"<?=($dg == 10000000)?' selected':''?>>10 Triệu</option>
                        <option value="10000001"<?=($dg > 10000000)?' selected':''?>>Trên 10 Triệu</option>
                    </select>
                    <input type="hidden" name="loai" value="<?php echo $loai?>" />
                    <input type="hidden" name="ac" value="tim_kiem_tong_quat" />
                    
                    <input type="submit" class="search_total_btns" value="Tìm kiếm" />
                </form>
                <div class="clr"></div>
            </div>
            <?}?>
            <?
            if($ac=='danhmuc'){//Tim kiem theo danh muc
                $id=$_GET['id'];
                $tendm=$wpdb->get_row("SELECT tenDanhMuc FROM dt_danhmucsp WHERE maDanhMuc=$id");   
                
                danh_sach_san_pham($ac,$loai,$id);
                
            }else if($ac=="gia"){//Tim kiem theo gia
                $gia=$_GET['gia'];
            //Hien thi san pham theo gia tim kiem                     
             danh_sach_san_pham($ac,$gia);
            
            }else if($ac=="tim_kiem_tong_quat"){//Tim kiem chung
                $tugia=$_GET['tugia'];
                $dengia=$_GET['dengia'];
                $hang=$_GET['hang'];
                $loai=$_GET['loai'];
            
                tim_kiem_san_pham($loai, $hang, $tugia, $dengia);
            }else if($ac=="tim_kiem"){
                $key=stripslashes($_GET['menu_search']);
                
                
                menu_tim_kiem($key);
            }?>
            
        </div><!--end .new-product-->
    
    
    </div>
</div><!--end #maincolumn-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>