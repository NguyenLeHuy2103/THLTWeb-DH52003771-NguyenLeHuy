<?php
session_start();
// Thêm vào giỏ hàng
include('../../admincp/config/config.php');

if (isset($_POST['themgiohang'])) {
    // Kiểm tra xem 'idproduct' có được đặt trong mảng $_GET không
    if (isset($_GET['idsanpham'])) {
        $id = $_GET['idsanpham'];
        $soluongsanpham = 1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);

        if ($row) {
            $newproduct = array(
                'id_sanpham' => $row['id_sanpham'],
                'tensanpham' => $row['tensanpham'],
                'giasanpham' => $row['giasanpham'],
                'soluongsanpham' => $soluongsanpham,
                'hinhanh' => $row['hinhanh']
            );
            if (isset($_SESSION['cart'])) {
                $found = false;
                $product = array();
                foreach ($_SESSION['cart'] as $cart_item) {
                    if ($cart_item['id_sanpham'] == $id) {
                        $product[] = array(
                            'id_sanpham' => $cart_item['id_sanpham'],
                            'tensanpham' => $cart_item['tensanpham'],
                            'giasanpham' => $cart_item['giasanpham'],
                            'soluongsanpham' => $cart_item['soluongsanpham'] + 1,
                            'hinhanh' => $cart_item['hinhanh']
                        );
                        $found = true;
                    } else {
                        $product[] = $cart_item;
                    }
                }

                if (!$found) {
                    $product[] = $newproduct;
                }
                $_SESSION['cart'] = $product;
            } else {
                $_SESSION['cart'] = array($newproduct);
            }
            //  header('Location:../../index.php?quanli=cart');
?>
            <script>
                window.history.back();
            </script>
    <?php
        }
       
    }
}

//Thêm số lượng
if (isset($_SESSION['cart']) && isset($_GET['plus'])) {
    $id = $_GET['plus'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_sanpham'] != $id) {
            $product[] = array(
                'id_sanpham' => $cart_item['id_sanpham'],
                'tensanpham' => $cart_item['tensanpham'],
                'giasanpham' => $cart_item['giasanpham'],
                'soluongsanpham' => $cart_item['soluongsanpham'],
                'hinhanh' => $cart_item['hinhanh']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluongsanpham'] + 1;
            if ($cart_item['soluongsanpham'] < 10 && $cart_item['soluongsanpham'] > 0) {
                $product[] = array(
                    'id_sanpham' => $cart_item['id_sanpham'],
                    'tensanpham' => $cart_item['tensanpham'],
                    'giasanpham' => $cart_item['giasanpham'],
                    'soluongsanpham' => $tangsoluong,
                    'hinhanh' => $cart_item['hinhanh']
                );
            } else {
                $product[] = array(
                    'id_sanpham' => $cart_item['id_sanpham'],
                    'tensanpham' => $cart_item['tensanpham'],
                    'giasanpham' => $cart_item['giasanpham'],
                    'soluongsanpham' => $cart_item['soluongsanpham'],
                    'hinhanh' => $cart_item['hinhanh']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }

    header('Location:../../index.php?quanly=giohang');
}
//Giảm số lượng
if (isset($_SESSION['cart']) && isset($_GET['minus'])) {
    $id = $_GET['minus'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_sanpham'] != $id) {
            $product[] = array(
                'id_sanpham' => $cart_item['id_sanpham'],
                'tensanpham' => $cart_item['tensanpham'],
                'giasanpham' => $cart_item['giasanpham'],
                'soluongsanpham' => $cart_item['soluongsanpham'],
                'hinhanh' => $cart_item['hinhanh']
            );
            $_SESSION['cart'] = $product;
        } else {
            $giamsoluong = $cart_item['soluongsanpham'] - 1;
            if ($cart_item['soluongsanpham'] > 1) {
                $product[] = array(
                    'id_sanpham' => $cart_item['id_sanpham'],
                    'tensanpham' => $cart_item['tensanpham'],
                    'giasanpham' => $cart_item['giasanpham'],
                    'soluongsanpham' => $giamsoluong,
                    'hinhanh' => $cart_item['hinhanh']
                );
            } else {
                $product[] = array(
                    'id_sanpham' => $cart_item['id_sanpham'],
                    'tensanpham' => $cart_item['tensanpham'],
                    'giasanpham' => $cart_item['giasanpham'],
                    'soluongsanpham' => $cart_item['soluongsanpham'],
                    'hinhanh' => $cart_item['hinhanh']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }

    header('Location:../../index.php?quanly=giohang');
}
// Xóa sản phẩm khỏi giỏ hàng
if (isset($_SESSION['cart']) && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_sanpham'] != $id) {
            $product[] = array(
                'id_sanpham' => $cart_item['id_sanpham'],
                'tensanpham' => $cart_item['tensanpham'],
                'giasanpham' => $cart_item['giasanpham'],
                'soluongsanpham' => $cart_item['soluongsanpham'],
                'hinhanh' => $cart_item['hinhanh']
            );
        }
    }
    $_SESSION['cart'] = $product;
    ?>
    <script>
        window.history.back();
    </script>
<?php
}

?>

