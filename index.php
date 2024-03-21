<?php
    session_start();

    include 'koneksi.php';

    class Statistik {
        private $db;
        public function __construct($db){
            $this->db = $db;
        }
        public function getTotalPelanggan(){
            $result = $this->db->koneksi->query("SELECT * FROM pelanggan");
            return mysqli_num_rows($result);
        }
        public function getTotalProduk(){
            $result = $this->db->koneksi->query("SELECT * FROM produk");
            return mysqli_num_rows($result);
        }
        public function getTotalPembelian(){
            $result = $this->db->koneksi->query("SELECT * FROM penjualan");
            return mysqli_num_rows($result);
        }
        public function getTotalUser(){
            $result = $this->db->koneksi->query("SELECT * FROM user");
            return mysqli_num_rows($result);
        }
    }

    $db = new stdClass();
    $db->koneksi = $koneksi;
    $statistik = new Statistik($db);
    
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }

    $page = 'index.php';
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
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h3>Halo <?php echo $_SESSION['user']['nama']; ?>, Selamat Datang Di Aplikasi Kasir</h3>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-danger rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-light"></i>
                            <div class="ms-3">
                                <h6 class="mb-2"><?php echo $statistik->getTotalPelanggan() ?> Total Pelanggan </h6>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-warning rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-light"></i>
                            <div class="ms-3">
                                <h6 class="mb-2"><?php echo $statistik->getTotalProduk() ?> Total Produk</h6>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-success rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-light"></i>
                            <div class="ms-3">
                                <h6 class="mb-2"><?php echo $statistik->getTotalPembelian() ?> Pembelian</h6>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-light"></i>
                            <div class="ms-3">
                                <h6 class="mb-2"><?php echo $statistik->getTotalUser() ?> Total User</h6>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
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