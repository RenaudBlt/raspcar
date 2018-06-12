<script type="text/javascript">
		window.onload = function() {
			var ctx1 = document.getElementById("canvasplein").getContext("2d");
			window.myLine = Chart.Line(ctx1, {
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
			
			var ctx02 = document.getElementById("canvasO2").getContext("2d");
			window.myLine = Chart.Line(ctx02, {
				data: lineChartDataO2,
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
							ticks: {
							suggestedMin: 0,
							suggestedMax: 1
							},	
						}],
					}
				}
			});
			var ctxTemp = document.getElementById("canvastemp").getContext("2d");
			window.myLine = Chart.Line(ctxTemp, {
				data: lineChartDataTemp,
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
							ticks: {
							suggestedMin: 35,
							suggestedMax: 135
							},	
						}],
					}
				}
			});
};
</script>