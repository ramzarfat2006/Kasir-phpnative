<?php
    session_start();
    include 'koneksi.php';
    if(isset($_POST['nama_pelanggan'])){
        $nama = $_POST['nama_pelanggan'];
        $alamat= $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];

        $query = mysqli_query($koneksi, "INSERT INTO pelanggan (nama_pelanggan,alamat,no_telepon) VALUES ('$nama','$alamat','$no_telepon')");
        if($query){
            echo '<script> alert ("Tambah data berhasil"); location.href="pelanggan.php" </script>';
        } else {
            echo '<script> alert ("Tambah data gagal") </script>';
        }
    }
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
                <h2 class="mt-4">Tambah Data Pelanggan</h2>

                <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                <br><br>

                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Nama Pelanggan</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" name="nama_pelanggan" require></td>
                        </tr>
                        <tr>
                            <td width="200">Alamat</td>
                            <td width="1">:</td>
                            <td><input class="form-control" rows="5" type="text" name="alamat" require></td>
                        </tr>
                        <tr>
                            <td width="200">No Telepon</td>
                            <td width="1">:</td>
                            <td><input class="form-control" step="0" type="number" name="no_telepon" require></td>
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