<div class="shadow p-3 mb-3 bg-white rounded">
	<marquee><h5><b>Halaman Menu Produk</b></h5></marquee>
</div>

<?php 

$tb_produk = array();
$ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori                        
	ON tb_produk.id_kategori=tb_kategori.id_kategori");
while ($pecah =$ambil->fetch_assoc()) 
{
	$tb_produk[] = $pecah;
}

?>
<a href="index.php?halaman=Tambahproduk" class="btn btn-primary">Tambah</a>
<br><br>

<div class="card shadow bg-white3">
	<div class="card-body"> 
		<table class="table table-bordered table-hover table-striped" id="tables">
			<thead> 
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Harga</th>
					<th>Foto</th>
					<th>Berat</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tb_produk as $key => $value): ?>
					<tr>
						<td width="50"><?php echo $key+1; ?></td>
						<td><?php echo $value['nama_produk']; ?></td>
						<td><?php echo $value['nama_kategori']; ?></td>
						<td>Rp<?php echo number_format($value['harga_produk']);?></td>
						<td class="text-center">
							<img width="150" src="../user/foto_produk/<?php echo $value['foto_produk']; ?>">
						</td>
						<td><?php echo number_format($value['berat_produk']); ?>Kg</td>

						<th class="text-center" width="200">
							<a href="index.php?halaman=edit_produk&id=<?php echo $value['id_produk']; ?>" class="btn btn-sm btn-primary" >Edit</a>
							<a href="index.php?halaman=hapus_produk&id=<?php echo $value['id_produk']; ?>" class="btn btn-sm btn-danger">Hapus</a>
							<a href="index.php?halaman=detail_produk&id=<?php echo $value['id_produk'];?>" class="btn btn-sm btn-info">Detail</a>
						</th>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
