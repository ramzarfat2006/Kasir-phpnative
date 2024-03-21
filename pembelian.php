<?php 
    session_start();
    include 'koneksi.php';

    $page = 'pembelian.php';
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
                <h2 class="mt-4">Data Pembelian</h2>

                <a href="tambahpembelian.php" class="btn btn-primary">Tambah Pembelian</a>
                <br><br>

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Kode Penjualan</th>
                        <th>Tanggal Penjualan</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Nama User</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                        $query = mysqli_query($koneksi, "SELECT *  FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan LEFT JOIN user ON user.id_user = penjualan.id_user");
                        $no = 1;
                        foreach($query as $data):
                    ?> 
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_penjualan']; ?></td>
                        <td><?php echo $data['tanggal_penjualan']; ?></td>
                        <td><?php echo $data['nama_pelanggan']; ?></td>
                        <td><?php echo $data['total_harga']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td>
                            <a href="detailpembelian.php?id=<?php echo $data['id_penjualan']; ?>" class="btn btn-info">Detail</a>
                            <a onclick="return confirm ('Apakah anda yakin ingin menghapus ini ?')" href="hapuspembelian.php?id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
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