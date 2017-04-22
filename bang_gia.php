<? 
    error_reporting(0);
    ob_start();
    session_start();

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 
 
?>
<script>
    $(document).ready(function(){
         $('.xem-them-bang-gia').click(function(){
                var madm=$(this).attr('id');
                $.ajax({
                  url: 'ajax/ajax_bang_gia_danh_muc_sp.php?madm='+ madm,
                  success: function(data) {
                    $('.bang-gia').html(data);
                  }
                });    
         });
    });
</script>

<div id="maincolumn-page">
	<div class="nopad">
	   <div class="bang-gia">
            <?php
            
            $loai=$wpdb->get_results("SELECT * FROM dt_loaisanpham");
            
            foreach($loai as $l){
            
                $sanpham=$wpdb->get_results("SELECT maDM, tenSanPham, giaBan FROM dt_sanpham WHERE maLoai='$l->maLoaiSP' ORDER BY giaBan DESC");
            ?>
                <div class="box-bang-gia">
                    <h3><?=$l->tenLoaiSP?></h3>
                    <div class="info-bang-gia">
                            
            <?
                foreach($sanpham as $s){
                    ?>
                        <div class="bang-gia-item">
                            <span class="ten-san-pham"><?=$s->tenSanPham?></span>
                            <span class="gia"><?=number_format($s->giaBan)?> VNĐ</span>
                        </div>
                    <?
                }
           ?>
                    </div>
                </div>
           <?
            }
           ?>
            
            <div class="clear"></div>
        </div>
    </div>
</div><!--end #maincolumn-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>