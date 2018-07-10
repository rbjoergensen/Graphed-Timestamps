$(document).ready(function(){
  $.ajax({
    url : "http://localhost/data.php",
    type : "GET",
    success : function(data){
      console.log(data);

      //var userid = [];
      //var facebook_follower = [];
      var activityid = [];
      var activitytime = [];

      for(var i in data) {
        //activityid.push("UserID " + data[i].activityid);
        //facebook_follower.push(data[i].facebook);
        activityid.push("activityid " + data[i].activityid);
        activitytime.push(data[i].activitytime);
      }

      var chartdata = {
        labels: activityid,
        datasets: [
          {
            label: "timestamp",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: activitytime
          }
        ]
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});
