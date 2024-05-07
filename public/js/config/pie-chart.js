const pieChartOptions = {
  plugins: {
    datalabels: {
      formatter: (value, ctx) => {
        const datapoints = ctx.chart.data.datasets[0].data
        const total = datapoints.reduce((total, datapoint) => total + parseInt(datapoint), 0)
        const percentage = value / total * 100
        return percentage.toFixed(2) + "%";
      },
      color: '#fff',
      font: {
        size: 20
      }
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
          size: 15
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

const pieChartConfig = {
  type: "doughnut",
  data: {
    datasets: [
      {
        data: [],
        backgroundColor: ["#0694a2", "#1c64f2"],
      },
    ],
    labels: ["Shoes", "Shirts"],
  },
  options: pieChartOptions,
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