<div class="col-md-9">
    <div class="shadow bg-white p-3 mb-3 rounded">
        <marquee><h5><b>Pesanan Saya<strong></h5></marquee>
        </div>

        <?php 
        $id_user = $_SESSION['tb_user']['id_user'];

        $tb_pembelian = array();
        $ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_user 
            ON tb_pembelian.id_user=tb_user.id_user
            WHERE tb_pembelian.id_user='$id_user'");
        while ($pecah = $ambil->fetch_assoc())
        {
            $tb_pembelian[]=$pecah;
        }

    ?>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tb_pembelian as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key++; ?></td>
                            <td><?php echo date("d F Y", strtotime($value['tanggal_pembelian'])); ?></td>
                            <td><?php echo number_format($value['total_pembelian']); ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">
                                    <?php echo $value['status'] ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>