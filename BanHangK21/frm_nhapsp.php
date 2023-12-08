<?php
include('./connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frm_nhapspp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Trang nhap san pham</title>
</head>

<body>

    <selection class="portal">
        <form method="POST">
            <div class="title">
                <h2>Thêm Sản Phẩm</h2>
            </div>
            <span></span>
            <!-- <div class="wrapper">
                <input type="text" class="name-input input-number" name="masanpham" required="required" />
                <label class="name-lable">Nhập Mã Sản Phẩm</label>
            </div> -->
            <div class="wrapper">
                <input type="text" class="name-input" name="tensanpham" required="required" />
                <label class="name-lable">Nhập Tên Sản Phẩm</label>
            </div>
            <div class="wrapper">
                <select class="name-input input input-loai" name="loaisanpham">
                    <option value="== Chon loai san pham=="><label class="name-lable">Chọn Loại Sản Phẩm</label></option>
                    <?php
                    $sql = "SELECT * From loaisanpham";
                    $kq = mysqli_query($con, $sql);
                    if (mysqli_num_rows($kq) > 0) {
                        while ($row = mysqli_fetch_array($kq)) {
                            echo "<option value=$row[IDLoai]>$row[TenLoai]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="wrapper">
                <select class="name-input input input-loai" name="hangsanxuat">
                    <option value="== Chon loai san pham=="><label class="name-lable">Chọn Hãng Sản Xuất</label></option>
                    <?php
                        $sql = "SELECT * From hangsx";
                        $kq = mysqli_query($con, $sql);
                        if (mysqli_num_rows($kq) > 0) {
                            while ($row = mysqli_fetch_array($kq)) {
                                echo "<option value=$row[IDHangSX]>$row[TenHang]</option>";
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="wrapper"> 
                <select  class="name-input input input-loai" name="nhacungcap">
                    <option value="== Chon loai san pham=="><label class="name-lable">Chọn Nhà Cung Cấp</label></option>
                    <?php
                        $sql = "SELECT * From nhacungcap";
                        $kq = mysqli_query($con, $sql);
                        if (mysqli_num_rows($kq) > 0) {
                            while ($row = mysqli_fetch_array($kq)) {
                                echo "<option value=$row[IDNhaCungCap]>$row[TenNhaCungCap]</option>";
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="wrapper">
                <input type="file" class="name-input input-image" name="anhminhhoa" required="required" />
                <!-- <label class="name-lable">Chọn Hình Minh Họa</label> -->
            </div>
            <div class="wrapper">
                <input type="text" class="name-input" name="mota" required="required" />
                <label class="name-lable">Mô Tả</label>
            </div>
            <div class="wrapper">
                <input type="text" class="name-input" name="giatien" required="required" />
                <label class="name-lable">Giá Tiền</label>
            </div>
            <button type="submit" class="btn-signin" id="signin" name="bam">Thêm Sản Phẩm</button>
        </form>
    </selection>

<!-- ------------------------------------------------------------------------------ -->

    <?php
    if(isset($_POST['bam'])){
        if($_POST['tensanpham']!=null || $_POST['loaisanpham']!=null || $_POST['hangsanxuat']!=null || $_POST['nhacungcap']!=null || $_POST['anhminhhoa']!=null || $_POST['anhminhhoa']!=null || $_POST['giatien']!=null || $_POST['mota']!=null  ){ 
            $tensp = $_POST['tensanpham'];
            $loaisp = $_POST['loaisanpham'];
            $hangsx=$_POST['hangsanxuat'];
            $nhacc=$_POST['nhacungcap'];
            $hinh=$_POST['anhminhhoa'];
            if($hinh!=''){
                $path='../upload/'.$hinh;
                move_uploaded_file($_POST['anhminhhoa'],$path);
                $path=substr($path,3);  
            }
            $mota=$_POST['mota'];
            $giatien=$_POST['giatien'];
            $sql = "INSERT INTO sanpham ( TenSanPham, IDLoai, IDHangSX, IDNhaCungCap, HinhAnhSanPham, giasp, TrangThai, MoTaSanPham) VALUES ('$tensp','$loaisp','$hangsx','$nhacc','$hinh','$giatien',1,'$mota')";
            if(mysqli_query($con,$sql)== true){
                        ?>
                <script>
                    alert("Bạn vừa cập nhật sản phẩm thành công")
                </script>
                <?php 
                }else{
                    ?>
                <script>
                    alert("Bạn cập nhật sản phẩm thất bại")
                </script>
        <?php 
            }
        }else{
        ?>
        <script>
            alert("Bạn chưa nhập đầu đủ thông tin, bạn cần phải nhập đầy đủ thông tin")
        </script>
   <?php 
        }
}
?>

</body>

</html>