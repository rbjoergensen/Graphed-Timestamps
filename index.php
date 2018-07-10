<script type="text/javascript" src="js/Chart.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<canvas id="myChart" width="740" height="200"></canvas>


<script type="text/javascript">

$.getJSON("http://localhost/includes/data.php", function (result) {
    var labels = [], data = [];

    for (var i = 0; i < result.length ; i++){
            labels.push(result[i].trunc_5_minute);
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
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: data
            }
            ]}
});
});
</script>
