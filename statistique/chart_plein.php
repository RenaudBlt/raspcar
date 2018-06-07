<div style="width:75%;">
    <canvas id="canvas"></canvas>
</div>
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

window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = Chart.Line(ctx, {
        data: lineChartData,
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: false,
            scales: {
                yAxes: [{
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                }, {
                    type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: "right",
                    id: "y-axis-2",

                    // grid line settings
                    gridLines: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                }],
            }
        }
    });
};

document.getElementById('randomizeData').addEventListener('click', function() {
    lineChartData.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
            return randomScalingFactor();
        });
    });

    window.myLine.update();
});
</script>