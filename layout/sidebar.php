
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="bi bi-basket-fill"></i> KASIR</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['user']['nama']; ?></h6>
                        <span><?php echo $_SESSION['user']['level']; ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link <?php echo ($page == 'index.php') ? 'active' : ''; ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>                    
                    <a href="produk.php" class="nav-item nav-link <?php echo ($page == 'produk.php') ? 'active' : ''; ?>"><i class="fa fa-list-alt me-2"></i>Produk</a>
                    <?php if ($_SESSION['user']['level'] == 'admin') : ?>
                        <a href="user.php" class="nav-item nav-link <?php echo ($page == 'user.php') ? 'active' : ''; ?>"><i class="fa fa-user me-2"></i>User</a>
                        <a href="laporan.php" class="nav-item nav-link <?php echo ($page == 'laporan.php') ? 'active' : ''; ?>"><i class="fa fa-print me-2"></i>Laporan Penjualan</a>
                    <?php endif; ?>
                    
                    <?php if ($_SESSION['user']['level'] == 'kasir') : ?>
                        <a href="pelanggan.php" class="nav-item nav-link <?php echo ($page == 'pelanggan.php') ? 'active' : ''; ?>"><i class="fa fa-users me-2"></i>Pelanggan</a>
                        <a href="pembelian.php" class="nav-item nav-link <?php echo ($page == 'pembelian.php') ? 'active' : ''; ?>"><i class="fa fa-cart-plus me-2"></i>Pembelian</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->