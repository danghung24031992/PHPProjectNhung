<? 
    error_reporting(0);
    ob_start();
    session_start();

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');
 require_once('header.php');
 
 
?>
<!-- <div id="maincolumn-page" style="text-align: center;">
  <div class="nopad" style="display:inline-block; text-align: center; ">
    <div class="title-page-item" style="font-size: 26px;margin-top: 10px;margin: auto;
    width: 50%; text-align: center;">Chào Hè 2017</div>
    <div class="shop-item-khuyen-mai">
      <div class="shop-item-them">
       <a href="chi_tiet_san_pham.php?id=176"><img src="images/khuyenmai_1.png"></a>
     </div>
     <div class="shop-item-them">
       <a href=""><img src="images/khuyenmai_2.png"></a>
     </div>
    </div>
  </div> -->
<!-- </div> -->


<div id="maincolumn-page" style="text-align: center;">
  <div class="nopad" style="display:inline-block; text-align: center; ">
    <?php 
    $sanpham = $wpdb->get_results("SELECT * FROM dt_sanpham WHERE giacu > 0 ORDER BY ngayTao DESC LIMIT 0,8");
    foreach($sanpham as $sp){
      $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$sp->maSP AND kieuanh=1");
      if($img->anh!="")
        $anh=$img->anh;
      else $anh="khong_anh.jpg";
      ?>

      <div class="shop-item" style="width: 300px; height: 300px" >
        <a href="chi_tiet_san_pham.php?id=<?php echo $sp->maSP; ?>"><img src="sanpham/<?php echo $anh;?>"/></a>
        <h3><a href="chi_tiet_san_pham.php?id=<?php echo $sp->maSP;?>" style="font-size: 20px"><?php echo $sp->tenSanPham;?></a></h3>
        <a href=""><img src="images/gia_soc.png"></a>
      </div>
      <?php }
      ?> 
      <div class="clear"></div>
    </div>
    </div><!--end #maincolumn-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>