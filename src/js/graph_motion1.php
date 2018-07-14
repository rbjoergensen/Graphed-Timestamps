<br>
<center>

  <table width=65% height=50%>
    <td>
    <canvas id="myChart"></canvas>
  </td>
  </table>

</center>


<script type="text/javascript">

Chart.defaults.global.defaultFontColor = "#d3d3d3";
$.getJSON("http://events.callofthevoid.dk/includes/data.php", function (result) {
//$.getJSON("http://localhost/includes/data.php", function (result) {
    var labels = [], data = [];

    for (var i = 0; i < result.length ; i++){
            labels.push(result[i].dte);
            data.push(result[i].count);
            console.log("result");
    }

    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: labels,
              datasets: [
              {
                label: "Detected Events",
                //backgroundColor: "#0ad600",
                showLine: true,
                borderColor: "#f46b42",
                pointColor: "#f46b42",
                pointStrokeColor: "#f46b42",
                pointHighlightFill: "#f46b42",
                pointHighlightStroke: "#f46b42",
                borderWidth: "3",
                data: data
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    suggestedMin: 0,
                    suggestedMax: 10
                  },
                  gridLines: {
                    display: true ,
                    color: "#707070"
                  }
                }],
                xAxes: [{
                  ticks: {
                    maxRotation: 90,
                    minRotation: 50
                  },
                  gridLines: {
                    display: true ,
                    color: "#707070"
                  }
                }]
              }
            }
          });
});
</script>
