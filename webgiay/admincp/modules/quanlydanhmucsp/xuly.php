<?php
include('../../config/config.php');

    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themdanhmuc'])){
        //thêm
        $sql_them = "INSERT INTO tbl_cartegory(tendanhmuc,thutu) VALUE ('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');


    }else if(isset($_POST['suadanhmuc'])){
        //sửa
        $sql_update = "UPDATE tbl_cartegory SET tendanhmuc='".$tenloaisp."', thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{
        $id=$_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM tbl_cartegory WHERE id_danhmuc='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }