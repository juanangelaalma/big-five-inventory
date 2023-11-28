/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const barAgeConfig = {
    type: "bar",
    data: {
        labels: [],
        datasets: [
            {
                label: "Rata-rata",
                backgroundColor: "#7E3AF2",
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
                        stepSize: 1
                    },
                },
            ],
            xAxes: [
                {
                    ticks: {
                        callback: function(value, index, ticks) {
                            return value + ' tahun'
                        }
                    }
                }
            ]
        },
    },
};

const barsAge = document.getElementById("barsAge");
const ageBar = document.getElementById("age-bar");
console.log(ageBar.getAttribute("labels"))
const ageLabels = ageBar.getAttribute("labels").split(",");
barAgeConfig.data.labels = ageLabels;
const datasetsAge = ageBar.getAttribute("datasets").split(",");
barAgeConfig.data.datasets[0].data = datasetsAge;
window.myBar = new Chart(barsAge, barAgeConfig);
