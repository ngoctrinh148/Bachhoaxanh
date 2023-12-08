<?php
include('./connect.php');
if (isset($_GET['admin'])) {
    switch ($_GET['admin']) {
        case 'loai'; {
                include('./Quantri/frm_nhaploaisp.php');
                break;
            }
        case 'hang'; {
                include('./Quantri/frm_nhaphangxs.php');
                break;
            }
        case 'nhacc'; {
                include('./Quantri/frm_nhapnhacc.php');
                break;
            }
        case 'sanpham'; {
                include('./Quantri/frm_nhapsp.php');
                break;
            }
        case 'donhang'; {
                include('./Quantri/chitietdonhang.php');
                break;
            }
        case 'hoadon'; {
                include('./Quantri/chitiethoadon.php');
                break;
            }

        case 'danhmuc'; {
                include('./Quantri/danhmucsanpham.php');
                break;
            }
        case 'sua'; {
                include('./Quantri/chinhsuasanpham.php');
                break;
            }
        case 'xoa'; {
                include('./Quantri/xoasanpham.php');
                break;
            }
        case 'chitiet'; {
                include('./Quantri/chitietsanphamad.php');
                break;
            }
        case 'inHD'; {
                include('./Quantri/inhoadon.php');
                break;
            }
        case 'xoaDH'; {
                include('./Quantri/xoa_don_hang.php');
                break;
            }
        case 'khachhang'; {
                include('./Quantri/chitietkhachhang.php');
                break;
            }
    }
}
