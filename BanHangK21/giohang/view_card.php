<meta charset="utf-8" />
<h2 style="text-align: center;">Chi Tiết Giỏ Hàng</h2>

<?php
if (isset($_SESSION['login']['dt'])) {
    ?>
    <div class="table-responsive">
    <table class="table table-bordered" border="1px" style="border-collapse:collapse; border-color: green">
        <tr style="font-weight:bold; background-color: green">
            <th style="text-align: center;" width="30%">Tên sản phẩm</th>
            <th style="text-align: center;" width="17%">Số lượng</th>
            <th style="text-align: center;" width="17%">Giá</th>
            <th style="text-align: center;" width="15%">Tổng tiền</th>
            <th style="text-align: center;" width="25%">Action</th>
        </tr>
        <?php
        include './connect.php';
        $total = 0;
        $tongsp = 0;
        if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {
            foreach ($_SESSION["cart"] as $idsp) {
        ?>
                <tr>
                    <td style="text-align: center;">
                        <ul><?php echo $idsp["tensp"]; ?></ul>
                    </td>
                    <form method="post">
                        <td style="text-align: center;">
                            <input type="number" name="sldat" value="<?php echo $idsp["sldat"]; ?>" style="width: 40px;border-style: none;text-align: center;">
                        </td>
                    </form>
                    <td style="text-align: center;">
                        <?php echo number_format($idsp["gia"], 0) . " ₫"; ?>
                    </td>
                    <td style="text-align: center;">
                        <?php echo number_format($idsp["sldat"] * $idsp["gia"]) . " ₫"; ?>
                    </td>

                    <td style="text-align: center;">
                        <a href="index.php?loaisp=delete&IDSanPham=<?php echo $idsp["id"]; ?>"><button class="btn btn-primary" style="width: 100px;background-image: linear-gradient(90deg, #EEEEEE, #FF0000);color: black;width: 100px; margin-bottom: 5px;">Xóa</button></a>
                        <!-- <a href="index.php?loaisp=update&IDSanPham=<?php echo $idsp["id"]; ?>"><button class="btn btn-primary" style="width: 100px;background-image: linear-gradient(90deg, #CCFFFF, #CC99FF);color: black;">Cập nhật</button></a> -->
                    </td>
                </tr>
            <?php
                $total = $total + ($idsp["sldat"] * $idsp["gia"]);
                $tongsp = $tongsp + $idsp["sldat"];
                $_SESSION['tongsp'] = $tongsp;
            }
            ?>
            <tr>
                <td align="center" colspan="1" style="font-weight: bold;padding-right: 5px;">Tổng cộng</td>
                <td align="center" colspan="2" style="font-weight: bold;padding-right: 5px;"><?php echo number_format($tongsp); ?></td>
                <td></td>
                <td align="center" colspan="2" style="font-weight: bold;padding-right: 5px;"><?php echo number_format($total) . " ₫"; ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center;">
                    <a href="index.php"><button style="width: 100px;margin-top: 5px;margin-bottom: 5px;background-image: linear-gradient(90deg, #EEEEEE, #FF0000);color: black;width: 100px;margin-top: 5px;" class="btn btn-primary">Mua tiếp</button></a>
                    <a href="index.php?loaisp=thanhtoan"><button style="width: 100px;margin-top: 5px;margin-bottom: 5px;background-image: linear-gradient(90deg, #CCFFFF, #CC99FF);color: black;" class="btn btn-primary">Thanh toán</button></a>
                </td>
            </tr>
        <?php
        } else {
           ?> <p style="margin-bottom: 10px; margin-left: 30px"> <?php echo "Giỏ hàng không có sản phẩm nào"; ?> </p> <?php
        }

        ?>
    </table>
</div>
<?php
} else {
?>
    <h4 style="text-align: center; padding-top: 40px;">Bạn cần đăng nhập để hiển thị thông tin cá nhân</h4>

<?php
}
?>


