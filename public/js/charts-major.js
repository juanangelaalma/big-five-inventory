/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieMajorConfig = {
  type: "doughnut",
  data: {
      datasets: [
          {
              data: [33, 33, 33],
              /**
               * These colors come from Tailwind CSS palette
               * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
               */
              backgroundColor: ["#0694a2", "#1c64f2"],
              label: "Dataset 1",
          },
      ],
      labels: ["Shoes", "Shirts"],
  },
  options: {
      responsive: true,
      cutoutPercentage: 80,
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
const pieMajorCtx = document.getElementById("majorChart");
const pieMajorData = pieMajorCtx.getAttribute("dataset").split(",");
const pieMajorLabel = pieMajorCtx.getAttribute("labels").split(",");
const colorsMajor = pieMajorCtx.getAttribute("colors").split(",");
pieMajorConfig.data.labels = pieMajorLabel;
pieMajorConfig.data.datasets[0].data = pieMajorData;
pieMajorConfig.data.datasets[0].backgroundColor = colorsMajor;
console.log(colorsMajor)
window.myPie = new Chart(pieMajorCtx, pieMajorConfig);
