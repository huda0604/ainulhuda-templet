<div class="shadow p-3 mb-3 bg-white rounded">
    <marquee><h5><b>Halaman Pembelian</b></h5></marquee>
</div>

<?php
$tb_pembelian = array();
$ambil = $koneksi->query("SELECT * FROM tb_pembelian 
                          JOIN tb_user ON tb_pembelian.id_user = tb_user.id_user 
                          WHERE tb_user.role = 'pelanggan'"); // Mengambil data hanya untuk pelanggan
while ($pecah = $ambil->fetch_assoc()) {
    $tb_pembelian[] = $pecah;
}
?>

<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tb_pembelian as $key => $value) : ?>
                    <tr>
                        <th width="50"><?php echo $key + 1; ?></th>
                        <th><?php echo $value['nama_user']; ?></th>
                        <th><?php echo date("d F Y", strtotime($value['tanggal_pembelian'])); ?></th>
                        <th>Rp<?php echo number_format($value['total_pembelian']); ?></th>
                        <th class="text-center" width="150">
                            <a href="index.php?halaman=detail_pembelian&id=<?php echo $value['id_pembelian']; ?>"
                                class="btn btn-sm btn-info">Detail</a>
                        </th>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
