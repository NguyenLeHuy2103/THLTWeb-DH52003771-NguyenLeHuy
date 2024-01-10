<h3 style="padding: 10px;">CHI TIẾT SẢN PHẨM</h3>
<?php
if (isset($_GET['id'])) {
    $sql_detail = "SELECT *FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
    $query_detail = mysqli_query($mysqli, $sql_detail);
    $row_detail = mysqli_fetch_array($query_detail);
    // echo "<pre>";
    // print_r($row_detail);
    // echo "</pre>";
?>
    <div class="row_detail_product">
        
        <div class="picture">
            <img class="detail_picture_img" src="admincp/modules/quanlysanpham/uploads/<?php echo $row_detail['hinhanh'] ?>"></a>

        </div>
        
        <form method="post" action="pages/cart/themgiohang.php?idsanpham=<?php echo $row_detail['id_sanpham']?>" class="detail">
            <h1 class="detail-product__heading"><?php echo $row_detail['tensanpham'] ?></h1>
            <p class="detail-product-desreption">Mã sản phẩm: <?php echo $row_detail['masanpham'] ?></p>
            <p class="detail-product-desreption">Tóm tắt : <?php echo $row_detail['tomtatsanpham'] ?></p>
            <p class="detail-product-desreption">Thành phần: <?php echo $row_detail['noidungsanpham'] ?></p>
            <p class="detail-product-price">Giá sản phẩm: <?php echo number_format($row_detail['giasanpham'], 0, ',', '.') ?>VNĐ</p>
            <button class="btn btn--primary" type="submit" name="themgiohang">
                <i class="fa-solid fa-cart-plus"></i>
                Thêm giỏ hàng</button>
        </form method="post">
        
    </div>
<?php
}

?>

