<?php

include './connectDatabase.php';

if (isset($_POST['dangky'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    $sql = " INSERT INTO  qltk_user (fullname, email, pass) VALUES ('$fullname', '$email', '$pass') ";
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
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Đăng ký</title>
</head>

<body>

    <div class="app__login">

        <h3>Đăng ký</h3>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label class="dang__nhap">
                <i class="fas fa-user"></i> <input type="text" placeholder="Full name" name="fullname" autocomplete="off" required>
            </label><br>

            <label class="dang__nhap">
                <i class="fas fa-user"></i> <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            </label><br>

            <label class="dang__nhap">
                <i class="fas fa-lock"></i> <input type="password" placeholder="Password" name="pass" required>
            </label><br>

            <label class="dang__nhap">
                <i class="fas fa-lock"></i> <input type="password" placeholder="Confirm password" name="pass2" required>
            </label><br>

            <label class="dangky">
                <h3></h3><a href="index.php">Login!</a>
            </label><br>

            <label>
                <a class="loginBtn"><button name="dangky">Đăng Ký</button></a>
            </label>

        </form>

    </div>

</body>

</html>