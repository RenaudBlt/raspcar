<?php require "header.php"; ?>

	<?php if(isset($_GET['liste'])) {
		shell_exec("python3 diag.py LISTE");
	} ?>

        <section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Bienvenue sur votre tableau de bord !</h3>
				</div>
				<div class="panel-body">
					<a href="" class="btn btn-primary">Actualiser les données de la voiture</a>
				</div>
			</div>
        </section>
		<section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Liste des commandes supportées</h3>
				</div>
				<div class="panel-body">		
					<a href="?liste" class="btn btn-warning">Actualiser les commandes supportées</a>
				
				<?php
				if (file_exists('liste_cmd.txt')) {
					$ouvre = file_get_contents("liste_cmd.txt");  // ouverture du fichier
					$donnee = explode("\n", $ouvre);
					echo "<div class=\"table-responsive\" style=\"margin-top:20px\">";
					echo "<table class=\"table\">";
					$i=0;
					while($i <= (count($donnee)-1)) {
						echo "<tr>";
						for($j=0;$j<=4;$j++) {
							echo "<td>";
							echo $donnee[$i];
							echo "</td>";
							if($i == count($donnee)-1) {
								break;
							} else {
								$i++;
							}
						}
						echo "</tr>";
						if($i == count($donnee)-1) {
							break;
						}
					}
					echo "</table>";
					echo "</div>";
				}
				?>
				</div>
			</div>
        </section>

<?php include('footer.php'); ?>
