	<div class="shadow p-3 mb-3 bg-white rounded">
		<marquee><h5><b>Tambah Kategori</b></h5></marquee>
	</div>

	<div class="card shadow bg-white">
		<div class="card-body"> 
			<form method="post" enctype="multipart/form-data">
			</select>
			 <br>

	        <label for="nama">Nama Kategori :</label>
	        <input type="text" class="form-control" name="nama" id="nama" required>
			<div class="col-md-5">
	        <br><button name="simpan" class="btn btn-sm btn-primary">Simpan</button>
	   			<a href="index.php?halaman=Kategori" class="btn btn-sm btn-danger">Kembali</a>
	   		</div>
			</form>
		</div>
	</div>

<?php 
if (isset($_POST['simpan']))
 {
	$nama = $_POST['nama'];
	$koneksi->query("INSERT INTO tb_kategori (nama_kategori) values ('$nama')");

	echo "<script>alert('data berhasil di simpan');</script>";
	echo "<script>location='index.php?halaman=Kategori';</script>";
}

?> 