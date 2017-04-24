<?php
//các chức năng truy vấn tới cơ sở dữ liệu
error_reporting(0);
ob_start();
session_start();


function lay_danh_muc_sp(){
    global $wpdb;//biến toàn cục có thể được truy cập trong bất kỳ phần chương trình nào
    $ds=$wpdb->get_results("SELECT * FROM dt_danhmucsp");
    echo '<option value="">---Chọn---</option>';
    foreach($ds as $s){
        echo '<option value="'.$s->maDanhMuc.'">'.$s->tenDanhMuc.'</option>';
    }
}
function lay_danh_muc_theo_loai($loai, $selected=null){
    global $wpdb;
    $ds=$wpdb->get_results("SELECT maDanhMuc, tenDanhMuc FROM dt_sanpham, dt_danhmucsp WHERE dt_sanpham.maDM=dt_danhmucsp.maDanhMuc AND dt_sanpham.maLoai='$loai' GROUP BY dt_sanpham.maDM");
    echo '<option value="">---Chọn---</option>';
    foreach($ds as $s){
        $current = ($s->maDanhMuc == $selected)?' selected':'';

        echo '<option value="'.$s->maDanhMuc.'"'.$current.'>'.$s->tenDanhMuc.'</option>';
    }
}

function san_pham_moi1(){
    global $wpdb;
    $new=$wpdb->get_results("SELECT * FROM dt_sanpham ORDER BY ngaySX DESC LIMIT 0,4");//lấy mảnh thông tin sản phẩm có ngày sản xuát gần nhất
    foreach($new as $n){
        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$n->maSP AND kieuanh=1"); //lấy ảnh từ bảng hình ảnh sp 
        if($img->anh!="")
            $anh=$img->anh;
        else $anh="khong_anh.jpg";
    ?>
    
    <div class="shop-item">
        <a href="chi_tiet_san_pham.php?id=<?=$n->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
        <h3><a href="chi_tiet_san_pham.php?id=<?=$n->maSP?>"><?=$n->tenSanPham?></a></h3>
        <span class="price">Giá: <?=number_format($n->gia)?> VNĐ</span>
    </div>
    
    <?}
    echo '<div class="clr"></div>';
}

function lay_ten_danh_muc($id){
    global $wpdb;
    $dm=$wpdb->get_row("SELECT tenDanhMuc FROM dt_danhmucsp WHERE maDanhMuc=$id");
    if($dm)
        return $dm->tenDanhMuc;
    return "";
}    

function danh_sach_san_pham($ac,$loai,$id){
    global $wpdb;
    if($ac=="danhmuc"){
        
        $danhmuc=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE maLoai=$loai AND maDM=$id");
        if(count($danhmuc)){
        ?>
            <div class="title-page-item"><?=lay_ten_loai_sp($loai)?> > <?=lay_ten_danh_muc($id)?></div>
        <?
            foreach($danhmuc as $dm){
                $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$dm->maSP AND kieuanh=1");
                if($img->anh!="")
                    $anh=$img->anh;
                else $anh="khong_anh.jpg";
            ?>
            <div class="shop-item">
                <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
                <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><h3><?=$dm->tenSanPham?></h3></a>
                <span class="price">Giá: <?=number_format($dm->giaBan)?> VNĐ</span>
            </div>    
            
            <?
            }
        }else {
        ?>
            <div class="title-page-item">Không có sản phẩm nào của <?=lay_ten_danh_muc($id)?></div>
        <?
        }
    }else if($ac=="gia"){
        $gia=$id;
        if($gia>10){
            $gia=$gia*1000000;
            $danhmuc=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE maLoai=$loai AND giaBan >$gia ORDER BY giaBan ASC");
            $giatu="trên 10000000";
        }
        else {
            $from=($gia-2)*1000000;
            $to=$gia*1000000;
            $giatu="từ ".$from." đến ".$to;
            $danhmuc=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE maLoai=$loai AND giaBan BETWEEN $from AND $to  ORDER BY giaBan ASC");
            
        }
        if(count($danhmuc)){
        ?>
        <div class="title-page-item">Sản phẩm có giá <?=$giatu?></div>
        <?

            foreach($danhmuc as $dm){
                $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$dm->maSP AND kieuanh=1");
                if($img->anh!="")
                    $anh=$img->anh;
                else $anh="khong_anh.jpg";
            ?>
            <div class="shop-item">
                <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
                <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><h3><?=$dm->tenSanPham?></h3></a>
                <span class="price">Giá: <?=number_format($dm->giaBan)?> VNĐ</span>
            </div>    
            
            <?
            }
        }else{
        ?>
            <div class="title-page-item">Không có sản phẩm nào có giá <?=$giatu?></div>
        <?
        }
    }//end ac=gia
}

function tim_kiem_san_pham($loai, $hang, $tugia, $dengia){
    global $wpdb;
       
        if($hang!="")
            $sql_hang="maDM='$hang'";
        else $sql_hang=1;
        
        /*if($tugia!="" && $dengia!="")
            $sql_gia = " giaBan BETWEEN $tugia AND $dengia";
        else if($tugia=="" && $dengia==""){
            $sql_gia=1;    
        }else{
            if($tugia!= "")
                $sql_gia=" giaBan>=$tugia";
            if($dengia!= "")
                $sql_gia=" giaBan<=$dengia";
        }*/
        
        if(!$tugia && !$dengia){
            $sql_gia=1;
        } else {
            if($dengia > 10000000){
                $sql_gia=" giaBan>10000000";
            } else {
                if($tugia && !$dengia){
                    $sql_gia=" giaBan>=$tugia";
                    
                } else if(!$tugia && $dengia){
                    $sql_gia=" giaBan<=$dengia";
                    
                } else {
                    $sql_gia = " giaBan BETWEEN $tugia AND $dengia";
                }
            }
        }
         
        $sql="SELECT * FROM dt_sanpham WHERE maLoai='$loai' AND $sql_hang AND $sql_gia ORDER BY giaBan";
        //echo $sql;die();
        
        $danhmuc = $wpdb->get_results($sql);
        
        if(count($danhmuc)){
        ?>
           <div class="title-page-item">Thông tin sản phẩm</div>
        <?
            foreach($danhmuc as $dm){
                $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$dm->maSP AND kieuanh=1");
                if($img->anh!="")
                    $anh=$img->anh;
                else $anh="khong_anh.jpg";
            ?>
            <div class="shop-item">
                <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
                <a href="chi_tiet_san_pham.php?id=<?=$dm->maSP?>"><h3><?=$dm->tenSanPham?></h3></a>
                <span class="price">Giá: <?=number_format($dm->giaBan)?> VNĐ</span>
            </div>    
            
            <?
            }
        }else {
        ?>
            <div class="title-page-item">Không có sản phẩm nào</div>
        <?
        }
}

function dem_so_luong_san_pham_ban($pid){
    global $wpdb;
    $r=$wpdb->get_row("SELECT sum(soLuong) as soLuong FROM dt_chitietdonhang WHERE maSP=$pid");
    
    return $r->soLuong;
}

function kiem_tra_so_luong_san_pham($pid){
    global $wpdb;
    $r=$wpdb->get_row("SELECT soLuong FROM dt_sanpham WHERE maSP=$pid");
    if($r->soLuong > 0)
        return true;
    return false;
}

function kiem_tra_so_luong_mua_san_pham($pid, $soluong){
    global $wpdb;
    $r=$wpdb->get_row("SELECT soLuong FROM dt_sanpham WHERE maSP=$pid");
    $so_luong_con = $r->soLuong-dem_so_luong_san_pham_ban($pid);
    if( $so_luong_con >= $soluong)
        return true;
    return false;
}

function thong_tin_san_pham($pid){
    global $wpdb;
    $r=$wpdb->get_row("SELECT * FROM dt_sanpham WHERE maSP=$pid");
    return $r;
}

function tong_san_pham_gio_hang(){
    $sum=0;
    if(count($_SESSION['shoppingcart'])){
        foreach($_SESSION['shoppingcart'] as $c)
            $sum+=$c[1];
    }
    return $sum;
}   

function tinh_tien_gio_hang($pid, $qty){
    global $wpdb;
    $r=$wpdb->get_row("SELECT giaBan FROM dt_sanpham WHERE maSP=$pid");
    return $r->giaBan*$qty;
}

function tong_tien_gio_hang(){
      global $wpdb;
      $tongtien=0;
      if(count($_SESSION['shoppingcart'])){
          foreach($_SESSION['shoppingcart'] as $c){
              $pid=$c[0];
              $qty=$c[1];
              $tongtien+=tinh_tien_gio_hang($pid, $qty);
          }
      }
    return $tongtien; 
}

function chi_tiet_gio_hang($pid, $qty){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenSanPham, giaBan FROM dt_sanpham WHERE maSP=$pid");
    $r1=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$pid AND kieuanh=1");
    ?>
    <tr class="shoppingcart-detail-info">
        <td width="80px" style="text-align: center"><a href="<?=$pid?>"><img src="sanpham/<?=($r1->anh)!=""?"$r1->anh":"khongcoanh.jpg"?>" width="80px" height="" /></a></td>
        <td width="250px"><?=$r->tenSanPham?></td>
        <td width="100px" style="text-align: center"><?=number_format($r->giaBan)?> VNĐ</td>
        <td width="100px" style="text-align: center"><input type="text" name="qty[]" value="<?=$qty?>" onkeypress="return isNumberKey(event)" /></td>
        <td width="100px" style="text-align: center"><?=number_format(tinh_tien_gio_hang($pid, $qty))?> VNĐ</td>
        <td width="70px" style="text-align: center"><a class="del-shoppingcart-item" href="chi_tiet_gio_hang.php?ac=del&pid=<?=$pid?>" >Xóa</a></td>
    </tr>
    <?
}
function chi_tiet_gio_hang_1($pid, $qty){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenSanPham, giaBan FROM dt_sanpham WHERE maSP=$pid");
    ?>
    <tr class="shoppingcart-detail-info">
        <td width="250px"><?=$r->tenSanPham?></td>
        <td width="100px" style="text-align: center"><?=number_format($r->giaBan)?> VNĐ</td>
        <td width="100px" style="text-align: center"><input type="text" name="qty[]" value="<?=$qty?>" readonly="true" /></td>
        <td width="100px" style="text-align: center"><?=number_format(tinh_tien_gio_hang($pid, $qty))?> VNĐ</td>
    </tr>
    <?
}
function cap_nhat_gio_hang($arr_qty){
    $i=0;
    $masp_het_hang = array();
    
    if(count($_SESSION['shoppingcart'])){
        foreach($_SESSION['shoppingcart'] as $c){
            
            if(kiem_tra_so_luong_mua_san_pham($c[0], $arr_qty[$i])){
                $_SESSION['shoppingcart'][$i]=array($c[0],$arr_qty[$i]);    
            } else $masp_het_hang[] = $c[0];
            
            
            $i+=1;
        }
    }
    return $masp_het_hang;
}
function xoa_phan_tu_gio_hang($pid){
    $i=0;
    if(count($_SESSION['shoppingcart'])){
        $arr=$_SESSION['shoppingcart'];
        $length=count($arr);
        foreach($arr as $c){
            if($c[0]==$pid){
                for($j=$i;$j<$length-1;$j++)
                    $arr[$j]=$arr[$j+1];
                for($k=0;$k<$length-1;$k++)//chuyen sang 1 array moi sau khi xoa phan tu
                    $array[$k]=$arr[$k];
                $_SESSION['shoppingcart']=$array;//gan session=array moi 
                return;
            }
            $i+=1;
        }
    }
}

function kiem_tra_gioi_tinh($gt){
    if($gt==0)
        return "Nam";
    return "Nữ";
}
function lay_don_gia($pid){
    if($pid>0){
        global $wpdb;
        $r=$wpdb->get_row("SELECT giaBan FROM dt_sanpham WHERE maSP=$pid");
        return $r->giaBan;
    }
    return 0;
}
function kiem_tra_so_luong_gio_hang(){
    if(count($_SESSION['shoppingcart'])==1){
        foreach($_SESSION['shoppingcart'] as $s)
            if($s[1]==0)
                return 0;
    }
    return 1;
    
}
function dat_hang(){
     if(kiem_tra_so_luong_gio_hang()==1){
        global $wpdb;
        $date=date('Y-m-d');
        $makh=$_SESSION['user'];
        if(count($_SESSION['shoppingcart'])){
            $r=$wpdb->query("INSERT INTO dt_donhang SET maKH='$makh', ngayDatHang='$date', trangThai=0");
            $c=0;
            if($r){
                $maDH=mysql_insert_id();
                foreach($_SESSION['shoppingcart'] as $v){
                    $masp=$v[0];
                    $dongia=lay_don_gia($masp);
                    $soluong=$v[1];
                    $sql="INSERT INTO dt_chitietdonhang SET maDonHang='$maDH', maSP=$masp, donGia=$dongia, soLuong=$soluong";
                    $c+=$wpdb->query($sql);
                }
                return $c;
            }
        }
     }
    return 0;
}

function tao_moi_khach_hang($hoten, $gioitinh, $email, $matkhau, $diachi, $dienthoai){
    global $wpdb;
    $matkhau = md5($matkhau);
    $date=date('Y-m-d');
    $sql="INSERT INTO dt_khachhang SET tenKH='$hoten', gioiTinh='$gioitinh', email='$email', diaChi='$diachi', dienThoai='$dienthoai', matKhau='$matkhau', quyenTruyCap=0, ngayTao='$date'";
    if($wpdb->query($sql))
        return 1;
    return 0;
    
}

function cap_nhat_khach_hang($hoten, $gioitinh, $email, $matkhau, $diachi, $dienthoai){
    global $wpdb;
    
    if($matkhau!=""){
        $matkhau = md5($matkhau);
        $sql="UPDATE dt_khachhang SET tenKH='$hoten', gioiTinh='$gioitinh', email='$email', diaChi='$diachi', dienThoai='$dienthoai', matKhau='$matkhau'";
    }
    else $sql="UPDATE dt_khachhang SET tenKH='$hoten', gioiTinh='$gioitinh', email='$email', diaChi='$diachi', dienThoai='$dienthoai'";
    
    return $wpdb->query($sql);
}

function dang_nhap($uid, $pas){
    global $wpdb;
    $role=-1;           
    $pas = md5($pas);                  
    $r=$wpdb->get_row("SELECT email, matKhau, quyenTruyCap FROM dt_khachhang WHERE email='$uid' AND matKhau='$pas'");
    if($r){
        if($r->quyenTruyCap==1)
            $role=1;
        else 
            $role=0;
    }
    return $role;
}

function login_info_header($uid){
    global $wpdb;
    
    $sql="SELECT tenKH FROM dt_khachhang WHERE email='$uid'";
    $r=$wpdb->get_row($sql);
    if($r)
        return "Xin chào <b>".$r->tenKH."</b> | <a href='thoat.php' class='link-logout'>Thoát</a>";
    return "";
}

function san_pham_moi(){
    global $wpdb;
    $rs=$wpdb->get_results("SELECT maSP, tenSanPham, giaBan FROM dt_sanpham ORDER BY ngaySX DESC LIMIT 0,4");
    foreach ($rs as $r){
        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$r->maSP AND kieuanh=1");
        ($img->anh!="")?$anh=$img->anh:$anh="khong_co_anh.jpg";
    ?>
    <a href="chi_tiet_san_pham.php?id=<?=$r->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
    <div class="product-info">
        <p class="title-product"><?=$r->tenSanPham?></p>
        <p class="price-product"><?=number_format($r->giaBan)?> VNĐ</p>
    </div>
    <div class="clear"></div>
    <div class="hr-sidebar-product">&nbsp;</div>
    <?
    }
}

function san_pham_ban_chay(){
    global $wpdb;
    $rs=$wpdb->get_results("SELECT maSP, SUM(soLuong) FROM dt_chitietdonhang as c, dt_donhang as d WHERE c.maDonHang=d.maDH AND trangThai=1 GROUP BY c.maSP ORDER BY SUM(soLuong) DESC LIMIT 0,4");
    foreach ($rs as $r){
        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$r->maSP AND kieuanh=1");
        ($img->anh!="")?$anh=$img->anh:$anh="khong_co_anh.jpg";
    ?>
    <a href="chi_tiet_san_pham.php?id=<?=$r->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
    <div class="product-info">
        <p class="title-product"><?=lay_ten_san_pham($r->maSP)?></p>
        <p class="price-product"><?=number_format(lay_gia_san_pham($r->maSP))?> VNĐ</p>
    </div>
    <div class="clear"></div>
    <div class="hr-sidebar-product">&nbsp;</div>
    <?
    }
}

function san_pham_theo_cap($from, $to){
    global $wpdb;
    if($to!='')
        $new=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE giaBan >= $from AND giaBan <= $to ORDER BY ngaySX DESC LIMIT 0,6");
    else $new=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE giaBan >= $from ORDER BY ngaySX DESC LIMIT 0,6");
    foreach($new as $n){
        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$n->maSP AND kieuanh=1");
        if($img->anh!="")
            $anh=$img->anh;
        else $anh="khong_anh.jpg";
    ?>
    
    <div class="shop-item">
        <a href="chi_tiet_san_pham.php?id=<?=$n->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
        <h3><a href="chi_tiet_san_pham.php?id=<?=$n->maSP?>"><?=$n->tenSanPham?></a></h3>
        <span class="price">Giá: <?=number_format($n->giaBan)?> VNĐ</span>
    </div>
    
    <?}
    echo '<div class="clr"></div>';
}

function san_pham_so_sanh($loaiID,$catID,$price){
    global $wpdb;
    
    //$price*=1000000;
    
    $sql = "SELECT * FROM dt_sanpham WHERE maLoai='$loaiID' ";
 
    if($catID){
        $sql.=" AND maDM='$catID'";   
    }
    if($price){
        if($price > 10000000)
            $sql.=" AND giaBan > '$price'";
        else $sql.=" AND giaBan <= '$price'";   
    } 
	
    
    $sql.=" ORDER BY ngaySX DESC";
    
    
    $new=$wpdb->get_results($sql);
    
    foreach($new as $n){
        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$n->maSP AND kieuanh=1");
        
        if($img->anh!="")
            $anh=$img->anh;
        else $anh="khong_anh.jpg";
    ?>
    
    <div class="shop-item">
        <a href="chi_tiet_san_pham.php?id=<?=$n->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
        <h3><a href="chi_tiet_san_pham.php?id=<?=$n->maSP?>"><?=$n->tenSanPham?></a></h3>
        <span><a href="#" class="add_to_compare" id="<?=$n->maSP ?>">Thêm vào</a></span>
    </div>
    
    <?}
    echo '<div class="clr"></div>';
}

function san_pham_chon_so_sanh($pid){
    global $wpdb;
    $new=$wpdb->get_row("SELECT * FROM dt_sanpham WHERE maSP=$pid");
    
        $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$new->maSP AND kieuanh=1");
        if($img->anh!="")
            $anh=$img->anh;
        else $anh="khong_anh.jpg";
    ?>
    
    <li>
        <a href="chi_tiet_san_pham.php?id=<?=$new->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
        <h3><a href="chi_tiet_san_pham.php?id=<?=$new->maSP?>"><?=$new->tenSanPham?></a></h3>
    </li>
    
    <?
}

function thong_tin_san_pham_so_sanh($pid,$i){
    global $wpdb;
    $sql="SELECT * FROM dt_sanpham WHERE maSP=$pid";
    $r=$wpdb->get_row($sql);
?>
    <table cellspacing="8" cellpadding="0" border="0" class="tbl-compare-info tbl-compare-info-<?=$i?>">
          <tr><td><?=$r->tenSanPham?>&nbsp;</td></tr>
          <tr><td><?=lay_ten_danh_muc($r->maDM)?>&nbsp;</td></tr>
          <tr><td><?=number_format($r->giaBan)?>&nbsp;VNĐ</td></tr>
          <tr><td><?=$r->baoHanh?>&nbsp;Tháng</td></tr>
          <tr><td><?=$r->loaiManHinh?>&nbsp;</td></tr>
          <tr><td><?=$r->doPhanGiai?>&nbsp;</td></tr>
          <tr><td><?=$r->kichThuot?>&nbsp;</td></tr>
          <tr><td><?=$r->camUng?>&nbsp;</td></tr>
          <tr><td><?=$r->kieuDang?>&nbsp;</td></tr>
          <tr><td><?=$r->trongLuong?>g&nbsp;</td></tr>
          <tr><td><?=$r->cpu?>&nbsp;</td></tr>
          <tr><td><?=$r->ram?>&nbsp;</td></tr>
          <tr><td><?=$r->rom?>&nbsp;</td></tr>
          <tr><td><?=$r->loaimay?></td>&nbsp;</tr>
          <tr><td><?=$r->zoom?>&nbsp;</td></tr>
          <tr><td><?=$r->phangiaicamera?>&nbsp;</td></tr>
          <tr><td><?=$r->cambien?>&nbsp;</td></tr>
          <tr><td><?=$r->donhaysang?>&nbsp;</td></tr>
          <tr><td><?=$r->tieucu?>&nbsp;</td></tr>
          <tr><td><?=$r->khaudo?>&nbsp;</td></tr>
          <tr><td><?=$r->dinhdang?>&nbsp;</td></tr>

     </table>
<?
    
}

function bang_gia(){
    global $wpdb;
    $dm=$wpdb->get_results("SELECT maDanhMuc, tenDanhMuc FROM dt_danhmucsp");
    foreach ($dm as $d){
        $madm=$d->maDanhMuc;
        $rs=$wpdb->get_results("SELECT maDM, tenSanPham, giaBan FROM dt_sanpham WHERE maDM=$madm ORDER BY tenSanPham DESC LIMIT 0,5");
    ?>
        <div class="box-bang-gia">
                <h3><?=$d->tenDanhMuc?></h3>
                <div class="info-bang-gia">
                    
    <?
        foreach($rs as $r){
            ?>
            <div class="bang-gia-item">
                <span class="ten-san-pham"><?=$r->tenSanPham?></span>
                <span class="gia"><?=number_format($r->giaBan)?> VNĐ</span>
            </div>
            <?
        }
        echo "</div>";
        if(count($rs)>=5)
            echo "<a href='#' class='xem-them-bang-gia' id='$madm'>Xem thêm</a>";
        echo "</div>";
    }
}
function bang_gia_danh_muc_sp($madm){
    global $wpdb;
    $rs=$wpdb->get_results("SELECT maDM, tenSanPham, giaBan FROM dt_sanpham WHERE maDM=$madm ORDER BY tenSanPham DESC");
    ?>
        <div class="box-bang-gia1">
            <h3><?=lay_ten_danh_muc($madm)?></h3>
            <div class="info-bang-gia">
        <?
        foreach($rs as $r){
        ?>                

            <div class="bang-gia-item">
                <span class="ten-san-pham"><?=$r->tenSanPham?></span>
                <span class="gia"><?=number_format($r->giaBan)?> VNĐ</span>
            </div>
    <?
        }
    echo "</div></div>";
}
function lay_ten_khach_hang($email){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenKH FROM dt_khachhang WHERE email='$email'");
    if($r)
        return $r->tenKH;
    return "";
}

function lay_dien_thoai_khach_hang($makh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT dienThoai FROM dt_khachhang WHERE maKH='$makh'");
    if($r)
        return $r->dienThoai;
    return 0;
}

function kiem_tra_dang_nhap(){
    if(($_SESSION['user']=="") && ($_SESSION['admin']==""))
        return false;
    return true;
}

function menu_tim_kiem($key){
    global $wpdb;
    $rs=$wpdb->get_results("SELECT * FROM dt_sanpham WHERE tenSanPham LIKE '%$key%' OR tenSanPham LIKE '%$key' OR tenSanPham LIKE '$key%'");
        
        if(count($rs)){
            
            echo "<div class='title-page-item'>Kết quả tìm kiếm cho \"$key\"</div>";
            
            foreach($rs as $r){
                $img=$wpdb->get_row("SELECT anh FROM dt_hinhanhsp WHERE maSP=$r->maSP AND kieuanh=1");
                if($img->anh!="")
                    $anh=$img->anh;
                else $anh="khong_anh.jpg";
            
            ?>
            <div class="shop-item">
                <a href="chi_tiet_san_pham.php?id=<?=$r->maSP?>"><img src="sanpham/<?=$anh?>" /></a>
                <a href="chi_tiet_san_pham.php?id=<?=$r->maSP?>"><h3><?=$r->tenSanPham?></h3></a>
                <span class="price">Giá: <?=number_format($r->giaBan)?> VNĐ</span>
            </div>    
            
        <?
            }

        } else echo '<p style="font-weight: bold;color: #ff0000;">Không tìm thấy kết quả nào cho "'.$key.'"</p>';
}
function lay_ten_san_pham($masp){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenSanPham FROM dt_sanpham WHERE  maSP=$masp");
    if($r) return $r->tenSanPham;
    return "";
}
function lay_gia_san_pham($masp){
    global $wpdb;
    $r=$wpdb->get_row("SELECT giaBan FROM dt_sanpham WHERE  maSP=$masp");
    if($r) return $r->giaBan;
    return 0;
}

function lay_ten_loai_sp($id){
    global $wpdb;
    $ds = $wpdb->get_row("SELECT tenLoaiSP FROM dt_loaisanpham WHERE maLoaiSP='$id'");
        
    return $ds->tenLoaiSP;
}
function tong_tien_don_hang($madh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT sum(soLuong*donGia) as tongtien FROM dt_chitietdonhang WHERE maDonHang=$madh");
    if($r)
        return $r->tongtien;
    return 0;
}

function debugLog($debugStr){
    echo $debugStr; die();
    // echo '<script language="javascript">';
    // echo 'alert(".$debugStr.")';
    // echo '</script>';
}

?>
