/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieGenderConfig = {
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
const pieGenderCtx = document.getElementById("genderChart");
const pieGenderData = pieGenderCtx.getAttribute("dataset").split(",");
const pieGenderLabel = pieGenderCtx.getAttribute("labels").split(",");
pieGenderConfig.data.labels = pieGenderLabel;
pieGenderConfig.data.datasets[0].data = pieGenderData;
window.myPie = new Chart(pieGenderCtx, pieGenderConfig);
