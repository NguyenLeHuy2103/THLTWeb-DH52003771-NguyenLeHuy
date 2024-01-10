<h2 class="them">THÊM DANH MỤC SẢN PHẨM</h2>
<div class="them_link">
    <table border="1px" width="50%"  style="border-collapse: collapse;" class="them_link_table">
        <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
            <tr><!--cột 1-->
                <td style="padding: 20px; width: 100px;" >Tên danh mục</td>
                <td style="padding: 20px;"><input style="width: 95%; padding: 10px;" type="text" name="tendanhmuc"></td>
            </tr>
            <tr><!--cột 2-->
                <td>Thứ tự</td>
                <td><input style="width: 95%; padding: 10px;" type="text" name="thutu"></td>
            </tr>
            <tr class="input_dmsp">
                <td colspan="2"><input class="btn" type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
            </tr>

        </form>
    </table>
</div>