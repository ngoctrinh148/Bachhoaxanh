<?php 
    if(isset($_GET['IDSanPham'])){
        $idxoa = $_GET['IDSanPham'];
        $sql = "DELETE FROM sanpham WHERE IDSanPham = $idxoa";

        if (mysqli_query($con, $sql) == true) {
            echo "<script language='javascript'>
                            alert('Xóa thành công');
                            window.location.href='./indexadmin.php?admin=danhmuc;
                        </script>";
        }
    }
?>