<?php
include 'connect.php';
$sql = 'SELECT * FROM `sanpham`';
$kq = mysqli_query($con,$sql);
if(mysqli_num_rows($kq)>0){
    while($row = mysqli_fetch_array($kq)){
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 mt-2 thesp">
        <div class="card">
        <img class="card-img-top" width="170px" src="./Ảnh Sản Phẩm/<?php echo $row['HinhAnhSanPham']?>" alt="">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['TenSanPham']?></h5>
            <h6 class="card-subtitle mb-1 text-muted"><?php echo $row['MoTaSanPham']."₫"?></h6>
            <div class="buy">
                <a href="#" class="btn btn_mua" width="180px">Mua Ngay</a>
            </div>
        </div>
    </div>
    </div>
    <?php
    }

}
?>