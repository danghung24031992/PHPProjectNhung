<?php
error_reporting(0);
ob_start();
session_start();


require_once('../lib/wp-db.php');
require_once('../lib/functions.php');


$pid=$_GET['pid'];
$soLuong=$_GET['so_luong'];
$isLimited=0;
if(count($_SESSION['shoppingcart'])){
    $i=0;
    $check=0;
    foreach($_SESSION['shoppingcart'] as $v){
        if($v[0]==$pid){
            if ($v[1] >= $soLuong){
                $isLimited = 2;
                $check=1;
                break;
            }
            if ($v[1] >= 10) {
                $isLimited = 1;
                $check=1;
                break;
            }
            $_SESSION['shoppingcart'][$i]=array($pid,$v[1]+1);
            $check=1;
            break;
        }
        $i+=1; 
     }
     if($check==0)
          $_SESSION['shoppingcart'][]=array($pid,1);     

}else $_SESSION['shoppingcart'][]=array($pid,1);

$sum=0;
foreach($_SESSION['shoppingcart'] as $l){
    $sum+=$l[1];
}

if ($isLimited == 1) {
    echo '<script language="javascript">';
    echo 'alert("Bạn chỉ được phép mua sản phẩm này với số lượng tối đa là 10 chiếc.")';
    echo '</script>';
}else if ($isLimited == 2) {
    echo '<script language="javascript">';
    echo 'alert("Bạn chỉ được phép mua sản phẩm ")';
    echo '</script>';
}
echo "
<p class=\"how-much-product\">Có ".$sum." sản phẩm</p>
<p class=\"sum-money-shoppingcart\">Tổng ".tong_tien_gio_hang()."VNĐ</p>
";
?>