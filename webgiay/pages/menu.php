<div class="nav_menu">
  <div class="nav_left">
    <a>
      <i class="fa-solid fa-envelope"></i>
      gmail.com</a>
    <a>
      <i class="fa-solid fa-phone"></i>
      sdt</a>
    <a>
      <i class="fa-brands fa-facebook"></i>
      Fb
    </a>
    <a>
      <i class="fa-brands fa-instagram"></i>
      Instargram
    </a>
  </div>
  <div class="nav_right">
    <?php
    if (isset($_SESSION['user']) && isset($_SESSION['user']['role']) == 1) {
    ?>
      <span>
        <i class="fa-solid fa-user"></i> <?php echo $_SESSION['user']['username'] ?>
      </span>
      <a href="index.php?logout"><i class="fa-solid fa-right-from-bracket"></i></a>
      <?php
      if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
      }
    } else {
      ?>

      <a href="admincp/login.php">Đăng nhập</a> <!--ĐĂNG NHẬP-->
      <a href="admincp/dangky.php">Đăng ký</a> <!--ĐĂNG KÝ-->
    <?php } ?>
  </div>
</div>
<div class="menu">
  <div class="header_navbar">
    <a href="index.php">
      <!-- logo -->
      <img class="logo" src="images/logo/logo.png"></a>
    <ul class="list_menu">

      <li><a href="index.php">Trang chủ</a></li>

      <li><a href="index.php?quanly=danhmuc">Sản phẩm</a></li> <!--danh mục sản phẩm-->
      <!-- </li>đầu tiên muốn truyền tham số vào 1 đg dẫn thì phải (? + tên = danhmuc & id = 1) -->


      <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
      <!-- <li><a href="index.php?quanly=tintuc"> Tin Tuc</a></li> -->
      <li></li> <!--khách hàng đăng ký -->
      <li></li> <!--khách hàng đăng nhập-->
    </ul>
  </div>

  <!-- tìm kiếm sản phẩm -->
  <div class="menu_search">
    <form class="menu_search_timkiem" action="index.php?quanly=timkiemsanpham" method="get">
      <input class="menu_search_input" type="text" placeholder="Tìm kiếm sản phẩm" name="nameproduct" value="<?php echo $_GET['nameproduct'] ?? ''; ?>">
      <button class="btn_timkiem">
        <i class="fa-solid fa-magnifying-glass btn_timkiem_icon"></i></button>
      <input type="hidden" name="quanly" value="searchproduct">
    </form>
    <!-- giỏ hàng -->
    <div class="menu_cart">
      <a class="giohang" href="index.php?quanly=giohang">
        <i class="fa-solid fa-cart-shopping"></i></a>
      <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
      ?>
        <div class="menu_cart_list">
          <h4 class="menu_cart_heading">Sản phẩm đã thêm</h4>
          <ul class="menu_cart_list_item">
            <?php
            foreach ($_SESSION['cart'] as $cart_item) {
            ?>
              <li class="menu_cart_item">
                <img class="menu_cart_img" src="../admincp/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh'] ?>">
                <div class="menu_cart_item_info">
                  <div class="menu_cart_item_infolist">
                    <h5 class="menu_cart_item_name"><?php echo $cart_item['tensanpham'] ?></h5>
                    <div class="menu_cart_price_wrap">
                      <span class="menu_cart_price"><?php echo number_format($cart_item['giasanpham']) ?>VNĐ</span>
                      <span class="menu_cart_multiply">x</span>
                      <span class="menu_cart_quantity"><?php echo $cart_item['soluongsanpham'] ?></span>
                    </div>
                  </div>
                  <div class="menu_cart_item_body">
                    <div class="menu_cart_item_classify">Phân loại: Bạc</div>
                    <div class="menu_cart_item_delete">
                      <a href="pages/cart/themgiohang.php?delete=<?php echo $cart_item['id_sanpham'] ?>" class="remove-button">Xóa</a>
                    </div>
                  </div>
                </div>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      <?php

      }else{
        ?>
        <div class="menu_cart_list">
        <h4 class="menu_cart_heading">Chưa có sản phẩm !</h4>
        <div class="cart-noproduct">
        <img width="100%" src="https://bizweb.dktcdn.net/100/404/453/themes/880946/assets/empty-cart.png?1688803819845" alt="">
        </div>
        </div>
        <?php
      } ?>

    </div>










  </div>

</div>