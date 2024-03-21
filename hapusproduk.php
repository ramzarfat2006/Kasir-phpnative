<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = $id");
    if($query){
        echo '<script>alert("Hapus data berhasil"); location.href="produk.php" </script>';
    } else {
        echo '<script>alert("Hapus data gagal"); </script>';
    }
?>