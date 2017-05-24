<?php
require('config.php');
require('../Classes/PHPExcel.php');
require_once('../lib/functions.php');
$db = new config();
$day = date('Y-m-d');
$sql = "SELECT maDH, maKH, ngayDatHang, trangThai FROM dt_donhang WHERE ngayDatHang LIKE '".$day."%'";
$data = $db->get_list($sql);

if ($data == 0) {
    echo "Chưa có sản phẩm nào";
} else {
// Bước 3: Khởi tạo đối tượng mới và xử lý
    $PHPExcel = new PHPExcel();

// Bước 4: Chọn sheet - sheet bắt đầu từ 0
    $PHPExcel->setActiveSheetIndex(0);

// Bước 5: Tạo tiêu đề cho sheet hiện tại
    $PHPExcel->getActiveSheet()->setTitle('Product List');

// Bước 6: Tạo tiêu đề cho từng cell excel,
// Các cell của từng row bắt đầu từ A1 B1 C1 ...
    $PHPExcel->getActiveSheet()->setCellValue('A1', 'STT');
    $PHPExcel->getActiveSheet()->setCellValue('B1', 'Mã đơn hàng');
    $PHPExcel->getActiveSheet()->setCellValue('C1', 'Tên khách hàng');
    $PHPExcel->getActiveSheet()->setCellValue('D1', 'Số điện thoại');
    $PHPExcel->getActiveSheet()->setCellValue('E1', 'Ngày đặt hàng');
    $PHPExcel->getActiveSheet()->setCellValue('F1', 'Số sản phẩm');
    $PHPExcel->getActiveSheet()->setCellValue('G1', 'Tổng tiền');
    $PHPExcel->getActiveSheet()->setCellValue('H1', 'Đơn vị');
    $PHPExcel->getActiveSheet()->setCellValue('I1', 'Thanh toán');

// Bước 7: Lặp data và gán vào file
// Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
    $rowNumber = 2;
    $stt = 0;
    foreach ($data as $index) {
        $madh=$index['maDH'];
        $maKH = $index['maKH'];
        $nameKH = "";
        $dienThoaiKH = "";
        $trangThai = "";

        if ($index['trangThai'] == 1) {
            $trangThai = "Đã thanh toán";
        }else{
            $trangThai = "Chưa thanh toán";
        }

         $kh = $db->get_row("SELECT * FROM dt_khachhang WHERE email='$maKH'");
        if($kh){
            $nameKH = $kh['tenKH'];
            $dienThoaiKH = $kh['dienThoai'];
        }
        $ct=$db->get_row("SELECT sum(soLuong) as soluong  FROM dt_chitietdonhang WHERE maDonHang=$madh");
        $qTien=$db->get_row("SELECT sum(soLuong*donGia) as tongtien FROM dt_chitietdonhang WHERE maDonHang=$madh");
        $tt=$db->get_row("SELECT tenKH , dienThoai  FROM dt_thanhtoan WHERE maHoaDon=$madh");
        $stt++;
        // A1, A2, A3, ...
        $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, $stt);

        // B1, B2, B3, ...
        $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $index['maDH']);
        // C1, C2, C3, ...
        $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $tt['tenKH']);
        $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $tt['dienThoai']);
        $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $index['ngayDatHang']);
        $PHPExcel->getActiveSheet()->setCellValue('F' . $rowNumber, $ct['soluong']);
        $PHPExcel->getActiveSheet()->setCellValue('G' . $rowNumber, number_format($qTien['tongtien']));
        $PHPExcel->getActiveSheet()->setCellValue('H' . $rowNumber, 'vnd');
        $PHPExcel->getActiveSheet()->setCellValue('I' . $rowNumber, $trangThai);

        // Tăng row lên để khỏi bị lưu đè
        $rowNumber++;
    }

// Bước 8: Khởi tạo đối tượng Writer
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');

// Bước 9: Trả file về cho client download
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Thong-ke-don-hang-theo-ngay.xls"');
    header('Cache-Control: max-age=0');
    if (isset($objWriter)) {
        $objWriter->save('php://output');
    }
}
?>