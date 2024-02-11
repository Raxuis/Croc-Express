<h3>Ventes des produits</h3>

<p>Total des ventes : <?= count($orders) ?> </p>

<div class="chart" style="margin-bottom: 10vh">
    <canvas id="myChart"></canvas>
</div>

<script>
    let productsSold = <?= $productSold; ?>;
    let quantitySold = <?= $quantitySold; ?>;

    let ctx = document.getElementById('myChart').getContext('2d');

    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: productsSold,
            datasets: [{
                label: "Ventes",
                data: quantitySold,
                borderColor: '#FFFFFF',
                borderWidth: 1,
                fill: false,
                pointBackgroundColor: '#FFFFFF',
                backgroundColor: '#FFFFFF',
                pointBorderColor: '#FFFFFF',
                pointHoverBackgroundColor: '#FFFFFF',
                pointHoverBorderColor: '#FFFFFF',
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
                    text: 'Meilleurs ventes les 7 derniers jours'
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                },
            },
        }
    });
</script>