<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = $id");
    if($query){
        echo '<script>alert("Hapus data berhasil"); location.href="pelanggan.php" </script>';
    } else {
        echo '<script>alert("Hapus data gagal"); </script>';
    }
?>