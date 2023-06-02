var xValues = ["HTML5", "CSS3", "JS", "Bootstrap", "ReactJS","Python"];
var yValues = [55, 49, 24, 24, 15,30];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#8BBCCC"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      
    }
  }
});