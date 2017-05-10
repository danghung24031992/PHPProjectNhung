<?
 error_reporting(0);
 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');


($_GET['id'])?$id=$_GET['id']:$id='';

?>
<div id="maincolumn">
	<div class="nopad">
		<div class="list-product">
            
            <div id="search-all">
                <?php
                $hsx = ($_GET['hang'])?$_GET['hang']:'';
                $tg = ($_GET['tugia'])?$_GET['tugia']:'';
                $dg = ($_GET['dengia'])?$_GET['dengia']:'';
                
                ?>
                <form name="timkiemtongquat" method="GET" id="timkiemtongquat" action="danh_sach_san_pham.php">
                    <label>Hãng sản xuất</label>
                    <select name="hang"><?lay_danh_muc_theo_loai($id)?></select>
                    
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
                    <input type="hidden" name="loai" value="<?php echo $id?>" />
                    <input type="hidden" name="ac" value="tim_kiem_tong_quat" />
                    
                    <input type="submit" class="search_total_btns" value="Tìm kiếm" />
                </form>
                <div class="clr"></div>
            </div>
            
            
            <?
            $danhmuc=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE maLoai='$id' ORDER BY ngayTao DESC");
            if(count($danhmuc)){
            ?>
                <div class="title-page-item"><?=lay_ten_loai_sp($id)?></div>
            <?
                foreach($danhmuc as $dm){
                    $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$dm->maSP AND kieuanh=1");
                    if($img->anh!="")
                        $anh=$img->anh;
                    else $anh="khong_anh.jpg";
            ?>
                <div class="shop-item" style="position: relative;" >
                    <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
                    <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><h3><?=$dm->tenSanPham?></h3></a>
                    <span class="price" style="color: black">
                        <strike>
                            <i>
                                <?php 
                                    if ($dm->giacu >0) { echo "Giá cũ: ";
                                    echo  number_format($dm->giacu);
                                    echo "VNĐ";
                                }
                                ?> 
                            </i>
                        </strike>
                    </span>
                    <span class="price">Giá: <?=number_format($dm->giaBan)?> VNĐ</span>
                    <span style="color: #02887b ; position: absolute; bottom: 0;  text-align:center; width: 100%;">
                    <?php
                        if($dm->quaTang!="") {echo "<img src='images/wa_2.png' style='margin-top:4px'/>" ; }
                    ?>
                    </span>
                </div>    
                
                <?
                }
            }else {
            ?>
                <div class="title-page-item">Không có sản phẩm nào của '<?=lay_ten_loai_sp($id)?>'</div>
            <?
            }
            ?>
            
        </div><!--end .new-product-->
    
    
    </div>
</div><!--end #maincolumn-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>