<div class="shadow p-3 mb-3 bg-white rounded">
	<marquee><h5><b>Halaman Menu Kategori</b></h5></marquee>
</div>

<?php 
	
	$tb_Kategori = array();
	$ambil = $koneksi->query("SELECT * FROM tb_kategori");
	while($pecah = $ambil -> fetch_assoc())
	{
	$tb_Kategori [] = $pecah;
	}	
?>

<a href="index.php?halaman=Tambahkategori" class="btn btn-primary">Tambah</a>
<br><br>

<div class="card shadow bg-white">
	<div class="card-body"> 
		<table class="table table-bordered table-hover table-striped" id="tables">
			<thead> 
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tb_Kategori as $key => $value): ?>
				<tr>
					<td width="50"><?php echo $key+1;?></td>
					<td><?php echo $value ["nama_kategori"]; ?></td>
					<td class="text-center" width="150">
						<a href="index.php?halaman=edit_kategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-sm btn-primary">Edit</a>
						<a href="index.php?halaman=hapus_kategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-sm btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	</div>