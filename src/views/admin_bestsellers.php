<h3>Meilleures ventes sur 7 jours</h3>
<div class="chart">
    <canvas id="myChart" style="background-color: transparent; color: white;"></canvas>
</div>

<script>
    let datas = <?php echo $orders; ?>;
    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Sales Data',
                data: datas,
                borderWidth: 1,
                fill: false,
            }],
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Chart.js Line Chart - Multi Axis'
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    grid: {
                        drawOnChartArea: false,
                    },
                },
            }
        }
    });

</script>