<?php 
session_start();
include '../koneksi/koneksi.php';

$id_user = $_SESSION['tb_user']['id_user'];

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
								<th>Sub harga</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$subtotal = 0;
							foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah):
								$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk' ");
								$pecah = $ambil->fetch_assoc();

								if (!empty($pecah) && isset($pecah['harga_produk'])) {
									$subharga = $pecah['harga_produk'] * $jumlah;
									$subberat = $pecah['berat_produk'] * $jumlah;
									$totalbelanja = $subtotal+=$subharga;
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
        echo 'Data nama produk tidak tersedia'; // atau tindakan lain sesuai kebutuhan
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
<td>Rp.<?php echo number_format($subharga); ?></td>

</tr>
<?php endforeach ?>
</tbody>
<tfoot>
	<tr>
		<th colspan="2">Total belanja :</th>
		<th>Rp.<?php echo number_format($totalbelanja); ?></th>
	</tr>
</tfoot>
</table>
</div>

</div>

<!-- awal -->
<div class="row mt-3 ">

	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<input type="text" class="form-control" value="<?php echo isset($_SESSION['tb_user']['nama_user']) ? $_SESSION['tb_user']['nama_user'] : ''; ?>" readonly>
				<br>
				<input type="text" class="form-control" value="<?php echo isset($_SESSION['tb_user']['username']) ? $_SESSION['tb_user']['username'] : ''; ?>" readonly>
				<br>
				<input type="text" class="form-control" value="<?php echo isset($_SESSION['tb_user']['no_telephone']) ? $_SESSION['tb_user']['no_telephone'] : ''; ?>" readonly>
				<br>
				<input type="text" class="form-control" value="<?php echo isset($_SESSION['tb_user']['alamat_user']) ? $_SESSION['tb_user']['alamat_user'] : ''; ?>" readonly>



				<br>			
			</div>
		</div>	
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				
					<div class="form-group row">
						<label class="col-sm-4 col-form-lable">Alamat sesuai lokasi anda :</label><br>
						<div class="col-sm-12">
						<textarea type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap di sini"></textarea><br>
					</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-lable">Nama penerima paket :</label><br>
						<div class="col-sm-12">
						<textarea type="text" name="alamat" class="form-control" placeholder="Masukkan nama lengkap penerima paket di sini"></textarea><br>

						<input type="text" name="total_berat" class="form-control" value="<?php echo $subberat; ?>Kg.">
						<br>
						<div class="text-right">
						<button name="checkout" class="btn btn-success">Checkout</button>
						</div>
					<br>
					</div>
					</div>
				
			</div>
		</div>
	</div>
</div>
<!-- akhir -->


</div>
</section>

<?php
	if(isset($_POST['checkout']))
	 {
		$id_user = $_SESSION['tb_user']['id_user'];
		$tanggal_pembelian = date('y-m-d');
		$alamat = $_POST['alamat'];
		$berat_produk = $_POST['total_berat'];
		$total_pembelian = $totalbelanja;

		$koneksi->query("INSERT INTO tb_pembelian
			(id_user,tanggal_pembelian,total_pembelian,alamat,berat)
			VALUES('$id_user','$tanggal_pembelian','$total_pembelian','$alamat','berat')");

		

			 foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah)
		{
			$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");

			$pecah = $ambil->fetch_assoc();
			$nama = $pecah['nama_produk'];
			$harga = $pecah['harga_produk'];
			$berat = $pecah['berat_produk'];
			$subberat = $pecah['berat_produk']*$jumlah;
			$subharga = $pecah['harga_produk']*$jumlah;

			$koneksi->query("INSERT INTO tb_pembelian_produk
				(id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
				VALUES ('$id_pembelian_baru','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");


			$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk -$jumlah
				WHERE id_produk='$id_produk'");
		}


		unset($_SESSION['keranjang_belanja']);
		echo "<script>alert('pembelian sukses');</script>";
		echo "<script>location='pelanggan/index.php?page=pesanan';</script>";
		
	}
 ?>

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