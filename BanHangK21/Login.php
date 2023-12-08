<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="loginn.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class=" header-trangchu">
        <div class="logo-trangchu">
            <li><a href="./index.php"><img src="./Image/logobhx.png" style="width: 150px;"></a></li>
        </div>
    </div>

    <selection class="portal">
        <form method="POST">
            <div class="title">
                <h2>LOG IN</h2>
                <p>Welcome back! Please enter your details</p>
            </div>
            <button id="google-signin">
                <!-- <img src="assets/google-logo.svg" alt=""> -->
                <img src="https://th.bing.com/th/id/OIP.lUAAY7CDUU9GEjssIE2A3QHaHi?pid=ImgDet&rs=1" style="height: 15px; width: 15px; margin-top:5px;" alt="">
                Log in with Google
            </button>
            <button id="google-signin">
                <!-- <img src="assets/google-logo.svg" alt=""> -->
                <img src="https://th.bing.com/th/id/R.6bc464e23d0ac7cd985b52c89d690584?rik=3NdOY4you30naQ&riu=http%3a%2f%2fstatic1.squarespace.com%2fstatic%2f52a223c1e4b0d93290b8152e%2ft%2f52d70859e4b0a6a1dc283ed6%2f1389824090531%2ffacebook-logo.png&ehk=%2f9QbnYSpIzy%2bpqIrY%2fn7lSiwPm0pOolBYM4ABDmXgOE%3d&risl=&pid=ImgRaw&r=0" style="height: 18px; width: 18px; margin-top:4px;" alt="">
                Log in with Facebook
            </button>
            <button id="google-signin">
                <!-- <img src="assets/google-logo.svg" alt=""> -->
                <img src="https://www.dailysiemens.net/wp-content/uploads/2021/06/ICON-ZALO.png" style="height: 18px; width: 18px; margin-top:4px;" alt="">
                Log in with Zalo
            </button>
            <span>or</span>
            <div class="wrapper">
                <input type="number" class="name-input input-number" name="sdt" required="required" />
                <label class="name-lable">Number Phone</label>
            </div>
            <div class="wrapper">
                <input type="password" class="name-input" name="pass" required="required" />
                <label class="name-lable">Password</label>
            </div>
            <a href="#" id="forgot-pass">Forgot Password</a>
            <button type="submit" class="btn-signin" id="signin" name="bam">Sign in</button>
            <p id="signup">
                Don't Have an Account?
                <a href="http://localhost/BanHangK21/Register.php">Sign up here</a>
            </p>
        </form>
    </selection>


    <!-- ----------------------------------------- -->


    <?php

    include './connect.php';
    if (isset($_POST['sdt'])) {
        $sdt = $_POST['sdt'];
        // echo "<script>
        // alert('$sdt');
        // </script>"; 
        $pas = ($_POST['pass']);
        $sql = "SELECT * FROM taikhoan WHERE SoDienThoai = '$sdt'";
        $kq = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($kq);
        if (mysqli_num_rows($kq) >= 1) {
            if ($pas == $row['Password1']) {
                $sql1 = "SELECT * FROM taikhoan WHERE SoDienThoai = '$sdt' && Password1 = '$pas'";
                $kqp = mysqli_query($con, $sql1);
                if (mysqli_num_rows($kqp) == 1) {
                    // // $sql2 = " SELECT * FROM taikhoan WHERE SoDienThoai = '$sdt' ";
                    // $kqpq = mysqli_query($con, $sql1);
                    // $row = mysqli_fetch_array($kqpq);
                    if ($row['Phanquyen'] == '1') {
                        $_SESSION['login']['dt'] = 'Admin';
                        header('Location: indexadmin.php');
                    } else {
                        $_SESSION['login']['dt'] = $sdt;
                        if($row['TenKhachHang'] == ""){
                            unset($_SESSION['ten']);
                        }
                        header('Location: index.php');
                    }
                } 
            } else {
                echo '<script>
            alert("Mật khẩu không chính xác");
            </script>';
            }
        }else {
            echo '<script>
        alert("Số điện thoại không tồn tại");
        </script>';
        }
    }
    ?>
</body>

</html>