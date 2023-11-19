<div class="shadow p-3 mb-3 bg-white rounded">
	<marquee><h5><b>Halaman Menu Pelanggan</b></h5></marquee>
</div>

<?php 

$tb_user = array ();
$ambil = $koneksi->query("SELECT * FROM tb_user");
while ($pecah = $ambil->fetch_assoc()) 
{
	$tb_user[] = $pecah;
}

?>

<div class="card shadow bg-white">
	<div class="card-body">
		<table class="table table-bordered table-hover table-striped" id="tables">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Foto</th>
					<th>No.hp</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tb_user as $key => $value): ?>
				<tr>
					<td width="50" ><?php echo $key+1; ?></td>
					<td><?php echo $value ["nama_user"]; ?></td>
					<td><?php echo $value ["alamat_user"]; ?></td>
					<td class="text-center"><img width="150" src="../user/foto_pelanggan/<?php echo $value['foto_user']; ?>"></td>
					<td><?php echo $value ["no_telephone"]; ?></td>
					<td>
						<a href="#" class="btn btn-sm btn-primary">Edit</a>
						<a href="hapus_pelanggan.php?halaman=pelanggan" class="btn btn-sm btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>

</div>