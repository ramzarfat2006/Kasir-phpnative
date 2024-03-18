<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id");
    if($query){
        echo '<script>alert("Hapus data berhasil"); location.href="user.php" </script>';
    } else {
        echo '<script>alert("Hapus data gagal"); </script>';
    }
?>