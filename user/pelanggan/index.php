<?php 

session_start();
include '../../koneksi/koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Profil Pelanggan</title>

	<link href="../../user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



	<!-- Custom styles for this template-->	
	<link href="../../user/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../../user/css/sb-admin-2.css" rel="stylesheet">

	<!-- costum style for this page -->
	<link href="../user/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link rel="stylesheet" href="../../user/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../../user/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../../user/css/style.css">
</head>
<body>


	<nav class="navbar sticky-top">
		<a href="index.php" class="navbar-logo"><u>Toko Buah</u> <span><u>El-Shabir</u></span></a>

		<div class="navbar-menu">
			<a href="../index.php">Beranda</a>
			<a href="#">Tentang Kami</a>
			<a href="../produk.php">Produk</a>
			<a href="#">Kontak</a>
		</div>

		<div class="navbar-icon">
			<a href="#"><i class="fas fa-search"></i></a>
			<a href="../keranjang.php"><i class="fas fa-shopping-cart"></i></a>
			<a href="#" id="btn-user"><i class="fas fa-user"></i></a>
			<a href="#" id="btn-menu"><i class="fas fa-bars"></i></a>

		</div>

		<div class="user">

			<li><a href="index.php">Profil</li>
				<li><a href="../logout.php">Logout</li>

				</div>

			</nav>


			<br>
			<section class="page-profil">
				<div class="container">

					<ul class="breadcrumb">
						<li><a href="../index.php">Beranda</a> </li>
						<li>Profil</li>
					</ul>

					<div class="row">

						<div class="col-md-3">
							<div class="card">
								<div class="card-header">
									<div class="d-flex justify-content-center align-items-center">
									<div class="img">
										
											<img width="150" height="150" src="../foto_pelanggan/<?php echo isset($_SESSION['tb_user']['foto_user']) ? $_SESSION['tb_user']['foto_user'] : ''; ?>" class="rounded-circle">

										
									</div>
								</div>
									<div class="card-title">

									</div>
								</div>

								<div class="card-body">

									<ul class="nav nav-pills flex-column">
										<li class="nav-item">
											<a href="index" class="nav-link">Home</a>
										</li>

										<li class="nav-item">
											<a href="index.php?page=pesanan" class="nav-link">Pesanan </a>
										</li>

										<li class="nav-item">
											<a href="index.php?page=riwayat" class="nav-link">Riwayat</a>
										</li>
									</ul>
								</div>


							</div>
						</div>

						
						<?php 
						if (isset($_GET['page']))
						{
							if ($_GET['page']=="pesanan")
							 {
								include 'pesanan.php';
							}
						}
						else
						{
							include 'home.php';
						}
						?>

					</div>


				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row">

				<div class="col-4">
					<h3>Halaman Utama</h3>
					<ul class="footer-menu">
						<li><a href="../pelanggan/index.php">Beranda</a></li>
						<li><a href="#">Tentang Kami</a></li>
						<li><a href="../produk.php">Produk</a></li>
						<li><a href="#">Kontak</a></li>
					</ul>
				</div>

				<div class="col-4">
					<h3>Hubungi Kami</h3>
					<ul class="footer-kontak">
						<b><i class="fas fa-store"></i> Toko Buah El-Shabir</b>
						<br /><i class="fas fa-city"></i> Madura Jawa Timur Kabupaten Sumenep
						<br /><i class="fas fa-maps-marker-alt"></i> Perumahan Satelit Blok L No.16 Kolor Kota Sumenep
						<br /><i class="fas fa-phone"></i> 087749521862
						<br /><i class="fas fa-envelope"></i> ainulhuda@gmail.com
						<br /><i class="fas fa-user"></i> Ainul Huda
					</ul>
				</div>

				<div class="col-4">
					<h3>Sosial Media Kami</h3>
					<ul class="footer-social">
						<a href="#"><i class="fab fa-whatsapp"></i></a>
						<a href="#"><i class="fab fa-facebook"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
					</ul>
				</div>


			</div>
		</div>
	</footer>

	<div class="created">
		<p>Created By <a href="#">Ainul Huda</a>. | &copy; 2023</p>
	</div>






	<!-- Bootstrap core JavaScript-->
	<script src="../../user/vendor/jquery/jquery.min.js"></script>
	<script src="../../user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../../user/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../../user/js/sb-admin-2.js"></script>
	<script src="../../user/js/sb-admin-2.min.js"></script>
	<!-- Page level plugins -->
	<script src="../../user/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../../user/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="../../user/js/demo/datatables-demo.js"></script>
	<!-- owl-carousel.js -->
	<script src="../../user/js/owl.carousel.min.js"></script>

	<!-- js tombol menu -->
	<script src="../../user/js/main.js"></script>


</body>
</html>