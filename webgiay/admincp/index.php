<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">

    <title>ADMINCP</title>
  </head>

  <body>
    <!-- <div class="header_admin">
      <h3>Trang Admincp của Tiễn</h3>
    </div> -->

    <div class="wrapper"><!--thẻ lớn-->
      <!--include lấy dữ liệu từng cái trong php theo thứ tự (header; menu; main; footer)-->
      <?php
      include("config/config.php");
      include("modules/header.php");
      include("modules/menu.php");
      include("modules/main.php");
      include("modules/footer.php");
      ?>
    </div>
  </body>

  </html>
<?php
} else {
  header('Location:login.php');
}
?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
  unset($_SESSION['user']);
  // header('');
}
?>