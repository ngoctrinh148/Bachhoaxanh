<?php
    include '../connect.php';
    if(isset($_POST['login']))
    {
        $username = $_POST['user'];
        $password = MD5($_POST['pass']);
        $sql_check = mysqli_query($con, "select * from taikhoan where username = '$username'");
        $dem = mysqli_num_rows($sql_check);
        if($dem == 0)
        {
            echo "<p style='text-align:center'>Tài khoản không tồn tại</p>";
        }
        else
        {
            $sql_check2 = "select * from taikhoan where username= '$username' and password = '$password'";
            $row = mysqli_query($con, $sql_check2);
            $dem2 = mysqli_num_rows($row);
            if($dem2 == 0)
                echo "<p style='text-align:center'>Mật khẩu không chính xác </p>";
            else{
                while($row = mysqli_fetch_array($row))
                {   
                        $_SESSION['username']=$username;
                        header('location:../index.php');
                }
            }
        }
    }
    ?>