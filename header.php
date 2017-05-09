<?php
error_reporting(0);
ob_start();
session_start();


?>
<html lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type"/>
  <title>Công nghệ số</title>

  <!--<link type="text/css" href="css/editor1.css" rel="stylesheet"/>-->
  <link type="text/css" href="css/template.css" rel="stylesheet"/>
  <link type="text/css" href="css/styles.css" rel="stylesheet"/>
  
  <?php
  
  $current_page_name = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  if($current_page_name == "so_sanh.php"){
    ?>
    <script language="javascript" type="text/javascript" src="js/jquery.js"></script>
    <?   
  } else {
    
    ?>
    <script language="javascript" type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <?
  }
  ?>
  
  <script language="javascript" type="text/javascript" src="js/functions.js"></script>
  <script language="javascript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
    $(document).ready(function(){
      $('.shop-item').mouseover(function(){
        $(this).css({'border':'2px solid #F6EB8F'});
      }); 
      $('.shop-item').mouseout(function(){
        $(this).css({'border':'2px solid #F5F5F5'});
      });
    });
    
  </script>
  
  <link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="nivo-slider/default.css" type="text/css" media="screen" />
  <script type="text/javascript" src="nivo-slider/jquery.nivo.slider.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $('#slider').nivoSlider({
        effect: 'fade',
        animSpeed: 500,
        pauseTime: 3000,
        startSlide: 1,
        directionNav: true,
        controlNav: true,
        controlNavThumbs: false,
        manualAdvance:false
      });
    });
  </script>
  
</head>

<body>

	<div id="wrapper">
    <div id="top">
      <div class="main">
        <div class="login-info">
          <?php
          if($_SESSION['login']){
            if(isset($_SESSION['admin']))
              echo login_info_header($_SESSION['admin']);
            else if(isset($_SESSION['user']))
              echo login_info_header($_SESSION['user']);
            
            ?>
            <span> | </span> <a style="" href="don_hang.php">Xem đơn hàng đã đặt</a>
            <?php    
          } else {
            ?>
            <a class="mainlevel-nav" href="dang_ki.php">Đăng kí</a> <span> | </span>
            <a class="mainlevel-nav" href="dang_nhap.php">Đăng nhập</a>
            <?    
          }
          ?>
        </div>
      </div>
    </div>
    <div id="header">
      <div class="main">

        <div class="left-logo">
          <a href="index.php"><img src="images/dw-logo.png" /> </a>
        </div>
      <!--   /* Tạo youtube, facebook, google*/ -->

        <div class="fb-logo">
              <a href="https://plus.google.com/u/0/"><img src="images/gm1.jpg" style="margin-top: 25px ; margin-left: 60px;" /> </a>
        </div>
        <div class="fb-logo"> 
              <a href="https://www.facebook.com/profile.php?id=100007975801038"><img src="images/fb1.png" style="margin-top: 25px ; margin-left: 60px;" /> </a>
        </div>
        <div class="fb-logo"> 
              <a href="https://www.youtube.com/"><img src="images/yb1.png" style="margin-top: 25px ; margin-left: 60px;" /> </a>
        </div>
        <div class="right-logo">
          <div id="menu-search">
            <form name="menu-search" method="GET" action="danh_sach_san_pham.php">
              <input type="text" name="menu_search" value="Tìm kiếm...." title="Tìm kiếm...." onfocus="focusInput(this);" onblur="blurInput(this);" />
              <input type="image" name="" value="aa" src="images/bg_search_btn.png" />
              <input type="hidden" value="tim_kiem" name="ac" />
            </form>
          </div>
          <img src="images/bao__hanh.png" style="width: auto; display:block; height: 50px; margin-top: 10px;" >
        </div>
         <div class="clr"></div>	
      </div>
      <div>
          <a href="#"><img src="images/lienhe1.png" style="width: auto; float: right; margin-top: -15px;"></a>
      </div>
    </div>	<!--end header-->
    <!-- Ảnh liên hệ -->
    <div id="pillmenu">
      <ul id="mainlevel-nav">
        <li><a class="mainlevel-nav" href="index.php">Trang chủ</a></li>
        <li>
          <a class="mainlevel-nav" href="#">Sản phẩm</a>
          <ul>
            
            
            <?php
            $ds=$wpdb->get_results("SELECT * FROM dt_loaisanpham");

            foreach($ds as $s){
              echo '<li>';
              echo '<a href="danh_muc.php?id='.$s->maLoaiSP.'">'.$s->tenLoaiSP.'</a>';
              
              $dm=$wpdb->get_results("SELECT maDM FROM dt_sanpham WHERE maLoai='$s->maLoaiSP' GROUP BY maDM");
              echo '<ul>';
              foreach($dm as $d){
                echo '<li><a href="danh_sach_san_pham.php?ac=danhmuc&loai='.$s->maLoaiSP.'&id='.$d->maDM.'">'.lay_ten_danh_muc($d->maDM).'</a></li>';
              }
              echo '</ul>';
              echo '</li>';
            }
            ?>
            
          </ul>
        </li>
        <li><a class="mainlevel-nav" href="bang_gia.php">Báo giá</a></li>
        <li><a class="mainlevel-nav" href="so_sanh.php">So sánh</a></li>
        <li><a class="mainlevel-nav" href="lien_he.php">Liên hệ</a></li>
         <li><a class="mainlevel-nav" href="khuyenmai.php">Khuyến mại</a></li>
        <li><a class="mainlevel-nav" href="tin_tuc.php">Tin tức</a></li>
        
        
      </ul>
      
    </div>
    
    
    <div id="content">
      <div class="main main-content">
       
       
       
       