<?php

include './connectDatabase.php';
$sqlView = "SELECT * FROM qlphong";
$kqView = mysqli_query($conn, $sqlView);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./css/qlPhong.css">
    <title>Quản lý phòng</title>
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
                    <a style="border: 1px solid #fff;" href="qlPhong.php">
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

            <h3>Quản lý phòng</h3>

            <div class="app__container__content">

                <?php
                if (mysqli_num_rows($kqView) > 0) {
                    while ($row = mysqli_fetch_array($kqView)) {
                ?>
                        <a class="app__container__content__phong" href="qlMay.php?id=<?php echo $row['idPhong'] ?>">
                            <div>
                                <h3>Phòng: <?php echo $row['tenPhong'] ?> </h3>
                            </div>
                        </a>
                <?php }
                } ?>

            </div>

        </div>

    </div>

</body>

</html>