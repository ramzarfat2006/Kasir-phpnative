<?php
    session_start();
    include 'koneksi.php';

    if(isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])){
        $tanggal_awal = $_GET['tanggal_awal'];
        $tanggal_akhir = $_GET['tanggal_akhir'];
        
        $query_waktu = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan LEFT JOIN user ON user.id_user = penjualan.id_user WHERE tanggal_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
    } else {
        $query_waktu = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan LEFT JOIN user ON user.id_user = penjualan.id_user");
    }

    $page = 'laporan.php';
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
                <h2 class="mt-4">Laporan Penjualan</h2>

                <form method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary mt-4">Tampilkan Laporan</button>
                            <a href="laporan.php" class="btn btn-secondary mt-4">Reset</a>
                        </div>
                    </div>
                </form>

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
                        $no = 1;
                        foreach($query_waktu as $data):
                    ?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['kode_penjualan']; ?>
                            </td>
                            <td>
                                <?php echo $data['tanggal_penjualan']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_pelanggan']; ?>
                            </td>
                            <td>
                                <?php echo $data['total_harga']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <a href="detaillaporan.php?id=<?php echo $data['id_penjualan']; ?>"
                                    class="btn btn-success">Detail</a>
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