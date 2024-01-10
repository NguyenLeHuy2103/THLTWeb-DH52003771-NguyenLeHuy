<?php
$sql = "SELECT *FROM tbl_cartegory ORDER BY thutu DESC";
$query_danhmuc = mysqli_query($mysqli, $sql);
?>

<div class="column_20">
    <div class="row">
        <div class="wrapper_category">
            <h3 class="heading_category">
                <i class="fa-solid fa-list"></i>
                DANH MUC
            </h3>
            <ul class="category_list">
                <?php
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                    <a class="category_link" href="index.php?quanly=danhmuc&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                        <li class="category_item"><?php echo $row_danhmuc['tendanhmuc'] ?>
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>


<div class="column_80">
    <div class="row">
        <h3 class="title">DANH MỤC SẢN PHẨM</h3>
    </div>
    <div class="row">
        <!--ADIDAS-->
        <?php
     if (isset($_GET['quanly']) && $_GET['quanly']=='searchproduct' ) {
        $sql_product = "SELECT * FROM tbl_sanpham,tbl_cartegory  WHERE tbl_sanpham.id_danhmuc = tbl_cartegory.id_danhmuc AND tbl_sanpham.tensanpham like '%" . $_GET['nameproduct'] . "%'";
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
        <?php  }
        }
        ?>
    </div>
</div>