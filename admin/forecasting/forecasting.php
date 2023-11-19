<div class="shadow p-3 mb-3 bg-white rounded">
    <marquee><h5><b>Halaman Forecasting Singgle Exponential Smoothing</b></h5></marquee>
</div>
<?php

echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>';

$alpha = 0.4;


$data = [45, 48, 52, 54, 55, 58, 60, 63, 66, 70, 72, 75]; 


$forecast = $data[0];
$forecasts = [$forecast];
$actual = $data; // Data aktual hingga periode ke-12

?>

<!DOCTYPE html>
<html>
<head>
    <title>Single Exponential Smoothing Forecasting</title>
</head>
<body>
   
    <div style="width: 100%;" >
        <canvas id="forecastChart"></canvas>
    </div>


    
    
    <script>
        // Data untuk grafik
        var labels = Array.from({ length: <?php echo count($data); ?> }, (_, i) => "Periode " + (i + 1));
        var forecastData = <?php echo json_encode($forecasts); ?>;
        var actualData = <?php echo json_encode($actual); ?>;
        
        // Buat dan tampilkan grafik
        var ctx = document.getElementById("forecastChart").getContext("2d");
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Peramalan",
                        data: forecastData,
                        fill: false,
                        borderColor: "blue",
                    },
                    {
                        label: "Data Aktual",
                        data: actualData,
                        fill: false,
                        borderColor: "green",
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: "Periode"
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: "Data Actual"
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
