<?php
    session_start();
    include 'koneksi.php';
    if(isset($_POST['id_pelanggan'])){
        $id_pelanggan= $_POST['id_pelanggan'];
        $id_user= $_POST['id_user'];
        $produk= $_POST['produk'];
        $total= 0;
        $tanggal = date('Y/m/d');
        $kode_penjualan = uniqid();

        $query = mysqli_query($koneksi, "INSERT INTO penjualan (tanggal_penjualan,id_pelanggan,id_user,kode_penjualan) VALUES ('$tanggal','$id_pelanggan','$id_user','$kode_penjualan')");

        $GetId = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id_penjualan DESC"));
        $id_penjualan = $GetId['id_penjualan'];

        foreach($produk as $key => $val){
            $barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk where id_produk = $key"));    
            
            if($val > 0){
                $sub = $val * $barang['harga'];
                $total += $sub;
                $query = mysqli_query($koneksi, "INSERT INTO detailpenjualan (kode_penjualan,id_produk,jumlah_produk,sub_total) VALUES ('$id_penjualan','$key','$val','$sub')");
                $updateStok = mysqli_query($koneksi, "UPDATE produk SET stok = stok - $val WHERE id_produk = $key");
            }
        }

        $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga = $total WHERE id_penjualan = $id_penjualan");

        if($query){
            echo '<script> alert ("Tambah data berhasil"); location.href="pembelian.php" </script>';
        } else {
            echo '<script> alert ("Tambah data gagal"); </script>';
        }
    }

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
                <h2 class="mt-4">Tambah Data Pembelian</h2>

                <a href="pembelian.php" class="btn btn-secondary">Kembali</a>
                <br><br>

                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Nama Pelanggan</td>
                            <td width="1">:</td>
                            <td>
                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id_user']; ?>">
                                <select class="form-control form-select" name="id_pelanggan">
                                    <?php
                                        $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                        foreach($p as $pel):
                                    ?>
                                            <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <?php 
                            $pr = mysqli_query($koneksi, "SELECT * FROM produk");
                            foreach($pr as $prod):
                        ?>
                        <tr>
                            <td><?php echo $prod['nama_produk'] . ' (Stok : '.$prod['stok'].')'; ?></td>
                            <td>:</td>
                            <td>
                                <input class="form-control" type="number" max="<?php echo $prod['stok']; ?>" step="0" value="" name="produk[<?php echo $prod['id_produk']; ?>]">
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
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