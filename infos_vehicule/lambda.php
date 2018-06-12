<?php 
header('Content-Type: application/javascript');

require "../connexion_bdd.php";

$query = "SELECT volt FROM O2 ORDER BY `id` DESC LIMIT 1";
$volt = $bdd->query($query)->fetch();
?>

google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['sonde', <?php echo $volt['volt'];?>],
  ]);

  var options = {
    width: 400, height: 200,
	yellowFrom: 0, yellowTo: 0.2,
    redFrom: 0.8, redTo: 1,
    greenFrom: 0.2, greenTo: 0.8,
    minorTicks: 5,
	max: 1
  };

  var chart = new google.visualization.Gauge(document.getElementById('chart_div2'));

  chart.draw(data, options);
}

