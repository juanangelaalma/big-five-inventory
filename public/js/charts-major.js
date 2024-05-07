/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieMajorConfig = pieChartConfig

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
