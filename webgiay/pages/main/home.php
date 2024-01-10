<div class="title">
    <h3 class="title_content">SẢN PHẨM MỚI NHẤT </h3>
</div>
<div class="product_home_list">
    <?php
    $sql_product = "SELECT *FROM tbl_sanpham  ORDER BY id_sanpham ASC";
    $query_product = mysqli_query($mysqli, $sql_product);
    while ($row_product = mysqli_fetch_array($query_product)) {
    ?>
        <form class="product_home_item" method="POST" action="pages/cart/themgiohang.php?idsanpham=<?php echo $row_product['id_sanpham'] ?>">
            <a href="index.php?quanly=chitietsanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                <img class="product_item_img" src="admincp/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanh'] ?>">
                <div class="product_item_desreption">
                    <p class="title_product"><?php echo $row_product['tensanpham'] ?></p>
                    <p class="gia_product"><?php echo number_format($row_product['giasanpham'], 0, ',', '.') ?>VNĐ</p>
                </div>
            </a>
            <div class="product_list_link">
                <button type="submit" name="themgiohang" class="product_list_btn">
                    <i class="fa-solid fa-cart-plus"></i>THEM GIO HANG</button>
            </div>
        </form>
    <?php  } ?>
</div>
<div class="container_product" width="100%">
    <?php
    $sql_category = "SELECT * FROM tbl_cartegory  LIMIT 3 ";
    $query_category = mysqli_query($mysqli, $sql_category);

    while ($row_category = mysqli_fetch_assoc($query_category)) {
        if ($row_category)
    ?>

        <div class="title">
            <h3 class="title_content"><?php echo $row_category['tendanhmuc'] ?> </h3>
        </div>
        <div class="row">
            <?php
            $sql_product = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '" . $row_category['id_danhmuc'] . "' ";
            $query_product = mysqli_query($mysqli, $sql_product);

            while ($row_product = mysqli_fetch_assoc($query_product)) {
            ?>
                <form class="product_home_item" method="POST" action="pages/cart/themgiohang.php?idsanpham=<?php echo $row_product['id_sanpham'] ?>">
                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row_product['id_sanpham'] ?>">
                        <img class="product_item_img" src="admincp/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanh'] ?>">
                        <div class="product_item_desreption">
                            <p class="title_product"><?php echo $row_product['tensanpham'] ?></p>
                            <p class="gia_product"><?php echo number_format($row_product['giasanpham'], 0, ',', '.') ?>VNĐ</p>
                        </div>
                    </a>
                    <div class="product_list_link">
                        <button type="submit" name="themgiohang" class="product_list_btn">
                            <i class="fa-solid fa-cart-plus"></i>THEM GIO HANG</button>
                    </div>
                </form>

            <?php
            }
            ?>
        </div>

    <?php
    }
    ?>

</div>