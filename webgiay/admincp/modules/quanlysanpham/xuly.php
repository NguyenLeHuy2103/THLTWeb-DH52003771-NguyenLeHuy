<?php
include('../../config/config.php');



if (isset($_POST['themsanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $masanpham = $_POST['masanpham'];
    $giasanpham = $_POST['giasanpham'];
    $soluongsanpham = $_POST['soluongsanpham'];
    $tomtatsanpham = $_POST['tomtatsanpham'];
    $noidungsanpham = $_POST['noidungsanpham'];
    $tinhtrangsanpham = $_POST['tinhtrangsanpham'];
    //xử lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;
    //danh muc san pham
    $danhmuc = $_POST['danhmuc'];
    //thêm
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluongsanpham
        ,hinhanh,tomtatsanpham,noidungsanpham,tinhtrangsanpham,id_danhmuc) VALUE ('" . $tensanpham . "','" . $masanpham . "','" . $giasanpham . "','" . $soluongsanpham . "'
        ,'" . $hinhanh . "','" . $tomtatsanpham . "','" . $noidungsanpham . "','" . $tinhtrangsanpham . "','" . $danhmuc . "')";
    //thêm dữ liệu vào tbl
    mysqli_query($mysqli, $sql_them);
    //di chuyển hình ảnh
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else if (isset($_POST['suasanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $masanpham = $_POST['masanpham'];
    $giasanpham = $_POST['giasanpham'];
    $soluongsanpham = $_POST['soluongsanpham'];
    $tomtatsanpham = $_POST['tomtatsanpham'];
    $noidungsanpham = $_POST['noidungsanpham'];
    $tinhtrangsanpham = $_POST['tinhtrangsanpham'];
    //xử lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;
    if($hinhanh!=''){
        //tải ảnh lên
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        
        $id = $_GET['idsanpham'];
        $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row_hinhanh = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row_hinhanh['hinhanh']);
        }
    //sửa ảnh
    $sql_update = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
        giasanpham='" . $giasanpham . "',soluongsanpham='" . $soluongsanpham . "',hinhanh='" . $hinhanh . "',tomtatsanpham='" . $tomtatsanpham . "'
        ,noidungsanpham='" . $noidungsanpham . "',tinhtrangsanpham='" . $tinhtrangsanpham . "'
        WHERE id_sanpham='$_GET[idsanpham]'";
      
    }else{
        $sql_update = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',
        giasanpham='" . $giasanpham . "',soluongsanpham='" . $soluongsanpham . "',tomtatsanpham='" . $tomtatsanpham . "'
        ,noidungsanpham='" . $noidungsanpham . "',tinhtrangsanpham='" . $tinhtrangsanpham . "'
        WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else {

    //xóa
    $id = $_GET['idsanpham'];
    $sql = "SELECT *FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row_hinhanh = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row_hinhanh['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='" . $id . "' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
