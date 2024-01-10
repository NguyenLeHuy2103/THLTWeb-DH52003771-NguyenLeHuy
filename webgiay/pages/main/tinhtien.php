<?php
include('admincp/function/order.php');

// Lấy thông tin từ session
if (isset($_SESSION['user']) && !empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user']['id_admin'];
    $order_date = date('Y-m-d');
    $total = calculate_total($_SESSION['cart']);
    $order_code = 'TN-' . $user_id . '-' . rand(0, 999);

    // Thêm đơn hàng vào cơ sở dữ liệu
    $sql_order = "INSERT INTO tbl_order (ordercode, id_user, orderdate, total) VALUES ('$order_code', '$user_id', '$order_date', '$total')";
    $result_order = mysqli_query($mysqli, $sql_order);

    if ($result_order) {
        $order_id = mysqli_insert_id($mysqli); // Lấy ID của đơn hàng vừa được thêm vào

        // Thêm chi tiết đơn hàng vào cơ sở dữ liệu
        foreach ($_SESSION['cart'] as $product) {
            $product_id = $product['id_sanpham'];
            $quantity = $product['soluongsanpham'];
            $price = $product['giasanpham'];
            $sql_detail = "INSERT INTO tbl_orderdetail (ordercode, id_product, quantityproduct, priceproduct) VALUES ('$order_code', '$product_id', '$quantity', '$price')";
            $result_detail = mysqli_query($mysqli, $sql_detail);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        unset($_SESSION['cart']);

        // Hiển thị thông báo đặt hàng thành công và mã đơn hàng
        echo '<div class="order-success">';
        echo '<p>Bạn đã đặt hàng thành công!</p>';
        echo '<p>Mã đơn hàng của bạn là: ' . $order_code . '</p>';
        echo '</div>';

    } else {
        // Xử lý lỗi khi thêm đơn hàng
        echo "Lỗi khi thêm đơn hàng: " . mysqli_error($mysqli);
        // Hoặc chuyển hướng đến trang lỗi
        // header("Location: error.php");
        exit();
    }
}




?>
<style>
    .order-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: green;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
</style>