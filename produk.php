<?php 
    session_start();
    include 'koneksi.php';

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
                <h2 class="mt-4">Data Produk</h2>

                <a href="tambahproduk.php" class="btn btn-primary">Tambah Produk</a>
                <br><br>

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM produk");
                        $no = 1;
                        while($data = mysqli_fetch_array($query)){
                    ?> 
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td><?php echo $data['stok']; ?></td>
                        <td>
                            <a href="ubahproduk.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-warning">Ubah</a>
                            <a onclick="return confirm ('Apakah anda yakin ingin menghapus ini ?')" href="hapusproduk.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
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