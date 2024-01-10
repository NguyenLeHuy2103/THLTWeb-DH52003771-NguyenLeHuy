
<?php
include('config/config.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($mysqli, $sql);
    $row_user = mysqli_fetch_array($query);
    $_SESSION['user'] = $row_user;
        if ($_SESSION['user']['role'] == 0) {
            header('Location:index.php');
         } elseif ($_SESSION['user']['role'] == 1) {
             header('Location:../index.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/dangky.css">
</head>

<body>
    <div class="wrapper-container">
        <h2>Đăng Nhập</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="" name="password" required>
            </div>
            <div class="form-group btn btn--primary">
                <button type="submit" name="login">Đăng nhập</button>
            </div>
            <div class="form-group-link">
                <p>Bạn chưa có tài khoản ?<a href="dangky.php"> Đăng kí</a></p>
                <p> Bạn gặp vấn đề ?<a href="">Quên Mật Khẩu</a></p>
            </div>
        </form>
    </div>
</body>

</html>
<?php

?>
