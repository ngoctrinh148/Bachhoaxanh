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
    <title>Trang Đơn Giá SP</title>
</head>
<body>
    <form method = "post" enctype = "multipath/from_data">
        <table border = "0", align = "center">
            <tr>
                <td colspan='4' align = "center"><h2>Đơn Giá</h2></td>
            </tr>
            <tr>
                <td></td>
                <td>Nhap Ma San Pham</td>
                <td>
                <select name="txt_masp">
                        <option value="== Chon ma san pham ==">Chon ma san pham</option>
                        <?php 
                            $sql= "SELECT * From sanpham";
                            $kq=mysqli_query($con,$sql);
                            if(mysqli_num_rows($kq)>0){
                                while($row=mysqli_fetch_array($kq)){
                                    echo "<option value=$row[IDSanPham]>$row[IDSanPham]</option>";
                                }
                            }
                        ?>
                            
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Nhap Ma Đơn Giá</td>
                <td><input type="text" name = "txt_dg" placeholder="Nhap Ten San Pham"></td>
                <td></td>
            </tr>
            <tr>     
                <td></td>
                <td>Nhap Giá Bán</td>
                <td><input type="text" name = "txt_gb" placeholder="Nhap Giá San Pham"></td>
                <td></td>
            </tr>
            <tr>     
                <td></td>
                <td>Nhap Giá Nhập</td>
                <td><input type="text" name = "txt_gn" placeholder="Nhap Giá San Pham"></td>
                <td></td>
            </tr>
            <tr>     
                <td></td>
                <td>Nhap Ngày Nhập</td>
                <td><input type="date" name = "txt_nn" placeholder="Nhap Giá San Pham"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" align = "center">
                    <input type="submit" value="Cap Nhat" name="btnCapnhat">
                </td>
            </tr>
            <?php
                    include ('./xulydg.php');
                ?>
        </table>
    </form>
</body>
</html>
