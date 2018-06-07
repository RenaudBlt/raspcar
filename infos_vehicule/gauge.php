<?php 
header('Content-Type: application/javascript');

require "../connexion_bdd.php";

$query = "SELECT AVG(conso) AS conso_moy FROM essence";
$conso_moy = $bdd->query($query)->fetch();
?>

google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['L/100', <?php echo $conso_moy['conso_moy'];?>],
  ]);

  var options = {
    width: 400, height: 200,
    redFrom: 12, redTo: 15,
    yellowFrom:8, yellowTo: 12,
    minorTicks: 5,
	min: 5,
	max: 15
  };

  var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

  chart.draw(data, options);
}