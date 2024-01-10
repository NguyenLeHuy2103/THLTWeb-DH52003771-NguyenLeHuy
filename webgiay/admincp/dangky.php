

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/dangky.css">
</head>
<body>

    <div class="wrapper-container">
        <h2>Đăng Kí Tài Khoản</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <label for="hovaten">Họ và tên:</label>
                <input type="text" id="hovaten" name="hovaten" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="matkhau">mật khẩu:</label>
                <input type="password" id="matkhau" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="dangky">Đăng kí</button>
            </div>
            <p>Bạn đã có tài khoản ?<a href="login.php"> Đăngnhập</a></p>


        </form>

        <?php
include("config/config.php");
if (isset($_POST['dangky'])) {    //nếu tồn tại đăng ký
    $fullname = $_POST['hovaten'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_admin(fullname,email,username,password) 
                    VALUE('" . $fullname . "','" . $email . "','" . $username . "','" . $password . "')");
    if ($sql_dangky) {
        echo 'Bạn đăng ký thành công';
    }
}
?>
    </div>


</body>
</html>