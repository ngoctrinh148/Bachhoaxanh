<?php
include './connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Quản lý đơn hàng</title>
</head>

<body>
    <h1 style="text-align:center">Quản Lý Đơn Hàng</h1>
    <form method="post" enctype="multipath/from_data">
        <table class="table table-boder" cellpadding="2" cellspacing="2" style="margin:auto">
            <tr>
                <th>STT</th>
                <th>Điện Thoại</th>
                <th>Tên Khách Hàng</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Chi Tiết</th>
            </tr>
            <?php
            $sql = "SELECT * FROM hoadonban";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
            ?>
                    <tr>
                        <td><?php echo $row['IDHoaDon'] ?></td>
                        <td><?php echo $row['SoDienThoai'] ?></td>
                        <td><?php echo $row['TenKhachHang'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td>Xác Nhận</td>
                        <td><a href="./index.php?admin=ctdh&idkh=<?php echo $row['IDKH']; ?>" style="text-decoration: none;">Chi tiết</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </form>
</body>

</html>