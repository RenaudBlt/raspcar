<?php require "header.php"; ?>

        <section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Bienvenue sur votre tableau de bord !</h3>
				</div>
				<div class="panel-body">
		<?php 
		$date = date("Y-m-d");
		$query = 'SELECT * FROM stockage WHERE date=\''.$date.'\'';
		$rep = $bdd->query($query)->fetch();
		
		echo $rep['date'].' : '.$rep['utilise'].'G utilisé & '.$rep['disponible'].'G disponible';?>
				</div>
			</div>
        </section>

<?php include('footer.php'); ?>
