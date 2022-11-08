<?php

include './connectDatabase.php';

$thongBao = '';
$sql = "SELECT * FROM qldangkyphong";
$result = mysqli_query($conn, $sql);

if (isset($_POST['xoa'])) {
    $idDangKy = $_POST['iddangky'];
    $sqldelete = " DELETE FROM qldangkyphong WHERE id='$idDangKy' ";
    $kqdelete = mysqli_query($conn, $sqldelete);
    if ($kqdelete) {
        header('Location: qlDangky.php');
    } else {
        echo '<script>alert("Báo cáo tình trạng thất bại!");</script>';
    };
}

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
    <title>Quản lý đăng ký</title>
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
                    <a style="border: 1px solid #fff;" href="qlDangKy.php">
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

            <h3>Quản lý đăng ký</h3>

            <div class="app__container__content">

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="app__container__content__may" style="position: relative; width: 29.3%; margin: 0 2%; margin-top: 30px;">

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <img style="width: 70%; height: 300px; object-fit: cover;" src="<?php echo $row['image']; ?>" alt="">

                                <h3 style="margin-top: 20px;"><?php echo $row['fullname']; ?></h3>

                                <input type="text" value="<?php echo $row['id']; ?>" name="iddangky">

                                <p>Tên phòng đăng ký: <?php echo $row['tenphong']; ?></p>

                                <p>Ngày đăng ký: <?php echo $row['ngaydangky']; ?></p>

                                <button style="font-weight: bold; color: red; padding: 5px 10px; position: absolute; top: 0; right: 0; cursor: pointer;" name="xoa">X</button>
                            </form>

                        </div>
                <?php }
                } else {
                    $thongBao = 'Lịch đăng ký trống!';
                } ?>

                <h3><?php echo $thongBao ?></h3>

            </div>

        </div>

    </div>

</body>

</html>