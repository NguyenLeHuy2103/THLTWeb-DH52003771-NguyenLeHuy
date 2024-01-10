<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_cartegory ORDER BY thutu ASC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>

<h2 class="them">LIỆT KÊ DANH MUC SẢN PHẨM</h2>
<div class="them_link">
    <table border="1px" width="100%" style="border-collapse: collapse;">
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Quản lý</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++;
        ?>

            <tr>
                <td style="text-align: center; width: 10px;"><?php echo $i ?></td>
                <td><?php echo $row['tendanhmuc'] ?></td>
                <td>
                    <a class="btn cl_red" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> |
                    <a class="btn" href="index.php?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>