<?php
error_reporting(0);
ob_start();
session_start();
 
    require_once('lib/wp-db.php');
    require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 ($_GET['id'])?$id=$_GET['id']:$id="";
?>

<div id="slider-wrap">
   
    <div class="left-slide">
        <img src="images/baohanh.png" style="margin-bottom: 12px;" /><br />
        <img src="images/slide2.png" />
    </div>
    <div class="right-slide">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/slide10.png" alt="" />
                <img src="images/slide11.png" alt="" />
                <img src="images/slide12.png" alt="" />
                <img src="images/slide14.png" alt="" />
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
            
            <div class="shop-item" style="position: relative;" >

            
                <a href="chi_tiet_san_pham.php?id=<?php echo $sp->maSP;?>"><img src="sanpham/<?php echo $anh;?>" /></a>
                <h3><a href="chi_tiet_san_pham.php?id=<?php echo $sp->maSP;?>"><?php echo $sp->tenSanPham;?></a></h3>
                <span class="price" style="color: black">
                <strike>
                <i>
                <?php 
                    if ($sp->giacu >0) { 
                    echo  number_format($sp->giacu);
                    echo "VNĐ";
                }
                ?> 
                </i>
                </strike>
                </span>
                <span class="price"><?php echo number_format($sp->giaBan);?> VNĐ</span>
                <a href=""><!-- <img src="images/wa.png" style="margin-left: 80px"> --></a>
               <span style="color: #02887b ;position: absolute; bottom: 0;  text-align:center; width: 100%;">
                   <?php
                   if($sp->quaTang!="") {echo "<img src='images/wa_2.png' style='margin-top:4px; '>" ; } //"<img src='images/wa.png' style='margin-left: 80px'>";
                  
                    ?>
               </span>
              <!--  <a href="" style="position: absolute;bottom: 0; text-align:center; margin-left: 12px"><img src="images/mua_hang.png" id="add-shoppingcart" class="add-shoppingcart" alt="<?=$id?>"></a> -->
            </div>
            
            <?php }
            
            echo '<div class="clear"></div></div>';
        }
        ?>
        
    
    </div>
</div><!--end #maincolumn-->

<script>
    $('.add-shoppingcart').click(function(){
      var pid = this.alt;
      var soLuong = <?php echo  $r->soLuong - dem_so_luong_san_pham_ban($r->maSP);?>;
      $.ajax({
        url: 'ajax/ajax_add_shoppingcart.php?pid='+ pid +'&so_luong=' + soLuong,
        success: function(data) {
            if (soLuong > 0) {
                $('#shoppingcart-header').html(data);
            }else{
                alert("Sản phẩm đã hết hàng.");
            }
      }
  });    
  });/*end click event add to shoppingcart*/
</script>
<?php require_once('sidebar-right.php');?>
<?php require_once('footer.php');?>