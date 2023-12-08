<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Trang quan ly he thong</title>
</head>
<body>
    <div class="main">
        <div class="banner"></div>
        <div class="menu-ngang"></div>
        <div class="content">
            <div class="left">
                <div class="quanly">
                    <h3>Quan Ly</h3>
                    <ul>
                        <li><a href="index.php">Trang chu</a></li>
                        <li><a href="?admin=sanpham">San Pham</a></li>
                        <li><a href="?admin=loai">Danh Muc Loai San Pham</a></li>
                        <li><a href="?admin=hang">Danh Muc Hang San Pham</a></li>
                        <li><a href="?admin=baocao">Bao Cao</a></li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <?php 
                    include('./content_admin.php');
                ?>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>