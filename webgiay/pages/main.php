<div id="main">
    <div class="wrapper">
        <?php
        if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }
        if($tam == 'danhmuc')
        {
            include("main/danhmuc.php");
        }
        elseif($tam=='giohang')
        {
            include("cart/giohang.php");
        }
        elseif($tam=='lienhe')
        {
            include("main/lienhe.php");
        }
        elseif($tam=='chitietsanpham')
        {
            include("cart/chitietsanpham.php");
        }
        elseif($tam=="soluongsanpham")
        {
            include("cart/soluongsanpham.php");
        }
        elseif($tam=="timkiemsanpham")
        {
            include("main/timkiemsanpham.php");
        }
        elseif($tam=="tinhtien")
        {
            include("main/tinhtien.php");
        }
      
        // elseif($tam=='tintuc')
        // {
        //     include("main/tintuc.php");
        // }
        elseif($tam=='dangky')
        {
            include("main/dangky.php");
        }
        elseif($tam=='dangnhap')
        {
            include("main/dangnhap.php");
        }elseif($tam=='searchproduct')
        {
            include("main/timkiemsanpham.php");
        }
        else
        {
            include("main/home.php");
        }
        ?>
    </div>
</div><!--phần chính của trang-->

