<nav class="navbar sticky-top">
	<a href="index.php" class="navbar-logo"><u>Toko Buah</u> <span><u>El-Shabir</u></span></a>

	<div class="navbar-menu">
		<a href="index.php">Beranda</a>
		<a href="#">Tentang Kami</a>
		<a href="produk.php">Produk</a>
		<a href="#">Kontak</a>
	</div>

	<div class="navbar-icon">
		<a href="#"><i class="fas fa-search"></i></a>
		<a href="keranjang.php"><i class="fas fa-shopping-cart"></i></a>
		<a href="#" id="btn-user"><i class="fas fa-user"></i></a>
		<a href="#" id="btn-menu"><i class="fas fa-bars"></i></a>
		
	</div>


	<?php if (isset($_SESSION['pelanggan']) && isset($_SESSION['role']) && $_SESSION['role'] == 'pelanggan') : ?>
<?php else: ?>
        <div class="user">
        <li><a href="../user/pelanggan/index.php">Profil</a></li>
        <li><a href="../user/logout.php">Logout</a></li>
    </div>
<?php endif; ?>


	
</nav>