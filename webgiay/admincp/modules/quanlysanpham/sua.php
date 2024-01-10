<?php
$sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sanpham = mysqli_query($mysqli, $sql_sua_sanpham);
?>

<H3>Sửa sản phẩm</H3>
<table border="1px" width="100%" style="border-collapse: collapse;">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_sanpham)) {
    ?>
        <form method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $dong['id_sanpham'] ?>" enctype="multipart/form-data">
            <tr><!--cột 1-->
                <td>Tên sản phẩm</td>
                <td><input type="text" value="<?php echo $dong['tensanpham'] ?>" name="tensanpham"></td>
            </tr>
            <tr><!--cột 2-->
                <td>Mã sản phẩm</td>
                <td><input type="text" value="<?php echo $dong['masanpham'] ?>" name="masanpham"></td>
            </tr>
            <tr><!--cột 3-->
                <td>Giá sản phẩm</td>
                <td><input type="text" value="<?php echo $dong['giasanpham'] ?>" name="giasanpham"></td>
            </tr>
            <tr><!--cột 4-->
                <td>Hình ảnh sản phẩm</td>
                <td><input type="file" value="<?php echo $dong['hinhanh'] ?>" name="hinhanh"></td>
            </tr>
            <tr><!--cột 5-->
                <td>Số lượng sản phẩm</td>
                <td><input type="text" value="<?php echo $dong['soluongsanpham'] ?>" name="soluongsanpham"></td>
            </tr>
            <tr><!--cột 6-->
                <td>Tóm tắt sản phẩm</td>
                <td><input type="text" value="<?php echo $dong['tomtatsanpham'] ?>" name="tomtatsanpham"></td>
            </tr>
            <tr><!--cột 7-->
                <td>Nội dung sản phẩm</td>
                <td><input type="text" value="<?php echo $dong['noidungsanpham'] ?>" name="noidungsanpham"></td>
            </tr>
            <tr><!--cột 8-->
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_cartegory ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            if ($row_danhmuc['id_danhmuc'] == $dong['id_danhmuc']) {
                        ?>
                                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <!-- <tr>cột 9
                 <td>Tình trạng sản phẩm </td>
                <td><input type="text" value="<?php //echo $dong['tinhtrangsanpham'] ?>" name="tinhtrangsanpham"></td> 
            </tr> -->
            <tr>cột 9
            <td>Tình trạng sản phẩm</td>
            <td>
                <select name="tinhtrangsanpham">
                    <option value="1">Kích hoạt sản phẩm</option>
                    <option value="0">Ẩn sản phẩm</option>
                </select>
            </td>
        </tr>
            <tr>
                <td colspan="2"><input type="submit" name="suasanpham" value="Sửa danh sách sản phẩm"></td>
            </tr>
        <?php
    }
        ?>

        </form>
</table>