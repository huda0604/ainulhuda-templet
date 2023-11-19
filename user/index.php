<?php 

session_start();
include '../koneksi/koneksi.php';

$tb_produk = array();

$ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori LIMIT 8");

while($pecah = $ambil->fetch_assoc())
{
	$tb_produk[]=$pecah;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Buah El-Shabir</title>

	<link href="../user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



	<!-- Custom styles for this template-->	
	<link href="../user/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../user/css/sb-admin-2.css" rel="stylesheet">

	<!-- costum style for this page -->
	<link href="../user/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link rel="stylesheet" href="../user/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../user/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../user/css/style.css">
</head>
<body>

	<?php include '../include/navbar.php';	?>

	<section class="hero">
		<div id="owl-nav"></div>
		<div class="owl-carousel owl-theme">

			<div class="item">
				<img src="../user/foto/benner6.jpg">
				<main class="content">
					<h1>Toko <span>El-Shabir</span></h1>
					<p>lorem ipsun dolor sit amet consectetur</p>
					<a href="#" class="btn btn-primary">Beli Sekarang</a>
				</main>
			</div>

			<div class="item">
				<img src="../user/foto/benne4.jpg">
				<main class="content">
					<h1>Toko <span>El-Shabir</span></h1>
					<p>lorem ipsun dolor sit amet consectetur</p>
					<a href="#" class="btn btn-primary">Beli Sekarang</a>
				</main>
			</div>

				<div class="item">
				<img src="../user/foto/benner5.jpg">
				<main class="content">
					<h1>Toko <span>El-Shabir</span></h1>
					<p>lorem ipsun dolor sit amet consectetur</p>
					<a href="#" class="btn btn-primary">Beli Sekarang</a>
				</main>
			</div>

		</div>
	</section>
<!-- about strat -->
	<div class="container">

		<section class="about">
		<h2 class="judul"><span>Tentang </span>Kami</h2>
		<div class="row">
			<div class="col-md-6 about-img">
				<img src="../user/foto/benner5.jpg">
			</div>
			<div class="col-md-6 content">
				<h3>Selamat Belanja Di Toko Kami!</h3>
				<p>selamat datang di toko buah kamu dan selamat belanja</p>
				<p>mari belanja di toko kami</p>
			</div>
		</div>
	</section>
	<!-- about end -->

	<!--produk user -->
		<section class="produk">
			<h2 class="judul"><span>Produk </span> Kami</h2>
			<div class="row">
				
				<?php foreach ($tb_produk as $key => $value): ?>


				<div class="col-md-3">
					<div class="card">
						<img src="../user/foto_produk/<?php echo $value['foto_produk']; ?>">
						<div class="card-body content">
							<h5><?php echo $value['nama_produk']; ?> </h5>
							<p>Rp.<?php echo number_format($value['harga_produk']); ?></p>
							<a href="beli.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-primary">
								<i class="fas fa-shopping-cart"></i> Keranjang
							</a>
							<a href="detail_produk.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-primary">
								<i class="fas fa-eye"></i>detail
							</a>
						</div>
					</div>
				</div>

				<?php endforeach ?>

			</div>
		</section>

		<!-- Kontak kami -->
		<section class="kontak">
			<h2 class="judul"><span>Kontak </span>Kami</h2>
			<div class="row">
				
				<div class="col-md-6 kontak-maps">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.885897797525!2d113.86903477375282!3d-7.02269636879433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e43cbec4ba65%3A0x1713f7a99cf0d060!2sPerumahan%20Satelit%20Permai!5e0!3m2!1sid!2sid!4v1699167089723!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="col-md-6 kontak-form">
					<form method="post">
						<div class="card">
							<div class="card-body">
								
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Nama Lengkap :</label>
									<div class="col-sm-8">
									<input type="text" name="Nama" class="form-control" placeholder="Masukkan Nama Lengkap Anda Di Kolom ini" required>
								</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label">E-mail :</label>
									<div class="col-sm-8">
									<input type="email" name="email" class="form-control" placeholder="Masukkan Alamat E-mail Anda Di Kolom ini" required>
								</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Nomor Telephone :</label>
									<div class="col-sm-8">
									<input type="number" name="telephone" class="form-control" placeholder="Masukkan Nomor Telephone Anda Di Kolom ini" required>
								</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Pesan :</label>
									<div class="col-sm-8">
									<textarea type="text" name="pesan" class="form-control" placeholder="Masukkan Pesan Anda Di Kolom Ini" required></textarea>
								</div>
								</div>

								<div class="text-right">
								<button name="kirim" class="btn btn-primary">Kirim</button>
								</div>


							</div>
						</div>
					</form>
				</div>

			</div>
		</section>
		<!-- kontak finis -->

	</div>




	<?php include '../include/footer.php'; ?>





		<!-- Bootstrap core JavaScript-->
	<script src="../user/vendor/jquery/jquery.min.js"></script>
	<script src="../user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../user/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../user/js/sb-admin-2.js"></script>
	<script src="../user/js/sb-admin-2.min.js"></script>
	<!-- Page level plugins -->
	<script src="../user/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../user/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="../user/js/demo/datatables-demo.js"></script>
	<!-- owl-carousel.js -->
	<script src="../user/js/owl.carousel.min.js"></script>

	<!-- js tombol menu -->
	<script src="../user/js/main.js"></script>

</body>
</html>