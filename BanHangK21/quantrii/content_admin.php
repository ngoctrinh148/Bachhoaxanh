<?php 
    include('../connect.php');
    if(isset($_GET['admin'])){
        switch($_GET['admin']){
            case 'sanpham';
                {
                    include('./frm_nhapsp.php');
                    break;
                }
        }
    }
    



?>