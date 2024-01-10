<h3 class="hearder">THÊM SẢN PHẨM</h3>
<div class="them_link">
<table border="1px" width="80%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
        <tr><!--cột 1-->
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr><!--cột 2-->
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masanpham"></td>
        </tr>
        <tr><!--cột 3-->
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasanpham"></td>
        </tr>
        <tr><!--cột 4-->
            <td>Số lượng sản phẩm</td>
            <td><input type="text" name="soluongsanpham"></td>
        </tr>
        <tr><!--cột 5-->
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr><!--cột 6-->
            <td>Tóm tắt sản phẩm</td>
            <td><textarea rows="5" name="tomtatsanpham"></textarea></td>
        </tr>

        <tr><!--cột 7-->
            <td>Nội dung sản phẩm</td>
            <td><textarea rows="5" name="noidungsanpham"></textarea></td>
        </tr>
        <tr><!--cột 8-->
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_cartegory ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr><!--cột 9-->
            <td>Tình trạng sản phẩm</td>
            <td>
                <select name="tinhtrangsanpham">
                    <option value="1">Kích hoạt sản phẩm</option>
                    <option value="0">Ẩn sản phẩm</option>
                </select>
            </td>
        </tr>
        <tr class="input_dmsp">
            <td colspan="2"><input class="btn" type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>

    </form>
</table>
</div>