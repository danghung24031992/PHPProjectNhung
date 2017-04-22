<?php

class danhmuc{
    var $madm;
    var $tendm;
    
    function danhmuc($madm, $tendm){
        $this->madm=$madm;
        $this->tendm=$tendm;   
    }
    function thong_tin_danh_muc($id){
        global $wpdb;
        $wpdb->get_results("SELECT * FROM dt_danhmucsp WHERE maDanhMuc=$id");
            
    }
    function them_danh_muc($tendanhmuc){
        global $wpdb;
        $wpdb->query("INSERT INTO dt_danhmucsp SET tenDanhMuc='$tendanhmuc'");
        return mysql_insert_id();
    }
    
}
if(!isset($danhmuc))
    $danhmuc=new danhmuc($madm,$tendm);




?>