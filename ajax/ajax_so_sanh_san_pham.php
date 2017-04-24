<?php
error_reporting(0);
ob_start();
session_start();

require_once('../lib/wp-db.php');
require_once('../lib/functions.php');


if(count($_SESSION['compare'])){
    echo '
    <div class="compare-result-title">
                     <table cellpadding="0" cellspacing="8" border="0" class="tbl-compare-title">
                        <tr><td>Tên sản phẩm</td></tr>
                        <tr><td>Hãng sản xuất</td></tr>
                        <tr><td>Giá bán</td></tr>
                        <tr><td>Bảo hành</td></tr>
                        <tr><td>Loại màn hình</td></tr>
                        <tr><td>Độ phân giải</td></tr>
                        <tr><td>Kích thước</td></tr>
                        <tr><td>Cảm ứng</td></tr>
                        <tr><td>Kiểu dáng</td></tr>
                        <tr><td>Trọng lượng (g)</td></tr>
                        <tr><td>CPU</td></tr>
                        <tr><td>RAM</td></tr>
                        <tr><td>Bộ nhớ trong</td></tr>
                        

                        
                     </table>
                 </div>
                 <div class="compare-result-info">
                     <!--Hien thi thong tin so sanh san pham-->
                 
    ';
    $i=1;
    foreach($_SESSION['compare'] as $v){
        thong_tin_san_pham_so_sanh($v,$i);
        $i+=1;   
    }
    echo '</div><!--end compare-result-info--><div class="clear"></div>';
}



?>