<?php

include './connectDatabase.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM  qltk_user WHERE email='$email' AND pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        header('Location: trangChu.php');
    } else {
        echo '<script>alert("Bạn đã nhập sai tài khoản hoặc mật khẩu!");</script>';
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Đăng nhập</title>
</head>

<body>

    <div class="app__login">

        <h3>Đăng nhập</h3>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label class="dang__nhap">
                <i class="fas fa-user"></i> <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            </label><br>

            <label class="dang__nhap">
                <i class="fas fa-lock"></i> <input type="password" placeholder="Password" name="pass" required>
            </label><br>

            <label class="dangky">
                <h3></h3><a href="#">Đăng ký tài khoản!</a>
            </label><br>

            <label>
                <a class="loginBtn"><button name="login">LOGIN</button></a>
            </label>

        </form>

    </div>

</body>

</html>