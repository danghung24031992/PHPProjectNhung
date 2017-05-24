<? 
    error_reporting(0);
    ob_start();
    session_start();

//unset($_SESSION['shoppingcart']);

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 
 ($_GET['id'])?$id=$_GET['id']:$id="";
?>


<div id="maincolumn-page">
	<div class="nopad">
		<div class="product-detail">
            <div class="title-page-item">THÔNG TIN SẢN PHẨM</div>
            <?
                if($id!="")
                    $r=$wpdb->get_row("SELECT * FROM dt_sanpham WHERE maSP=$id");
                    
                if(count($r)){
                    $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$id AND kieuanh=1");
                ?>
                <div class="image-product-detail">
                    <img src="sanpham/<?=(count($img))?$img->anh:"khongcoanh.jpg"?>" style="max-width: 120px;" />
                </div>
                <div class="short-info-product-detail">
                    <table cellpadding="4" cellspacing="0" width="350px">
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td width="60%"><b><?=$r->tenSanPham?></b></td>
                        </tr>
                        <tr>
                            <td>Hãng sản xuất</td>
                            <td width="60%"><b><?=lay_ten_danh_muc($r->maDM)?></b></td>
                        </tr>
                        <tr>
                            <td>Bảo hành</td>
                            <td width="60%"><b><?=$r->baoHanh?> tháng</b></td>
                        </tr>
                        <tr>
                            <td>Giá bán</td>
                            <td width="60%"><b style="color: red;"><?=number_format($r->giaBan)?> VNĐ</b></td>
                        </tr>
                        <tr>
                            <td>Tình trạng kho</td>
                            <td width="60%">
                                <b style="color: red;"><?echo (kiem_tra_so_luong_san_pham($id))==true?"Còn hàng":"Hết hàng"?></b>
                            </td>
                        
                        </tr>
                        <tr style="color: #ff8022">
                            <td style="font-size: 20px">Quà tặng</td>
                            <td width="60%"><b><?=$r->quaTang?></b></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="clr"></div>
                
                <div class="buy-product-icon">
                    <img src="images/add_gio_hang.png" id="add-shoppingcart" class="add-shoppingcart" alt="<?=$id?>" />
                    
                    <a href="chi_tiet_gio_hang.php"><img src="images/thanhtoan.png" id="my-shoppingcart" class="my-shoppingcart" /></a>
                </div>
                <div class="list-product">
                    <div class="line-list-product">&nbsp;</div>
                    <div class="midd-list-product">
                    <?
                    $get_img=$wpdb->get_results("SELECT anh FROM dt_hinhanhsp WHERE maSP=$id");
                    foreach($get_img as $img_url){
                        echo "<img src='sanpham/".$img_url->anh."' />";
                    }
                    ?>    
                    </div>
                    <div class="line-list-product">&nbsp;</div>
                </div>
                <div class="clr"></div>
                
                <div class="detail-info-product">
                    
                    <div class="detail-info"><span>THÔNG TIN SẢN PHẨM</span></div>
                    
                    <div class="main-info-product">
                        <div><span class="title">Loại màn hình</span> <span><?=$r->loaiManHinh?>&nbsp;</span></div>
                        <div><span class="title">Độ phân giải</span> <span><?=$r->doPhanGiai?>&nbsp;</span></div>
                        <div><span class="title">Kích thước</span> <span><?=$r->kichThuot?>&nbsp;</span></div>
                        <div><span class="title">Camera</span> <span><?=$r->camera?>&nbsp;</span></div>
                        <div><span class="title">Cảm ứng</span> <span><?=$r->camUng?>&nbsp;</span></div>
                        <div><span class="title">Kiểu dáng</span> <span><?=$r->kieuDang?>&nbsp;</span></div>
                        <div><span class="title">Trọng lượng (g)</span> <span><?=$r->trongLuong?>g&nbsp;</span></div>
						<div><span class="title">Bảo hành</span> <span><?=$r->baoHanh?> Tháng&nbsp;</span></div>
                        <div><span class="title">Hệ điều hành</span> <span><?=$r->heDieuHanh?>&nbsp;</span></div>
                        
                        
                        
                        <?if($r->cpu){?>
                            <div><span class="title">CPU</span> <span><?=$r->cpu?>&nbsp;</span></div>
                        <?}?>
                        
                        <?if($r->ram){?>
                            <div><span class="title">RAM</span> <span><?=$r->ram?>&nbsp;</span></div>
                        <?}?>
                        
                        <?if($r->rom){?>
                            <div><span class="title">Bộ nhớ trong</span> <span><?=$r->rom?>&nbsp;</span></div>
                        <?}?>
                        
                    </div>
                    
                    <div class="clr"></div>
                    
                </div>
                <?    
                }//end if count($r)
            ?>
        </div><!--end .new-product-->
        
        <div id="comment">
            <?include('binh_luan.php');?>
        </div>
    
    
    
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
<?
    require_once('sidebar-right.php');
    
    require_once('footer.php')
?>