<?php
    if(isset($_POST['btnCapnhat'])){
        if($_POST['txt_masp']!=null){ 
            $masp=$_POST['txt_masp'];
            $tensp=$_POST['txt_ten'];
            $loai=$_POST['loaisp'];
            $hangsx=$_POST['hangsx'];
            $nhacc=$_POST['nhacc'];
            $hinh=$_FILES['HinhAnhSanPham']['name'];
            if($hinh!=''){
                $path='../upload/'.$hinh;
                move_uploaded_file($_FILES['HinhAnhSanPham']['name'],$path);
                $path=substr($path,3);
            
        }
            
            $mota=$_POST['txt_mota'];
            $sql="INSERT INTO sanpham(IDSanPham, TenSanPham, IDLoai, IDHangSX, IDNhaCungCap, MoTaSanPham, HinhAnhSanPham, TrangThai) VALUES ('$masp', '$tensp', '$loai', '$hangsx', '$nhacc', '$mota','$hinh' 1)";
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
            alert("Bạn chưa nhập mã sản phẩm, bạn cần phải nhập")
        </script>
   <?php 
        }
}
?>
