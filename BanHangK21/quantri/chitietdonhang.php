<h1>Quản lý đơn hàng</h1>
<table class="table table-border" cellpadding="2" cellspacing="2" style="margin:auto">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã ĐH</th>
            <th>Tên Khách Hàng</th>
            <th>Điện Thoại</th>
            <th>Email</th>
            <th>Trang Thái</th>
            <th>Chi Tiết</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('./connect.php');
        $sql = 'SELECT * from hoadonban';
        $kq = mysqli_query($con, $sql);

        $i = 0;
        if (mysqli_num_rows($kq) > 0) {
            while ($row = mysqli_fetch_assoc($kq)) {
                $idHoaDon = $row['IDHoaDon'];
                $sdt = $row['SoDienThoai'];
                $trangThai = $row['TrangThai'];
                $i++;

                $sql1 = "SELECT * FROM taikhoan WHERE SoDienThoai = '$sdt'";
                $result = mysqli_query($con, $sql1);

                if (mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);
                    $tenKhachHang = $data['TenKhachHang'];
                    $email = $data['Email'];
                } else {
                    $tenKhachHang = '';
                    $email = '';
                }
        ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $idHoaDon; ?></td>
                    <td><?php echo $tenKhachHang; ?></td>
                    <td><?php echo $sdt; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $trangThai; ?></td>
                    <td><a href="?admin=hoadon&IDHoaDon=<?php echo $idHoaDon; ?>">Chi tiết</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>