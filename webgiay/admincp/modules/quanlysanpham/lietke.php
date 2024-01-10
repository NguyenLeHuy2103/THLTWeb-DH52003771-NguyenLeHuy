<?php
//$sql_lietke_sanpham = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
$sql_lietke_sanpham = "SELECT * FROM tbl_sanpham,tbl_cartegory WHERE tbl_sanpham.id_danhmuc = tbl_cartegory.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sanpham = mysqli_query($mysqli, $sql_lietke_sanpham);
?>
<h3 class="hearder">DANH SÁCH SẢN PHẨM</h3>
<div class="menu_list">
    <table border="1px" width="100%" style="border-collapse: collapse;">
        <tr>
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng sản phẩm</th>
            <th>Danh mục</th>
            <th>Hình ảnh</th>
            <th>Tóm tắt sản phẩm</th>
            <th>Nội dung sản phẩm</th>
            <th>Tình trạng sản phẩm</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
            $i++;
        ?>

            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tensanpham'] ?></td>
                <td><?php echo $row['masanpham'] ?></td>
                <td><?php echo $row['giasanpham'] ?></td>
                <td><?php echo $row['soluongsanpham'] ?></td>
                <td><?php echo $row['tendanhmuc'] ?></td>
                <td><img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
                <td><?php echo $row['tomtatsanpham'] ?></td>
                <td><?php echo $row['noidungsanpham'] ?></td>
                <td><?php echo $row['tinhtrangsanpham'] ?></td>
                <td>
                    <a class="btn cl_red" href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> |
                    <a class="btn" href="index.php?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>