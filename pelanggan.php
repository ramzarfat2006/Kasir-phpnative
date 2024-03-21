<?php 
    session_start();
    include 'koneksi.php';

    $page = 'pelanggan.php';
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
                <h2 class="mt-4">Data Pelanggan</h2>

                <a href="tambahpelanggan.php" class="btn btn-primary">Tambah Pelanggan</a>
                <br><br>

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        $no = 1;
                        foreach($query as $data):
                    ?> 
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_pelanggan']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['no_telepon']; ?></td>
                        <td>
                            <a href="ubahpelanggan.php?id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-warning">Ubah</a>
                            <a onclick="return confirm ('Apakah anda yakin ingin menghapus ini ?')" href="hapuspelanggan.php?id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
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