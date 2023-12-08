<?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        if($_SESSION['phanquyen']==1)
        {
            header("location:../index.php");
        }
        if($_SESSION['phanquyen']==0)
        {
            header("location:login.php");
        }
    }
?>
<div style="border: 1px solid #111; width:400px; height: 180px; margin:auto; text-align: center;">
    <div>
        <h2>Dang nhap qian tri he thong</h2>
    </div>
    <div align="center">
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Ten Tai Khoan</td>
                    <td><input type="text" name="user" placeholder="Username" style="height: 25px; width: 200px"></td>
                </tr>
                <tr>
                    <td>Mat Khau</td>
                    <td><input type="text" name="pass" placeholder="Password" style="height: 25px; width: 200px"></td>
                </tr>
                <tr>
                    <td colspan="2" style="margin-top: 10px; text-align:center;">
                        <button name="login" class="dangnhap btn btn-info" style="margin-top: 10px">Dang nhap</button>
                        <button class="thoat btn btn-info"><a href="../index.php">Thoat</a></button>
                    </td>
                </tr>
            </table>          
        </form>       
    </div>
</div>
<?php 
    include '../connect.php';
    if(isset($_POST['login']))
    {
        $username = $_POST['user'];
        $password = MD5($_POST['pass']);
        $sql_check = mysqli_query($con, "select * from  taikhoan");
    }
    
        
?>