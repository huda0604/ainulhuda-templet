<?php 
include '../koneksi/koneksi.php';


$tb_kategori = array();
$ambil = $koneksi->query("SELECT * FROM tb_kategori");

while ($pecah = $ambil->fetch_assoc()) 
{
	$tb_kategori [] = $pecah;
}
?>


<div class="col-md-9">
					<div class="card">
						<div class="card-header">Kategori Produk</div>
						<div class="card-body">
							<ul class="nav navpills flex-column">
								<?php foreach ($tb_kategori as $key => $value) : ?>
		
								<li class="nav-item">
									<a href="produk.php?id_kategori=<?php echo $value['id_kategori']; ?>" class="nav-link">
										<?php echo $value['nama_kategori']; ?>
									</a>
								</li>

							<?php endforeach ?>

							<li class="nav-item">
									<a href="produk.php" class="nav-link">
										Semua Produk
									</a>
								</li>

							</ul>
						</div>
					</div>