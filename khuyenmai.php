<? 
    error_reporting(0);
    ob_start();
    session_start();

 require_once('lib/wp-db.php');
 require_once('lib/functions.php');

 require_once('header.php');
 //require_once('sidebar-left.php');
 
 
?>
<div id="maincolumn-page" style="text-align: center;">
  <div class="nopad" style="display:inline-block; text-align: center; ">
    <div class="title-page-item" style="font-size: 26px;margin-top: 10px;margin: auto;
    width: 50%; text-align: center;">Chào Hè 2017</div>
    <div class="shop-item-khuyen-mai">
      <div class="shop-item-them">
       <a href=""><img src="images/khuyenmai_1.png"></a>
     </div>
     <div class="shop-item-them">
       <a href=""><img src="images/khuyenmai_2.png"></a>
     </div>
    </div>
  </div>
</div>


<? require_once('sidebar-right.php')?>
<?require_once('footer.php')?>