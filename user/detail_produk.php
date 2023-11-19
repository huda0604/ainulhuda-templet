<?php 
session_start();
include '../koneksi/koneksi.php';

$id_produk = $_GET['idproduk'];


$ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori 
	ON tb_produk.id_kategori = tb_kategori.id_kategori WHERE id_produk='$id_produk'");
$detail_produk = $ambil->fetch_assoc();

$produk_foto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");

while ($pecah = $ambil->fetch_assoc()) {
	$produk_foto[] = $pecah;
}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman detail produk</title>

	<link href="../user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



	<!-- Custom styles for this template-->	
	<link href="../user/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- costum style for this page -->
	<link href="../user/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link rel="stylesheet" href="../user/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../user/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../user/css/style.css">
</head>
<body>
	

	<?php include '../include/navbar.php'; ?>

	<section class="page-produk">
		<div class="container">


			<ul class="breadcrumb">
				<li><a href="index.php">Beranda</a></li>
				<li>Detail Produk</li>
			</ul>

			<div class="">
				<div class="card detail1">
					<div class="card-body">
						<h5>Detail Produk</h5>
						<p1>selamat belanja dan selamat berkunjung kembali</p1>
					</div>
				</div>
			</div><br>

			<div class="kategori">
				<?php include '../include/sidebar.php'; ?>
			</div>
			
				<div class="detail-produk">
					<div class="foto">
						<div id="owl-nav"></div>
						<div class="owl-carousel owl-theme">
							<?php foreach ($produk_foto as $key => $value) : ?>
								<div class="item">
									<img src="../user/foto_produk/<?php echo $value['nama_produk_foto']; ?>">
								</div>
							<?php endforeach; ?>


						</div>
					</div>
				</div>


				<div class="col-11 detail-form">
					<form method="post">
						<div class="card">
							<div class="card-body">
								<p style="color: black;"><?php echo $detail_produk['nama_produk']; ?></p>
								<div class="form-group row">
									<label class="col-sm-3 col-form-lable">Jumlah/Kg :</label>

									<div class="col-sm-9">
										<input type="number" name="jumlah" class="form-control" value="1" min="1" max="<?php echo $detail_produk['berat_produk']; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-lable">Stok :</label>
									<div class="col-sm-9">
										<input disabled class="form-control" value="<?php echo $detail_produk['stok_produk']; ?>">
									</div>
									<h5>Rp.<?php echo $detail_produk['harga_produk']; ?></h5>
								</div>
								<div class="card-footer text-right"></div>						
								<button name="beli" class="btn btn-warning">
									<i class="fas fa-shopping-cart"></i>Keranjang
								</button>
							</div>
						</div>
					</form>
			</div>
			<!-- detail produk user -->
			
		</div>


	</div>
</section>

<?php 

if (isset($_POST['beli']))
{
	$jumlah = $_POST['jumlah'];

	$_SESSION['keranjang_belanja'][$id_produk] = $jumlah;

	echo "<script>alert('Produk Berhasil Masuk Ke Keranjang');</script>";
	echo "<script>location='keranjang.php';</script>";
}
?>

<?php include '../include/footer.php'; ?>



<!-- Bootstrap core JavaScript-->
<script src="../user/vendor/jquery/jquery.min.js"></script>
<script src="../user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../user/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
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