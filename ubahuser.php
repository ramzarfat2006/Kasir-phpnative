<?php
    session_start();
    include 'koneksi.php';
    $id = $_GET['id'];
    if(isset($_POST['nama'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $level = $_POST['level'];

        $query = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', username = '$username', level = '$level' WHERE id_user = $id");
        if($query){
            echo '<script>alert("Ubah data berhasil"); location.href="user.php" </script>';
        } else {
            echo '<script>alert("Ubah data gagal"); </script>';
        }
    }

    $queryubah = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id");
    $data = mysqli_fetch_array($queryubah);

    $page = 'user.php';
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
                <h2 class="mt-4">Ubah Data User</h2>

                <a href="user.php" class="btn btn-secondary">Kembali</a>
                <br><br>

                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="200">Nama User</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['nama']; ?>" type="text" name="nama"></td>
                        </tr>
                        <tr>
                            <td width="200">Username</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['username']; ?>" rows="5" type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td width="200">Level</td>
                            <td width="1">:</td>
                            <td>
                                <select class="form-control form-select" name="level">
                                    <option value="admin" <?php if($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                    <option value="kasir" <?php if($data['level'] == 'kasir') echo 'selected'; ?>>Kasir</option>
                                </select>
                            </td>
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