const barResultConfig = barChartConfig

const barsResultCtx = document.getElementById("barsResult");
const resultBar = document.getElementById("result-bar");
const resultLabels = resultBar.getAttribute("labels").split(",");
barResultConfig.data.labels = resultLabels;
const datasetsResult = resultBar.getAttribute("datasets").split(",");
barResultConfig.data.datasets[0].data = datasetsResult;
window.myBar = new Chart(barsResultCtx, barResultConfig);
