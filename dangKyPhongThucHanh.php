<?php

session_start();
ob_start();
include './connectDatabase.php';

$thongBao = '';
$sqlView = "SELECT * FROM qldangkyphong";
$kqView = mysqli_query($conn, $sqlView);

if (isset($_POST['dangky'])) {
    $fullname = $_POST['fullname'];
    $linkanh = $_POST['linkanh'];
    $tenphong = $_POST['tenphong'];
    $lich = $_POST['lich'];

    $sql = " INSERT INTO  qldangkyphong (fullname, image, tenphong, ngaydangky) VALUES ('$fullname', '$linkanh', '$tenphong', '$lich') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Đăng ký thành công!");</script>';
    } else {
        echo '<script>alert("Đăng ký không thành công!");</script>';
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./css/dkpth.css">
    <title>Đăng ký phòng thực hành</title>
</head>

<body>

    <div class="app">

        <div class="app__btnDieuHuong">
            <button class="btnDK active" onclick="btnDangKy()">ĐĂNG KÝ PHÒNG</button>
            <button class="btnXL" onclick="btnXemLich()">XEM LỊCH ĐĂNG KÝ</button>
        </div>

        <div class="app__container appDangKy active">

            <h3>ĐĂNG KÝ PHÒNG THỰC HÀNH</h3>

            <div class="app__container__formdk">

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="app__container__formdk__item">
                        <label>Họ và tên:</label><br>
                        <input type="text" name="fullname" required>
                    </div>

                    <div class="app__container__formdk__item">
                        <label>Link ảnh:</label><br>
                        <input type="text" name="linkanh" required>
                    </div>

                    <div class="app__container__formdk__item">
                        <label>Tên phòng:</label><br>
                        <input type="text" name="tenphong" required>
                    </div>

                    <div class="app__container__formdk__item">
                        <label>Lịch:</label><br>
                        <input type="date" name="lich" required>
                    </div>

                    <div style="margin-top: 30px;" class="app__container__formdk__item">
                        <input class="btnGui" name="dangky" type="submit" value="Đăng ký" required>
                    </div>

                </form>

            </div>

        </div>

        <div class="app__container appXemLich">

            <h3>XEM LỊCH ĐĂNG KÝ</h3>

            <div class="app__container__formdk">

                <?php
                if (mysqli_num_rows($kqView) > 0) {
                    while ($row = mysqli_fetch_array($kqView)) {
                ?>
                        <div class="item__lichDK">
                            <img src="<?php echo $row['image']; ?>" alt="">
                            <div class="item__lichDK__content">
                                <h3><?php echo $row['fullname']; ?></h3>
                                <p>Phòng đăng ký: <?php echo $row['tenphong']; ?></p>
                                <p>Ngày đăng ký: <?php echo $row['ngaydangky']; ?></p>
                            </div>
                        </div>
                <?php }
                } else {
                    $thongBao = 'Lịch đăng ký trống!';
                } ?>

                <h3 style="text-align: center; color: red;"><?php echo $thongBao ?></h3>

            </div>

        </div>

    </div>

</body>

<script>
    function btnDangKy() {
        document.querySelector('.appDangKy').classList.add('active');
        document.querySelector('.appXemLich').classList.remove('active');

        document.querySelector('.btnDK').classList.add('active');
        document.querySelector('.btnXL').classList.remove('active');
    }

    function btnXemLich() {
        document.querySelector('.appDangKy').classList.remove('active');
        document.querySelector('.appXemLich').classList.add('active');

        document.querySelector('.btnDK').classList.remove('active');
        document.querySelector('.btnXL').classList.add('active');
    }
</script>

</html>