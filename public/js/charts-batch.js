const pieBatchConfig = pieChartConfig

const pieBatchCtx = document.getElementById("batchChart");
const pieBatchData = pieBatchCtx.getAttribute("dataset").split(",");
const pieBatchLabel = pieBatchCtx.getAttribute("labels").split(",");
const colorsBatch = pieBatchCtx.getAttribute("colors").split(",");
pieBatchConfig.data.labels = pieBatchLabel;
pieBatchConfig.data.datasets[0].data = pieBatchData;
pieBatchConfig.data.datasets[0].backgroundColor = colorsBatch;
window.myPie = new Chart(pieBatchCtx, pieBatchConfig);