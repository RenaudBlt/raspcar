
    <canvas id="canvastemp"></canvas>

<?php
$result1 = $bdd->query('SELECT * FROM coolant_temp ORDER BY date ASC');
$results = $result1->fetchAll();
$date = "";
$temp = "";
	foreach($results as $result){
		$date .=  "\"".$result['date']."\", ";
		$temp .= "\"".$result['temp']."\", ";
	}
?>

<script>
var lineChartDataTemp = {
    labels: [<?php echo $date;?>],
    datasets: [{
        label: "Température liquide de refroidissement",
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        fill: false,
        data: [
            <?php echo $temp;?>
        ],
        yAxisID: "y-axis-1",
    }]
};

</script>