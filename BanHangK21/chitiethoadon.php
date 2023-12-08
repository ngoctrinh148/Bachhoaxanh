<?php
include('connect.php');

if (isset($_GET['IDHoaDon'])) {
    $id = $_GET['IDHoaDon'];
    $sql = "SELECT * FROM hoadonban h, taikhoan t  where h.SoDienThoai = t.SoDienThoai AND h.IDHoaDon = '$id'";
    $kq = mysqli_query($con, $sql);
    if (mysqli_num_rows($kq) > 0) {
        $row1 = mysqli_fetch_array($kq);
?>
        <div class="quanlysp">
            <h3 style="font-weight: bold; text-align: center; margin-top: 30px">CHI TIẾT ĐƠN HÀNG</h3>
            <p style="margin-left: 38%; margin-top: 50px;"><?php echo "Tên khách hàng: " . $row1['TenKhachHang'];
                                                            echo "</br>"; ?></p>
            <p style="margin-left: 27%;"><?php echo "Địa chỉ: " . $row1['DiaChi'] . " ";
                                            echo "</br>"; ?></p>
            <p style="margin-left: 40%;"><?php echo "Điện thoại: 0" . $row1['SoDienThoai'];
                                            echo "</br>"; ?></p>
            <p style="margin-left: 38%;"><?php echo "Ngày đặt hàng: " . $row1['NgayBan'];
                                            echo "</br>"; ?></p>
            <p style="margin-left: 33%;"><?php echo "Phương thức thanh toán: " . $row1['PhuongThuc']; ?></p>

        </div>
        <table class="table table-bordered p-3">
            <thead>
                <tr style="background-color: #726364;">
                    <td style="text-align: center; font-weight: bold;">STT</td>
                    <td style="text-align: center; font-weight: bold;">Mã HD</td>
                    <td style="text-align: center;font-weight: bold;">Tên sản phẩm</td>
                    <td style="text-align: center;font-weight: bold;">Số Lượng</td>
                    <td style="text-align: center;font-weight: bold;">Giá</td>
                </tr>
            </thead>
            <tbody id="datarow">
                <?php
                $sql = ("SELECT * FROM cthoadon c, sanpham s where c.IDSanPham = s.IDSanPham AND IDHoaDon = $id;");
                $kq = mysqli_query($con, $sql);
                $tong = 0;
                if (mysqli_num_rows($kq) > 0) {
                    $stt = 0;
                    while ($item = mysqli_fetch_array($kq)) {
                ?>
                        <tr>
                            <td style="text-align: center;"><?php echo ($stt + 1) ?></td>
                            <td style="text-align: center;"><?php echo $item['IDHoaDon'] ?></td>
                            <td style="text-align: center;"><?php echo $item['TenSanPham']; ?></td>
                            <td style="text-align: center;"><?php echo $item['SoLuong']; ?></td>
                            <td style="text-align: center;"><?php echo number_format($item['GiaBan']); ?>. VND</td>
                        </tr>
                <?php
                        $stt++;
                        $tt = $item['SoLuong'] * $item['GiaBan'];
                        $tong += $tt;
                    }
                }
                ?>
                <tr style="background-color: #8c9089;">
                    <td colspan=5 style="text-align: center; ">Tổng tiền (chưa bao gồm thuế VAT): <?php echo number_format($tong) ?>. VND</td>
                </tr>
            </tbody>
        </table>
        <div>
            <?php
            $sql = "SELECT * FROM hoadonban  where IDHoaDon = $id";
            $kq = mysqli_query($con, $sql);
            $itemhd = mysqli_fetch_array($kq);
            $trangthai_DH = $itemhd['TrangThai'];
            ?>

            <form method="POST" enctype="multipart/form-data">
                <p style="display: block; float:right; margin-top:10px; padding-right:30px;">Trạng thái:
                    <?php
                    $sqlhd = "SELECT * FROM hoadonban WHERE IDHoaDon ='$id'";
                    $kqhd = mysqli_query($con, $sqlhd);
                    $row_hd = mysqli_fetch_array($kqhd);
                    $trangthai_DH = $row_hd['TrangThai'];
                    ?>
                    <select name="trangthai">
                        <option value="">--Chọn trạng thái--</option>
                        <option value="Hủy đơn" <?php if ($trangthai_DH == 'Hủy đơn') echo 'selected';  ?>>Hủy đơn</option>
                        <option value="Đã xác nhận" <?php if ($trangthai_DH == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                        <option value="Chờ lấy hàng" <?php if ($trangthai_DH == 'Chờ lấy hàng') echo 'selected';  ?>>Chờ lấy hàng</option>
                        <option value="Đang giao hàng" <?php if ($trangthai_DH == 'Đang giao hàng') echo 'selected'; ?>>Đang giao hàng</option>
                        <option value="Đã giao hàng" <?php if ($trangthai_DH == 'Đã giao hàng') echo 'selected'; ?>>Đã giao hàng</option>
                        <option value="Đã thanh toán" <?php if ($trangthai_DH == 'Đã thanh toán') echo 'selected'; ?>>Đã thanh toán</option>
                    </select>
                </p>

                <!-- <button type="submit" name="xacnhan" style=" display: flex;">Xác nhận</button> -->
                <button type="submit" class="btn-signin" style="color: red; margin-left: 100px; height:40px; width: 200px;" name="xacnhan">Xác nhận</button>
            </form>
            <p style="float:right; margin-top:10px; margin-left: 30px; text-decoration: none;"><a href="./inhoadon.php?admin=inHD&IDHoaDon=<?php echo $id ?>" target="_blank">In hoá đơn</a></p>
            <?php
            ?>
        </div>


<?php
    }
}
if (isset($_POST['xacnhan'])) {
    $trangthaisp = $_POST['trangthai'];
    if ($trangthaisp == '') {
        echo "<script language='javascript'>
                            alert('Xác nhận thất bại, bạn cần chọn lại');
                        </script>";
    } else {
        $sql_hd = ("UPDATE `hoadonban` SET `TrangThai`='$trangthaisp' WHERE IDHoadon = $id");
        if (mysqli_query($con, $sql_hd)) {
            echo "<script language='javascript'>
                            alert('Xác nhận thành công');
                            window.location.href='./indexadmin.php?admin=donhang&IDHoaDon=$id';
                        </script>";
        } else {
            echo "<script language='javascript'>
                            alert('Xác nhận thất bại');
                        </script>";
        }
    }
}
?>