let ctx = document.getElementById("myChart").getContext("2d");
let labels = Array.isArray(date)
  ? date.map((date) => new Date(date).getDate())
  : [];

let myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: labels,
    datasets: [
      {
        label: "Chiffre d'affaires",
        data: price,
        borderColor: "#FFFFFF",
        borderWidth: 1,
        fill: false,
        pointBackgroundColor: "#FFFFFF",
        backgroundColor: "#FFFFFF",
        pointBorderColor: "#FFFFFF",
        pointHoverBackgroundColor: "#FFFFFF",
        pointHoverBorderColor: "#FFFFFF",
      },
      {
        label: "Bénéfice",
        data: benef,
        borderColor: "#ffc74d",
        borderWidth: 1,
        fill: false,
        pointBackgroundColor: "#ffc74d",
        backgroundColor: "#ffc74d",
        pointBorderColor: "#ffc74d",
        pointHoverBackgroundColor: "#ffc74d",
        pointHoverBorderColor: "#ffc74d",
      },
    ],
  },
  options: {
    responsive: true,
    interaction: {
      mode: "index",
      intersect: false,
    },
    stacked: false,
    plugins: {
      title: {
        display: true,
        text: "Chiffres d'affaire",
      },
    },
    scales: {
      y: {
        type: "linear",
        display: true,
        position: "left",
      },
    },
  },
});
