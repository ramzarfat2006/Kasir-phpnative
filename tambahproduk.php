<?php
    session_start();
    include 'koneksi.php';
    if(isset($_POST['nama_produk'])){
        $nama = $_POST['nama_produk'];
        $harga= $_POST['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "INSERT INTO produk (nama_produk,harga,stok) VALUES ('$nama','$harga','$stok')");
        if($query){
            echo '<script> alert ("Tambah data berhasil"); location.href="produk.php" </script>';
        } else {
            echo '<script> alert ("Tambah data gagal") </script>';
        }
    }

    $page = 'produk.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php include 'layout/css.php' ?>
    
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        
        <?php include 'layout/sidebar.php' ?>

        <!-- Content Start -->
        <div class="content">
            
            <?php include 'layout/navbar.php' ?>


            <!-- Sale & Revenue Start -->
            <div class="container-fluid">
                <h2 class="mt-4">Tambah Data Produk</h2>

                <a href="produk.php" class="btn btn-secondary">Kembali</a>
                <br><br>

                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Nama Produk</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" name="nama_produk" require></td>
                        </tr>
                        <tr>
                            <td width="200">Harga</td>
                            <td width="1">:</td>
                            <td><input class="form-control" rows="5" type="number" name="harga" require></td>
                        </tr>
                        <tr>
                            <td width="200">Stok</td>
                            <td width="1">:</td>
                            <td><input class="form-control" step="0" type="number" name="stok" require></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- Sale & Revenue End -->

            <?php include 'layout/footer.php' ?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include 'layout/js.php' ?>
</body>

</html>