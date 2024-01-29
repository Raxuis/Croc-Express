<h3>Chiffres d'affaire</h3>
<div class="chart" style="margin-bottom: 10vh">
    <canvas id="myChart"></canvas>
</div>

<script>
    let date = <?php echo $date; ?>;
    let price = <?php echo $price; ?>;
    let ctx = document.getElementById('myChart').getContext('2d');
    let labels = Array.isArray(date) ? date.map(date => new Date(date).getDate()) : [];

    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Price',
                    data: price,
                    borderColor: '#FFFFFF',
                    borderWidth: 1,
                    fill: false,
                    pointBackgroundColor: '#FFFFFF',
                    backgroundColor: '#FFFFFF',
                    pointBorderColor: '#FFFFFF',
                    pointHoverBackgroundColor: '#FFFFFF',
                    pointHoverBorderColor: '#FFFFFF',
                }
            ],
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
                    text: 'Chiffres d\'affaire'
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