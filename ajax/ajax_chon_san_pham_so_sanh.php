<?php
error_reporting(0);
ob_start();
session_start();

require_once('../lib/wp-db.php');
require_once('../lib/functions.php');

($_GET['ac'])?$ac=$_GET['ac']:$ac="";

if($_GET['pid']!=""){
    //print_r($_SESSION['compare']);
    if(count($_SESSION['compare'])<2){
        $count = 0;
        if(count($_SESSION['compare'])>0){
            foreach($_SESSION['compare'] as $p)
                if($p==$_GET['pid'])
                    $count+=1;
        }
            
        if($count==0){
            $_SESSION['compare'][] = $_GET['pid'];
        } else echo "<script>alert('Sản phẩm đã có trên danh sách so sánh!')</script>";
            
    }else echo "<script>alert('Danh sách so sánh đã đầy! Vui lòng gỡ bỏ bớt để so sánh sản phẩm')</script>";
}

if($ac=="del")
    unset($_SESSION['compare']);

if(count($_SESSION['compare'])){
    foreach ($_SESSION['compare'] as $v)
        san_pham_chon_so_sanh($v);
    
    echo "<div class='clear'></div>";
}else echo "<li></li><li></li><li></li>";
 



?>
