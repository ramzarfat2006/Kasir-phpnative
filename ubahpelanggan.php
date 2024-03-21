<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    if(isset($_POST['nama_pelanggan'])){
        $nama = $_POST['nama_pelanggan'];
        $alamat= $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];

        $query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan = '$nama', alamat = '$alamat', no_telepon = '$no_telepon' WHERE id_pelanggan = $id");
        if($query){
            echo '<script>alert("Ubah data berhasil"); location.href="pelanggan.php" </script>';
        } else {
            echo '<script>alert("Ubah data gagal"); </script>';
        }
    }

    $queryubah = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = $id");
    $data = mysqli_fetch_array($queryubah);
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
                <h2 class="mt-4">Ubah Data Pelanggan</h2>

                <a href="pelanggan.php" class="btn btn-secondary">Kembali</a>
                <br><br>

                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Nama Pelanggan</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['nama_pelanggan']; ?>" type="text" name="nama_pelanggan"></td>
                        </tr>
                        <tr>
                            <td width="200">Alamat</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['alamat']; ?>" rows="5" type="text" name="alamat"></td>
                        </tr>
                        <tr>
                            <td width="200">No Telepon</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['no_telepon']; ?>" step="0" type="number" name="no_telepon"></td>
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