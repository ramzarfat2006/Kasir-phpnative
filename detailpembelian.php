<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan = $id");
    $data = mysqli_fetch_array($query);

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
                <h2 class="mt-4">Detail Pembelian</h2>

                <a href="pembelian.php" class="btn btn-secondary">Kembali</a>
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
                        <?php 
                            $pr = mysqli_query($koneksi, "SELECT * FROM detailpenjualan LEFT JOIN produk ON produk.id_produk = detailpenjualan.id_produk WHERE id_penjualan = $id");
                            while($prod = mysqli_fetch_array($pr)){
                        ?>
                        <tr>
                            <td><?php echo $prod['nama_produk']; ?></td>
                            <td>:</td>
                            <td>
                                Harga Satuan : <?php echo $prod['harga']; ?><br>
                                Jumlah : <?php echo $prod['jumlah_produk']; ?><br>
                                Sub Total : <?php echo $prod['sub_total']; ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
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