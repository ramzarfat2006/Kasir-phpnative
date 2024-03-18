<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = $id");
    $query = mysqli_query($koneksi, "DELETE FROM detailpenjualan WHERE id_penjualan = $id");
    if($query){
        echo '<script>alert("Hapus data berhasil"); location.href="pembelian.php" </script>';
    } else {
        echo '<script>alert("Hapus data gagal"); </script>';
    }
?>