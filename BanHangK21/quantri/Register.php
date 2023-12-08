<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="re.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>


    <?php
    require_once('./connect.php'); ?>
    <?php
    if (isset($_POST['bam'])) {
        $sdt = $_POST['sdt'];
        $mk = ($_POST['pas']);
        $rmk = ($_POST['repas']);
        if ($mk != $rmk) {
    ?>
            <script>
                alert("Mật Khẩu nhập lại không trùng khớp!!");
            </script>
        <?php
        } else {
            $sql1 = "INSERT INTO taikhoan(SoDienThoai,Password1) VALUES ('$sdt','$mk')";
            mysqli_query($con, $sql1);
        ?>
            <script>
                alert("Bạn đã đăng kí thành công!!");
            </script>'
    <?php
        }
    }
    ?>

    <div class=" header-trangchu">

        <div class="logo-trangchu">
            <li><a href="./index.php"><img src="./Image/logobhx.png" style="width: 150px;"></a></li>
        </div>
    </div>
    <selection class="portal">
        <form action="" method="POST">
            <div class="title">
                <h2>SIGN UP</h2>
                <p>Welcome back! Please enter your details</p>
            </div>
            <div class="wrapper input-number">
                <input type="number" pattern="[0-9]*" class="name-input" name="sdt" required="required" />
                <label class="name-lable">Number Phone</label>
            </div>
            <div class="wrapper">
                <input type="password" class="name-input" name="pas" required="required" />
                <label class="name-lable">Password</label>
            </div>
            <div class="wrapper">
                <input type="password" class="name-input" name="repas" required="required" />
                <label class="name-lable">Repassword</label>
            </div>
            <button type="submit" class="btn-signin" id="signin" name="bam">Sign up</button>
            <p id="signup">
                Have an Account?
                <a href="http://localhost/BanHangK21/Login.php">Sign in here</a>
            </p>
        </form>
    </selection>
</body>

</html>