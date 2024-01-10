<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }


    //quản lý danh mục sản phẩm: thêm danh mục sản phẩm
    if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    }
    //quản lý danh mục sản phẩm: sửa danh mục sản phẩm
    elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("modules/quanlydanhmucsp/sua.php");
    }

    //quản lý sản phẩm: thêm sản phẩm
    elseif ($tam == 'quanlysanpham' && $query == 'them') {
        include("modules/quanlysanpham/them.php");
        include("modules/quanlysanpham/lietke.php");
    }
    // //quản lý sản phẩm: sửa sản phẩm
    // elseif ($tam == 'quanlysanpham' && $query == 'sua') {
    //     include("modules/quanlysanpham/sua.php");


        
    // } elseif ($tam == 'quanlydonhang' && $query == 'them') {
    //     include("modules/quanlydonhang/danhsachdonhang.php");}
    //  else {
    //     include("modules/dashboard.php");
    // }
    //quản lý sản phẩm: tìm kiếm sản phẩm
    // Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xử lý Thêm Đơn Hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_order'])) {
        $customer_name = $_POST['customer_name'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];

        // Thực hiện truy vấn thêm mới đơn hàng vào cơ sở dữ liệu
        $sql = "INSERT INTO orders (customer_name, product_name, quantity) VALUES ('$customer_name', '$product_name', $quantity)";

        if ($conn->query($sql) === TRUE) {
            echo "Đơn hàng đã được thêm thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Truy vấn danh sách đơn hàng
$sql_select_orders = "SELECT * FROM orders";
$result_orders = $conn->query($sql_select_orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn Hàng</title>
</head>
<body>

    <h1>Quản lý Đơn Hàng</h1>

    <!-- Biểu mẫu Thêm Đơn Hàng -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="customer_name">Tên Khách Hàng:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>

        <label for="product_name">Tên Sản Phẩm:</label>
        <input type="text" id="product_name" name="product_name" required><br>

        <label for="quantity">Số Lượng:</label>
        <input type="number" id="quantity" name="quantity" required><br>

        <button type="submit" name="submit_order">Thêm Đơn Hàng</button>
    </form>

    <!-- Hiển thị Danh Sách Đơn Hàng -->
    <h2>Danh Sách Đơn Hàng</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
        </tr>
        <?php
        if ($result_orders->num_rows > 0) {
            while ($row = $result_orders->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["customer_name"] . "</td>
                        <td>" . $row["product_name"] . "</td>
                        <td>" . $row["quantity"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có đơn hàng nào.</td></tr>";
        }
        ?>
    </table>

</body>
</html>



    


    ?>

</div>