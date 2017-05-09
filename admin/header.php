<?php
    error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> <!-- chứa các thẻ SEO -->
	<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
	<meta name="author" content="nhung" />
    
	<title>admin</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" /> <!-- trang canonical là trang bạn thích nhất trong số các trang có nội dung gần giống nhau. nếu bạn có 2 hoặc nhiều trang có nội dung tương tự nhau thì việc thiết lập canonical sẽ giúp bạn tránh được nội dung trùng lập -->
    <link href="css/css.css" rel="stylesheet"/>
    <link href="js/jquery-ui-1.8.9.custom.css" rel="stylesheet"/>
    
      <script language="javascript" type="text/javascript" src="js/jquery.js"></script>
      <script language="javascript" type="text/javascript" src="js/functions.js"></script>
      <script language="javascript" src="js/jquery-ui-1.8.9.custom.min.js" type="text/javascript"></script>
      <script language="javascript">
        
        $(document).ready(function() { /*Phương thức ready(fn) trong jQuery sẽ Bind một hàm để được thực thi bất cứ khi nào DOM sẵn sàng để được thao tác*/
        	$('#trip input#leavedate, #trip input#returndate').datepicker({ dateFormat: 'yy-m-d', showOn: 'button', buttonImage: 'images/calendar_icon.jpg', buttonImageOnly: true });  /*datepicker ( dùng để hiện bảng chọn ngày tháng với nhiều tùy chọn khá thú vị)*/
        });
        
      </script>
      <style>
            #trip fieldset { border-width: 1px; width: 470px; } /*Tag <fieldset> được dùng để nhóm các thành phần bên trong <form> một cách hợp lý.
Tag <fieldset> tạo đường bao ngoài bao quanh các thành phần trong <form>.*/
            #trip .fields { padding: 25px; margin-bottom: 20px; }
            
            #trip label { float: left; width: 128px; }
            #trip input {float: left;height: 20px;width: 110px }
            #trip .ui-datepicker-trigger { float: left;margin-top: 5px;}
      </style>
</head>

<body>
    <div id="container">
        <div id="top">
            <div class="main">
            
                <a href="index.php" style="font-size: 26px; margin-left: 300px"> QUẢN TRỊ WEBSITE </a>
            </div>
        </div>
        <div id="nav">
            <div class="main">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li><span>|</span>
                    <li><a href="quanly_loaisp.php">Loại sản phẩm</a></li><span>|</span>
                    <li><a href="quanly_danhmucsp.php">Danh mục sản phẩm</a></li><span>|</span>
                    <li><a href="quanly_sanpham.php">Sản phẩm</a></li><span>|</span>
                    <li><a href="quanly_donhang.php">Đơn hàng</a></li><span>|</span>
                    <li><a href="quanly_lienhe.php">Câu hỏi liên hệ</a></li><span>|</span>
                    <li><a href="quanly_binhluan.php">Bình luận</a></li><span>|</span>
                    <li><a href="quanly_khachhang.php">Khách hàng</a></li><span>|</span>
                    <li><a href="../thoat.php">Thoát</a></li>
                </ul>
            </div>
        </div>