<?php
include 'connect.php';
if (isset($_POST['idsp'])) {
    $idsp = $_POST['idsp'];
    $us = $_SESSION['dt'];
    $sql = "INSERT INTO giohang(`IDGioHang`, `IDSanPham`, `SoDienThoai`) VALUES ('1','$idsp','$us')";
    $kq = mysqli_query($con, $sql);
}

?>
<?php
include 'connect.php';
    if(isset($_POST['tukhoa'])){
        $tukhoa = $_POST['tukhoa'];
    }
?>
    <h3>Từ Khóa Tìm Kiếm : <?php echo $tukhoa ?></h3><?php
$sqql = "SELECT * FROM sanpham  WHERE  TenSanPham LIKE '%".$tukhoa."%' ";
$kq = mysqli_query($con, $sqql);
if (mysqli_num_rows($kq) > 0) {
    while ($row = mysqli_fetch_array($kq)) {
        // Xử lý kết quả tìm kiếm
?>

        <a style="color: black; text-decoration: none;" href="index.php?loaisp=info&IDSanPham=<?php echo $row['IDSanPham'] ?>">
            <div class="col-lg-3 col-md-6 col-sm-12 mt-2 thesp">
                <div class="card">
                    <img class="card-img-top" width="150px" src="./Ảnh Sản Phẩm/<?php echo $row['HinhAnhSanPham'] ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['TenSanPham'] ?></h5>
                        <h6 class="card-subtitle mb-1 text-muted"><?php echo number_format($row['giasp'],"0",",",".") ?>₫</h6>
                        <div class="buy">
                            <form method="POST" action="index.php?loaisp=buy&IDSanPham=<?php echo $row['IDSanPham'] ?>">
                                <button type="submit" style="margin-left: 40px;" class="btn  btn_mua" name="buy">Mua Ngay </button>
                                <input class="inputnumber" style="height: 30px; width: 35px; float:right; margin-left:20px; margin-top: 3px;" type="number" name="sldat" class="form-control" value="1">
                                <!-- <a href="http://localhost/BanHangK21/index.php?loaisp=buy" class="btn btn_mua" width="180px">Mua Ngay</a> -->
                                <input type="hidden" name="idsp" class="form-control" value="<?php echo $row['IDSanPham'] ?>">
                                <input type="hidden" name="tensp" class="form-control" value="<?php echo $row['TenSanPham'] ?>">
                                <input type="hidden" name="gia" class="form-control" value="<?php echo $row['giasp'] ?>">
                                <input type="hidden" name="anhsp" class="form-control" value="<?php echo $row['HinhAnhSanPham'] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </a>
<?php
    }
}
?>