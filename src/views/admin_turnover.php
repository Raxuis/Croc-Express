<h3>Finances</h3>

<p>Chiffre d'affaires total : <?= $totalPrice ?>€</p>
<p>Bénéfices total : <?= $totalBenef ?>€</p>

<div class="chart" style="margin-bottom: 10vh">
    <canvas id="myChart"></canvas>
</div>

<script>
    let date = <?php echo $date; ?>;
    let price = <?php echo $price; ?>;
    let benef = <?php echo $benef; ?>;

    let ctx = document.getElementById('myChart').getContext('2d');
    let labels = Array.isArray(date) ? date.map(date => new Date(date).getDate()) : [];

    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Chiffre d'affaires",
                    data: price.length >= 7 ? price.slice(-7) : price,
                    borderColor: '#FFFFFF',
                    borderWidth: 1,
                    fill: false,
                    pointBackgroundColor: '#FFFFFF',
                    backgroundColor: '#FFFFFF',
                    pointBorderColor: '#FFFFFF',
                    pointHoverBackgroundColor: '#FFFFFF',
                    pointHoverBorderColor: '#FFFFFF',
                },
                {
                    label: "Bénéfice",
                    data: benef.length >= 7 ? benef.slice(-7) : benef,
                    borderColor: '#ffc74d',
                    borderWidth: 1,
                    fill: false,
                    pointBackgroundColor: '#ffc74d',
                    backgroundColor: '#ffc74d',
                    pointBorderColor: '#ffc74d',
                    pointHoverBackgroundColor: '#ffc74d',
                    pointHoverBorderColor: '#ffc74d',
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
                    text: 'Résultats financiers des 7 derniers jours'
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

