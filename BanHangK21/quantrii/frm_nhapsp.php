<?php 
    include('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Trang nhap san pham</title>
</head>
<body>
    <form method = "post" enctype = "multipath/from_data">
        <table border = "0", align = "center">
            <tr>
                <td colspan='4' align = "center"><h2>Nhap San Pham</h2></td>
            </tr>
            <tr>
                <td></td>
                <td>Nhap Ma San Pham</td>
                <td><input type="text" name = "txt_masp" placeholder="Nhap Ma San Pham"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Nhap San Pham</td>
                <td><input type="text" name = "txt_ten" placeholder="Nhap Ten San Pham"></td>
                <td></td>
            </tr>     
            <tr>
                <td></td>
                <td>Chon Loai</td>
                <td>
                    <select name="loaisp">
                        <option value="== Chon loai san pham==">Chon loai san pham</option>
                        <?php 
                            $sql= "SELECT * From loaisanpham";
                            $kq=mysqli_query($con,$sql);
                            if(mysqli_num_rows($kq)>0){
                                while($row=mysqli_fetch_array($kq)){
                                    echo "<option value=$row[IDLoai]>$row[TenLoai]</option>";
                                }
                            }
                        ?>
                    </select>
                <td>
            </tr>   
            <tr>
                <td></td>
                <td>Chon Hang SX</td>
                <td>
                    <select name="hangsx">
                        <option value="== Chon loai hang san xuat==">Chon loai hang san xuat</option>
                        <?php 
                            $sql= "SELECT * From hangsx";
                            $kq=mysqli_query($con,$sql);
                            if(mysqli_num_rows($kq)>0){
                                while($row=mysqli_fetch_array($kq)){
                                    echo "<option value=$row[IDHangSX]>$row[TenHang]</option>";
                                }
                            }
                        ?>
                    </select>
                <td>
            </tr>   
            <tr>
                <td></td>
                <td>Chon nha cung cap</td>
                <td>
                    <select name="nhacc">
                        <option value="== Chon nha cung cap==">Chon nha cung cap</option>
                        <?php 
                            $sql= "SELECT * From nhacungcap";
                            $kq=mysqli_query($con,$sql);
                            if(mysqli_num_rows($kq)>0){
                                while($row=mysqli_fetch_array($kq)){
                                    echo "<option value=$row[IDNhaCungCap]>$row[TenNhaCungCap]</option>";
                                }
                            }
                        ?>
                            
                    </select>
                <td>
            </tr>   
            <tr>
                <td></td>
                <td>Hinh Dai Dien</td>
                <td><input type="file" name="HinhAnhSanPham"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Mo Ta San Pham</td>
                <td><textarea name="txt_mota"  cols="30" rows="5"></textarea></td>
                <td></td>
            </tr>
            <!-- <tr>
                <td></td>
                <td>Nhap Đơn Giá</td>
                <td><input type="text" name = "txt_DG" placeholder="Nhap Giá San Pham"></td>
                <td></td>
            </tr> -->
            <tr>
                <td colspan="4" align = "center">
                    <input type="submit" value="Cap Nhat" name="btnCapnhat">
                </td>
            </tr>
            <?php
                    include ('./xulidl.php');
                ?>
        </table>
    </form>
</body>
</html>
