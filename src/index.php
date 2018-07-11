<script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<style>
.container
{
  width:80%;
  height:30%;
}
</style>

<br><br><br>
<center>
  <div class="container">
    <canvas id="myChart"></canvas>
  </div>
</center>

<script type="text/javascript">
$.getJSON("http://localhost/Graphed-Timestamps/src/includes/data.php", function (result) {
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
                backgroundColor: "#5892ef",
                borderColor: "#00000",
                pointColor: "#f46b42",
                pointStrokeColor: "#f46b42",
                pointHighlightFill: "#f46b42",
                pointHighlightStroke: "#f46b42",
                borderWidth: "2",
                data: data
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    suggestedMin: 0,
                    suggestedMax: 10
                  }
                }],
                xAxes: [{
                  ticks: {
                    maxRotation: 90,
                    minRotation: 50
                  }
                }]
              }
            }
          });
});
</script>
