<?php
include('./connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frm_nhapsp.css">
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
                <select class="name-input input input-loai" name="nhacungcap">
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
    if (isset($_POST['bam'])) {
        if ($_POST['tensanpham'] != null || $_POST['loaisanpham'] != null || $_POST['hangsanxuat'] != null || $_POST['nhacungcap'] != null || $_POST['anhminhhoa'] != null || $_POST['anhminhhoa'] != null || $_POST['giatien'] != null || $_POST['mota'] != null) {
            $tensp = $_POST['tensanpham'];
            $loaisp = $_POST['loaisanpham'];
            $hangsx = $_POST['hangsanxuat'];
            $nhacc = $_POST['nhacungcap'];
            $hinh = $_POST['anhminhhoa'];
            if ($hinh != '') {
                $path = '../upload/' . $hinh;
                move_uploaded_file($_POST['anhminhhoa'], $path);
                $path = substr($path, 3);
            }
            $mota = $_POST['mota'];
            $giatien = $_POST['giatien'];
            $sql = "INSERT INTO sanpham ( TenSanPham, IDLoai, IDHangSX, IDNhaCungCap, HinhAnhSanPham, giasp, TrangThai, MoTaSanPham) VALUES ('$tensp','$loaisp','$hangsx','$nhacc','$hinh','$giatien',1,'$mota')";
            if (mysqli_query($con, $sql) == true) {
    ?>
                <script>
                    alert("Bạn vừa cập nhật sản phẩm thành công")
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Bạn cập nhật sản phẩm thất bại")
                </script>
            <?php
            }
        } else {
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
<!-- ----------------------------------------------------------------- -->
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    background: #fafafa;
}
.portal{
    display: flex;
    justify-content: center;
    min-height: 100vh;
}
.portal form{
    background: #f8f9fa;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    width: min(100%, 470px);
    padding: 70px;
    display: grid;
    /* gap: 1rem; */
    margin-top:  0px; 
    border-radius: 10px ;
}
.title h2{
    font-size: 1.7rem;
    position: relative;
    padding-left: 25px;
    font-weight: bold;
}

.title p{
    color: #6c757d;
    font-size: 0.8rem;
}
.title h2::before{
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background:#0d6efd;
    left: 0;
    top: 9px;
    border-radius: 50%;
}

input, button{
    font: inherit;
    border:  2px solid transparent;
    outline:  2px solid transparent;
    border-radius: 5px;
}
.input-loai{
    border: none;
}

span{
    color: #6c757d;
    display: flex;
}
span::before, span::after{
    content: "";
    width: 100%;
    height: 1px;
    background-color: #6c757d;
    margin: auto;
}
.input-field input{
    background-color: #eeeeee;
    padding: 23px, 15px, 7px;
    width: 100%;
    height: 40px;
}
.input-field{
    position: relative;
}
.input-field label{
    /* color: var(--secondary); */
    position: absolute;
    color: #6c757d;
    left: 25px;
    top: 8px;
    transition: 0.4s all;
    padding-inline: .25rem;
    background-color: transparent;
    transform: 3s ease;
}
.input-name:focus~.label-name,
.input-name:valid~.label-name{
    top: -.5rem;
    left: .5rem;
    background-color: #fff;
    font-size: 1rem;
}
#forgot-pass{
    text-decoration: none;
    color: #0d6efd;
    font-size: .9rem;
    text-align: end;
}
.btn-signin{
    background-color: #0d6efd;
    border-radius: 5px;
    color: #fff;
    font-weight: 400;
}
/* ---------------------------------- */
.wrapper{
    position: relative;
}
.name-input{
    padding: 0.6rem 1.2rem;
    color: #444;
    font-size: 1rem;
    background-color: #eeeeee;
    padding: 23px, 15px, 7px;
    width: 100%;
    height: 40px;
}
.name-lable{
    position: absolute;
    font-size: 1rem;
    transition: .4s all;
    padding-inline: .25rem;

    position: absolute;
    color: #6c757d;
    left: 25px;
    top: 8px;
    padding-inline: .25rem;   
    background-color: transparent;
    transform: 3s ease;
}
.name-input:focus~.name-lable,
.name-input:valid~.name-lable{
    top: -.5rem;
    left: .5rem;
    font-size: .8rem;
}


</style>