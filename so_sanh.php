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
       $('#search_compare_product').click(function(){
            var loai = $('#loai option:selected').val();
            var pid = $('#hangsx option:selected').val();
            var price=$('#giaban').val();
            $.ajax({
              url: 'ajax/ajax_tim_san_pham_so_sanh.php?loai='+ loai + '&catid='+ pid + '&price='+ price,
              success: function(data) {
                $('#show_product_compare').html(data);
              }
            }); 
       }); 
       $('.add_to_compare').live('click',function(){
            var pid=$(this).attr("id");
            $.ajax({
              url: 'ajax/ajax_chon_san_pham_so_sanh.php?pid='+ pid,
              success: function(data) {
                $('#selected-compare').html(data);
              }
            });
       });
       $('#del-product-compare').live('click',function(){
            $.ajax({
              url: 'ajax/ajax_chon_san_pham_so_sanh.php?ac=del',
              
              success: function(data) {
                    $('#selected-compare').html(data);
                    $('.compare-result').html("");
              }
            });
            $('.search-compare').attr('style','display:block');
       });
       
       $('#compare-now').live('click',function(){
            $('.search-compare').attr('style','display:none');
            $('#show_product_compare').attr('style','display:none');
            $.ajax({
              url: 'ajax/ajax_so_sanh_san_pham.php',
              success: function(data) {
                    $('.compare-result').html(data);
              }
            });
       });
       $('#show-product-compare').click(function(){
            $('.search-compare').attr('style','display:block');
            $('#show_product_compare').attr('style','display:block');
       });
       
       
    });
</script>


<div id="maincolumn-page">
	<div class="nopad">
        <div class="compare-product">
            <div class="title-page-item">SO SÁNH CÁC SẢN PHẨM </div>
            <div class="compare-box">
                <div class="left-btn-compare">
                    <img src="images/ss1.png" id="compare-now" />
                    <br/>

                    <img src="images/gb1.png" id="del-product-compare" />
                    <!-- <img src="images/list_product.png" id="show-product-compare" /> -->
                </div>
                <div class="right-product-compare">
                    <ul id="selected-compare">
                        <li></li>
                        <li></li>                       
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="compare-result">
                 
                 
                 
            </div>  
            
            <div class="search-compare">
                <div class="title-page-item">TÌM KIẾM SẢN PHẨM SO SÁNH</div>
                <form name="search_compare" method="POST">
                
                    <select name="loai" id="loai" style="margin-left: 30px; font-size: 16px">
                        <?
                            $loai=$wpdb->get_results("SELECT maLoaiSP, tenLoaiSP FROM dt_loaisanpham");
                            foreach ($loai as $l){
                        ?>
                            <option value="<?=$l->maLoaiSP?>"><?=$l->tenLoaiSP?></option>                        
                        <?
                            }
                        ?>
                    </select>
                    
                    <select name="hangsx" id="hangsx" style="margin-left: 13px; font-size: 16px">
                        <option value="">---Hãng sản xuất---</option>
                        <?
                            $rs=$wpdb->get_results("SELECT maDanhMuc, tenDanhMuc FROM dt_danhmucsp");
                            foreach ($rs as $r){
                        ?>
                            <option value="<?=$r->maDanhMuc?>"><?=$r->tenDanhMuc?></option>                        
                        <?
                            }
                        ?>
                    </select>
                    
                    <select name="giaban" id="giaban" style="margin-left: 13px; font-size: 16px" >
                        <option value="">-----Giá-----</option>
                        <option value="2000000">Dưới 2 triệu</option>
                        <option value="5000000">Dưới 5 triệu</option>
                        <option value="10000000">Dưới 10 triệu</option>
                        <option value="100000001">Trên 10 triệu</option>
                    </select>
                    
                    <input class="btn-search-compare" type="button" value="Tìm kiếm" id="search_compare_product" />
                </form>
            </div>
            
            <div id="show_product_compare">
                
            </div>
        </div>
        
    </div>
</div><!--end #maincolumn-page-->
<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>
