const barAgeConfig = barChartConfig

barAgeConfig.data.datasets[0].backgroundColor = '#6466F1'

const barsAge = document.getElementById("barsAge");
const ageBar = document.getElementById("age-bar");
console.log(ageBar.getAttribute("labels"))
const ageLabels = ageBar.getAttribute("labels").split(",");
barAgeConfig.data.labels = ageLabels;
const datasetsAge = ageBar.getAttribute("datasets").split(",");
barAgeConfig.data.datasets[0].data = datasetsAge;
window.myBar = new Chart(barsAge, barAgeConfig);
