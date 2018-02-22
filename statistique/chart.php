<div style="width:75%;">
    <canvas id="canvas"></canvas>
</div>
<?php
$result1 = $bdd->query('SELECT * FROM essence ORDER BY date DESC');
while($date = $result1->fetch()){
	$label = "\"".$date['date']."\", ";
}

$result2 = $bdd->query('SELECT * FROM essence ORDER BY date DESC');
while($km = $result2->fetch()){
	$data = "\"".$km['km_parcouru']."\", ";
}
?>
<script>
    var config = {
        type: 'line',
        data: {
            labels: [<?php echo $label;?>],
            datasets: [{
                label: "Suivi des km/plein",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [
                   <?php echo $data;?>
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
