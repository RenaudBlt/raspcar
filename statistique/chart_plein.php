<div style="width:75%;">
    <canvas id="canvas"></canvas>
</div>
<?php
$result1 = $bdd->query('SELECT * FROM essence ORDER BY date ASC');
$results = $result1->fetchAll();
$date = "";
$km = "";
	foreach($results as $result){
		$date .=  "\"".$result['date']."\", ";
		$km .= "\"".$result['km_parcouru']."\", ";
	}
?>
<script>
    var config = {
        type: 'line',
        data: {
            labels: [<?php echo $date;?>],
            datasets: [{
                label: "Suivi des km/plein",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [
                   <?php echo $km;?>
                ],
                fill: false,
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Km'
                    }
                }]
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };


    var colorNames = Object.keys(window.chartColors);

</script>
