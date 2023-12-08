<?php
include './connect.php';
if ($action = "insert") {
    $phuongthuc = $_POST['phuongthuc'];
    // $ngay = new DateTime(); // Lấy thời gian hiện tại
    // $ngay = $ngay->format('Y-m-d H:i:s');
    $sdt = $_SESSION['login']['dt'];
    $tenkh = $_POST['TenKhachHang'];
    $diachi = $_POST['DiaChi'];
    $email = $_POST['Email'];
    $pt = $_POST['phuongthuc'];

    $sql1 = "INSERT INTO hoadonban(SoDienThoai, NgayBan, NoiDung, PhuongThuc, TrangThai) VALUES ('$sdt', Now(),'Khách đặt hàng','$pt','Chờ xác nhận')";
    mysqli_query($con, $sql1);

    $sql2 = "UPDATE taikhoan SET TenKhachHang = '$tenkh', DiaChi = '$diachi', Email = '$email' WHERE SoDienThoai = '$sdt'";
    mysqli_query($con, $sql2);

    $sql_idhd = "SELECT IDHoaDon FROM `hoadonban` ORDER BY NgayBan DESC LIMIT 1;";
    $row_id = mysqli_query($con, $sql_idhd);
    $idhd = mysqli_fetch_array($row_id)['IDHoaDon'];

    foreach ($_SESSION['cart'] as $id => $value) {
        $sldat = $value['sldat'];
        $gia = $value['gia'];

        $sql3 = "INSERT INTO cthoadon(IDHoaDon,IDSanPham, SoLuong, GiaBan) VALUES ('$idhd','$id','$sldat','$gia')";
        mysqli_query($con, $sql3);
    }
    unset($_SESSION['cart']);
    unset($_SESSION['tongsp']);
    echo "
        <script language='javascript'>
            alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
            window.open('index.php','_self',3);
        </script>";
}
