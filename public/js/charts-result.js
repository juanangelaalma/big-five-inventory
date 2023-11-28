/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const barResultConfig = {
    type: "bar",
    data: {
        labels: [],
        datasets: [
            {
                label: "Rata-rata",
                backgroundColor: "#0694a2",
                borderWidth: 1,
                data: [],
            },
        ],
    },
    options: {
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                    },
                },
            ],
        },
    },
};

const barsResultCtx = document.getElementById("barsResult");
const resultBar = document.getElementById("result-bar");
const resultLabels = resultBar.getAttribute("labels").split(",");
barResultConfig.data.labels = resultLabels;
const datasetsResult = resultBar.getAttribute("datasets").split(",");
barResultConfig.data.datasets[0].data = datasetsResult;
window.myBar = new Chart(barsResultCtx, barResultConfig);
