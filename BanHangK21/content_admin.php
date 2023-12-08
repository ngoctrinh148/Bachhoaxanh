<?php 
    include('./connect.php');
    if(isset($_GET['admin'])){
        switch($_GET['admin']){
                case 'loai';
                {
                    include('./frm_nhaploaisp.php');
                    break;
                }
                case 'hang';
                {
                    include('./frm_nhaphangxs.php');
                    break;
                }
                case 'nhacc';
                {
                    include('./frm_nhapnhacc.php');
                    break;
                }
                case 'sanpham';
                {
                    include('./frm_nhapsp.php');
                    break;
                }
                case 'donhang';
                {
                    include('./chitietdonhang.php');
                    break;
                }
                case 'hoadon';
                {
                    include('./chitiethoadon.php');
                    break;
                }
                
                case 'danhmuc';
                {
                    include('./danhmucsanpham.php');
                    break;
                }
                case 'sua';
                {
                    include('./chinhsuasanpham.php');
                    break;
                }
                case 'xoa';
                {
                    include('./xoasanpham.php');
                    break;
                }
                case 'chitiet';
                {
                    include('./chitietsanphamad.php');
                    break;
                }
                case 'inHD';
                {
                    include('./inhoadon.php');
                    break;
                }
                case 'khachhang';
                {
                    include('./chitietkhachhang.php');
                    break;
                }
        }
    }
?>