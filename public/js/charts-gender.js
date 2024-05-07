const pieGenderConfig = pieChartConfig

// change this to the id of your chart element in HMTL
const pieGenderCtx = document.getElementById("genderChart");
pieGenderCtx.parentNode.style.height = '100%';
pieGenderCtx.parentNode.style.width = '100%';
const pieGenderData = pieGenderCtx.getAttribute("dataset").split(",");
const pieGenderLabel = pieGenderCtx.getAttribute("labels").split(",");
pieGenderConfig.data.labels = pieGenderLabel;
pieGenderConfig.data.datasets[0].data = pieGenderData;
window.myPie = new Chart(pieGenderCtx, pieGenderConfig);