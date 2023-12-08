<h2 style="margin-left: 160px;">Thông Tin Cá Nhân</h2>


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
    <table style="margin-left: 70px; margin-top: 50px;">
        <tr>
            <td style="width: 250px; height: 40px;" ><label style="margin-left: 20px;" >Tên Người Dùng : </label></td>
            <td></td>
            <td><label><?php echo $row['TenKhachHang'] ?></label></td>
            <td></td>    
        <tr>
        <tr>
            <td style="width: 250px; height: 40px;" ><label style="margin-left: 20px;" >Địa Chỉ : </label></td>
            <td></td>
            <td><label><?php echo $row['DiaChi'] ?></label></td>
            <td></td>    
        <tr>
        <tr>
            <td style="width: 250px; height: 40px;" ><label style="margin-left: 20px;" >Số Điện Thoại : </label></td>
            <td></td>
            <td><label><?php echo $row['SoDienThoai'] ?></label></td>
            <td></td>    
        <tr>
        <tr>
            <td style="width: 250px; height: 40px;" ><label style="margin-left: 20px;" >Email : </label></td>
            <td></td>
            <td><label><?php echo $row['Email'] ?></label></td>
            <td></td>    
        <tr>
    </table>
<?php
    $_SESSION['ten'] = $row['TenKhachHang'];
}else{
    ?> 
        <h4 style="text-align: center; padding-top: 40px; margin-left: 30%;">Bạn cần đăng nhập để hiển thị thông tin cá nhân</h4>
    
    <?php
}
?>
