<div class="menu">
    <div class="menu-left">
        <ul>
            <li style=" list-style: none;"><a style="text-decoration: none;" href="index.php?loaisp=profile&profile=thongtin">Thông Tin Cá Nhân</a></li>
            <li style=" list-style: none;"><a style="text-decoration: none;" href="index.php?loaisp=profile&profile=chinhsua">Chỉnh Sửa Thông Tin Cá Nhân</a></li>
            <li style=" list-style: none;"><a style="text-decoration: none;" href="index.php?loaisp=profile&profile=thaydoi">Thay Đổi Mật Khẩu</a></li>
        </ul>
    </div>
    <div class="menu-right">
        <?php
        include('./connect.php');
        if (isset($_GET['profile'])) {
            switch ($_GET['profile']) {
                case 'thongtin': {
                        include('./Taikhoan/thongtin.php');
                        break;
                    }
                case 'chinhsua': {
                        include('./Taikhoan/chinhsua.php');
                        break;
                    }
                case 'thaydoi': {
                        include('./Taikhoan/thaydoi.php');
                        break;
                    }
            }
        } else {
            include('./Taikhoan/thongtin.php');
        }
        ?>
    </div>
    <style>
        ul>li {
            margin-top: 15px;
        }

        .menu {
            display: flex;
        }

        .menu-right {
            margin-left: 60px;
        }

        .menu-left {
            border-right: 2px solid rgb(1, 136, 70);
            padding-right: 20px;
            height: 312px;
        }

        .menu-left>ul>li>a {
            position: relative;
        }

        .menu-left>ul>li>a::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -15px;
            height: 0%;
            width: 5px;
            background-color: rgb(16, 162, 91);
            z-index: -1;
            margin-bottom: 2px;
            transition: height 0.25s ease, width 0.75s ease 0.25s;
        }

        .menu-left>ul>li>a:hover::before {
            height: 40px;
            width: 215px;
        }
    </style>
</div>