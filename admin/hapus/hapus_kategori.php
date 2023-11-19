<?php 

$id_kategori = $_GET['id'];

$koneksi->query("DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");

echo "<script>alert('data kategori berhasil di hapus');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";


?>