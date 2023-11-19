	<div class="shadow p-3 mb-3 bg-white rounded">
		<marquee><h5><b>Halaman Tambah Produk</b></h5></marquee>
	</div>
<?php 

	$tb_kategori = array();
	$ambil = $koneksi->query("SELECT * FROM tb_kategori");
	while($pecah = $ambil->fetch_assoc())
    {
    	$tb_Kategori[] = $pecah;
    }

	?>


	<div class="card shadow bg-white">
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
	        <label for="kategori" class="form-label">Kategori:</label>
	        <select class="form-select form-select-lg mb-3" name="kategori" aria-label="Large select example">
			  <option selected>Pilihan</option>

			  <?php
			  $queryProduk = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
			  while ($produk = mysqli_fetch_array($queryProduk)) {
			  	echo "<option value='$produk[id_kategori]'>$produk[nama_kategori]</option>";
			  }
			  ?>
			</select>

	        <br>

	        <label for="nama">Nama Produk:</label>
	        <input type="text" class="form-control" name="nama" id="nama" >

	        <label for="harga" class="form-label">Harga:</label>
	        <input type="number" class="form-control" name="harga" id="harga" >

	        <label for="foto-produk">Foto Produk</label>
	       	<div class="input-foto">
	        <input type="file" name="foto[]" class="form-control" >
	        </div>
	        <span class="btn btn-sm btn-success btn-tambah">
	        <i class="fas fa-plus"></i>
	        </span>

		        <br>
		    <label for="deskripsi">Deskripsi</label>
		    <input type="text" class="form-control" name="deskripsi" ><br>

		    <label for="stok">Stok Produk</label>
		    <input type="text" class="form-control" name="stok" ><br>

	        <label for="berat">Berat:</label>
	        <input type="number" name="berat" id="berat" >
	        <br>
	        <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
	        <a href="indek.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
	    </form>
		</div>
	</div>

	<?php
	if(isset($_POST['simpan']))
	 {
			
	    $nama = $_POST['nama'];
	 	$kategori = $_POST['kategori'];
	 	$harga = $_POST['harga'];
	 	$berat = $_POST['berat'];
	 	$deskripsi = $_POST['deskripsi'];
	 	$stok = $_POST['stok']; 

	 	$nama_foto = $_FILES['foto']['name'];
	 	$lokasi_foto = $_FILES['foto']['tmp_name'];

	 	move_uploaded_file($lokasi_foto[0], "../user/foto_produk/". $nama_foto[0]);
	 	$koneksi->query("INSERT INTO tb_produk (id_kategori,nama_produk,harga_produk,foto_produk,deskripsi_produk,berat_produk,stok_produk) VALUES ('$kategori', '$nama', '$harga', '$nama_foto[0]', '$deskripsi', '$berat', '$stok')");

	 	$id_baru = $koneksi->insert_id;


	 	foreach ($nama_foto as $key => $tiap_nama)
	 	 {
	 		$tiap_lokasi = $lokasi_foto[$key];
	 		move_uploaded_file($tiap_lokasi, "../user/foto_produk/". $tiap_nama);

	 		$koneksi->query("INSERT INTO produk_foto (id_produk, nama_produk_foto) values ('$id_baru', '$tiap_nama')");
	 	}

	 		echo"<script>alert('data berhasil disimpan');</script>";
	 		echo"<script>location='index.php?halaman=Produk';</script>";

		// echo "<pre>";
		// print_r($_FILES['foto']);
		// echo "</pre>";
	} 
	 ?>