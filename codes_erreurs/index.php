<?php require "../header.php"; ?>

        <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Codes d'erreurs du véhicule</h3>
            </div>
            <div class="panel-body">
				<?php
				if(!empty($_POST['envoyer'])){
					$mavar = array();
					exec("python /var/www/html/test.py speed", $mavar);
					echo $mavar[0];
				}else{
				?>
				<p>Afficher les codes d'erreurs :
				<form method="POST">
					<input type="submit" name="envoyer" value="envoyer" class="btn btn-primary">
				</form>
				<?php
				}
				?>
					
				
            </div>
          </div>

<?php include('../footer.php'); ?>