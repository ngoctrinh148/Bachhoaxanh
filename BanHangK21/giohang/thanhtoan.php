<script language="javascript">
    function kiemtra() {
        if (a.hoten.value == "") {
            alert("Bạn chưa điền tên")
            a.hoten.focus();
            return false;
        }
        if (a.dienthoai.value == "") {
            alert("Bạn chưa điền SĐT<br> hãy điền số điện thoại để chúng tôi liên lạc lại với bạn")
            a.dienthoai.focus();
            return false;
        }
        if (a.diachi.value == "") {
            alert("Bạn chưa điền địa chỉ")
            a.diachi.focus();
            return false;
        }
        if (a.hoten.value != "" && a.dienthoai.value != "" && a.diachi.value != "") {
            a.submit();
        }
    }
</script>
<div class="thongtinkhachhang" align="center"> 
    <selection class="portal">
        <form method="POST" action="index.php?loaisp=insert" id="a" onsubmit="return kiemtra();">
            
        <?php
            include './connect.php';
                $sql = mysqli_query($con, "SELECT * from taikhoan where SoDienThoai='" . $_SESSION['login']['dt'] . "'");
                $row = mysqli_fetch_array($sql);
            ?>

            <div class="title">
                <h2>Thông Tin Thanh Toán</h2>
            </div>
            <div class="wrapper">
                <input type="text" class="name-input input-tenkh" name="TenKhachHang" value="<?php echo $row['TenKhachHang'] ?>" required="required" />
                <label class="name-lable">Tên Khách Hàng</label>
            </div>
            <div class="wrapper">
                <input type="text" class="name-input input-diachi" name="DiaChi" value="<?php echo $row['DiaChi'] ?>" required="required" />
                <label class="name-lable">Địa Chỉ Giao Hàng</label>
            </div>
            <div class="wrapper">
                <input type="number" class="name-input input-number" name="SoDienThoai" value="<?php echo $row['SoDienThoai'] ?>"  required="required" />
                <label class="name-lable">Number Phone</label>
            </div>
            <div class="wrapper">
                <input type="text" class="name-input input-email" name="Email" value="<?php echo $row['Email'] ?>" required="required" />
                <label class="name-lable">Email</label>
            </div>
            <div class="wrapper">
                <select style="font-size: 1.45rem; font-weight: bold; color: #6c757d; padding-left: 22px;" class="name-input input " name = "phuongthuc">
                    <option value="Chọn phương thức thanh toán"><label class="name-lable">Chọn phương thức thanh toán</label></option>
                    <option value="Qua bưu điện"><label class="name-lable">Qua bưu điện</label></option>
                    <option value="Qua thẻ ATM"><label class="name-lable">Qua thẻ ATM</label></option>
                    <option value="Thanh toán khi nhận hàng"><label class="name-lable">Thanh toán khi nhận hàng</label></option>
                </select>
            </div>
            <button type="submit" class="btn-signin" id="signin" name="bam">Thanh Toán</button>
        </form>
    </selection>




    <style>
        .portal {
            display: grid;
            place-items: top;
            padding-left: 25%;
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
            font-size: 2rem;
            position: relative;
            padding-left: 25px;
            font-weight: bold;
        }

        input,button {
            font: inherit;
            border: 2px solid transparent;
            outline: 2px solid transparent;
            border-radius: 5px;
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

        .btn-signin {
            background-color: #0d6efd;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;

        }

        .wrapper {
            position: relative;
        }

        .name-input {
            padding: 0.6rem 1.2rem;
            color: #444;
            font-size: 1.5rem;
            background-color: #eeeeee;
            padding: 23px, 15px, 7px;
            width: 100%;
            height: 40px;
        }

        .name-lable {
            position: absolute;
            font-size: 1.5rem;
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
            top: -.8rem;
            left: .8rem;
            font-size: 1.2rem;
        }

        .select {
            padding: 0.6rem 1.2rem;
            color: #444;
            font-size: 1rem;
            background-color: #eeeeee;
            padding: 23px, 15px, 7px;
            width: 100%;
            height: 40px;
        }
    </style>
</div>