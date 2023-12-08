<h1 style="text-align: center; margin-left: 150px; padding-bottom: 35px;">Thay Đổi Mật Khẩu</h1>


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
            <label class="col-lg-5">Mật Khẩu Cũ : </label>
            <div class="col-lg-7">
                <input style="text-align: center;" class="form-control" type="password" name="mkc" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-5" style="margin-top:20px">Mật Khẩu Mới : </label>
            <div class="col-lg-7" style="margin-top:20px">
                <input style="text-align: center;" class="form-control" name="mkm" type="password" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-5" style="margin-top:20px">Nhập Lại Mật Khẩu : </label>
            <div class="col-lg-7" style="margin-top:20px">
                <input style="text-align: center;" class="form-control" type="password" name="nlmk" value="">
            </div>
        </div>


        <button class="btn btn-primary" style="width: 100px;margin-left: 200px;margin-top: 20px;" name="thaydoi">Thay Đổi</button>

        <?php
        if (isset($_POST['thaydoi'])) {
            $sdt = $_SESSION['login']['dt'];
            $mkc = $_POST['mkc'];
            $mkm = $_POST['mkm'];
            $nlmk = $_POST['nlmk'];
            if ($mkc == $row['Password1']) {
                if ($mkm == $nlmk) {
                    $sql1 = "UPDATE taikhoan SET Password1='$mkm' WHERE SoDienThoai='$sdt'";
                    $kq = mysqli_query($con, $sql1);
        ?>
                    <script>
                        alert('Chỉnh sửa thành công')
                    </script>
                    <meta http-equiv="refresh" content="0;url=index.php?loaisp=profile&profile=thongtin">
                <?php
                } else {
                ?>
                    <script>
                        alert('Mật khẩu nhập lại không trùng khớp')
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert('Bạn nhập sai mật khẩu')
                </script>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </form>

<?php
} else {
?>
    <h4 style="text-align: center; padding-top: 40px; margin-left: 30%;">Bạn cần đăng nhập để hiển thị thông tin cá nhân</h4>

<?php
}
?>