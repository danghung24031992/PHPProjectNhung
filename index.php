<?php
error_reporting(0);
ob_start();
session_start();
 
    require_once('lib/wp-db.php');
    require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
?>

<div id="slider-wrap">
   
    <div class="left-slide">
        <img src="images/baohanh.png" style="margin-bottom: 12px;" /><br />
        <img src="images/slide2.png" />
    </div>
    <div class="right-slide">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <!-- <img src="images/slide-1.png" alt="" />
                <img src="images/slide-2.png" alt="" />
                <img src="images/slide.png" alt="" />
                <img src="images/slide-3.png" alt="" />
                <img src="images/slide-4.png" alt="" /> -->
            </div>
            
        </div>
    </div>
    <div class="clr"></div>
   
</div>

<div id="maincolumn">
	<div class="nopad">
		
        <?php 
        $loai=$wpdb->get_results("SELECT * FROM dt_loaisanpham");

        foreach($loai as $l){
            echo '<div class="type-product">';
            echo '<div class="title-box-product-1">'.$l->tenLoaiSP.'</div>';
            
            $sanpham = $wpdb->get_results("SELECT * FROM dt_sanpham WHERE maLoai='$l->maLoaiSP' ORDER BY ngayTao DESC LIMIT 0,8");
            foreach($sanpham as $sp){
                $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$sp->maSP AND kieuanh=1");
                if($img->anh!="")
                    $anh=$img->anh;
                else $anh="khong_anh.jpg";
            ?>
            
            <div class="shop-item" >

            
                <a href="chi_tiet_san_pham.php?id=<?php echo $sp->maSP;?>"><img src="sanpham/<?php echo $anh;?>" /></a>
                <h3><a href="chi_tiet_san_pham.php?id=<?php echo $sp->maSP;?>"><?php echo $sp->tenSanPham;?></a></h3>
                <span class="price" style="color: black">
                <strike>
                <i>
                <?php 
                    if ($sp->giacu >0) { echo "Giá cũ: ";
                    echo  number_format($sp->giacu);
                    echo "VNĐ";
                }
                ?> 
                </i>
                </strike>
                </span>
                <span class="price">Giá: <?php echo number_format($sp->giaBan);?> VNĐ</span>
                <a href=""><!-- <img src="images/wa.png" style="margin-left: 80px"> --></a>
               <span style="color: #02887b">
                   <?php
                   if($sp->quaTang!="") {echo "<img src='images/wa_2.png' style='margin-top:4px'>" ; } //"<img src='images/wa.png' style='margin-left: 80px'>";
                  
                    ?>
               </span>
            </div>
            
            <?php }
            
            echo '<div class="clear"></div></div>';
        }
        ?>
        
    
    </div>
</div><!--end #maincolumn-->
<?php require_once('sidebar-right.php');?>
<?php require_once('footer.php');?>