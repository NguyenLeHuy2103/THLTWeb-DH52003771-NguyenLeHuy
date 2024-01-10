<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
   
    <title>WEB GIAY</title>

</head>

<body>

    <?php
    include('admincp/config/config.php');
    //include("pages/header.php");
    include("pages/menu.php");
    //include("pages/body.php");
    include("pages/main.php");
    include("pages/footer.php");

    ?>
</body>

</html>