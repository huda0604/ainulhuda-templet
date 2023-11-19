<!DOCTYPE html>
<html>

<head>
    <title>Single Exponential Smoothing Forecasting</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>

<body>

    <?php

    $pembelian = array();
    $ambil = $koneksi->query("SELECT SUM(total_pembelian) as jumlahPembelian, MONTH(tanggal_pembelian) as bulan FROM tb_pembelian GROUP BY MONTH(tanggal_pembelian)");
    while ($pecah = $ambil->fetch_assoc()) {
        $pembelian[] = $pecah;
    }
    ?>

    <div class="shadow p-3 mb-3 bg-white rounded">
        <marquee>
            <h5><b>Halaman Forecasting Singgle Exponential Smoothing</b></h5>
        </marquee>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <canvas id="speedChart" style="height: 100px;"></canvas>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Bulan</th>
                            <th>Actual</th>
                            <th>Forecast</th>
                        </tr>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pembelian as $get) : ?>
                            <tr>
                                <?php
                                    $awal = 0.4 * $get['jumlahPembelian'] + (1 - 0.4);
                                    $forecast = 0.4 * $get['jumlahPembelian'] + (1 - 0.4) * $awal;
                                    ?>
                                <td><?= $i++ ?></td>
                                <td><?= $get['bulan'] ?></td>
                                <td><?= $get['jumlahPembelian'] ?></td>
                                <td><?= $forecast ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <script>
        var speedCanvas = document.getElementById("speedChart");

        var dataFirst = {
            label: "Actual",
            data: [
                <?php foreach ($pembelian as $get) : ?>
                    <?= '"' . $get['jumlahPembelian'] . '",' ?>
                <?php endforeach; ?>
            ],
            lineTension: 0,
            fill: false,
            borderColor: 'red'
        };

        var dataSecond = {
            label: "Forecast",
            data: [
                <?php foreach ($pembelian as $get) : ?>
                    <?php
                        $awal = 0.4 * $get['jumlahPembelian'] + (1 - 0.4);
                        $forecast = 0.4 * $get['jumlahPembelian'] + (1 - 0.4) * $awal;
                        ?>
                    <?= '"' . $forecast . '",' ?>
                <?php endforeach; ?>
            ],
            lineTension: 0,
            fill: false,
            borderColor: 'blue'
        };

        var speedData = {
            labels: [
                <?php foreach ($pembelian as $get) : ?>
                    <?= '"' . $get['bulan'] . '",' ?>
                <?php endforeach; ?>
            ],
            datasets: [dataFirst, dataSecond]
        };

        var chartOptions = {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    boxWidth: 80,
                    fontColor: 'black'
                }
            }
        };

        var lineChart = new Chart(speedCanvas, {
            type: 'line',
            data: speedData,
            options: chartOptions
        });
    </script>

</body>

</html>