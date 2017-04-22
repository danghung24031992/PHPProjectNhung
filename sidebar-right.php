<div id="rightcolumn">
    
    <div class="sidebar-box">
        <h3>Giỏ hàng</h3>
        <div class="main-sidebar-box">
            <img class="giohang" src="images/gio_hang_new.jpg" width="80" height="79px" />
            <div class="shoppingcart">
                <div id="shoppingcart-header">
                    <p class="how-much-product" style="font-size: 16px">*<?=tong_san_pham_gio_hang()?> Sản phẩm</p>
                    <p class="sum-money-shoppingcart" style="font-size: 16px">*<?=number_format(tong_tien_gio_hang())?> đ</p>
                </div>
                <a href="chi_tiet_gio_hang.php" style="color: red;">Xem giỏ hàng</a><br />
                
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="sidebar-box product">
        <h3>Sản phẩm mới</h3>
        <div class="main-sidebar-box">
            <? san_pham_moi(); ?>
        </div>
    </div>
    
    <div class="sidebar-box product">
        <h3>Sản phẩm bán chạy</h3>
        <div class="main-sidebar-box">
            <? san_pham_ban_chay(); ?>
        </div>
    </div>
    
</div><!--end #rightcolumn-->
<div class="clr"></div>
