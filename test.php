<!-- <?php
error_reporting(0);
    require_once('lib/wp-db.php');
    require_once('lib/functions.php');
    
    $khach_hang = $wpdb->get_results("SELECT * FROM dt_khachhang");
    foreach($khach_hang as $kh){
        $mk = md5($kh->matKhau);
        $wpdb->query("UPDATE dt_khachhang SET matKhau='$mk' WHERE email='$kh->email'");
        echo $mk;
    }
?> -->