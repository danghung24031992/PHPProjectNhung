<div class="clr">
	</div>
		</div><!--end .main-->
       <!--  <div >
            <a href="http://localhost:8080/congngheso/chi_tiet_san_pham.php?id=167"> 
                <img class="sponsor-right" src="images/phai.jpg" width="144px" />
            </a>
        </div> -->
        <div class="sponsor">
        <a href="chi_tiet_san_pham.php?id=168"><img class="sponsor-left" src="images/trai.png" width="144px" /></a>
           <a href="chi_tiet_san_pham.php?id=176"><img class="sponsor-right" src="images/phai.jpg" width="144px" /></a>        
                    
                </div> 
            </div><!--end #content-->
            <div id="footer" style="clear:both;">
                <div>
                    <input type="image" src="images/scroll-top.png" onclick="scrollToTop()" style="float: right; margin-right:50px; margin-top: 0px; background-color: transparent;" />

                </div>
        		      <div class="main">
                          <div style="margin-left: 350px">
                                <h2 style="font-size: 18px; color:#fdf9f9">TRUNG TÂM BẢO HÀNH</h2></br>
                                <h3 style="margin-top: -20px;margin-left: 10px; color:#fdf9f9">* Khu vực Hà Nội: 113 Thái Hà - Đống Đa - Hà Nội</h3>
                               <h3 style="margin-top: -10px;margin-left: 10px; color:#fdf9f9">* Khu vực TP Hồ Chí Minh: 81 CMT8, Q.1 HCM</h3>
                           </div>
                           <div style="margin-left: 650px; margin-top: -70px">
                                <h2 style="font-size: 14px;color: #f6faf6; margin-left: 15px"> 
                                Gọi mua hàng
                                <a href="tel:19006666" style="font-size: 18px;color: red ;">1900 6666 </a>
                                (7h30-21h30)
                                </h2>
                                <h2 style="font-size: 14px;color: #f6faf6; margin-left: 15px"> 
                                Gọi bảo hành
                                <a href="tel:19006026" style="font-size: 18px;color: red ;">1900 6026</a>
                                (7h30-21h30)
                                </h2>
                            </div>
                            <div>
                                <h2 style="font-size: 20px; color:red; margin-top: -50px;margin-left: -20px">Công ty cổ phần Thế Giới Số </h2></br>
                                 <h3 style=" margin-top: -20px;margin-left: -20px">31- Phan Đình Giót, Quận Thanh Xuân, Thành phố Hà Nội</h3>
                            </div>
                        
                        
      
        
         <div class="clr"></div>    
      </div>
    </div>
        	</div><!--end #footer-->
    
	</div><!--end #wrapper-->
   <script>
        function scrollToTop(){
            $('html, body').animate({ scrollTop: 0 }, 'normal');
        }  

        $(window).scroll(function(e){ 
            var $el = $('.sponsor-left'); 
            var isPositionFixed = ($el.css('position') == 'fixed');
            if ($(this).scrollTop() > 200 && !isPositionFixed){ 
                $('.sponsor-left').css({'position': 'fixed', 'top': '0px'}); 
            }
            if ($(this).scrollTop() < 200 && isPositionFixed)
            {
                $('.sponsor-left').css({'position': 'absolute', 'top': '15px'}); 
            } 
        });

        $(window).scroll(function(e){ 
            var $el = $('.sponsor-right'); 
            var isPositionFixed = ($el.css('position') == 'fixed');
            if ($(this).scrollTop() > 200 && !isPositionFixed){ 
                $('.sponsor-right').css({'position': 'fixed', 'top': '0px'}); 
            }
            if ($(this).scrollTop() < 200 && isPositionFixed)
            {
                $('.sponsor-right').css({'position': 'absolute', 'top': '15px'}); 
            } 
        });  
        
        //run on document load and on window resize
        $(document).ready(function () {
            //on load
            hideDiv();
            //on resize
            $(window).resize(function(){
                hideDiv();
            });
        });
        //the function to hide the div
        function hideDiv(){

            if ($(window).width() < 1024) {

                $(".sponsor").hide();

            }else{

                $(".sponsor").show();

            }

        }    
    </script>
</body>
</html>