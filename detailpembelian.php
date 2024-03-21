<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan = $id");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['bayar'])){
        $bayar = $_POST['bayar'];
        $total_harga = $data['total_harga'];

        if($bayar < $total_harga){
            echo '<script>alert("Uang tidak cukup!")</script>';
        } else {
            $kembalian = $bayar - $total_harga;
            echo '<script>alert("Kembalian Anda : '.$kembalian.'");</script>';

            $query_bayar = mysqli_query($koneksi, "UPDATE penjualan SET bayar = $bayar WHERE id_penjualan = $id");
            if($query_bayar){
                echo '<script>alert("Pembayaran Berhasil!"); location.href = "detailpembelian.php?id='.$id.'";</script>';
            } else {
                echo '<script>alert("Pembayaran Gagal!")</script>';
            }
        }
    }

    $page = 'pembelian.php';
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
                <h2 class="mt-4">Detail Pembelian</h2>

                <a href="pembelian.php" class="btn btn-secondary btn-print">Kembali</a>
                <a type="button" class="btn btn-danger btn-print" onclick="window.print()">Cetak</a>
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
                            <td>Total</td>
                            <td>:</td>
                            <td>
                                <?php echo $data['total_harga']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td>:</td>
                            <td>
                                <?php if(isset($data['bayar']) && $data['bayar'] > 0) {
                                    echo '<button type="button" class="btn btn-success mt-2 btn-print" disabled>Sudah Dibayar</button>';
                                } else { ?>
                                <form method="post">
                                    <input class="form-control" type="number" name="bayar" value="<?php echo $data['bayar']; ?>">
                                    <button type="submit" class="btn btn-primary mt-2 btn-print">Bayar</button>
                                </form>
                                <?php } ?>
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