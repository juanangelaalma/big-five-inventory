const barChartOptions = {
    scales: {
        y: {
            ticks: {
                beginAtZero: true,
                stepSize: 1
            },
        },
    },
    plugins: {
        datalabels: {
            formatter: (value, ctx) => {
                const datapoints = ctx.chart.data.datasets[0].data
                const total = datapoints.reduce((total, datapoint) => total + parseInt(datapoint), 0)
                const percentage = value / total * 100
                return percentage.toFixed(2) + "%";
            },
            color: '#000',
            font: {
                size: 14
            },
            anchor: 'end',
            align: 'top',
        },
        legend: {
            labels: {
                generateLabels: (chart) => {
                    const datasets = chart.data.datasets;
                    return datasets[0].data.map((data, i) => ({
                        text: `${chart.data.labels[i]} (${data})`,
                        fillStyle: datasets[0].backgroundColor[i],
                        index: i
                    }))
                },
                font: {
                    size: 14
                },
            }
        },
        tooltips: {
            enabled: false,
            position: 'average'
        },
    },
    responsive: true,
    cutoutPercentage: 80,
    legend: {
        display: false,
    },
}

const barChartConfig = {
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
    options: barChartOptions,
    plugins: [ChartDataLabels, {
        beforeInit(chart) {
            const originalFit = chart.legend.fit;
            chart.legend.fit = function fit() {
                originalFit.bind(chart.legend)();
                this.height += 45;
            }
        }
    }],
};
