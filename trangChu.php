<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Trang chủ</title>
</head>

<body>

    <div class="app">

        <header class="header">

            <div class="header__logo">
                <h3 style="color: #fff;">HAP GROUP</h3>
            </div>

            <nav>
                <ul>
                    <a style="border: 1px solid #fff;" href="trangChu.php">
                        <li>TRANG CHỦ</li>
                    </a>
                    <a href="qlPhong.php">
                        <li>QUẢN LÝ PHÒNG</li>
                    </a>
                    <a href="qlDangKy.php">
                        <li>QUẢN LÝ ĐĂNG KÝ</li>
                    </a>
                    <a style="border: none;" href="qlMayHong.php">
                        <li>QUẢN LÝ MÁY HỎNG</li>
                    </a>
                </ul>
            </nav>

            <div class="header__logout">
                <a style="color: #fff; font-weight: bold;" href="index.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>

        </header>

        <div class="app__container">

            <h3>Trang chủ</h3>

            <div class="app__container__content">
                <p style="margin-top: 40px;">Link để user đăng ký phòng thực hành: <a href="http://localhost/quanLy_MPT/dangKyPhongThucHanh.php" target="_blank">Click vào đây!</a></p>
            </div>

        </div>

    </div>

</body>

</html>