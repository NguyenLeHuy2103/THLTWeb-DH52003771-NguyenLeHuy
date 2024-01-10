<?php
$sql = "SELECT * FROM tbl_order,tbl_admin WHERE tbl_order.id_user = tbl_admin.id_admin ORDER BY orderdate ASC";
$query = mysqli_query($mysqli, $sql);

?>


<h3 class="section-header">Danh sách đơn hàng</h3>

<table class="custom-table list-table" border="1">
    <form method="POST" action="module/quanlidanhmuc/xuly.php">
        <tr>
            <th>Id</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày mua</th>
            <th>Thành Tiền</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>
            <th>Quản lí</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['hovaten'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['diachi'] ?></td>
                <td><?php echo $row['sdt'] ?></td>
                <td><?php echo $row['ordercode'] ?></td>
                <td><?php echo $row['orderdate'] ?></td>
                <td><?php echo number_format($row['total'], 0, ',', '.') ?>VNĐ</td>
                <td><strong><?php
                            if ($row['status'] == 0)  echo 'Đơn hàng mới';
                            elseif ($row['status'] == 1) echo 'Đã xử lý';
                            ?></strong></td>

                <td><a href="index.php?action=quanlidonhang&query=view&ordercode=<?php echo $row['ordercode'] ?>">Xem chi tiết</a>

                </td>
                <td> <?php
                        if ($row['status'] == 0) {
                        ?>
                        <a class="btn btn-success" href="index.php?action=quanlidonhang&query=edit&ordercode=<?php echo $row['ordercode'] ?>">
                            <i class="fa-solid fa-check"></i>
                        </a>
                    <?php
                        }
                    ?>
                    <a onclick="return confirm('Bạn có muốn xóa ?')" class="btn btn-danger" href="index.php?action=quanlidonhang&query=delete&id=<?php echo $row['id_order'] ?>"><i class="fa-solid fa-ban"></i></a>

                </td>
            </tr>
        <?php
        }
        ?>
    </form>
</table>    