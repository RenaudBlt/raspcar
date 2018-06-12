
    <canvas id="canvasplein"></canvas>

<?php
$result1 = $bdd->query('SELECT * FROM essence ORDER BY date ASC');
$results = $result1->fetchAll();
$date = "";
$km = "";
$conso = "";
	foreach($results as $result){
		$date .=  "\"".$result['date']."\", ";
		$km .= "\"".$result['km_parcouru']."\", ";
		$conso .= "\"".$result['conso']."\", ";
	}
?>

<script>
var lineChartData = {
    labels: [<?php echo $date;?>],
    datasets: [{
        label: "KM parcourus/plein",
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        fill: false,
        data: [
            <?php echo $km;?>
        ],
        yAxisID: "y-axis-1",
    }, {
        label: "Consommation L/100",
        borderColor: window.chartColors.blue,
        backgroundColor: window.chartColors.blue,
        fill: false,
        data: [
            <?php echo $conso; ?>
        ],
        yAxisID: "y-axis-2"
    }]
};

</script>