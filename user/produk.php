<?php 
include '../koneksi/koneksi.php';

if (isset($_GET['id_kategori'])) 
{

	$id_kategori = $_GET['id_kategori'];


	$kategori_produk = array();
	$ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori
		ON tb_produk.id_kategori = tb_kategori.id_kategori 
		WHERE tb_produk.id_kategori='$id_kategori'  LIMIT 9");

	while ($pecah = $ambil->fetch_assoc())
	{
		$kategori_produk[] = $pecah;
	}

}
else
{
$tb_produk = array();
$ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori
	ON tb_produk.id_kategori = tb_kategori.id_kategori LIMIT 9");

while ($pecah = $ambil->fetch_assoc())
{
	$tb_produk[] = $pecah;
}
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman produk</title>

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
	

<?php include '../include/navbar.php';?>
	<section class="page-produk">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Beranda</a> </li>
				<li>Produk</li>
			</ul>

			<div class="row">
				
				<div class="col-md-4">
					<?php include '../include/sidebar.php'; ?> 
				</div>
			</div>

			<div class="col-md-5 produk-kami">
				<div class="card box">
					<div class="card-body">
						<h2>Produk Kami</h2>
						<p> selamat belanja di toko kami ya ! </p>
					</div>
				</div>

				<div class="row">
					<?php if (isset($_GET['id_kategori'])): ?>
						<?php foreach ($kategori_produk as $key => $value): ?>

							<div class="col-md-8 card-produk">
								<div class="card">
									<img src="../user/foto_produk/<?php echo $value['foto_produk']; ?>">
									<div class="card-body content">
										<h5 style="color: black; text-align: center; font-weight: bold;"><?php echo $value['nama_produk']; ?></h5>
										<p style="color: black; text-align: center;">Rp<?php echo number_format($value['harga_produk']); ?></p>

										<a href="beli.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-warning">
											<i class="fas fa-shopping-cart"></i> Keranjang
										</a>
										<a href="detail_produk.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-success">
											<i class="fas fa-eye"></i> Detail
										</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>

						<?php foreach ($tb_produk as $key => $value): ?>
							<div class="col-md-8 card-produk">
								<div class="card">
									<img src="../user/foto_produk/<?php echo $value['foto_produk']; ?>">
									<div class="card-body content">
										<h5 style="color: black; text-align: center; font-weight: bold;"><?php echo $value['nama_produk']; ?></h5>
										<p style="color: black; text-align: center;"><?php echo number_format($value['harga_produk']); ?></p>

										<a href="beli.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-warning">
											<i class="fas fa-shopping-cart"></i> Keranjang
										</a>
										<a href="detail_produk.php?idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-success">
											<i class="fas fa-eye"></i> Detail
										</a>
									</div>
								</div>
							</div>

						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>


			
		</div>
	</section>

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