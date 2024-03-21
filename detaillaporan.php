<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan LEFT JOIN user ON user.id_user = penjualan.id_user WHERE id_penjualan = $id");
    $data = mysqli_fetch_array($query);

    $page = 'laporan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php include 'layout/css.php' ?>

    <style>
        @media print {
            .btn-print, .navbar, .footer {
                display: none;
            }
        }
    </style>
    
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        
        <?php include 'layout/sidebar.php' ?>

        <!-- Content Start -->
        <div class="content">
            
            <?php include 'layout/navbar.php' ?>


            <!-- Sale & Revenue Start -->
            <div class="container-fluid">
                <h2 class="mt-4">Detail Laporan</h2>

                <a href="laporan.php" class="btn btn-secondary btn-print">Kembali</a>
                <br><br>

                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Nama Pelanggan</td>
                            <td width="1">:</td>
                            <td>
                                <?php echo $data['nama_pelanggan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Kode Penjualan</td>
                            <td width="1">:</td>
                            <td>
                                <?php echo $data['kode_penjualan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal</td>
                            <td width="1">:</td>
                            <td>
                                <?php echo $data['tanggal_penjualan']; ?>
                            </td>
                        </tr>
                        <?php 
                            $pr = mysqli_query($koneksi, "SELECT * FROM detailpenjualan LEFT JOIN produk ON produk.id_produk = detailpenjualan.id_produk WHERE kode_penjualan = $id");
                            foreach($pr as $prod):
                        ?>
                        <tr>
                            <td><?php echo $prod['nama_produk']; ?></td>
                            <td>:</td>
                            <td>
                                Harga Satuan : <?php echo $prod['harga']; ?>
                            </td>
                            <td>
                                Jumlah : <?php echo $prod['jumlah_produk']; ?>
                            </td>
                            <td>
                             Sub Total : <?php echo $prod['sub_total']; ?>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                        <tr>
                            <td>User</td>
                            <td>:</td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td>
                                <?php echo $data['total_harga']; ?>
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