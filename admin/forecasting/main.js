 
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