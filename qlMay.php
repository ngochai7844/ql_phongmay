<?php

include './connectDatabase.php';
$id = $_GET['id'];
$layID = "{$id}";

$sql = "SELECT * FROM qlmay WHERE idPhong='$layID' ";
$result = mysqli_query($conn, $sql);

if (isset($_POST['gui'])) {
    $trangThai = $_POST['trangthai'];
    $maMay = $_POST['mamay'];
    $sqlUpdate = " UPDATE qlmay SET tinhTrang='$trangThai' WHERE maMay='$maMay' ";
    $kqUpdate = mysqli_query($conn, $sqlUpdate);
    if ($kqUpdate) {
        header('Location: qlMay.php?id='.$layID);
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
    <title>Quản lý máy</title>
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

            <h3>Quản lý phòng <i class="fa-solid fa-angle-right"></i> Quản lý máy phòng "B10<?php echo $layID ?>"</h3>
            <a href="qlPhong.php"><i class="fa-solid fa-backward"></i> Trở lại</a>

            <div class="app__container__content">

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="app__container__content__may">

                            <img src="./img/item.jpg" alt="">

                            <h3><?php echo $row['tenMay']; ?></h3>

                            <p>Tình trạng: <?php echo $row['tinhTrang']; ?></p>

                            <form action="qlMay.php?id=<?php echo $row['idPhong'] ?>" method="post">

                            <input type="text" value="<?php echo $row['maMay']; ?>" name="mamay">

                                <div class="app__container__content__may__trangthai">

                                    <select name="trangthai">
                                        <option value="">---Báo cáo---</option>
                                        <option value="Tốt">Tốt</option>
                                        <option value="Hỏng">Hỏng</option>
                                    </select>

                                    <button name="gui">Gửi</button>
                                </div>

                            </form>

                        </div>
                <?php }
                } ?>

            </div>

        </div>

    </div>

</body>

</html>