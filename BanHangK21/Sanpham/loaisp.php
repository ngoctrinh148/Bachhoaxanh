<?php
include 'connect.php';
$sql = 'SELECT * FROM loaisanpham';
$kq = mysqli_query($con, $sql);
if (mysqli_num_rows($kq) > 0) {
    while ($row = mysqli_fetch_array($kq)) {
?>
        <li><a href="./index.php?loaisp=loai&idloai=<?php echo $row['IDLoai']; ?>"><?php echo $row['TenLoai']; ?></a></li>
<?php
    }
}
?>