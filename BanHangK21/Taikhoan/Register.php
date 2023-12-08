    <?php
    require_once('../connect.php'); ?>
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
                <a href="/BanHangK21/Taikhoan/Login.php">Sign in here</a>
            </p>
        </form>
    </selection>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: #fafafa;
        }


        .portal {
            display: grid;
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

        /* .title h2::before{
        animation: pulse 1.3s infinite;
    }

    @keyframes pulse{
        0%{
            transform: scale(0.5);
            opacity: 0;
        }
        50%{
            opacity: 1;
        }
        100%{
            transform: scale(1);
        }
    } */

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

        .input-number[type=number] {
            max-width: 11em;
        }


        .name-input:focus~.name-lable,
        .name-input:valid~.name-lable {
            top: -.5rem;
            left: .5rem;
            font-size: .8rem;
        }

        .input-number:invalid {
            box-shadow: #ff3333 0 0 10px 0;
            animation: shakeinput .15s ease-in-out 0s;

        }

        @keyframes shakeinput {
            0% {
                margin-left: 0;
            }

            25% {
                margin-left: -5px;
            }

            75% {
                margin-left: 5px;
            }

            100% {
                margin-left: 0;
            }
        }
    </style>