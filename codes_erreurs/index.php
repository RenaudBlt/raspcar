<?php require "../header.php"; ?>
<?php if(isset($_GET['erreur'])) {
		$output = Shell_exec(escapeshellcmd('python3 /var/www/html/code_erreur.py')); 
		echo $output;
	} ?>
        <section class="col-sm-10 col-lg-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Codes d'erreurs du véhicule</h3>
            </div>
            <div class="panel-body">
				<a href="?erreur" class="btn btn-warning">Actualiser les codes d'erreur</a>
				<?php
				if (file_exists('../code_erreur.txt')) {
					$lines = file("../code_erreur.txt");
					if(count($lines) < 5){
						echo "Aucun code d'erreur à signaler";
					}else{
						foreach($lines as $n => $line){
						echo $line . "<br />";
						}
					}
				}
				?>
            </div>
          </div>

<?php include('../footer.php'); ?>