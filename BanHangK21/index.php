<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Bách Hóa Xanh</title>
</head>

<body>

    <div class=" header-trangchu">
        <div class="row banner">
            <div class="col-lg-3 logo-trangchu">
                <li><a href="./index.php"><img src="./Image/logobhx.png" style="width: 150px;"></a></li>
            </div>
            <div class="col-lg-4 header-center">
                <form action="index.php?loaisp=tim" method="POST" role="form">
                    <div class="find">
                        <div class="form-group">
                            <input type="text" class="form-control form_input" name="tukhoa" style="width: 400px; font-family: bahnschrift;" placeholder="Giao Nhanh, Đơn ít cũng giao!!">
                        </div>
                        <button name="timkiem" type="submit" class="btn btn-find"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="giohang">
                <a href="index.php?loaisp=view">
                    <span class="glyphicon glyphicon-shopping-cart" style="font-size:30px; margin-top:15px; margin-left: 120px; color: lightcyan ;"></span>
                </a>
            </div>
            <!-- -------------------------------------------------- -->
            <div class="hero">
                <nav>
                    <img src="Image/user (1).png" class="user-pic" onclick="toggleMenu()">
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="Image/user (1).png">
                                <h3><?php
                                    if (isset($_SESSION['ten'])) {
                                        echo 'Xin Chào ', $_SESSION['ten'];
                                    } else {
                                        if (isset($_SESSION['login']['dt'])) {
                                            echo 'Xin Chào ', $_SESSION['login']['dt'];
                                        } else {
                                            echo '-----';
                                        }
                                    }
                                    ?></h3>
                            </div>
                            <hr>
                            <a href="index.php?loaisp=profile" class="sub-menu-link">
                                <img src="Image/user (2).png">
                                <p>Profile</p>
                                <span><img src="Image/angle-small-right.png"></span>
                            </a>
                            <?php
                            if (isset($_SESSION['login']['dt'])) {
                            ?>
                                <a href="index.php?loaisp=logout" class="sub-menu-link">
                                    <img src="Image/logout (1).png">
                                    <p>Logout</p>
                                    <span><img src="Image/angle-small-right.png"> <a href=""></a> </span>
                                    <?php
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
        <!-- -------------------------------------------------- -->
    </div>

    <div class="menu-main">
        <div class="content-body row">

            <!-- Loai San Pham -->
            <div id="content-left" class="loaisp col-xs-3">
                <?php
                include 'Sanpham/loaisp.php'
                ?>
            </div>
            <div id="content-center" class="col-sx-9 col-sm-10 ">

                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="Ảnh Sản Phẩm/imgg1.png" style="height: 250px" width="1500px">
                            </div>

                            <div class="item">
                                <img src="Ảnh Sản Phẩm/imgg2.jpg" style="height: 250px" width="1500px">
                            </div>

                            <div class="item">
                                <img src="Ảnh Sản Phẩm/imgg3.jpg" style="height: 250px" width="1500px">
                            </div>
                            <div class="item">
                                <img src="Ảnh Sản Phẩm/imgg4.jpg" style="height: 250px" width="1500px">
                            </div>
                            <div class="item">
                                <img src="Ảnh Sản Phẩm/imgg5.png" style="height: 250px" width="1500px">
                            </div>
                            <div class="item">
                                <img src="Ảnh Sản Phẩm/imgg6.jpg" style="height: 250px" width="1500px">
                            </div>
                            <div class="item">
                                <img src="Ảnh Sản Phẩm/imgg7.jpg" style="height: 250px" width="1500px">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="row " style="margin-top: 10px;">
                    <?php
                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                    } else {
                        $action = " ";
                    }
                    if (isset($_GET['loaisp'])) {
                        switch ($_GET['loaisp']) {
                            case 'loai':
                                include('Sanpham/laysanphamtheoloai.php');
                                break;
                            case 'home':
                                include('Sanpham/laysp.php');
                                break;
                            case 'buy':
                                include('./giohang/dathang.php');
                                break;
                            case 'view':
                                include('./giohang/view_card.php');
                                break;
                            case 'thanhtoan':
                                include('./giohang/thanhtoan.php');
                                break;
                            case 'delete':
                                include('./giohang/dathang.php');
                                break;
                            case 'profile':
                                include('./Taikhoan/profile.php');
                                break;
                            case 'insert':
                                include('./giohang/insert_card.php');
                                break;
                            case 'info':
                                include('./Sanpham/chitietsanpham.php');
                                break;
                            case 'tim':
                                include('./Sanpham/timsanpham.php');
                                break;
                            case 'login':
                                include('./Taikhoan/Login.php');
                                break;
                            case 'register':
                                include('./Taikhoan/Register.php');
                                break;
                            case 'logout':
                                include('./Taikhoan/logout.php');
                                break;
                            default:
                                break;
                        }
                    } else {
                        include('Sanpham/laysp.php');
                    }
                    ?>
                </div>
                <div class="footer" style="background-color: white; text-align: center; border-top: 2px solid #1b8110;">
                    <div class="top">
                        <div class="dathang">
                            <img class="imgf" src="./Image/dathang.png" alt="">
                            <p>Đặt online giao tận nhà Đúng Giờ</p>
                            <p class="gach">|</p>
                        </div>
                        <div class="doitra">
                            <img class="imgf" src="./Image/hoantien.png" alt="">
                            <p>Đổi, trả sản phẩm trong 7 ngày</p>
                        </div>
                    </div>
                    <div class="center">
                        <div class="trai">
                            <div class="tongdai">
                                <img class="imgc" src="./Image/tongdai.png" alt="">
                                <p>Tổng đài: 1900.1908 - 028.3622.9900 (7:00 - 21:30)</p>
                            </div>
                            <div class="congviec">
                                <a href="#" class="cham1">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Quy chế hoạt động</p>
                                </a>
                                <a href="#" class="cham2">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Hướng dẫn mua hàng</p>
                                </a>
                                <a href="#" class="cham">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Hóa đơn điện tử</p>
                                </a>
                            </div>
                            <div class="congviec">
                                <a href="#" class="cham1">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Chính sách khách hàng</p>
                                </a>
                                <a href="#" class="cham3">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Tích điểm Quà tặng VIP</p>
                                </a>
                                <a href="#" class="cham4">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Giới thiệu công ty</p>
                                </a>
                            </div>
                            <div class="congviec">
                                <a href="#" class="cham1">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Chính sách giao hàng</p>
                                </a>
                                <a href="#" class="cham5">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Cần thuê mặt hàng</p>
                                </a>
                                <a href="#" class="cham6">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Liên hệ</p>
                                </a>
                            </div>
                            <div class="congviec">
                                <a href="#" class="cham1">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Chính sách đổi trả</p>
                                </a>
                                <button class="btna">Tuyển dụng</button>
                                <a href="#" class="cham">
                                    <p>.</p>
                                </a>
                                <a href="#" class="text">
                                    <p>Hỏi đáp</p>
                                </a>
                            </div>
                            <div class="cv">
                                <a href="#" class="b">
                                    <p>3.085 công việc đang chờ bạn</p>
                                </a>
                            </div>
                            <div class="thanhvien">
                                <p>Website thành viên</p>
                                <img class="imgt" src="./Image/thegioididong.png" alt="">
                                <img class="imgt" src="./Image/dienmayxanh.png" alt="">
                                <img class="imgt" src="./Image/maiam.png" alt="">
                            </div>
                        </div>
                        <div class="phai">
                            <div class="dangki">
                                <img class="imgc" src="./Image/dangki.png" alt="">
                                <p>Đăng ký chào hàng vào Bách Hóa Xanh</p>
                            </div>
                            <div class="hethong">
                                <img class="imgh" src="./Image/hetong.png" alt="">
                                <a class="hethongg" href="#">Hệ thống <p style="color: red; margin-left: 5px; margin-right: 5px;">1.703</p> cửa hàng Bách Hóa Xanh</a>
                            </div>
                            <div class="icon">
                                <img class="icon1" src="./Image/dathongbao.png" alt="">
                                <img class="icon2" src="./Image/protect.png" alt="">
                                <img class="icon3" src="./Image/mxh.png" alt="">
                            </div>
                            <div class="tinnhiem">
                                <img src="./Image/tinnhiemmang.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        <?php if (isset($_SESSION['tongsp'])) { ?>.giohang {
            position: relative;
        }

        .giohang::before {
            content: "";
            position: absolute;
            top: 5px;
            left: 140px;
            height: 25px;
            width: 25px;
            background-color: red;
            z-index: 1;
            margin-bottom: 2px;
            border-radius: 50%;
        }

        .giohang::after {
            content: "<?php echo $_SESSION['tongsp'] ?>";
            color: aliceblue;
            font-size: 15px;
            font-weight: bold;
            position: absolute;
            top: 7px;
            left: 148px;
            height: 25px;
            width: 25px;
            background-color: transparent;
            z-index: 2;
            margin-bottom: 2px;
        }


        <?php } ?>.top {
            display: flex;
            margin-top: 30px;
            border-bottom: 1px solid #cbbec7;
        }
    </style>
    <!-- -------------------------------------------------------- -->







    <!-- -------------------------------------------------------- -->

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>