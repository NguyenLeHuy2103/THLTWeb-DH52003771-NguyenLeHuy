

<body>
    <div class="grid">
        <div class="cart-product">
            <h1><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng Của Bạn</h1>
            <table class="cart-product-table">
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    ?>
                    <tr class="cart-product-heading-wrapper">
                        <th class="cart-product-heading">No</th>
                        <th class="cart-product-heading">Tên sản phẩm</th>
                        <th class="cart-product-heading"></th>
                        <th class="cart-product-heading">Giá</th>
                        <th class="cart-product-heading">Số lượng</th>
                        <th class="cart-product-heading">Tổng cộng</th>
                        <th class="cart-product-heading">Thao tác</th>
                    </tr>
                    <?php
                    $i = 1;
                    $totalcart = 0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $total = $cart_item['soluongsanpham'] * $cart_item['giasanpham'];
                        $totalcart += $total;
                        ?>
                        <tr>
                            <td class="cart-product-item cart-product-item-id"><?php echo $i ?></td>
                            <td class="cart-product-item"><?php echo $cart_item['tensanpham'] ?></td>
                            <td class="cart-product-item"><img src="admincp/modules/quanlisanpham/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="ảnh sản phẩm"></td>
                            <td class="cart-product-item"><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') ?>VNĐ</td>
                            <td class="text-center cart-product-item">
                                <a href="pages/cart/themgiohang.php?minus=<?php echo $cart_item['id_sanpham'] ?>" class="cart-product__icon-link">
                                    <i class="fa-solid fa-minus"></i>
                                </a>
                                <?php echo $cart_item['soluongsanpham'] ?>
                                <a href="pages/cart/themgiohang.php?plus=<?php echo $cart_item['id_sanpham'] ?>" class="cart-product__icon-link">
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </td>
                            <td class="cart-product-item"><?php echo number_format($total, 0, ',', '.') ?>VNĐ</td>
                            <td class="cart-product-item">
                                <a href="pages/cart/themgiohang.php?delete=<?php echo $cart_item['id_sanpham'] ?>" class="remove-button">Xóa</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    <tr>
                        <td class="cart-total" colspan="7">
                            <p class="cart-product-total">Thành tiền: <?php echo number_format($totalcart, 0, ',', '.') ?> VNĐ</p>
                            <a href="index.php?quanly=tinhtien"><button class="btn btn--primary btn-buy-cart">Mua hàng</button></a>
                        </td>
                    </tr>
                    <?php
                } else {
                    ?>
                    <tr>
                        <td colspan="7" class="cart-no-product">Bạn chưa thêm sản phẩm vào giỏ hàng!</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
