<?php 
header('Content-Type: application/javascript');

require "../connexion_bdd.php";

$query = "SELECT temp FROM coolant_temp ORDER BY `id` DESC LIMIT 1";
$temp = $bdd->query($query)->fetch();
?>

google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['°C', <?php echo $temp['temp'];?>],
  ]);

  var options = {
    width: 400, height: 200,
    greenFrom: 75, greenTo: 105,
	redFrom: 105, redTo: 135,
    minorTicks: 5,
	min: 35,
	max: 135
  };

  var chart = new google.visualization.Gauge(document.getElementById('chart_div3'));

  chart.draw(data, options);
}

