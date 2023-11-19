<div class="shadow p-3 mb-3 bg-white">
	<marquee><h2><b>Menu Detail Data Pembelian</b></h2></marquee>
</div>

<?php 
$id_pembelian = $_GET['id'];

$ambil = $koneksi-> query("SELECT * FROM tb_pembelian JOIN tb_user 
	ON tb_pembelian.id_user=tb_user.id_user
	WHERE tb_pembelian.id_pembelian='$id_pembelian'");
	$detail = $ambil->fetch_assoc();
?>

<pre><?php print_r($detail); ?></pre>

<div class="row">

	<div class="col-md-5">
		<div class="card shadow bg-white">
			<div class="card-header" style="background-color: blue; color: white;">
				<strong>Data Pelanggan</strong>
			</div>
			<div class="card-body row">
				<label class="col-md-4 col-form-label">Nama :</label>
				<label class="col-md-8 col-form-label"><?php echo $detail['nama_user']; ?></label>

				<label class="col-md-4 col-form-label">Alamat :</label>
				<label class="col-md-8 col-form-label"><?php echo $detail['alamat_user']; ?></label>

				<label class="col-md-4 col-form-label">Telepon :</label>
				<label class="col-md-8 col-form-label"><?php echo $detail['no_telephone']; ?></label>

			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="card shadow bg-white">
			<div class="card-header" style="background-color: blue; color: white;">
				<strong>Data Pembelian</strong>
			</div>
			<div class="card-body row">
				<label class="col-md-4 col-form-label">Tanggal :</label>
				<label class="col-md-8 col-form-label">
				<?php echo date("d F Y", strtotime($detail['tanggal_pembelian'])); ?>
					
				</label>
				<label class="col-md-4 col-form-label">Total :</label>
				<label class="col-md-8 col-form-label">
					Rp<?php echo number_format($detail['total_pembelian']); ?>
				</label>
			</div>
		</div>
	</div>
</div>

<?php 
$tb_pembelian_produk = array();
$ambil = $koneksi ->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk
	ON tb_pembelian_produk.id_produk = tb_produk.id_produk
WHERE tb_pembelian_produk.id_pembelian = '$id_pembelian'");
while ($pecah = $ambil->fetch_assoc()) 
{
	$tb_pembelian_produk [] = $pecah;
}

?>

<div class="card shadow bg-white mt-3">
	<div class="card-body">
		<table class="table table-bordered table-hover table-striped" id="tables">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Total</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($tb_pembelian_produk as $key => $value): ?>
				<?php $subtotal = $value['harga_produk']*$value['jumlah']; ?>
				<tr>
					<td width="50"><?php echo $key+1; ?></td>
					<td><?php echo $value['nama_produk']; ?></td>
					<td>Rp<?php echo number_format($value['harga_produk']); ?></td>
					<td><?php echo $value['jumlah']; ?></td>
					<td>Rp<?php echo number_format($subtotal); ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
