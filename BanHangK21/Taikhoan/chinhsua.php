<h1 style="text-align: center; margin-left: 60px; padding-bottom: 25px;">Thay Đổi Thông Tin Cá Nhân</h1>



<?php
if (isset($_SESSION['login']['dt'])) {
?>
    <?php
    include './connect.php';
    if (isset($_SESSION['login']['dt'])) {
        $sdt = $_SESSION['login']['dt'];
        $sql = "SELECT * FROM taikhoan WHERE SoDienThoai ='$sdt'";
        $kq = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($kq);
    }

    ?>
    <form method="POST">
        <div class="form-group" style="margin-top:20px">
            <label class="col-lg-4">Tên Người Dùng : </label>
            <div class="col-lg-6">
                <input style="text-align: center;" class="form-control" type="text" name="kh" value="<?php echo $row['TenKhachHang'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4" style="margin-top:20px">Địa Chỉ : </label>
            <div class="col-lg-6" style="margin-top:20px">
                <input style="text-align: center;" class="form-control" name="dc" type="text" value="<?php echo $row['DiaChi'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4" style="margin-top:20px">Số Điện Thoại : </label>
            <div class="col-lg-6" style="margin-top:20px">
                <input style="text-align: center;" class="form-control" type="text" name="dt" value="<?php echo $row['SoDienThoai'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4" style="margin-top:20px">Email : </label>
            <div class="col-lg-6" style="margin-top:20px">
                <input style="text-align: center;" class="form-control" type="text" name="em" value="<?php echo $row['Email'] ?>">
            </div>
        </div>

        <button class="btn btn-primary" style="width: 100px;margin-left: 230px;margin-top: 20px;" name="chinhsua">Chỉnh Sửa</button>

        <?php
        if (isset($_POST['chinhsua'])) {
            $sdt = $_SESSION['login']['dt'];
            $tenkh = $_POST['kh'];
            $diachi = $_POST['dc'];
            $email = $_POST['em'];
            $sql1 = "UPDATE taikhoan SET TenKhachHang='$tenkh',DiaChi='$diachi',Email='$email' WHERE SoDienThoai='$sdt'";
            $_SESSION['ten'] = $tenkh;
            print_r($_SESSION['ten']);
            if ($tenkh == "") {
                unset($_SESSION['ten']);
            }
            $kq = mysqli_query($con, $sql1);
        ?>
            <script>
                alert('Chỉnh sửa thành công')
            </script>
            <meta http-equiv="refresh" content="0;url=index.php?loaisp=profile&profile=thongtin">
        <?php
        }
        ?>
    </form>
<?php
} else {
?>
    <h4 style="text-align: center; padding-top: 40px; margin-left: 20%">Bạn cần đăng nhập để hiển thị thông tin cá nhân</h4>

<?php
}
?>