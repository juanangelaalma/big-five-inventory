/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieBatchConfig = {
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
const pieBatchCtx = document.getElementById("batchChart");
const pieBatchData = pieBatchCtx.getAttribute("dataset").split(",");
const pieBatchLabel = pieBatchCtx.getAttribute("labels").split(",");
const colorsBatch = pieBatchCtx.getAttribute("colors").split(",");
pieBatchConfig.data.labels = pieBatchLabel;
pieBatchConfig.data.datasets[0].data = pieBatchData;
pieBatchConfig.data.datasets[0].backgroundColor = colorsBatch;
console.log(colorsBatch)
window.myPie = new Chart(pieBatchCtx, pieBatchConfig);
