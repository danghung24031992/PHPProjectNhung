<?php
    error_reporting(0);
    ob_start();
    session_start();
    
    if(!isset($_SESSION['admin'])) header("location: ../dang_nhap.php");
    
    $user = $_SESSION['admin'];
    
    require_once('../lib/wp-db.php');
    require_once('lib/functions.php');
    
    
    require_once('header.php');
?>

<?
    ($_GET['masp'])?$masp=$_GET['masp']:$masp='';
    ($_GET['ac'])?$ac=$_GET['ac']:$ac='';
    
    $mssg='';
    $msg=array(1=>'Message: Thêm sản phẩm thành công',
                2=>'Error: Thêm sản phẩm không thành công',
                3=>'Cập nhật sản phẩm thành công',
                4=>'Cập nhật sản phẩm không thành công',
                5=>'Xóa sản phẩm thành công'
               );
    
    if($_POST){
        $tensp=$_POST['tensp'];
        $madm=$_POST['madm'];
        $maloai = $_POST['maloai'];
        $gianhap=$_POST['gianhap'];
        $giaban=$_POST['giaban'];
        $soluong=$_POST['soluong'];
        $tinhnang=$_POST['tinhnang'];
        $ngaySX=$_POST['ngaysx'];
        
        $loaimanhinh=$_POST['loaimanhinh'];
        $dophangiai=$_POST['dophangiai'];
        $kichthuoc=$_POST['kichthuoc'];
        $camung=$_POST['camung'];
        $hedieuhanh=$_POST['hedieuhanh'];
        $kieudang=$_POST['kieudang'];
        $trongluong=$_POST['trongluong'];
        $baohanh=$_POST['baohanh'];
        
        
        $cpu=$_POST['cpu'];
        $ram=$_POST['ram'];
        $rom=$_POST['rom'];
        $moi=$_POST['moi'];
        $giacu=$_POST['giacu'];
      
        //echo $cpu.'---'.$hedieuhanh;
        
        
        if($ac=='new'){
            $masp=them_san_pham($tensp, $madm, $maloai, $gianhap, $giaban, $soluong, $tinhnang,
                                $loaimanhinh,$dophangiai,$kichthuoc,$camung,$hedieuhanh,$kieudang,$trongluong,$baohanh,$ngaySX,$user,
                                $cpu,$ram,$rom,$moi,$giacu);

            ($masp>0)?$mssg=$msg[1]:$mssg=$msg[2];
            if($_FILES['anh']['name']!=''){
                upload_hinh_san_pham('anh',$masp,1);
            }
            if($_FILES['anh1']['name']!=''){
                upload_hinh_san_pham('anh1',$masp,0);
            }
            if($_FILES['anh2']['name']!=''){
                upload_hinh_san_pham('anh2',$masp,0);
            }

        } else if($ac=='edit' && $masp!=''){
               
                if(cap_nhat_san_pham($masp,$tensp, $madm, $maloai, $gianhap, $giaban, $soluong, $tinhnang,
                                $loaimanhinh,$dophangiai,$kichthuoc,$camung,$hedieuhanh,$kieudang,$trongluong,$baohanh,$ngaySX,$user,
                                $cpu,$ram,$rom,$moi,$giacu)){
                    $mssg=$msg[3];
                } else $mssg=$msg[4];
                
                if($_FILES['anh']['name']!=''){
                    if(kiem_tra_hinh_dai_dien($masp)==true)
                        edit_hinh_san_pham($masp,'anh',1);
                    else upload_hinh_san_pham('anh',$masp,1);
                }
                if($_FILES['anh1']['name']!=''){
                    upload_hinh_san_pham('anh1',$masp,0);
                }
                if($_FILES['anh2']['name']!=''){
                    upload_hinh_san_pham('anh2',$masp,0);
                }
        }
    }
    
    
    if($ac=='del' && $masp!=''){
        xoa_san_pham($masp);
        $mssg=$msg[5];
        $ac='';
    }


?>

<div id="content">
    <div class="main-page">
        <div id="manager" >
            <div class="h1">QUẢN LÝ SẢN PHẨM </div>
            <div class="h2" style="color: red; font-size: 13px">
                Ngày <?echo date('d-m-Y')?>, <cite> CÔNG TY CỔ PHẦN THẾ GIỚI SỐ<br />
                 </cite>
            </div>
            <div class="tab-manag">
                    <a href="quanly_sanpham.php?ac=new" <?=($ac=="new")?"class='selected'":"" ?>>THÊM MỚI</a>
                    <a href="quanly_sanpham.php" <?=($ac==""||$ac=='edit')?"class='selected'":"" ?>>CẬP NHẬT</a>
            </div>
            <div class="create-cat">
                <div class="content-manag">
                    <div class="msg"><?=$mssg?></div>
                    <div id="manager-sp">
                    <form name="create_sp" enctype="multipart/form-data" method="POST" id="create-sp" action="quanly_sanpham.php?ac=new" style="display:<?=($ac=='new')?'block':'none'?>">

                        <label>Loại sản phẩm</label>
                        <select name="maloai">
                            <option value="">---Chọn---</option>
                            <?
                            $loai=$wpdb->get_results('SELECT * FROM dt_loaisanpham');
                            foreach($loai as $l){
                            ?>
                            <option value="<?=$l->maLoaiSP?>"><?=$l->tenLoaiSP?></option>
                            <?}?>
                        </select><div class="clr"></div>
                        
                        <label>Tên sản phẩm <font class="validate">*</font></label>
                        <input type="text" name="tensp" class="txtbox-1" style="width: 250px" /><div class="clr"></div>
                        
                        <label>Hãng sản xuất</label>
                        <select name="madm">
                            <option value="">---Chọn---</option>
                            <?
                            $hang=$wpdb->get_results('SELECT maDanhMuc, tenDanhMuc FROM dt_danhmucsp');
                            foreach($hang as $h){
                            ?>
                            <option value="<?=$h->maDanhMuc?>"><?=$h->tenDanhMuc?></option>
                            <?}?>
                        </select><div class="clr"></div>
                        
                        <label>Giá nhập(VND)</label>
                        <input type="text" name="gianhap" style="width: 173px;" /><div class="clr"></div>
                         
                         <label>Giá Cũ-chưa khuyến mại(VND)</label>
                        <input type="text" name="giacu" style="width: 173px;" /><div class="clr"></div>

                        <label>Giá bán(VND)</label>
                        <input type="text" name="giaban" style="width: 173px;" /><div class="clr"></div>
                        
                        <label>Số lượng</label>
                        <input type="text" name="soluong" style="width: 173px;" /><div class="clr"></div>

                        <label>Ảnh minh họa</label>
                        <input type="file" name="anh" /><div class="clr"></div>
                        
                        <label>Ảnh sản phẩm 1</label>
                        <input type="file" name="anh1" /><div class="clr"></div>
                        
                        <label>Ảnh sản phẩm 2</label>
                        <input type="file" name="anh2" /><div class="clr"></div>
                        
                        <div id="trip">
                            <label>Ngày sản xuất</label>
                            <input type="text" id="leavedate" name="ngaysx" value="From: yy/mm/dd" title="From: yy/mm/dd"/><div class="clr"></div>
                        </div>
                        
                        <h3>Các tính năng chung</h3>
                        <div class="tinhnang">
                            
                            <div class="tinhnang-item">
                                <h4>* Màn hình hiển thị</h4>
                                
                                <label>Loại</label>
                                <input type="text" name="loaimanhinh" /><div class="clr"></div>
                                
                                <label>Độ phân giải</label>
                                <input type="text" name="dophangiai" /><div class="clr"></div>
                                
                                <label>Kích thước</label>
                                <input type="text" name="kichthuoc" /><div class="clr"></div>
                                
                                <label>Cảm ứng</label>
                                <input type="radio" name="camung" value="Có" />Có
                                <input type="radio" name="camung" value="Không" />Không<div class="clr"></div>
                            </div>
                            
                            <div class="tinhnang-item">
                                <h4>* Thông tin chung</h4>
                                
                                <label>Kiểu dáng</label>
                                <select name="kieudang">
                                    <option value="">---Chọn---</option>
                                    <option value="Thanh (Thẳng)">Thanh (Thẳng)</option>
                                    <option value="Xoay">Xoay</option>
                                    <option value="Trượt">Trượt</option>
                                    <option value="Bật nắp">Bật nắp</option>
                                </select><div class="clr"></div>
                                
                                <label>Trọng lượng (g)</label>
                                <input type="text" name="trongluong" /><div class="clr"></div>
                                
                                <label>Mới(Cũ)</label>
                                <select name="moi">
                                   
                                    <option value="0">Mới</option>
                                    <option value="1">Cũ</option>
                                   
                                </select><div class="clr"></div>
                                <label>Bảo hành(Tháng)</label>
                                <select name="baohanh">
                                    <option value="">---Chọn---</option>
                                    <option value="3">3 Tháng</option>
                                    <option value="6">6 Tháng</option>
                                    <option value="9">9 Tháng</option>
                                    <option value="12">12 Tháng</option>
                                    <option value="18">18 Tháng</option>
                                    <option value="24">24 Tháng</option>
                                    <option value="18">36 Tháng</option>
                                </select><div class="clr"></div>
                                  <label>Hệ điều hành:</label>
                                    <input type="text" name="hedieuhanh" /><div class="clr"></div>
                                    
                                    <label>CPU</label>
                                    <input type="text" name="cpu" /><div class="clr"></div>
                                    
                                    <label>RAM</label>
                                    <input type="text" name="ram" /><div class="clr"></div>
                                    
                                    <label>Bộ nhớ trong</label>
                                    <input type="text" name="rom" /><div class="clr"></div>
                                    

                            </div>
                            <div class="clr"></div>
                            
                        </div>
                        
                        
                        
                                    
                                  
                      
                        
                        
                        <h3>Tính năng thêm</h3>
                        <label>Thông tin thêm</label>
                        <textarea name="tinhnang" rows="7" cols="50"></textarea><div class="clr"></div>
                       
                        <input type="submit" value="Thêm sản phẩm" class="btn_submit" />
                    </form>
                    <form name="edit-sp" enctype="multipart/form-data" method="POST" id="edit-sp" style="display:<?=($ac=='edit')?'block':'none'?>">
                        <?
                        $r=$wpdb->get_row("SELECT * FROM dt_sanpham WHERE maSP=$masp");
                        
                        ?>
                        
                        <label>Loại sản phẩm</label>
                        <select name="maloai">
                            <option value="">---Chọn---</option>
                            <?
                            $loai=$wpdb->get_results('SELECT * FROM dt_loaisanpham');
                            foreach($loai as $l){
                            ?>
                            <option value="<?=$l->maLoaiSP?>" <?=($l->maLoaiSP==$r->maLoai)?'selected="selected"':''?>><?=$l->tenLoaiSP?></option>
                            <?}?>
                        </select><div class="clr"></div>
                        
                        <label>Tên sản phẩm <font class="validate">*</font></label>
                        <input type="text" name="tensp" class="txtbox-1" style="width: 250px" value="<?=$r->tenSanPham?>" /><div class="clr"></div>
                        
                        
                        
                        <label>Hãng sản xuất</label>
                        <select name="madm">
                            <option value="">---Chọn---</option>
                            <?
                            $hang=$wpdb->get_results('SELECT maDanhMuc, tenDanhMuc FROM dt_danhmucsp');
                            foreach($hang as $h){
                            ?>
                            <option value="<?=$h->maDanhMuc?>" <?=($h->maDanhMuc==$r->maDM)?'selected="selected"':''?>><?=$h->tenDanhMuc?></option>
                            <?}?>
                        </select><div class="clr"></div>
                        
                        
                        <label>Giá nhập(VND)</label>
                        <input type="text" name="gianhap" value="<?=$r->giaNhap?>" style="width: 173px;" /><div class="clr"></div>

                        <label>Giá cũ-chưa khuyến mại(VND)</label>
                        <input type="text" name="giacu" value="<?=$r->giacu?>" style="width: 173px;" /><div class="clr"></div>

                        
                        <label>Giá bán(VND)</label>
                        <input type="text" name="giaban" value="<?=$r->giaBan?>" style="width: 173px;" /><div class="clr"></div>
                        
                        <label>Số lượng</label>
                        <input type="text" name="soluong" value="<?=$r->soLuong?>" style="width: 173px;" /><div class="clr"></div>

                        <label>Ảnh minh họa</label>
                        <input type="file" name="anh" /><div class="clr"></div>
                        
                        <label>Ảnh sản phẩm 1</label>
                        <input type="file" name="anh1" /><div class="clr"></div>
                        
                        <label>Ảnh sản phẩm 2</label>
                        <input type="file" name="anh2" /><div class="clr"></div>
                        
                        <div id="trip">
                            <label>Ngày sản xuất</label>
                            <input type="text" id="leavedate" name="ngaysx" value="<?=$r->ngaySX?>" title="From: yy/mm/dd"/><div class="clr"></div>
                        </div>
                        
                        <h3>Các tính năng của máy</h3>
                        <div class="tinhnang">

                            <div class="tinhnang-item">
                                <h4>* Màn hình hiển thị</h4>
                                
                                <label>Loại</label>
                                <input type="text" name="loaimanhinh" value="<?=$r->loaiManHinh?>" /><div class="clr"></div>
                                
                                <label>Độ phân giải</label>
                                <input type="text" name="dophangiai" value="<?=$r->doPhanGiai?>" /><div class="clr"></div>
                                
                                <label>Kích thước</label>
                                <input type="text" name="kichthuoc" value="<?=$r->kichThuot?>" /><div class="clr"></div>
                                
                                <label>Cảm ứng</label>
                                <input type="radio" name="camung" value="Có" <?=($r->camUng=="Có")?'checked=""':''?> />Có
                                <input type="radio" name="camung" value="Không" <?=($r->camUng=="Không")?'checked=""':''?> />Không<div class="clr"></div>
                            </div>
                            
                            <div class="tinhnang-item">
                                <h4>* Thông tin chung</h4>
                                
                                
                                <label>Kiểu dáng</label>
                                <select name="kieudang">
                                    <option value="">---Chọn---</option>
                                    <option value="Xoay" <?=($r->kieuDang=="Xoay")?'selected=""':''?>>Xoay</option>
                                    <option value="Trượt" <?=($r->kieuDang=="Trượt")?'selected=""':''?>>Trượt</option>
                                    <option value="Thanh (Thẳng)" <?=($r->kieuDang=="Thanh (Thẳng)")?'selected=""':''?>>Thanh (Thẳng)</option>
                                    <option value="Bật nắp" <?=($r->kieuDang=="Bật nắp")?'selected=""':''?>>Bật nắp</option>
                                </select><div class="clr"></div>
                                
                                <label>Trọng lượng (g)</label>
                                <input type="text" name="trongluong" value="<?=$r->trongLuong?>" /><div class="clr"></div>
                                  <label>Mới(Cũ)</label>
                                <select name="moi">
                                    <option value="0" <?=($r->moi=="0")?'selected=""':''?>>Mới</option>
                                    <option value="1" <?=($r->moi=="1")?'selected=""':''?>>Cũ</option>
                                     </select><div class="clr"></div>
                                
                                <label>Bảo hành(Tháng)</label>
                                <select name="baohanh">
                                    <option value="">---Chọn---</option>
                                    <option value="3" <?=($r->baoHanh=="3")?'selected=""':''?>>3 Tháng</option>
                                    <option value="6" <?=($r->baoHanh=="6")?'selected=""':''?>>6 Tháng</option>
                                    <option value="9" <?=($r->baoHanh=="9")?'selected=""':''?>>9 Tháng</option>
                                    <option value="12" <?=($r->baoHanh=="12")?'selected=""':''?>>12 Tháng</option>
                                    <option value="18" <?=($r->baoHanh=="18")?'selected=""':''?>>18 Tháng</option>
                                    <option value="24" <?=($r->baoHanh=="24")?'selected=""':''?>>24 Tháng</option>
                                    <option value="36" <?=($r->baoHanh=="36")?'selected=""':''?>>36 Tháng</option>
                                </select><div class="clr"></div>
                                <label>Hệ điều hành:</label>
                                    <input type="text" name="hedieuhanh" value="<?=$r->heDieuHanh?>" /><div class="clr"></div>
                                    
                                    <label>CPU</label>
                                    <input type="text" name="cpu" value="<?=$r->cpu?>" /><div class="clr"></div>
                                    
                                    <label>RAM</label>
                                    <input type="text" name="ram" value="<?=$r->ram?>" /><div class="clr"></div>
                                    
                                    <label>Bộ nhớ trong</label>
                                    <input type="text" name="rom" value="<?=$r->rom?>" /><div class="clr"></div>
                                  
                            </div>
                            <div class="clr"></div>
                           
                        
                                    
                                    
                                    
                                
                        
                        
                        
                        <h3>Tính năng thêm</h3>
                        <label>Thông tin thêm</label>
                        <textarea name="tinhnang" rows="7" cols="50"><?=$r->tinhNang?></textarea><div class="clr"></div>
                           
                            
                        </div>
                        <input type="submit" value="Cập nhật sản phẩm" class="btn_submit" />
                    </form>
                    </div>
                </div>
                
                <div class="manager-box" style="display: <?=($ac=='')?'block':'none'?>" >
                    
                    <table>
                        <tr><td class="count-table">CÓ <font color="#B00000"><?=count_san_pham()?></font> SẢN PHẨM</td></tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" border="0" width="90%" class="manager-info">
                        <tr>
                            <th>TT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hãng sản xuất</th>
                            <th>Giá nhập</th>
                            <th>Giá bán</th>
                            <th>Giá Chưa KM</th>
                            <th>Số Lượng</th>
                           
                            <th>Sửa</th>
                            <th>Xóa</th>                        
                        </tr>
                        <?
                        $row=$wpdb->get_results("SELECT * FROM dt_sanpham");
                        $count=0;
                        foreach($row as $r){
                            $count+=1;
                        ?>
                        <tr style="background-color:  <?=($count%2==0)?'#EEEEEE':''?>;">
                            <td class="manager-id-field"><?=$count?></td>
                            <td><?=$r->tenSanPham?></td>
                            <td><?=ten_danh_muc_san_pham($r->maDM)?></td>
                            <td><?=number_format($r->giaNhap)?> VNĐ</td>
                            <td><?=number_format($r->giaBan)?> VNĐ</td>
                            <td><?=number_format($r->giacu)?> VNĐ</td>
                            <td><?=$r->soLuong?></td>
                            <td class="manager-edit-field"><a href="quanly_sanpham.php?ac=edit&masp=<?=$r->maSP?>"><img src="images/edit.png" /></a></td>
                            <td class="manager-edit-field"><a href="quanly_sanpham.php?ac=del&masp=<?=$r->maSP?>" class="manag-del"><img src="images/delete.png" /></a></td>
                        </tr>
                        <?}?>
                    </table>
                </div>
                    
            </div><!--end .create-cat-->
            
        
        
        
        </div><!--end #manag-danhmuc-->
    </div>
</div><!--end #content-->

<?require_once('footer.php')?>