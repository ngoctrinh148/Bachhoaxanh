<?php
include '../connect.php';

$id = $_GET['IDHoaDon'];

$sql = "DELETE FROM hoadonban WHERE IDHoaDon = $id";
if (mysqli_query($con, $sql)) {
    echo "
    <script language='javascript'>
        alert('Đơn hàng đã bị xóa!!');
        window.open('../indexadmin.php?admin=donhang','_self',3);
    </script>";
} else {
    echo "Lỗi khi xóa phần tử: " . mysqli_error($con);
}
