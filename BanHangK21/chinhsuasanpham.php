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
    <title>Chỉnh sửa sản phẩm</title>
</head>

<body>

    <selection class="portal">
        <form method="POST">        
            <?php 
        if(isset($_GET['IDSanPham'])){
        $idsua = $_GET['IDSanPham'];

        $sql = "SELECT * FROM sanpham WHERE IDSanPham ='$idsua'";
        $kq = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($kq);
            ?>
             <div class="title">
                <h2>Chỉnh Sửa Sản Phẩm</h2>
            </div>
            <span></span>
            <!-- <div class="wrapper">
                <input type="text" class="name-input input-number" name="masanpham" required="required" />
                <label class="name-lable">Nhập Mã Sản Phẩm</label>
            </div> -->
            <div class="wrapper">
                <input type="text" class="name-input" name="tensanpham" required="required" value=" <?php echo $row['TenSanPham'] ?>"/>
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
                <input type="text" class="name-input" name="giasp" required="required" />
                <label class="name-lable">Giá Tiền</label>
            </div>
            <button type="submit" class="btn-signin" id="signin" name="bam">Chỉnh Sửa Sản Phẩm</button>
        </form>
    </selection>

<!-- ------------------------------------------------------------------------------ -->

    <?php
    if(isset($_POST['bam'])){
        if($_POST['tensanpham']!=null || $_POST['loaisanpham']!=null || $_POST['hangsanxuat']!=null || $_POST['nhacungcap']!=null || $_POST['anhminhhoa']!=null || $_POST['anhminhhoa']!=null || $_POST['giatien']!=null){ 
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
            $giatien=$_POST['giasp'];
            $sql = "UPDATE `sanpham` SET `TenSanPham`='$tensp',`IDLoai`='$loaisp',`IDHangSX`='$hangsx',`IDNhaCungCap`='$nhacc',`HinhAnhSanPham`='$hinh',`giasp`='$giatien' WHERE IDSanPham = $idsua";
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
    }
?>

</body>

</html>