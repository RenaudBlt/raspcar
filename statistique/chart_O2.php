
    <canvas id="canvasO2"></canvas>

<?php
$result1 = $bdd->query('SELECT * FROM O2 ORDER BY date ASC');
$results = $result1->fetchAll();
$date = "";
$volt = "";
	foreach($results as $result){
		$date .=  "\"".$result['date']."\", ";
		$volt .= "\"".$result['volt']."\", ";
	}
?>

<script>
var lineChartDataO2 = {
    labels: [<?php echo $date;?>],
    datasets: [{
        label: "Emmission de gaz",
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        fill: false,
        data: [
            <?php echo $volt;?>
        ],
        yAxisID: "y-axis-1",
    }]
};

</script>