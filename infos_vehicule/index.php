<?php require "../header.php"; ?>

<?php 
$today = date("Y-m-d H:i:s");
	if(isset($_GET['coolant'])) {
		// $output = Shell_exec(escapeshellcmd('python3 /var/www/html/coolant.py')); 
		// echo $output;
		if (file_exists('../coolant.txt')) {
			$myfile = fopen("../coolant.txt", "r");
			$lines = fgets($myfile);
			if(strlen($lines) < 2){
				echo "Aucun nombre";
			}else{
				$nb = substr($lines, 0, 3);
				$nb = str_replace(' ', '', $nb);
				$query = "INSERT INTO coolant_temp VALUES ('',".$nb.",'".$today."')";
				$bdd->query($query);
			}
		}
	} 
	
	if(isset($_GET['O2'])) {
		// $output = Shell_exec(escapeshellcmd('python3 /var/www/html/O2.py')); 
		// echo $output;
		if (file_exists('../O2.txt')) {
			$myfile = fopen("../O2.txt", "r");
			$lines = fgets($myfile);
			if(strlen($lines) < 2){
				echo "Aucun nombre";
			}else{
				$nb = substr($lines, 0, 5);
				$nb = str_replace(' ', '', $nb);
				$query = "INSERT INTO O2 VALUES ('',".$nb.",'".$today."')";
				$bdd->query($query);
			}
		}
	} 
	
	
	
	?>
        <section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Vitesse Max</h3>
            </div>
				<div class="panel-body">
					<div class="speed">154 km/h</div>
				</div>
            </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Vitesse Moyenne</h3>
            </div>
            <div class="panel-body">
				<div class="speed">70 km/h</div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">O à 100 km/h</h3>
            </div>
            <div class="panel-body">
				<div class="speed">15,4 s</div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Température du liquide de refroidissement</h3>
            </div>
            <div class="panel-body">
				<div id="chart_div3"></div>
				<div class="text-center"><a href="?coolant" class="btn btn-primary text-center">Actualiser</a></div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Consommation moyenne</h3>
            </div>
				
            <div class="panel-body">
				<div id="chart_div"></div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Sonde lambda</h3>
            </div>
            <div class="panel-body">
				<div id="chart_div2"></div>
				<div class="text-center"><a href="?O2" class="btn btn-primary text-center">Actualiser</a></div>
            </div>
          </div>
        </section>

<?php include('../footer.php'); ?>