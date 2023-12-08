<?php
include('../connect.php');
if (isset($_GET['IDSanPham'])) {
    $idsp = $_GET['IDSanPham'];
    $sql = "SELECT * FROM sanpham WHERE IDSanPham ='$idsp'";
    $kq = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($kq);
}
?>
<div style="display: flex;" class="">
    <div style="width: 450px;" class="card-img">
        <img class="card-img-top" style="width: 350px; height: 350px;" src="./Ảnh Sản Phẩm/<?php echo $row['HinhAnhSanPham'] ?>" alt="">

    </div>
    <div class="card-body">
        <div style="margin-left: 30px;" class="card-info">
            <h5 style="font-weight: bold; font-size: 30px" class="card-title"><?php echo $row['TenSanPham'] ?></h5>
            <h6 style="margin-top: 30px; font-weight: bold; color: red; margin-left: 10px; font-size: 20px;" class="card-subtitle mb-1 text-muted"><?php echo number_format($row['giasp'],"0",",",".") ?>₫</h6>
            <p class="thongtin" style="font-weight: bold; font-size: 16px; margin-top: 40px;">Thông Tin Sản Phẩm</p>
            <p><?php echo $row['MoTaSanPham'] ?></p>
            <div class="buy">
                <form method="POST" action="index.php?loaisp=buy&IDSanPham=<?php echo $row['IDSanPham'] ?> ">
                    <div class="a">
                        <button type="submit" style="margin-left: 40px;" class="btn  btn_mua" name="buy">Mua Ngay </button>
                        <input class="inputnumber" style="height: 30px; width: 35px; float:right; margin-left:20px; margin-top: 60px;" type="number" name="sldat" class="form-control" value="1">
                        <!-- <a href="http://localhost/BanHangK21/index.php?loaisp=buy" class="btn btn_mua" width="180px">Mua Ngay</a> -->
                        <input type="hidden" name="idsp" class="form-control" value="<?php echo $row['IDSanPham'] ?>">
                        <input type="hidden" name="tensp" class="form-control" value="<?php echo $row['TenSanPham'] ?>">
                        <input type="hidden" name="gia" class="form-control" value="<?php echo $row['giasp'] ?>">
                        <input type="hidden" name="anhsp" class="form-control" value="<?php echo $row['HinhAnhSanPham'] ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="content-sanpham">
    <h5 style="font-weight: bold; margin-top: 30px; margin-left: 10px;">Bách Hóa Xanh Cam Kết!</h3>
        <table style="margin-left: 50px; font-weight: 100; color: rgb(16, 162, 91)">
            <tr style="height: 50px; margin-top:20px">
                <th style="width: 10px;"><img src="./Image/khien.png"></th>
                <th style="width: 250px; ">Sản phẩm chất lượng</th>
                <th style="width: 10px;"><img src="./Image/dongho.png"></th>
                <th style="margin-left: 20px;">Giao hàng đúng hẹn</th>
            </tr>
            <tr>
                <th style="width: 10px;"><img src="./Image/hoantien.png"></th>
                <th>Đổi trả, hoàn tiền dễ dàng</th>
                <th style="width: 10px;"><img src="./Image/like.png"></th>
                <th>Thân thiện, vui vẻ</th>
            </tr>
        </table>

</div>
<style>
    .a{
        display: flex;
        height: 50px;
    }
    .btn_mua {
        margin-top: 50px;
        width: 300px;
        height: 50px;
        margin-left: 0px;
        border: 2px solid rgb(1, 136, 70);
        border-radius: 5px;
    }

    .btn_mua:hover {
        background-color: rgb(1, 136, 70);
        transition: all 1s ease;
    }

    .buy-item {
        display: flex;
        /* border: 1px solid rgb(1, 136, 70);
    border-radius: 5px; */
    }

    .buy {
        display: flex;
    }

    .buy>a {
        color: rgb(1, 136, 70);
    }

    .inputnumber {
        top: 20px;
    }

    #content-center h6 {
        color: red;
    }

    .thongtin {
        position: relative;
        margin-left: 10px;
    }

    .thongtin::before {
        content: "";
        position: absolute;
        top: 0;
        left: -10px;
        height: 100%;
        width: 5px;
        background-color: rgb(16, 162, 91);

        margin-bottom: 2px;
    }
</style>