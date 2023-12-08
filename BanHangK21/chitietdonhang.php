<h1>Quản lý đơn hàng</h1>
<table class="table table-boder" cellpadding="2" cellspacing="2" style="margin:auto">
    <thead>
        <tr>
            <th >STT</th>
            <th >Mã ĐH</th>
            <th >Tên Khách Hàng</th>
            <th >Điện Thoại</th>
            <th >Email</th>
            <th >Trang Thái</th>
            <th >Chi Tiết</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('connect.php');
        $sql = 'SELECT * from hoadonban';
        $kq = mysqli_query($con, $sql);

        $sql1 = "SELECT * FROM hoadonban a , taikhoan b Where a.SoDienThoai = b.SoDienThoai";
        $result = mysqli_query($con, $sql1);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sdt = $row['SoDienThoai'];
                $tenKhachHang = $row['TenKhachHang'];
                $email = $row['Email'];
            
            }
        }
        if (mysqli_num_rows($kq)) {
            $i = 0;
            while ($row = mysqli_fetch_array($kq)) {
               
                $i++;
        ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row['IDHoaDon']; ?></td>
                    <td><?php echo  $tenKhachHang ?></td>
                    <td><?php echo $sdt ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $row['TrangThai']; ?></td>
                    <td><a href="?admin=hoadon&IDHoaDon=<?php echo $row['IDHoaDon']; ?>">Chi tiết</a></td>
                </tr>

        <?php
            }
        }

        ?>


    </tbody>
</table>