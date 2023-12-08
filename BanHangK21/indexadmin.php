<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="indexadmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <title>Quản Lý</title>
</head>

<body>
    <div class="main">
        <div class=" header-trangchu">
            <div class="logo-trangchu">
                <li><a href="./index.php"><img src="./Image/logobhx.png" style="width: 150px;"></a></li>
            </div>
            <!------------------------------------------------->
            <div class="hehe">
                <nav>
                    <img src="Image/user (1).png" class="user-pic" onclick="toggleMenu()">
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="Image/user (1).png">
                                <h3><?php
                                    if (isset($_SESSION['login']['dt'])) {
                                        echo 'Xin Chào ', $_SESSION['login']['dt'];
                                    } else {
                                        echo '-----';
                                    }
                                    ?></h3>
                            </div>
                            <hr>
                            <a href="http://localhost/BanHangK21/index.php" class="sub-menu-link">
                                <img src="Image/user (2).png">
                                <p>Trang Bán Hàng</p>
                                <span><img src="Image/angle-small-right.png"></span>
                            </a>
                            <?php

                            if (isset($_SESSION['login']['dt'])) {
                            ?>
                                <a href="/BanHangK21/Taikhoan/Login.php" class="sub-menu-link">
                                    <img src="Image/logout (1).png">
                                    <p>Logout</p>
                                    <span><img src="Image/angle-small-right.png"> <a href=""></a> </span>
                                    <?php
                                    unset($_SESSION['login']['dt']);
                                    ?>
                                </a>
                            <?php
                            } else {
                            ?>
                                <a href="/BanHangK21/Taikhoan/Login.php" class="sub-menu-link">
                                    <img src="Image/logout (1).png">
                                    <p>Login</p>
                                    <span><img src="Image/angle-small-right.png"> <a href=""></a> </span>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            </div>
            </nav>
        </div>
        <!------------------------------------------------->

    </div>
    <div class="content-center">
        <div style="top: 100px;" class="row content-menu">
            <div style="width: 25%;" class="content-left">
                <ul>
                    <li><a href="?admin=sanpham">Thêm Sản Phẩm</a></li>
                    <li><a href="?admin=loai">Thêm Loại Sản Phẩm</a></li>
                    <li><a href="?admin=hang">Thêm Hãng Sản Xuất</a></li>
                    <li><a href="?admin=nhacc">Thêm Nhà Cung Cấp</a></li>
                    <li><a href="?admin=danhmuc">Danh Mục Sản Phẩm</a></li>
                    <li><a href="?admin=donhang">Quản Lý Đơn Hàng</a></li>
                    <li><a href="?admin=khachhang">Quản Lý Khách Hàng</a></li>
                </ul>
            </div>
            <div style="width: 75%;" class="content-right">
                <?php
                include('./Quantri/content_admin.php');
                ?>
            </div>
        </div>
    </div>
    <div class="footer"></div>
    </div>
    <style>

    </style>
</body>

<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
</script>

</html>