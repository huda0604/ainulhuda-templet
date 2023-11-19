<div class="shadow p-3 mb-3 bg-white rounded">
    <marquee><h5><b>Halaman Edit Produk</b></h5></marquee>
</div>

<?php 
$id_produk = $_GET['id'];

$tb_kategori = array();
$ambil = $koneksi->query("SELECT * FROM tb_kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $tb_kategori[] = $pecah;
}

$ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.id_kategori=tb_kategori.id_kategori WHERE id_produk='$id_produk'");
$edit = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <select name="kategori" class="form-control">
                        <option value="<?php echo $edit['id_kategori']; ?>">
                            <?php echo $edit['nama_kategori']; ?>
                        </option>
                        <?php foreach ($tb_kategori as $key => $value): ?>
                            <option value="<?php echo $value['id_kategori']; ?>">
                                <?php echo $value['nama_kategori']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_produk" class="form-control" value="<?php echo $edit['nama_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Harga Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="harga_produk" class="form-control" value="<?php echo $edit['harga_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Foto Produk :</label>
                <div class="col-sm-9">
                    <img src="../user/foto_produk/<?php echo $edit['foto_produk']; ?>" width="150">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Berat Produk :</label>
                <div class="col-sm-9">
                    <input type="number" name="berat_produk" class="form-control" value="<?php echo $edit['berat_produk']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi Produk:</label>
                <div class="col-sm-9">
                    <textarea name="deskripsi_produk" class="form-control"><?php echo $edit['deskripsi_produk']; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Stok :</label>
                <div class="col-sm-9">
                    <input type="number" name="stok_produk" class="form-control" value="<?php echo $edit['stok_produk']; ?>">
                </div>
            </div>

            <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
            <a href="index.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
</form>

<?php 
if (isset($_POST['simpan'])) {
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['kategori'];
    $harga_produk = $_POST['harga_produk'];
    $foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $berat_produk = $_POST['berat_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $stok_produk = $_POST['stok_produk'];

    if (!empty($lokasi_foto)) {
        move_uploaded_file($lokasi_foto, "../user/foto_produk/" . $foto);

        $koneksi->query("UPDATE tb_produk SET
            nama_produk = '$nama_produk',
            id_kategori = '$id_kategori',
            harga_produk = '$harga_produk',
            foto_produk = '$foto',
            berat_produk = '$berat_produk',
            deskripsi_produk = '$deskripsi_produk',
            stok_produk = '$stok_produk'
            WHERE id_produk ='$id_produk'");
    } else {
        $koneksi->query("UPDATE tb_produk SET
            nama_produk = '$nama_produk',
            id_kategori = '$id_kategori',
            harga_produk = '$harga_produk',
            berat_produk = '$berat_produk',
            deskripsi_produk = '$deskripsi_produk',
            stok_produk = '$stok_produk'
            WHERE id_produk ='$id_produk'");
    }

    echo"<script>alert('data berhasil disimpan');</script>";
			echo"<script>location='index.php?halaman=Produk';</script>";
}
?>
