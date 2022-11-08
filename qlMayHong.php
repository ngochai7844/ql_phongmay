<?php

include './connectDatabase.php';
$thongBao = '';
$sql = "SELECT * FROM qlmay WHERE tinhTrang LIKE '%Hỏng%'";
$result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/qlPhong.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Quản lý máy hỏng</title>
</head>

<body>

    <div class="app">

        <header class="header">

            <div class="header__logo">
                <h3 style="color: #fff;">HAP GROUP</h3>
            </div>

            <nav>
                <ul>
                    <a href="trangChu.php">
                        <li>TRANG CHỦ</li>
                    </a>
                    <a href="qlPhong.php">
                        <li>QUẢN LÝ PHÒNG</li>
                    </a>
                    <a href="qlDangKy.php">
                        <li>QUẢN LÝ ĐĂNG KÝ</li>
                    </a>
                    <a style="border: none; border: 1px solid #fff;" href="qlMayHong.php">
                        <li>QUẢN LÝ MÁY HỎNG</li>
                    </a>
                </ul>
            </nav>

            <div class="header__logout">
                <a style="color: #fff; font-weight: bold;" href="index.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>

        </header>

        <div class="app__container">

            <h3>Quản lý máy hỏng</h3>

            <div class="app__container__content">

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div style="background-color: red; cursor: pointer; position: relative;" class="app__container__content__may">

                            <i class="fa-solid fa-triangle-exclamation"></i>

                            <img src="./img/item.jpg" alt="">

                            <h3><?php echo $row['tenMay']; ?></h3>

                            <p>Phòng: <?php echo $row['tenPhong']; ?></p>

                        </div>

                <?php }
                } else {
                    $thongBao = 'Không có máy nào hỏng!';
                } ?>

                <h3><?php echo $thongBao ?></h3>

            </div>

        </div>

    </div>

</body>

</html>