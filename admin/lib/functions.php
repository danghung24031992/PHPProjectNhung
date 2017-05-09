<?php
function them_danh_muc($tendanhmuc){
    global $wpdb;
    $wpdb->query("INSERT INTO dt_danhmucsp SET tenDanhMuc='$tendanhmuc'");
    return mysql_insert_id();
}
function cap_nhat_danh_muc($madm,$tendm){
    global $wpdb;
    $wpdb->query("UPDATE dt_danhmucsp SET tenDanhMuc='$tendm' WHERE maDanhMuc=$madm");
}
function xoa_danh_muc($madm){
    global $wpdb;
    $wpdb->query("DELETE FROM dt_danhmucsp WHERE maDanhMuc=$madm");
}

function them_loaiSP($loaiSP){
    global $wpdb;
    $wpdb->query("INSERT INTO dt_loaisanpham SET tenLoaiSP='$loaiSP'");
    return mysql_insert_id();
}
function cap_nhat_loaiSP($ma,$ten){
    global $wpdb;
    $wpdb->query("UPDATE dt_loaisanpham SET tenLoaiSP='$ten' WHERE maLoaiSP=$ma");
}
function xoa_loaiSP($ma){
    global $wpdb;
    $wpdb->query("DELETE FROM dt_loaisanpham WHERE maLoaiSP=$ma");
}

function them_san_pham($tensp, $madm, $maloai, $gianhap, $giaban, $soluong, $quaTang,
                                $loaimanhinh,$dophangiai,$kichthuoc,$camung,$hedieuhanh,$kieudang,$trongluong,$baohanh,$ngaySX,$user,
                               $cpu,$ram,$rom,$moi,$giacu){
    global $wpdb;
    $ngaytao=date('Y-m-d');
    
    
    $wpdb->query("INSERT INTO dt_sanpham SET tenSanPham='$tensp', maDM='$madm', maLoai='$maloai', giaNhap='$gianhap', giaBan='$giaban', soLuong='$soluong', quaTang='$quaTang', ngayTao='$ngaytao',
        loaiManHinh='$loaimanhinh', doPhanGiai='$dophangiai', kichThuot='$kichthuoc',
        camUng='$camung', heDieuHanh='$hedieuhanh', kieuDang='$kieudang', trongLuong='$trongluong', baoHanh='$baohanh', ngaySX='$ngaySX', nguoiTao='$user',
        cpu='$cpu', ram='$ram', rom='$rom',moi='$moi',giacu='$giacu'");
    return mysql_insert_id();
}


function upload_hinh_san_pham($input_name,$masp, $kieuanh){
    $name=$_FILES[$input_name]['name'];
    $tmp_name=$_FILES[$input_name]['tmp_name'];
    $path=pathinfo($name);
    $file_type=$path['extension'];
    $name=time().rand().'.'.$file_type;
    move_uploaded_file($tmp_name,"../sanpham/$name");
    global $wpdb;
    $wpdb->query("INSERT INTO dt_hinhanhsp SET maSP=$masp, anh='$name', kieuanh=$kieuanh");
}
function ten_danh_muc_san_pham($madm){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenDanhMuc FROM dt_danhmucsp WHERE maDanhMuc=$madm");
    return $r->tenDanhMuc; 
}
function cap_nhat_san_pham($masp,$tensp, $madm, $maloai, $gianhap, $giaban, $soluong, $quaTang,
                                $loaimanhinh,$dophangiai,$kichthuoc,$camung,$hedieuhanh,$kieudang,$trongluong,$baohanh,$ngaySX,$user,
                                $cpu,$ram,$rom,$moi,$giacu){
    global $wpdb;
    $sql="UPDATE dt_sanpham SET ";
    if($tensp!='')
        $sql.=" tenSanPham='".$tensp."'";
    if($madm!='')
        $sql.=" ,maDM=".$madm;
    if($maloai!='')
        $sql.=" ,maLoai=".$maloai;
    if($gianhap!='')
        $sql.=" ,giaNhap=".$gianhap;
    if($giaban!='')
        $sql.=" ,giaBan=".$giaban;
    if($ngaySX!='')
        $sql.=", ngaySX='".$ngaySX."'";
    if($quaTang!='')
        $sql.=", quaTang='".$quaTang."'";
    $sql.=" , soLuong='$soluong',loaiManHinh='$loaimanhinh',
    doPhanGiai='$dophangiai',kichThuot='$kichthuoc',camUng='$camung',
    heDieuHanh='$hedieuhanh',kieuDang='$kieudang',trongLuong='$trongluong',baoHanh='$baohanh', ngaySX='$ngaySX',
     cpu='$cpu', ram='$ram', rom='$rom',moi='$moi',giacu='$giacu'";
    
    $sql.=" WHERE maSP=$masp";
    
    //echo $sql;die();
    
    $wpdb->query($sql);
    
    return 1;
}
function xoa_san_pham($masp){
    global $wpdb;
    $wpdb->query("DELETE FROM dt_sanpham WHERE maSP=$masp");
}
function to_array($var){
    $v=explode(',',$var);
    $arr=array();
    foreach($v as $vs)
        $arr[]=trim($vs);
    
    return $arr;
}
function edit_hinh_san_pham($masp,$input_name, $kieuanh){
    $name=$_FILES[$input_name]['name'];
    $tmp_name=$_FILES[$input_name]['tmp_name'];
    $path=pathinfo($name);
    $file_type=$path['extension'];
    $name=time().rand().'.'.$file_type;
    move_uploaded_file($tmp_name,"../sanpham/$name");
    global $wpdb;
    $wpdb->query("UPDATE dt_hinhanhsp SET anh='$name' WHERE maSP=$masp AND kieuanh=$kieuanh");
    
}
function kiem_tra_hinh_dai_dien($pid){
    global $wpdb;
    
    $r=$wpdb->get_row("SELECT maSP FROM dt_hinhanhsp WHERE maSP=$pid and kieuanh=1");
    if($r->maSP>0)
        return true;
    return false;
}
function lay_danh_muc_sp(){
    global $wpdb;
    $ds=$wpdb->get_results("SELECT * FROM dt_danhmucsp");
    echo '<option value="">---Chọn---</option>';
    foreach($ds as $s){
        echo '<option value="'.$s->maDanhMuc.'">'.$s->tenDanhMuc.'</option>';
    }
}
function lay_loai_sp(){
    global $wpdb;
    $ds=$wpdb->get_results("SELECT * FROM dt_loaisanpham");
    echo '<option value="">---Chọn---</option>';
    foreach($ds as $s){
        echo '<option value="'.$s->maLoaiSP.'">'.$s->tenLoaiSP.'</option>';
    }
}
function lay_loaisp_by_id($id){
    global $wpdb;
    $ds=$wpdb->get_row("SELECT tenLoaiSP FROM dt_loaisanpham WHERE maLoaiSP=$id");
        
    return $ds->tenLoaiSP;
}
function count_danh_muc_sp(){
    global $wpdb;
    $count_dm=$wpdb->get_row("SELECT COUNT(maDanhMuc) AS count_dm FROM dt_danhmucsp");
    if($count_dm->count_dm)
        return $count_dm->count_dm;
    return 0;
}
function count_loaiSP(){
    global $wpdb;
    $count_dm=$wpdb->get_row("SELECT COUNT(maloaiSP) AS count_dm FROM dt_loaisanpham");
    if($count_dm->count_dm)
        return $count_dm->count_dm;
    return 0;
}

function count_san_pham(){
    global $wpdb;
    $count_sp=$wpdb->get_row("SELECT COUNT(maSP) AS count_sp FROM dt_sanpham");
    if($count_sp->count_sp)
        return $count_sp->count_sp;
    return 0;
}

function tong_tien_don_hang($madh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT sum(soLuong*donGia) as tongtien FROM dt_chitietdonhang WHERE maDonHang=$madh");
    if($r)
        return $r->tongtien;
    return 0;
}
function lay_ten_khach_hang($makh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenKH FROM dt_khachhang WHERE email='$makh'");
    if($r)
        return $r->tenKH;
    return "";
}
//thêm
function lay_ten_khach_hang_all($email){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenKH FROM dt_thanhtoan WHERE email='$email'");
    if($r)
        return $r->tenKH;
    return "";
}
//


function lay_dien_thoai_khach_hang($makh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT dienThoai FROM dt_khachhang WHERE email='$makh'");
    if($r)
        return $r->dienThoai;
    return 0;
}

function kiem_tra_thanh_toan($madh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT trangThai FROM dt_donhang WHERE maDH=$madh");
    if($r->trangThai==1)
        return "Đã thanh toán";
    return "Chưa thanh toán";
}

function xoa_don_hang($madh){
    global $wpdb;
    $wpdb->query("DELETE FROM dt_donhang WHERE maDH=$madh");
    $wpdb->query("DELETE FROM dt_chitietdonhang WHERE maDonHang=$madh");
}

function kiem_tra_gioi_tinh($gt){
    if($gt==0)
        return "Nam";
    return "Nữ";
}
function tong_san_pham_don_hang($madh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT sum(soLuong) as sl FROM dt_chitietdonhang WHERE maDonHang=$madh");
    if($r)
        return $r->sl;
    return 0;
}

function da_thanh_toan($madh){
    global $wpdb;
    $r=$wpdb->get_row("SELECT trangThai FROM dt_donhang WHERE maDH=$madh");

    return $r->trangThai;
}
function count_khach_hang(){
    global $wpdb;
    $r=$wpdb->get_row("SELECT count(email) as c FROM dt_khachhang");
    if($r)
        return $r->c;
    return 0;
}
function count_don_hang(){
    global $wpdb;
    $r=$wpdb->get_row("SELECT count(maDH) as c FROM dt_donhang");
    if($r)
        return $r->c;
    return 0;
}
function count_don_hang_chua_thanh_toan(){
    global $wpdb;
    $r=$wpdb->get_row("SELECT count(maDH) as c FROM dt_donhang WHERE trangThai=0");
    if($r)
        return $r->c;
    return 0;
}
function count_don_hang_da_thanh_toan(){
    global $wpdb;
    $r=$wpdb->get_row("SELECT count(maDH) as c FROM dt_donhang WHERE trangThai=1");
    if($r)
        return $r->c;
    return 0;
}

function don_hang_moi_dat(){
    global $wpdb;
    $dh=$wpdb->get_results("SELECT maDH, maKH, ngayDatHang, trangThai  FROM dt_donhang WHERE trangThai=0 ORDER BY maDH DESC LIMIT 0,5");
        foreach($dh as $d){
            $madh=$d->maDH;
            $makh=$d->maKH;
            $ct=$wpdb->get_row("SELECT sum(soLuong) as soluong  FROM dt_chitietdonhang WHERE maDonHang=$madh");
            
        ?>
        <tr>
            <td style="text-align: center"><?=$d->maDH?></td>
            <td><?=$d->ngayDatHang?></td>
            <td style="text-align: center"><?=$ct->soluong?></td>
            <td><?=number_format(tong_tien_don_hang($madh))?> VNĐ</td>
            <td class="thanh-toan-link"><a href="quanly_chitietdonhang.php?madh=<?=$madh?>">Thanh toán</a></td>
        </tr>
        <?
        }
}

function lay_ten_san_pham($maSP){
    global $wpdb;
    $r=$wpdb->get_row("SELECT tenSanPham FROM dt_sanpham WHERE maSP='$maSP'");
    if($r)
        return $r->tenSanPham;
    return "";
}
//thêm
function dem_so_luong_san_pham_ban($pid){
    global $wpdb;
    $r=$wpdb->get_row("SELECT sum(soLuong) as soLuong FROM dt_chitietdonhang WHERE maSP=$pid");
    return $r->soLuong;
}
?>