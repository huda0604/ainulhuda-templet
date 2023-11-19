<?php 

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
$pecah = $ambil->fetch_assoc();

$hapus_foto = $pecah['foto_produk'];

if (file_exists("../user/foto_produk/" .$hapus_foto));
 {
	unlink("../user/foto_produk/" .$hapus_foto);
}

$koneksi->query("DELETE FROM tb_produk WHERE id_produk='$id_produk'"); 

$hapusprodukfoto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($hapus = $ambil-> fetch_assoc()) 
{
	$hapusprodukfoto[] = $hapus;
}

foreach ($hapusprodukfoto as $key => $value) {
	$hapus_foto = $value['nama_produk_foto'];
	if(file_exists("../user/foto_produk/" . $hapus_foto))

	{
		unlink("../user/foto_produk/" . $hapus_foto);
	}

	$koneksi->query("DELETE FROM produk_foto WHERE id_produk='$id_produk'");

}

echo "<script>alert('data berhasil di hapus'); </script>";
	 




// echo "<pre>";
// print_r($pecah);
// echo "</pre>";


?>