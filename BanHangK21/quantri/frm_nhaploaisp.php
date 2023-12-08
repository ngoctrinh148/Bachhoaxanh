<?php
include('./connect.php');
?>
    <selection class="portal">
        <form method="POST">
            <div class="title">
                <h2>Thêm Loại Sản Phẩm</h2>
            </div>
            <span></span>
            <!-- <div class="wrapper">
                <input type="text" class="name-input input-number" name="masanpham" required="required" />
                <label class="name-lable">Nhập Mã Sản Phẩm</label>
            </div> -->
            <div class="wrapper">
                <input type="text" class="name-input" name="TenLoai" required="required" />
                <label class="name-lable">Nhập Tên Loại Sản Phẩm</label>
            </div>
            
            <button type="submit" class="btn-signin" id="signin" name="bam">Thêm Loại Sản Phẩm</button>
        </form>
    </selection>
<style>

*{
    margin: 0;
    padding: 0;
    font-family: 'Inter', sans-serif;
    background: #fafafa;
}
.portal{
    display: flex;
    justify-content: center;
    min-height: 50vh;
}
.portal form{
    background: #f8f9fa;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    width: min(100%, 470px);
    padding: 70px;
    display: grid;
    /* gap: 1rem; */
    margin-top:  0px; 
    border-radius: 10px ;
}
.title h2{
    font-size: 1.7rem;
    position: relative;
    padding-left: 25px;
    font-weight: bold;
}

.title p{
    color: #6c757d;
    font-size: 0.8rem;
}
.title h2::before{
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background:#0d6efd;
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

input, button{
    font: inherit;
    border:  2px solid transparent;
    outline:  2px solid transparent;
    border-radius: 5px;
}
.input-loai{
    border: none;
}

span{
    color: #6c757d;
    display: flex;
}
span::before, span::after{
    content: "";
    width: 100%;
    height: 1px;
    background-color: #6c757d;
    margin: auto;
}
.input-field input{
    background-color: #eeeeee;
    padding: 23px, 15px, 7px;
    width: 100%;
    height: 40px;
}
.input-field{
    position: relative;
}
.input-field label{
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
.input-name:valid~.label-name{
    top: -.5rem;
    left: .5rem;
    background-color: #fff;
    font-size: 1rem;
}
#forgot-pass{
    text-decoration: none;
    color: #0d6efd;
    font-size: .9rem;
    text-align: end;
}
.btn-signin{
    background-color: #0d6efd;
    border-radius: 5px;
    color: #fff;
    font-weight: 400;
}
/* ---------------------------------- */
.wrapper{
    position: relative;
}
.name-input{
    padding: 0.6rem 1.2rem;
    color: #444;
    font-size: 1rem;
    background-color: #eeeeee;
    padding: 23px, 15px, 7px;
    width: 100%;
    height: 40px;
}
.name-lable{
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
.name-input:valid~.name-lable{
    top: -.5rem;
    left: .5rem;
    font-size: .8rem;
}



</style>
<!-- ------------------------------------------------------------------------------ -->

    <?php
    if(isset($_POST['bam'])){
        if($_POST['TenLoai']!=null ){ 
            $tenloai = $_POST['TenLoai'];

            $sql = "INSERT INTO loaisanpham ( TenLoai) VALUES ('$tenloai')";
            if(mysqli_query($con,$sql)== true){
                        ?>
                <script>
                    alert("Bạn vừa thêm loại sản phẩm thành công")
                </script>
                <?php 
                }else{
                    ?>
                <script>
                    alert("Bạn thêm loại sản phẩm thất bại")
                </script>
        <?php 
            }
        }else{
        ?>
        <script>
            alert("Bạn chưa nhập đầu đủ thông tin, bạn cần phải nhập đầy đủ thông tin")
        </script>
   <?php 
        }
}
?>
