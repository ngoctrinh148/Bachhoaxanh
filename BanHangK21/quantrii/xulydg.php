<?php
    if(isset($_POST['btnCapnhat'])){
        if($_POST['txt_dg']!=null){ 
            $masp=$_POST['txt_masp'];
            $madg=$_POST['txt_dg'];
            $gb=$_POST['txt_gb'];
            $gn=$_POST['txt_gn'];
            $ngay=$_POST['txt_nn'];
            $sql="INSERT INTO dongia(IDDonGia, IDSP, GiaBan, GiaNhap, Ngay, Chon) VALUES ('$madg', '$masp', '$gb', '$gn', '$ngay',1)";
            $sql1="UPDATE sanpham SET GiaBan='$gb' WHERE IDSP='$masp'";
            mysqli_query($con,$sql1);
            if(mysqli_query($con,$sql)== true){
                        ?>
                <script>
                    alert("Bạn vừa cập nhật Đơn giá thành công")
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
