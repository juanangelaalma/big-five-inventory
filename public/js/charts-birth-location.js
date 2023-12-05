/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const radarBirthLocationConfig = {
    type: "radar",
    data: {
        datasets: [
            {
                data: [33, 33, 33],
                label: "Jumlah",
            },
        ],
        labels: ["Shoes", "Shirts"],
    },
    options: {
        responsive: true,
        cutoutPercentage: 80,
        scale: {
            ticks: {
                beginAtZero: true,
                stepSize: 1,
            },
        },
        /**
         * Default legends are ugly and impossible to style.
         * See examples in charts.html to add your own legends
         *  */
        legend: {
            display: false,
        },
    },
};

// change this to the id of your chart element in HMTL
const radarBirthLocationCtx = document.getElementById("birthLocationChart");
const radarBirthLocationData = radarBirthLocationCtx
    .getAttribute("dataset")
    .split(",");
const radarBirthLocationLabel = radarBirthLocationCtx
    .getAttribute("labels")
    .split(",");
const colorsBirthLocation = radarBirthLocationCtx
    .getAttribute("colors")
    .split(",");
radarBirthLocationConfig.data.labels = radarBirthLocationLabel;
radarBirthLocationConfig.data.datasets[0].data = radarBirthLocationData;
radarBirthLocationConfig.data.datasets[0].backgroundColor = colorsBirthLocation;
console.log(colorsBirthLocation);
window.myradar = new Chart(radarBirthLocationCtx, radarBirthLocationConfig);
