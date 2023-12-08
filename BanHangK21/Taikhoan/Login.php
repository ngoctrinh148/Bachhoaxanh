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
            <a href="/BanHangK21/Taikhoan/Register.php">Sign up here</a>
        </p>
    </form>
</selection>


<!-- ----------------------------------------- -->


<?php
session_start();
include '../connect.php';
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
                if ($row['Phanquyen'] == '1') {
                    $_SESSION['login']['dt'] = 'Admin';
                    session_write_close();
                    header('Location: ../indexadmin.php');
                    exit();
                } else {
                    $_SESSION['login']['dt'] = $sdt;
                    if ($row['TenKhachHang'] == "") {
                        unset($_SESSION['ten']);
                    }
                    session_write_close();
                    header('Location: ../index.php');
                    exit();
                }
            }
        } else {
            echo '<script>
            alert("Mật khẩu không chính xác");
            </script>';
        }
    } else {
        echo '<script>
        alert("Số điện thoại không tồn tại");
        </script>';
    }
}
?>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Inter', sans-serif;
        background: #fafafa;
    }

    .portal {
        display: flex;
        justify-content: center;
        place-items: center;
        min-height: 100vh;
    }

    .portal form {
        background: #f8f9fa;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        width: min(100%, 470px);
        padding: 70px;
        display: grid;
        gap: 1rem;
        margin-top: 40px;
        border-radius: 10px;
    }

    .title h2 {
        font-size: 1.7rem;
        position: relative;
        padding-left: 25px;
        font-weight: bold;
    }

    .title p {
        color: #6c757d;
        font-size: 0.8rem;
    }

    .title h2::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background: #0d6efd;
        left: 0;
        top: 9px;
        border-radius: 50%;
    }



    input,
    button {
        font: inherit;
        border: 2px solid transparent;
        outline: 2px solid transparent;
        border-radius: 5px;
    }

    #google-signin {
        padding: 5px;
        display: flex;
        justify-content: center;
        gap: .5rem;
        border-radius: 10px;
        border: 1px solid rgb(210, 206, 206);
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0, 02) 0px 1px 3px 0px, rgba(27, 31, 35, 0, 15) 0px 0px 0px 1px;
    }

    span {
        color: #6c757d;
        display: flex;
    }

    span::before,
    span::after {
        content: "";
        width: 100%;
        height: 1px;
        background-color: #6c757d;
        margin: auto;
    }

    span::before {
        margin-right: 1rem;
    }

    span::after {
        margin-left: 1rem;
    }

    .input-field input {
        background-color: #eeeeee;
        padding: 23px, 15px, 7px;
        width: 100%;
        height: 40px;
    }

    .input-field {
        position: relative;
    }

    .input-field label {
        /* color: var(--secondary); */
        position: absolute;
        color: #6c757d;
        left: 25px;
        top: 8px;
        transition: 0.4s all;
        padding-inline: .25rem;
        background-color: transparent;
        transform: 3s ease;
    }

    .input-name:focus~.label-name,
    .input-name:valid~.label-name {
        top: -.5rem;
        left: .5rem;
        background-color: #fff;
        font-size: 1rem;
    }

    #forgot-pass {
        text-decoration: none;
        color: #0d6efd;
        font-size: .9rem;
        text-align: end;
    }

    #signup {
        font-size: .9rem;
        text-align: center;
        color: #6c757d;
        text-decoration: none;
    }

    .btn-signin {
        background-color: #0d6efd;
        border-radius: 5px;
        color: #fff;
        font-weight: 400;
        height: 40px;
    }

    #signup a {
        text-decoration: none;
    }

    /* ---------------------------------- */
    .wrapper {
        position: relative;
    }

    .name-input {
        padding: 0.6rem 1.2rem;
        color: #444;
        font-size: 1rem;
        background-color: #eeeeee;
        padding: 23px, 15px, 7px;
        width: 100%;
        height: 40px;
    }

    .name-lable {
        position: absolute;
        font-size: 1rem;
        transition: .4s all;
        padding-inline: .25rem;

        position: absolute;
        color: #6c757d;
        left: 25px;
        top: 8px;
        padding-inline: .25rem;
        background-color: transparent;
        transform: 3s ease;
    }

    .name-input:focus~.name-lable,
    .name-input:valid~.name-lable {
        top: -.5rem;
        left: .5rem;
        font-size: .8rem;
    }
</style>