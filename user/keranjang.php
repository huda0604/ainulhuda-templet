<?php 
session_start();
include '../koneksi/koneksi.php';


if (empty($_SESSION['keranjang_belanja'])OR !isset($_SESSION['keranjang_belanja']))
 {
	echo "<script>alert('Kernanjang kosong silahkan,belanja')</script>";
	echo "<script>location='produk.php';</script>";
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
	
	<?php include '../include/navbar.php'; ?>

	<section class="page-keranjang">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Beranda</a> </li>
				<li>Keranjang Belanja</li>
			</ul>
			<!-- batas awal -->
			<div class="card box">
				<div class="card-body">
					<h2>Keranjang Belanja</h2>
					<p>
						Anda Miliki (4) Item Di Dalam Keranjang Pesanan
					</p>
				</div>
			</div>
			<!-- batas akhir -->
<!-- awal tabel belanja -->
			<div class="card">
				<div class="card-body">
					<table class="table table-hover table-striped" id="tables">
						<thead>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>Produk</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Sub Total</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah):
								$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk' ");
								$pecah = $ambil->fetch_assoc();

								if (!empty($pecah) && isset($pecah['harga_produk'])) {
									$subtotal = $pecah['harga_produk'] * $jumlah;
								} else {
									$subtotal = 0; 
								}

								?>
								<tr>
									<td width="25px"><?php echo $no++; ?></td>
									<td>
										<img src="../user/foto_produk/<?php echo $pecah['foto_produk']; ?>" width="50">
									</td>
									<td>
										<?php
										if (isset($pecah['nama_produk'])) {
											echo $pecah['nama_produk'];
										} else {
        echo 'Data nama produk tidak tersedia'; 
    }
    ?>
</td>
<td><?php echo $jumlah; ?>Kg.</td>
<td>
	<?php
	if (isset($pecah['harga_produk'])) {
		echo 'Rp.' . number_format($pecah['harga_produk']);
	} else {
		echo 'Data harga tidak tersedia'; 
	}
	?>
</td>
<td>Rp.<?php echo number_format($subtotal); ?></td>
<td>
	<a href="hapus_keranjang.php?idproduk=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger btn-sm">
  <i class="fas fa-trash-alt"></i>
</a>

</td>

</tr>
<?php endforeach ?>
</tbody>
</table>
</div>

<div class="card-header">

	<div class="row">
		<div class="col-md-10">
			<a href="produk.php" class="btn btn-info ">Kembali Belanja</a>
		</div>
		<div class="col-md-2 text-right">
			<a href="../user/checkout.php" class="btn btn-success ">CheckOut</a>
		</div>
		<!-- batas akhir -->
	</div>
	
</div>

<!-- akhir tabel belanja -->
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