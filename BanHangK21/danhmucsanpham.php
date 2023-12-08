<?php
include('./connect.php');
?>
<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">


</head>

<body>
    <?php  // Số sản phẩm trên một trang
    $limit = 12;

    // Trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tổng số sản phẩm
    $sql_tong = "SELECT COUNT(*) as tong FROM sanpham";
    $kq_tong = mysqli_query($con, $sql_tong);
    $row_tong = mysqli_fetch_assoc($kq_tong);
    $total_records = $row_tong['tong'];

    // Tổng số trang
    $total_pages = ceil($total_records / $limit);

    // Vị trí bắt đầu của sản phẩm trong trang
    $start = ($current_page - 1) * $limit; ?>

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4 ">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>


            <h1 style="padding-bottom: 30px; margin-top: -30px;" class="text-center">Danh Mục Sản phẩm</h1>

            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color: #726364;">
                                <th>STT</th>
                                <th style="text-align: center;">Ảnh đại diện</th>
                                <th style="text-align: center;">Tên sản phẩm</th>
                                <th style="text-align: center;">Giá</th>
                                <th style="text-align: center;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <?php



                            $sql = "SELECT * FROM sanpham LIMIT $limit OFFSET $start";
                            $kq = mysqli_query($con, $sql);
                            if (mysqli_num_rows($kq) > 0) {
                                $stt = 0;
                                while ($item = mysqli_fetch_array($kq)) {
                            ?>
                                    <tr>
                                        <td style="text-align: center;vertical-align: middle;"><?php echo ($stt + 1) ?></td>
                                        <td style="text-align: center;">
                                            <img src="./Ảnh Sản Phẩm/<?php echo $item['HinhAnhSanPham'] ?>" style="height:150px;" alt="">
                                        </td>
                                        <td style="text-align: center;vertical-align: middle;"><?php echo $item['TenSanPham']; ?></td>
                                        <td style="text-align: center;vertical-align: middle;" class="text-right"><?php echo number_format($item['giasp'], "0", ",", ".") ?>₫</td>
                                        <td style="text-align: center;vertical-align: middle;">
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                            <a href="?admin=chitiet&IDSanPham=<?php echo $item['IDSanPham']; ?>" name="dathang" data-sp-ma="2" class="btn btn-primary btn-delete-sanpham" style="width: 80px; margin: 10px;">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Chi tiết
                                                <a href="?admin=sua&IDSanPham=<?php echo $item['IDSanPham']; ?>" data-sp-ma="2" class="btn btn-warning btn-delete-sanpham" style="width: 100px; margin: 10px;">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Chỉnh sửa
                                                </a>
                                                <a href="?admin=xoa&IDSanPham=<?php echo $item['IDSanPham']; ?>" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham" style="width: 80px; margin: 10px;">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                                </a>

                                        </td>
                                    </tr>
                                <?php
                                    $stt++;
                                }
                            }
                           
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                     // Tạo link phân trang
                     if ($total_pages > 1) {
                        ?> <nav style="margin-left: 150px;" aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php if ($current_page > 1) { ?>
                                    <li class="page-item"><a class="page-link" href="./indexadmin.php?admin=danhmuc&page=<?php echo $current_page - 1; ?>">Trang trước</a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <?php if ($i == $current_page) { ?>
                                        <li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
                                    <?php } else { ?>
                                        <li class="page-item"><a class="page-link" href="./indexadmin.php?admin=danhmuc&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($current_page < $total_pages) { ?>
                                    <li class="page-item"><a class="page-link" href="./indexadmin.php?admin=danhmuc&page=<?php echo $current_page + 1; ?>">Trang sau</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    <?php
                    } else {
                        echo "Đang cập nhật dữ liệu";
                    }
                ?>
            </div>
        </div>

        <!-- End block content -->
    </main>




</body>

</html>
<?php

?>