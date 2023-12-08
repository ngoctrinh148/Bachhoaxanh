<?php
include("./connect.php");
if (isset($_GET["loaisp"])) {
    if ($_GET["loaisp"] == "buy") {
        $idsp = $_GET['IDSanPham'];
            $tensp = $_POST['tensp'];
            $anhsp = $_POST['anhsp'];
            $sldat = $_POST['sldat'];
            $gia = $_POST['gia'];
            if (isset($_SESSION['cart'][$idsp])) {
                if ($sldat <= 0) {
                    echo '<script> alert("Số lượng mua phải lớn hơn 0!")</script>';
                } else {
                    $_SESSION['cart'][$idsp]['sldat'] += $sldat;
                    ?><meta http-equiv="refresh" content="0;url=index.php?loaisp=view"><?php
                }
            } else {
                if ($sldat <= 0) {
                    echo '<script> alert("Số lượng mua phải lớn hơn 0!")</script>';
                } else {
                    $_SESSION['cart'][$idsp] = array(
                        "sldat" => $sldat,
                        "gia" => $gia,
                        "tensp" => $tensp,
                        "id" => $idsp
                    );
                    ?><meta http-equiv="refresh" content="0;url=index.php?loaisp=view"><?php
                }
            }
    }
    if ($_GET["loaisp"] == "delete") {
        $idsp = $_GET["IDSanPham"];
        unset($_SESSION['cart'][$idsp]);
        unset($_SESSION['tongsp']);
        echo '<script>window.location.href="index.php?loaisp=view"</script>';
    }
    if ($_GET["loaisp"] == "update") {
        $sl = $_POST['sl'];
        $idsp = $_GET["idsp"];
        echo '<script> alert("Update mã sản phẩm ' . $idsp . ' Số lương ' . $sldat . ' !")</script>';
        echo '<script>window.location.href="index.php?loaisp=view_cart"</script>';
    }
}
