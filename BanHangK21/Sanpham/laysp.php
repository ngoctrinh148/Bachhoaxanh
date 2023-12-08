<?php
// Kết nối đến cơ sở dữ liệu
include './connect.php';

// Xác định số sản phẩm trên mỗi trang
$limit = 12;

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính toán vị trí bắt đầu của sản phẩm trong trang
$start = ($current_page - 1) * $limit;

// Truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm
$sql = "SELECT * FROM sanpham LIMIT $limit OFFSET $start";
$kq = mysqli_query($con, $sql);
if (mysqli_num_rows($kq) > 0) {
    while ($row = mysqli_fetch_array($kq)) {
?>
        <a style="color: black; text-decoration: none;" href="index.php?loaisp=info&IDSanPham=<?php echo $row['IDSanPham'] ?>">
            <div class="col-lg-3 col-md-6 col-sm-12 mt-2 thesp">
                <div class="card">
                    <img class="card-img-top" width="150px" src="./Ảnh Sản Phẩm/<?php echo $row['HinhAnhSanPham'] ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['TenSanPham'] ?></h5>
                        <h6 class="card-subtitle mb-1 text-muted"><?php echo number_format($row['giasp'], "0", ",", ".") ?>₫</h6>
                        </a>
                        <div class="buy">
                            <form method="POST" action="index.php?loaisp=buy&IDSanPham=<?php echo $row['IDSanPham'] ?>">
                                <button type="submit" style="margin-left: 40px;" class="btn  btn_mua" name="buy">Mua Ngay </button>
                                <input class="inputnumber" style="height: 30px; width: 35px; float:right; margin-left:20px; margin-top: 3px;" type="number" name="sldat" class="form-control" value="1">
                                <input type="hidden" name="idsp" class="form-control" value="<?php echo $row['IDSanPham'] ?>">
                                <input type="hidden" name="tensp" class="form-control" value="<?php echo $row['TenSanPham'] ?>">
                                <input type="hidden" name="gia" class="form-control" value="<?php echo $row['giasp'] ?>">
                                <input type="hidden" name="anhsp" class="form-control" value="<?php echo $row['HinhAnhSanPham'] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    }
}


// Tính toán số trang và tạo các liên kết phân trang
$sql = "SELECT COUNT(*) as total FROM sanpham";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$total_pages = ceil($total_records / $limit);

if ($total_pages > 1) {
    echo ' <div style="margin-left:200px" class="pagination" > <table class="table" >';
    if ($current_page > 1) {
        echo '<a style="margin-left:50px;"  href="?page='.($current_page - 1).'"> <button> Trang trước </button></a>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo '<button> <span style="margin: auto;" class="current">'.$i.'</span></button>';
        } else {
            echo '<button><a style="margin: auto;"  href="?page='.$i.'">'.$i.'</a></button>';
        }
    }
    if ($current_page < $total_pages) {
        echo '<a style="margin-right: 200px;"  href="?page='.($current_page + 1).'"><button>Trang sau</button></a>';
    }
    echo '</table></div>';
}

?>